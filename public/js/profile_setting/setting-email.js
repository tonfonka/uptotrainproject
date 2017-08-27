$(function() {
    email_init();
});

function email_init() {
    $('.btn-add-email').removeClass('hidden');
    $('.email-list').on('click', function() {
        $('.email-list').removeClass('hidden');
        $(this).addClass('hidden');
        $('.email-panel').addClass('hidden');
        $('.btn-add-email').removeClass('hidden');
        $(this).next('.edit-email').removeClass('hidden');
    });
    $('.btn-close-email-panel').on('click', function() {
        $('.email-panel').addClass('hidden');
        $('.email-list').removeClass('hidden');
    });
    $('.btn-cancel-edit-email').on('click', function() {
        $('.email-panel').addClass('hidden');
        $('.email-list').removeClass('hidden');
    });
    $('.btn-update-email').on('click', function() {
        var email = $(this).data('mid');
        var use_as_main = $(this).parent().find('input[name="use_as_main"]:checked').val();
        var use_for_business = $(this).parent().find('input[name="use_for_business"]:checked').val();
        updateEmail(email, use_as_main, use_for_business);
    });
    $('.btn-delete-email').on('click', function() {
        var email_id = $(this).data('mid');
        var email = $(this).parent().find('strong').text();
        deleteEmail(email_id, email);
    });
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function addNewEmail() {
    $('.email-list').removeClass('hidden');
    $('.email-panel').addClass('hidden');
    $('.add-new-email').removeClass('hidden');
    $('.btn-add-email').addClass('hidden');
    $('.btn-cancel-add-email').on('click', function() {
        $('.add-new-email').addClass('hidden');
        $('.btn-add-email').removeClass('hidden');
    });
    $('.btn-save-new-email').on('click', function(e) {
        e.preventDefault();
        var new_email = $('input[name="new_email"]');
        var use_as_main = $('input[name="use_as_main"]:checked').val();
        if (new_email.val() == '') {
            $(new_email).addClass('error-input');
        } else if (!validateEmail(new_email.val())) {
            $(new_email).addClass('error-input');
            $(new_email).next('.help-error').remove();
            $('<span class="help-block font-red-thunderbird help-error"> ' + labels.wrong_email_format + ' </span>').insertAfter(new_email);
        } else {
            $(new_email).removeClass('error-input');
            $('.help-error').remove();

            var formData = {
                new_email: new_email.val(),
                main: use_as_main
            };
            var saveemailurl = "/_member/module/setting/saveemail.php"
            $.ajax({
                url: saveemailurl,
                type: 'POST',
                data: formData,
                async: true,
                beforeSend: function() {
                    App.blockUI({
                        boxed: true,
                        message: labels.saving + '...'
                    });
                },
                success: function(response) {
                    App.unblockUI();
                    // console.log('response='+response);
                    if (response == 1) {
                        loadPart('#part_email', '/_member/module/setting/part_email.php?locale=' + $('.current_lang').data('current'));
                        toastr['success']("", labels.saved);
                    } else {
                        toastr['error']("", response);
                    }
                },
                error: function(e) {
                    console.log(e);
                    return false;
                }
            });
        }
        return false;
    });
}

function updateEmail(email, use_as_main, use_for_business) {
    var datas = {
        email: email,
        use_as_main: use_as_main,
        use_for_business: use_for_business
    };
    var updateemailurl = "/_member/module/setting/updateemail.php"
    $.ajax({
        url: updateemailurl,
        type: 'POST',
        data: datas,
        async: true,
        beforeSend: function() {
            App.blockUI({
                boxed: true,
                message: labels.saving + '...'
            });
        },
        success: function(response) {
            App.unblockUI();
            // console.log('response='+response);
            if (response == 1) {
                loadPart('#part_email', '/_member/module/setting/part_email.php?locale=' + $('.current_lang').data('current'));
                toastr['success']("", labels.saved);
            } else {
                toastr['error']("", response);
            }
            $('.email-panel').addClass('hidden');
            $('.email-list').removeClass('hidden');
        },
        error: function(e) {
            console.log(e);
            return false;
        }
    });
    return false;
}

function deleteEmail(email_id, email) {
    // console.log(email);
    bootbox.confirm(labels.confirm_del_email, function(result) {
        if (result == true) {
            console.log(email_id);
            var formData = {
                email: email_id
            };
            var saveemailurl = "/_member/module/setting/deleteemail.php"
            $.ajax({
                url: saveemailurl,
                type: 'POST',
                data: formData,
                async: true,
                beforeSend: function() {
                    App.blockUI({
                        boxed: true,
                        message: labels.deleting + '...'
                    });
                },
                success: function(response) {
                    // console.log(response);
                    App.unblockUI();
                    if (response == 1) {
                        loadPart('#part_email', '/_member/module/setting/part_email.php?locale=' + $('.current_lang').data('current'));
                        toastr['success']("", labels.deleted);
                    } else {
                        toastr['error']("", response);
                    }
                },
                error: function(e) {
                    console.log(e);
                    return false;
                }
            });
        }
    }); //-- end bootbox
    return false;
}

function resendEmail(email) {
    var formData = {
        email: email,
        cet: 10
    };
    var resendmailurl = "/_member/module/setting/resendemail.php"
    $.ajax({
        url: resendmailurl,
        type: 'POST',
        data: formData,
        async: true,
        beforeSend: function() {
            App.blockUI({
                boxed: true,
                message: labels.sending + '...'
            });
        },
        success: function(response) {
            App.unblockUI();
            console.log('response=' + response);
            toastr['success']("", labels.sent);
        },
        error: function(e) {
            console.log(e);
            return false;
        }
    });
    return false;
}