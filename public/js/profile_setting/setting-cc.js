$(function() {
    setTimeout(function() {
        cardvalidate('.add-card-form');
    }, 1000);
    card_init();
});

function cardvalidate(forfrom) {

    $.validator.addMethod(
        "checkCardDigit",
        function(value, element) {
            response = valid_credit_card(value);
            return response;
        }, labels.wrong_card_format
    );
    $(forfrom).validate({
        focusInvalid: false, // do not focus the last invalid input
        rules: {
            mctype: {
                required: true
            },
            mcnumber: {
                required: true,
                checkCardDigit: true
            },
            mcname: {
                required: true
            },
            mcepmonth: {
                required: true
            },
            mcepyear: {
                required: true
            }
        },

        messages: {
            mctype: {
                required: labels.pls_enter_some
            },
            mcnumber: {
                required: labels.pls_enter_some
            },
            mcname: {
                required: labels.pls_enter_some
            },
            mcepmonth: {
                required: labels.pls_enter_some
            },
            mcepyear: {
                required: labels.pls_enter_some
            }
        },

        invalidHandler: function(event, validator) { //display error alert on form submit
            $('.alert-danger', $('.add-card-form')).show();
        },

        highlight: function(element) { // hightlight error inputs
            $(element).addClass('error-input');
        },

        success: function(label) {
            console.log($(label).closest('.form-control').length);
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

function card_init() {
    $('.btn-addcc').removeClass('hidden');
    $('.cclist').on('click', function() {
        $('.cclist').removeClass('hidden');
        $(this).addClass('hidden');
        $('.edit-card').addClass('hidden');
        $('.add-card').addClass('hidden');
        $('.btn-addcc').removeClass('hidden');
        $(this).next('.edit-card').removeClass('hidden');
    });
    $('.btn-cancel-card').on('click', function() {
        $('.edit-card').addClass('hidden');
        $('.cclist').removeClass('hidden');
        $('input[name="mctype"]').val('').next('.help-block').remove();
        $('input[name="mcnumber"]').val('').next('.help-block').remove();
        $('input[name="mcname"]').val('').next('.help-block').remove();
        $('input[name="mcepmonth"]').val('').next('.help-block').remove();
        $('input[name="mcepyear"]').val('').next('.help-block').remove();
        $('input[name="use_for_business"]').prop('checked', false).next('.help-block').remove();
    });
    $('.btn-update-card').on('click', function() {
        var mcid = $(this).prev('input[name="mcid"]').val();
        cardvalidate('.edit-card-form' + mcid);
        saveCard('update', '.edit-card-form' + mcid, mcid);
    });
    $('.btn-delete-card').on('click', function() {
        var mcid = $(this).parent().find('input[name="mcid"]').val();
        deleteCard(mcid);
    });
}

function addNewcc() {
    $('.cclist').removeClass('hidden');
    $('.edit-card').addClass('hidden');
    $('.add-card').removeClass('hidden');
    $('.btn-addcc').addClass('hidden');
    $('.btn-cancel-card').on('click', function() {
        $('.add-card').addClass('hidden');
        $('.btn-addcc').removeClass('hidden');
        $('.add-card-form > .form-body > .form-group , .edit-card-form > .form-body > .form-group').find('.form-control').each(function() {
            $(this).removeClass('error-input');
            $(this).attr('placeholder', '');
        });
    });
    $('.btn-save-card').on('click', function() {
        saveCard('new', '.add-card-form');
    });
}

function saveCard(save_type, formclass, mcid) {
    mcid = mcid || '';
    var valid_status = $(formclass).valid();
    if (valid_status) {
        var datas = {};
        $(formclass + ' > .form-body > .form-group').find('.form-control').each(function() {
            var input = $(this).attr('name');
            var value = $(this).val();
            datas[input] = value;
        });
        datas['mcid'] = mcid;
        datas['use_for_business'] = $(formclass + ' > .form-body > .form-group').find('input[name="cc_use_for_business"]:checked').val();

        var formData = {
            card_datas: datas,
            action: save_type
        };
        console.log(formData);
        var saveccurl = '/_member/module/setting/savecard.php?locale=' + $('.current_lang').data('current')
        $.ajax({
            url: saveccurl,
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
                $('#card_list').html(response);
                $('.edit-card').addClass('hidden');
                $('.add-card').addClass('hidden');
                $(formclass + ' > .form-body > .form-group').find('.form-control').each(function() {
                    var input = $(this).attr('name');
                    $(input).val('');
                });
                toastr['success']("", labels.saved + '...');
            },
            error: function(e) {
                console.log(e);
                return false;
            }
        });
    }
    return false;
}

function deleteCard(mcid) {
    if (mcid != '') {
        var cardname = $('.card' + mcid).text().trim();
        bootbox.confirm(labels.confirm_del_card, function(result) {
            if (result == true) {
                var datas = { mcid: mcid };
                var delpaxurl = '/_member/module/setting/deletecard.php?locale=' + $('.current_lang').data('current')
                $.ajax({
                    url: delpaxurl,
                    type: 'POST',
                    data: datas,
                    async: true,
                    beforeSend: function() {
                        App.blockUI({
                            boxed: true,
                            message: labels.deleting + '...'
                        });
                    },
                    success: function(response) {
                        App.unblockUI();
                        // console.log('response='+response);
                        $('.edit-card').addClass('hidden');
                        $('#card_list').html(response);
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

function valid_credit_card(value) {
    // accept only digits, dashes or spaces
    if (/[^0-9-\s]+/.test(value)) return false;
    // The Luhn Algorithm. It's so pretty.
    var nCheck = 0,
        nDigit = 0,
        bEven = false;
    value = value.replace(/\D/g, "");
    for (var n = value.length - 1; n >= 0; n--) {
        var cDigit = value.charAt(n),
            nDigit = parseInt(cDigit, 10);
        if (bEven) {
            if ((nDigit *= 2) > 9) nDigit -= 9;
        }
        nCheck += nDigit;
        bEven = !bEven;
    }
    return (nCheck % 10) == 0;
}