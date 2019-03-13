$(function () {
    $('[name=registro]').addClass('active');

    $('#btn-send').click(function () {
        frm = $('#frm-register').serialize();
        $.ajax({
            url: 'ValidaRegistro',
            type: 'get',
            dataType: 'json',
            data: frm,
            success: function (data) {
                console.log(data);
            }
        });
    });

});