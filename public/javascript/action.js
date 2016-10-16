$(document).ready(function () {
    $('.alert').delay(4000).fadeOut('slow');
    $(document).on('change', ':file', function () {
        var input = $(this),
            extension = input.val().split('.');
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
        if (extension[1] == 'mp4') {
            $('.download-video').html(label);
        }
        else {
            $('.download-pic').html(label);
        }
    });
});