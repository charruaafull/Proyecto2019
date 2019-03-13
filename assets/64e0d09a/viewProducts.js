$(function () {
    $('[name=inicio]').addClass('active');

    $('.page-link').click(function (e) {
        nroCat = $(this).attr('nroCat');
        nroPag = $(this).attr('nroPag');
        nomCat = $(this).attr('nomCat');
        getProductos(nroCat, nroPag, nomCat);
        e.preventDefault();
    });

    function getProductos(nroCat, nroPag, nomCat) {
        $('#div-preload').show();
        $('#content-products').hide();
        $.ajax({
            url: 'ViewProducts',
            data: {cat: nroCat, pag: nroPag, nomCat: nomCat},
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