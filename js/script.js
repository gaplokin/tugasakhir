$(document).ready(function () {
    //hilangkan tombol cari
    $('#tombol-cari').hide();

    //event ketika keyword di tulis
    $('#keyword').on('keyup', function () {
        $('#container').load('../ajax/pemohon.php?keyword=' + $('#keyword').val());

    });


});