$(document).ready(function(){
    $("#dialogQte").dialog({
        resizable: false,
        height: 160,
        width: 500,
        autoOpen: false,
        modal: true
    });

    $('a.plus').on('click', function(e){
        e.preventDefault();
        var id=$(this).attr("prodid");
        var stock = $('#stock'+id).val();
        quantite(1,stock,id);
    });

    $('a.moins').on('click', function(e){
        e.preventDefault();
        var id=$(this).attr("prodid");
        var stock = $('#stock'+id).val();
        quantite(-1,stock,id);
    });

    function quantite(decalage, stock, id)
    {

        var qt = decalage + parseInt($('#qte'+id).val());
        if(stock < qt){
            $('p b').text(stock);
            $("#dialogQte").dialog("open");
        }
        if (qt < 1 || qt > stock) return;

        $.ajax({
            method: "POST",
            url: "/majqte",
            headers: {
                'X-XSRF-TOKEN' : $('input[name="_token"]').val()
            },
            data: {'id': id, 'quantity': qt },
            datatype: 'json',
            success : (function(data) {
                $('#qte'+data.id).val(data.quantity);
                $('#total').text(data.total);
            }),
            error: (function(data){
                console.log(data);

            })
        });

    }
});