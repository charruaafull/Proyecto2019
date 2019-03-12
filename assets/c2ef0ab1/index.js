$(function () {
    $('[name=inicio]').addClass('active');

    /* Categorias */

    $('[tag=lnk-cat]').click(function () {
        nroCat = $(this).attr('nroCat');
        alert(nroCat);
    });

});