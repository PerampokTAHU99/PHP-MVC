$(function(){
    $('.buttonAddData').on('click', function(){
        $('#modalTitle').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });

    $('.showEditModal').on('click', function(){
        $('#modalTitle').html('Update Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Update Data');
        $('.modal-body form').attr('action','http://localhost/phpmvc/public/Mahasiswa/update');
    
        const id = $(this).data('id');
    
        $.ajax({
            url: 'http://localhost/phpmvc/public/Mahasiswa/getUpdate',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#name').val(data.name);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#programStudy').val(data.programStudy);
                $('#id').val(data.id);
    
                // Set placeholder
                $('#name').attr('placeholder', data.name);
                $('#nim').attr('placeholder', data.nim);
                $('#email').attr('placeholder', data.email);
                $('#programStudy').attr('placeholder', data.programStudy);
    
                // Menampilkan modal setelah mengisi nilai-nilai
                $('#formModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
