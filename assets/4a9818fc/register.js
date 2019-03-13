$(function () {
    $('[name=registro]').addClass('active');

    $('#btn-send').click(function () {
        var name = $('#name').val();
        if (name.trim() == '') {
            $('#name').addClass('is-invalid');
        }else{
            $('#name').removeClass('is-invalid');
        }
    });

});