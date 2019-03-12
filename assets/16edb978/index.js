$(function () {
    $('[name=inicio]').addClass('active');

    /* Categorias */

    $('[tag=lnk-cat]').click(function () {
        nroCat = $(this).attr('nroCat');
        getProductos();
    });

    function getProductos() {
        $.ajax({
            url: 'ViewProducts',
            data: {q: 1},
            type: 'post',
            dataType: 'json',
            success: function (data) {
                $('#content-products').html(data);
            }
        });
    }

});