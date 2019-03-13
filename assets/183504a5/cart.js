$(function () {
    $('[name=carrito]').addClass('active');

    $('[tag=lnk-del]').click(function (e) {
        var idProd = $(this).attr('idProd');
        DeleteProductCart(idProd);
        e.preventDefault();
    });

    function DeleteProductCart(idProd) {
        $.ajax({
            url: 'DeleteProductCart',
            data: {idProd: idProd},
            type: 'post',
            dataType: 'json',
            success: function (data) {
                if (data) {
                    $('[divProd=' + idProd + ']').hide(200);
                    //       $('[divProd=' + idProd + ']').remove();
                    calculaPrecio();
                }
            }
        });
    }

    function calculaPrecio() {
        var tot = 0;
        $('[tag=nroPre]').each(function () {
            if ($(this).is(":visible") == true) {
                val = $(this).html();
                tot += parseFloat(val);
            }
        });
        $('#tot').html(tot);
    }


});