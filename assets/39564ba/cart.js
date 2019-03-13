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
                    $('[divProd=' + idProd + ']').find('[tag=nroPre]').remove();
                    $('[divProd=' + idProd + ']').slideUp(200);
                    calculaPrecio();
                }
            }
        });
    }

    function calculaPrecio() {
        var tot = 0;
        var cantProd = 0;
        $('[tag=nroPre]').each(function () {
            idProd = $(this).attr('idProd');
            val = parseFloat($(this).html());
            cant = $('[tag=inpPro][idProd=' + idProd + ']').val();
            tot += val * cant;
            cantProd++;
        });
        $('#tot').html(tot);
        $('#cantCart').html(cantProd);
    }

    /*$('[tag=inpPro]').change(function () {
        calculaPrecio();
    });*/

    $('[tag=inpPro]').keypress(function () {
        calculaPrecio();
    });

});