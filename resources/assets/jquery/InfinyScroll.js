$(document).ready(function() {

    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getPosts(page);
            }
        }
    });

    //$('.pagination a').on('click', function(e) {

    $('.product').scroll(function(e) {
        getProducts($(this).attr('href').split('page=')[1]);
        alert($(this).attr('href').split('page=')[1]);
        e.preventDefault();
    });


    function getProducts(page) {
        $.ajax({
            url: '?page=' + page,
            datatype: 'json',
            success: (function(data) {
                //alert('ok');
                $('.product').append(data);
                location.hash = page;
            }),
            error: (function(){
                alert('Posts could not be loaded.');
            })
        });
    }
});
