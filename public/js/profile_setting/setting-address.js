function editAddress() {
    $('.btn-edit-address').on('click', function() {
        $('#add-new-address').removeClass('hidden');
        $('#show-address').addClass('hidden');
    });
    $('.btn-cancel-address').on('click', function() {
        $('#add-new-address').addClass('hidden');
        $('#show-address').removeClass('hidden');
    });
    $('.btn-save-address').on('click', function() {
        var datas = {};
        $('#add-new-address > .form-body > .form-group').find('.form-control').each(function() {
            var input = $(this).attr('name');
            var value = $(this).val();
            datas[input] = value;
        });
        console.log(datas);
        var formData = {
            address_datas: datas,
            address_type: 'H'
        };
        var saveurladdress = "/_member/module/setting/saveaddress.php"
        $.ajax({
            url: saveurladdress,
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
                if (response == 1) {
                    loadPart('#part_address', '/_member/module/setting/part_address.php?locale=' + $('.current_lang').data('current'));
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
    });
}

function editCompany() {
    $('.btn-edit-company').on('click', function() {
        $('#add-new-company').removeClass('hidden');
        $('#show-company').addClass('hidden');
    });
    $('.btn-cancel-company').on('click', function() {
        $('#add-new-company').addClass('hidden');
        $('#show-company').removeClass('hidden');
    });
    $('.btn-save-company').on('click', function() {
        var datas = {};
        $('#add-new-company > .form-body > .form-group').find('.form-control').each(function() {
            var input = $(this).attr('name');
            var value = $(this).val();
            datas[input] = value;
        });
        console.log(datas);
        var formData = {
            address_datas: datas,
            address_type: 'C'
        };
        var saveurlcompany = "/_member/module/setting/saveaddress.php"
        $.ajax({
            url: saveurlcompany,
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
                    loadPart('#part_address', '/_member/module/setting/part_address.php?locale=' + $('.current_lang').data('current'));
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
    });
}