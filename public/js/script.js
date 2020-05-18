$(function () {

    $('.tombolTambahData').on('click', function () {
        // Ubah judul form
        $('#judulModal').html('Tambah Data Agenda');
        // Ubah teks button
        $('.modal-footer button[type=submit]').html('Tambah Data');

        // Ubah action form
        $('.modal form').attr('action', 'http://localhost/phpmvc2/public/agenda/add');

        // Kosongkan isi teks
        $('#title').val("");
        $('#description').val("");
        $('#place').val("");
        $('#time').val("");
        $('#id').val("");
    });

    $('.tampilModalUbah').on('click', function () {
        // Ubah judul form
        $('#judulModal').html('Ubah Data Agenda');
        // Ubah teks button
        $('.modal-footer button[type=submit]').html('Ubah Data');

        // Ubah action form
        $('.modal form').attr('action', 'http://localhost/phpmvc2/public/agenda/update');

        // Mengambil data dari data-id
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc2/public/agenda/getupdate',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#title').val(data.title);
                $('#description').val(data.description);
                $('#place').val(data.place);
                $('#time').val(data.time);
                $('#id').val(data.id);
            }
        });
    });
});