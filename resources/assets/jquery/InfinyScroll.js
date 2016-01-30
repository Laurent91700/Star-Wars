$(document).ready(function() {
    var max = parseInt($('#maxpage').val());
    var page = 2;
    $(window).scroll(function(e) {
        if ($('.product').length == 1) {
            if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                if (page > max) {
                    return false;
                } else {
                    $('#loader').show();
                    $.ajax({
                        url: '?page=' + page,
                        datatype: 'json',
                        success: (function (data) {
                            $('#loader').hide();
                            $('.product').append(data);
                        }),
                        error: (function () {
                            alert('Posts could not be loaded.');
                        })
                    });
                }
                page++;
            }
        }
    })
});

