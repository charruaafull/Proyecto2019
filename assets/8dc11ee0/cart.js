$(function () {
    $('[name=carrito]').addClass('active');

    $('[tag=lnk-del]').click(function (e) {
        var idProd = $(this).attr('idProd');
        DeleteProductCart(idProd);
        e.preventDefault();
    });

    function DeleteProductCart(idProd) {
        calculaPrecio();
        $.ajax({
            url: 'DeleteProductCart',
            data: {idProd: idProd},
            type: 'post',
            dataType: 'json',
            success: function (data) {
                if (data) {
                    $('[divProd=' + idProd + ']').slideUp(200);
                }
            }
        });
    }

    function calculaPrecio() {
        var tot = 0;
        $('[tag=nroPre]').each(function () {
            val = $(this).html();
            tot += parseFloat(val);
        });
        $('#tot').html(tot.toString());
    }


});