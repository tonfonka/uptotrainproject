$(function() {
    $('input[name="avatarpic"]').change(function() {
        var files = this.files[0];
        console.log(files.size);
        if (files.size <= 2048000) {
            $('.fileinput-save').prop('disabled', false);
            $('.avatar_error').addClass('hidden');
        } else {
            $('.fileinput-save').prop('disabled', true);
            $('.avatar_error').removeClass('hidden');
            $('.avatar_error').text(labels.max_size_pic);
        }
        var file = $(this).val();
        if (file == "") {
            $('.fileinput-save').addClass('hidden');
        } else {
            $('.fileinput-save').removeClass('hidden');
        }
    });
    $('.fileinput-remove').click(function() {
        $('.fileinput-save').addClass('hidden');
    });
});

function startUpload(form) {
    var ext = $('input[name="avatarpic"]').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
        return false;
    } else {
        $('.avatar_saving').removeClass('hidden');
        return true;
    }
}