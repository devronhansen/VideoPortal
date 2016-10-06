$(document).ready(function () {
    $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});
    $("#select-category").on('change', function () {
        var allThumbs = document.getElementById('all-thumbnails');
        while (allThumbs.firstChild) {
            allThumbs.removeChild(allThumbs.firstChild)
        }
        if ($(this).val() == 0) {
            loadData('/all')
        }
        else {
            loadData('/video/sort/' + $(this).val());
        }
    })
});

function loadData(category_id) {//load all data
    $.ajax({
        url: category_id,
        type: 'GET',
        dataType: 'JSON',
        success: function (data) {
            data.forEach(function (item) {
                $('#all-thumbnails').append('<div class="col-md-3"><div class="thumbnail"><img src="/thumbnails/' + item.id + '.jpg" alt="..."><div class="caption"><h3>' + ((item.title.length >= 18) ? item.title.substring(0, 18) + "..." : item.title) + '</h3><p>' + ((item.body.length >= 130) ? item.body.substring(0, 130) + "..." : item.body) + '</p> <p><a href="/video/' + item.slug + '" class="btn btn-primary place-bottom-left" role="button">Mehr</a></p></div></div></div>');
            });
        }
    });
}
