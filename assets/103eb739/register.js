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
                if (data.error) {
                    hideAllErrors();
                    k = Object.keys(data.info)[0];
                    showError("#" + k, data.info[k]);
                } else {
                    $('#frm-usu').submit();
                }
            }
        });
    });

    $('#frm-register').click(function () {
        hideAllErrors();
    });

});