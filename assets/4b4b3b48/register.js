$(function () {
    $('[name=registro]').addClass('active');

    $('#btn-send').click(function () {
        frm = $('#frm-register').serialize();
        console.log(frm);
    });

});