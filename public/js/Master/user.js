
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
        alertSukses.hide();
        alertDanger.hide();
        var formID = $('.formSatuan').attr('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (formID == 'simpan') {
            simpanData();
        } else if (formID == 'edit') {
            editData();
            alert('oke');
        }


    });

    $("#tambahModal").on("click", function () {
        $("#btnSimpan").text("Simpan");
        $(".formSimpanUser").attr("id", "simpan");
        // alertDanger.hide();
        // alertSukses.hide();
    });

});

function simpanData() {
    var formData = new FormData($('#simpan')[0]);
    formData.append('formadmin','true');
    $.ajax({
        type: 'POST',
        url: '/admin/satuan/simpanSatuan',
        dataType: 'JSON',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            if (response.valid) {
                if (response.sqlResponse) {
                    clearField();
                    alertSukses.show().html('<p> Sukses Menambahkan User </p>');
                    table.draw();
                } else {
                    alert(response.data);
                }
            } else {
                // alertDanger.hide();
                // alertSukses.hide();
                // $.each(response.errors, function (key, value) {
                //     alertDanger.show().append('<p>' + value + '</p>');
                // });
                alert('gagal');
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