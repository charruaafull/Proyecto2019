$(function () {
    $('[name=inicio]').addClass('active');

    /* Categorias */

    $('[tag=lnk-cat]').click(function (e) {
        var nroCat = $(this).attr('nroCat');
        var nomCat = $(this).html();
        getProductos(nroCat, nomCat);
        e.preventDefault();
    });

    function getProductos(cat, nomCat) {
        $('#div-preload').show();
        $('#content-products').hide();
        $.ajax({
            url: 'ViewProducts',
            data: {cat: cat, nomCat: nomCat},
            type: 'post',
            dataType: 'json',
            success: function (data) {
                $('#content-products').html(data);
                $('#div-preload').hide();
                $('#content-products').slideDown(600);
            }
        });
    }

    /* Productos */

    $('[tag=lnk-add]').click(function (e) {
        var idProd = $(this).attr('idProd');
        AddProduct(idProd);
        e.preventDefault();
    });

    function AddProduct(idPro) {
        $.ajax({
            url: 'AddProduct',
            data: {idProd: idProd},
            type: 'post',
            dataType: 'json',
            success: function (data) {
                alert('OK');
            }
        });
    }

});