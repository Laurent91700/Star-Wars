$(document).ready(function() {

    if($('.product').length == 1) {
        if($(window).scrollTop() == $(document).height() - $(window).height())
        {
            if(page > max_page) {
                return false;
            } else {
                $('#loader').show();
    //            $.ajax({
    //                method: "GET",
    //                headers: { 'X-XSRF-TOKEN' : token },
    //                url: url+"/?page="+count,
    //                dataType: "json",
    //                success: function(json){
    //                    if(json.html) {
    //                        $('.product:last').after(json.html);
    //                        $('#loader').hide();
    //                    }
    //                }
    $.ajax({
        url: '?page=' + page,
        datatype: 'json',
        success: (function(data) {
            //alert('ok');
            //$('container').animate({
            //    scrollTop:$('.product').offset().top
            //}, 400);
            //return false;
            $('#loader').hide();
            $('.product').append(data);
            //$('.product:last').after(data);
            window.location.href = '/?page='+page;
        }),
        error: (function(){
            alert('Posts could not be loaded.');
        })
    });

            }
            page++;
        }
    }
    //$(window).on('hashchange', function() {
    //    alert('jy passe');
    //    if (window.location.hash) {
    //        var page = window.location.hash.replace('#', '');
    //        alert('page: '+page);
    //        if (page == Number.NaN || page <= 0) {
    //            return false;
    //        } else {
    //            getProducts(page);
    //        }
    //    }
    //});


    //$('.pagination a').on('click', function(e) {
// $(this).attr('href').split('page=')[1]
    $('body').scrollTo('footer',function(e) {
        $('#loader').show();
        //alert(paginate::currentPage());
        var page =  parseInt($('#currentpage').val())+1;
        //alert(page);
        getProducts(page);
        e.preventDefault();
    });


    function getProducts(page) {
        $.ajax({
            url: '?page=' + page,
            datatype: 'json',
            success: (function(data) {
                //alert('ok');
                //$('container').animate({
                //    scrollTop:$('.product').offset().top
                //}, 400);
                //return false;
                $('#loader').hide();
                $('.product').append(data);
                //$('.product:last').after(data);
                window.location.href = '/?page='+page;
            }),
            error: (function(){
                alert('Posts could not be loaded.');
            })
        });
    }
});
