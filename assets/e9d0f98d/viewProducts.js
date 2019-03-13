$(function () {
    $('[name=inicio]').addClass('active');

    $('.page-link').click(function () {
        nroCat = $(this).attr('nroCat');
        nroPag = $(this).attr('nroPag');
        getProductos(nroCat, nroPag, 'aa');
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