$(function () {
    $('[name=inicio]').addClass('active');

    /* Categorias */

    $('[tag=lnk-cat]').click(function () {
        nroCat = $(this).attr('nroCat');
        getProductos(nroCat);
    });

    function getProductos(cat) {
        $.ajax({
            url: 'ViewProducts',
            data: {cat: cat},
            type: 'post',
            dataType: 'json',
            success: function (data) {
                $('#content-products').html(data);
            }
        });
    }

});