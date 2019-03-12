$(function () {
    $('[name=inicio]').addClass('active');

    /* Categorias */

    $('[tag=lnk-cat]').click(function (e) {
        nroCat = $(this).attr('nroCat');
        nomCat = $(this).html();
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

});