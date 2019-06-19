
var table = $('#example2').DataTable({
    lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
    autowidth: true,
    serverSide: true,
    processing: false,
    ajax: '/admin/user/dataUser',
    columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, sortable: false },
        { data: 'username', name: 'username' },
        { data: 'email', name: 'email' },
        { data: 'hakAkses', name: 'hakAkses' },
        { data: 'noHp', name: 'noHp' },
        { data: 'action', name: 'action', searchable: false, orderable: false }
    ]

});

$(document).ready(function () {

    $('#btnSimpan').on('click', function (e) {
        alert('oke');
        e.preventDefault();
        var formID = $('.formuser').attr('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        alert(formID);
        if (formID == 'simpan') {
            simpanData();
        } else if (formID == 'edit') {
            editData();
            alert('oke');
        }


    });

    $("#tambahModal").on("click", function () {
        $("#btnSimpan").text("Simpan");
        $(".formuser").attr("id", "simpan");
    });

});

function simpanData() {
    var formData = new FormData($('#simpan')[0]);
    $.ajax({
        type: 'POST',
        url: '/admin/user/simpanUser',
        dataType: 'JSON',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            console.log(response);
            if (response.sqlResponse) {
                clearField();
                alert('sukses');
                table.draw();
            } else {
                alert(response.data);
            }
        },
        error: function (response) {
            console.log(response);
            alert('gagal \n' + response.responseText);
        }

    });
}

function clearField() {
    
}