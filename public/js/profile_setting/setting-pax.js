$(function() {
    setTimeout(function() {
        paxvalidate('.add-pax-form');
    }, 1000);
    pax_init();
});

function paxvalidate(forfrom) {
    $(forfrom).validate({
        focusInvalid: true, // do not focus the last invalid input
        rules: {
            pax_type: {
                required: true
            },
            title: {
                required: true,
            },
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            dobdate: {
                required: true
            },
            dobmonth: {
                required: true
            },
            dobyear: {
                required: true
            }
        },

        messages: {
            pax_type: {
                required: labels.pls_enter_some
            },
            title: {
                required: labels.pls_enter_some,
            },
            firstname: {
                required: labels.pls_enter_some
            },
            lastname: {
                required: labels.pls_enter_some
            },
            dobdate: {
                required: labels.pls_enter_some
            },
            dobmonth: {
                required: labels.pls_enter_some
            },
            dobyear: {
                required: labels.pls_enter_some
            }
        },

        invalidHandler: function(event, validator) { //display error alert on form submit
            $('.alert-danger', $('.add-pax-form')).show();
        },

        highlight: function(element) { // hightlight error inputs
            $(element).addClass('error-input');
        },

        success: function(label) {
            // console.log($(label).closest('.form-control').length);
            label.closest('.form-control').removeClass('error-input');
            label.remove();
        },

        errorPlacement: function(error, element) {
            // console.log(error.text());
            $(element).attr('placeholder', error.text());
            if ($(element).val() != '') {
                $(element).next('.help-error').remove();
                $('<span class="help-block font-red help-error"> ' + error.text() + ' </span>').insertAfter(element);
            }
        }
    });
}

function pax_init() {
    $('.btn-addpax').removeClass('hidden');
    $('.paxlist').on('click', function() {
        $('.paxlist').removeClass('hidden');
        $(this).addClass('hidden');
        $('.edit-pax').addClass('hidden');
        $('.add-pax').addClass('hidden');
        $('.btn-addpax').removeClass('hidden');
        $(this).next('.edit-pax').removeClass('hidden');
    });
    $('.btn-cancel-pax').on('click', function() {
        $('.edit-pax').addClass('hidden');
        $('.paxlist').removeClass('hidden');
        $('input[name="pax_type"]').val('').next('.help-block').remove();
        $('input[name="title"]').val('').next('.help-block').remove();
        $('input[name="firstname"]').val('').next('.help-block').remove();
        $('input[name="lastname"]').val('').next('.help-block').remove();
        $('input[name="dobdate"]').val('').next('.help-block').remove();
        $('input[name="dobmonth"]').val('').next('.help-block').remove();
        $('input[name="dobyear"]').val('').next('.help-block').remove();
    });
    $('.btn-update-pax').on('click', function() {
        var pax_id = $(this).prev('input[name="pax_id"]').val();
        paxvalidate('.edit-pax-form' + pax_id);
        savePax('update', '.edit-pax-form' + pax_id, pax_id);
    });
    $('.btn-delete-pax').on('click', function() {
        var pax_id = $(this).parent().find('input[name="pax_id"]').val();
        deletePax(pax_id);
    });
}

function addNewPax() {
    $('.paxlist').removeClass('hidden');
    $('.edit-pax').addClass('hidden');
    $('.add-pax').removeClass('hidden');
    $('.btn-addpax').addClass('hidden');
    $('.btn-cancel-pax').on('click', function() {
        $('.add-pax').addClass('hidden');
        $('.btn-addpax').removeClass('hidden');
        $('.add-pax-form > .form-body > .form-group , .edit-pax-form > .form-body > .form-group').find('.form-control').each(function() {
            $(this).removeClass('error-input');
            $(this).attr('placeholder', '');
        });
    });
    $('.btn-save-pax').on('click', function() {
        savePax('new', '.add-pax-form');
    });
}

function savePax(save_type, formclass, pax_id) {
    pax_id = pax_id || '';
    var valid_status = $(formclass).valid();
    if (valid_status) {
        var datas = {};
        $(formclass + ' > .form-body > .form-group').find('.form-control').each(function() {
            var input = $(this).attr('name');
            var value = $(this).val();
            datas[input] = value;
        });
        datas['pax_id'] = pax_id;
        // console.log(datas);
        var formData = {
            pax_datas: datas,
            action: save_type
        };
        var savepaxurl = '/_member/module/setting/savepax.php?locale=' + $('.current_lang').data('current')
        $.ajax({
            url: savepaxurl,
            type: 'POST',
            data: formData,
            async: true,
            beforeSend: function() {
                App.blockUI({
                    boxed: true,
                    message: labels.saving
                });
            },
            success: function(response) {
                App.unblockUI();
                // console.log('response='+response);
                $('#pax_list').html(response);
                $('.edit-pax').addClass('hidden');
                $('.add-pax').addClass('hidden');
                $(formclass + ' > .form-body > .form-group').find('.form-control').each(function() {
                    var input = $(this).attr('name');
                    $(input).val('');
                });
                toastr['success']("", labels.saved);
            },
            error: function(e) {
                console.log(e);
                return false;
            }
        });
    }
    return false;
}

function deletePax(pax_id) {
    if (pax_id != '') {
        var paxname = $('.pax' + pax_id).text().trim();
        bootbox.confirm(labels.confirm_del_pax, function(result) {
            if (result == true) {
                var datas = { pax_id: pax_id };
                var delpaxurl = '/_member/module/setting/deletepax.php?locale=' + $('.current_lang').data('current');
                $.ajax({
                    url: delpaxurl,
                    type: 'POST',
                    data: datas,
                    async: true,
                    beforeSend: function() {
                        App.blockUI({
                            boxed: true,
                            message: labels.deleting
                        });
                    },
                    success: function(response) {
                        App.unblockUI();
                        // console.log('response='+response);
                        $('.edit-pax').addClass('hidden');
                        $('#pax_list').html(response);
                        toastr['success']("", labels.deleted);
                    },
                    error: function(e) {
                        console.log(e);
                        return false;
                    }
                });
            }
        }); //-- end bootbox
    }
    return false;
}