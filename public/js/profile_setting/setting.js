$('#setting-sidebar').affix({
    offset: {
        top: ($("#header").outerHeight() + $(".page-title-container").outerHeight()),
        bottom: ($("#footer").outerHeight())
    }
})
var labels;
$(function() {
    $.ajax({
        type: 'get',
        url: '/_member/lib/languages/locale_' + $('.current_lang').data('current') + '.php?json=1',
        dataType: 'json',
        processData: false,
        cache: false,
        success: function(res_data) {
            labels = res_data;
        },
    });
    var hash = window.location.hash;
    hash = (hash == "" || hash == undefined) ? "" : hash;
    $('.list-group-item').find('a[href="' + hash + '"]').trigger('click');
    $('.list-group-item').on('click', function() {
        $('.list-group-item').removeClass('active');
        $(this).addClass('active');
    });
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-full-width",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    saveurl = "/_member/module/setting/savesetting.php";
    $('input[name="displayname"]').change(function() {
        saveDatas($(this), 'displayname', 'tmn');
    });
    $('select[name="age_range"]').change(function() {
        saveDatas($(this), 'age_range', 'tmn');
    });
    $('select[name="location"]').change(function() {
        saveDatas($(this), 'location', 'tmn');
    });
    $('select[name="user_title"]').change(function() {
        saveDatas($(this), 'title', 'tmn');
    });
    $('input[name="user_firstname"]').change(function() {
        saveDatas($(this), 'firstname', 'tmn');
    });
    $('input[name="user_lastname"]').change(function() {
        saveDatas($(this), 'lastname', 'tmn');
    });
    $('select[name="gender"]').change(function() {
        saveDatas($(this), 'gender', 'tmn');
    });
    $('select[name="currency"]').change(function() {
        saveDatas($(this), 'currency', 'tmn');
    });
    setTimeout(function() {
        //--- email
        loadPart('#part_email', '/_member/module/setting/part_email.php?locale=' + $('.current_lang').data('current'));
        //--- address
        loadPart('#part_address', '/_member/module/setting/part_address.php?locale=' + $('.current_lang').data('current'));
        //--- newsletter
        loadPart('#part_newsletter', '/_member/module/setting/part_newsletter.php?locale=' + $('.current_lang').data('current'));
    }, 100);

    $('.go-removal').on('click', function() {
        goUnsubscribe();
    });
});

function goUnsubscribe() {
    $('#account-removal').removeClass('hidden');
    $('.remove_account').addClass('hidden');

    $('input[name="removal_reason"]').click(function() {
        var id = $(this).val();
        $('.reason_action').addClass('hidden');
        if ($(this).is(':checked')) {
            $('.reason_' + id + '_action').removeClass('hidden');
        }
    });

    $('.close-removal').click(function() {
        $('#account-removal').addClass('hidden');
        $('.remove_account').removeClass('hidden');
    });
    $('.submit-removal').click(function() {
        bootbox.confirm(labels.confirm_removal, function(result) {
            if (result == true) {
                saveDatas($('#reason'), 'reason_removal', 'tmrm');
            }
        }); //-- end bootbox
    });
    $('.go-unsubscribe').click(function() {
        saveDatas($('input[name="unsubscribe"]'), 'newsletter', 'tmn');
        loadPart('#part_newsletter', '/_member/module/setting/part_newsletter.php?locale=' + $('.current_lang').data('current'));
    });
}

function saveDatas(element, field, table) {
    // console.log(field);
    var formData = {
        datas: {
            [field]: element.val()
        },
        table: table,
        locale: $('.current_lang').data('current')
    };
    // console.log(formData);
    $.ajax({
        url: saveurl,
        type: 'POST',
        data: formData,
        // cache: false,
        // contentType: false,
        // processData: false,
        async: true,
        beforeSend: function() {
            var loader = element.parent().next('.settings-loader');
            if (element.parent().attr('class') == 'checked') {
                loader = element.parent().parent().parent().parent().parent().next('.settings-loader');
            }
            loader.removeClass('hidden');
            loader.find('.loader_saving').removeClass('hidden');
            loader.find('.loader_saved').addClass('hidden');
            loader.find('.loader_icon').addClass('fa fa-spinner fa-spin');
            loader.find('.loader_icon').removeClass('fa-check');
        },
        success: function(response) {
            console.log('response=' + response);
            var loader = element.parent().next('.settings-loader');
            if (element.parent().attr('class') == 'checked') {
                loader = element.parent().parent().parent().parent().parent().next('.settings-loader');
            }
            loader.removeClass('hidden');
            loader.find('.loader_saving').addClass('hidden');
            loader.find('.loader_saved').removeClass('hidden');
            loader.find('.loader_icon').removeClass('fa fa-spinner fa-spin');
            if (response == 1) {
                loader.find('.loader_icon').addClass('fa fa-check');
                loader.find('.loader_icon').addClass('font-green');
                loader.find('.loader_saved').addClass('font-green');
                loader.find('.loader_saved').text(labels.saved);
            } else {
                loader.find('.loader_icon').addClass('fa fa-close');
                loader.find('.loader_icon').addClass('font-red');
                loader.find('.loader_saved').addClass('font-red');
                loader.find('.loader_saved').text(labels.err_tryagain);
            }
            setTimeout(function() {
                loader.addClass('hidden');
            }, 3000);
        },
        error: function(e) {
            console.log(e);
            return false;
        }
    });
    return false;
}

function loadPart(stage, url) {
    // console.log('loadPart');
    // var datas = {
    //     email:email,
    //     use_as_main:use_as_main,
    //     use_for_business:use_for_business
    // };
    // var updateemailurl = "/_member/module/setting/updateemail.php"
    $.ajax({
        url: url,
        type: 'GET',
        // data: datas,
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
            $(stage).html(response);
        },
        error: function(e) {
            console.log(e);
            return false;
        }
    });
    return false;
}

function resetPassword() {
    var url = '/_member/module/setting/resetpass.php'
    bootbox.confirm(labels.confirm_resetpass, function(result) {
        if (result == true) {
            $.ajax({
                url: url,
                type: 'GET',
                // data: datas,
                async: true,
                beforeSend: function() {
                    App.blockUI({
                        boxed: true,
                        message: labels.sending + '...'
                    });
                },
                success: function(response) {
                    App.unblockUI();
                    // console.log('response='+response);
                    if (response == 1) {
                        toastr['success']("", labels.sent_resetpass);
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