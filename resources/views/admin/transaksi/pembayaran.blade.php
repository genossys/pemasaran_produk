@extends('admin.master')

@section('judul')
Data Pembayaran
@endsection

@section('content')
<br>
<br>
<br>
<div class="table-responsive-lg">
    <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>No. Transaksi</th>
                <th>Bank</th>
                <th>Bukti Transfer</th>
                <th>Status</th>
            </tr>
        </thead>
    </table>
</div>

<div class="modal fade" id="modalstatus">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Ganti Status</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" method="POST" id="formstatus" class="formstatus">
                <input type="hidden" name="notrans" id="notrans">
                <div class="modal-body">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="Terima">Terima</option>
                                    <option value="Tolak">Tolak</option>
                                </select>
                            </div>

                    <div class="text-right">
                        <button id="btnSimpanPromo" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalgambar">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Ganti Status</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" method="POST" id="formstatus" class="formstatus">
                <input type="hidden" name="notrans" id="notrans">
                <div class="modal-body">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="Terima">Terima</option>
                                    <option value="Tolak">Tolak</option>
                                </select>
                            </div>

                    <div class="text-right">
                        <button id="btnSimpanPromo" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('script')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTablesBootstrap4.js') }}"></script>
    <script src="{{ asset('js/handlebars.js') }}"></script>
<script id="details-template" type="text/x-handlebars-templatel">
    @verbatim
    <div class="row">
        <div id="foto" class="col-sm-10 text-center">
                        <img src="/bukti/{{ 'urlBukti' }}" height="500" width="500">
            </div>
    </div>
    
    @endverbatim
        </script>
    <script>
        $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     
     var template = Handlebars.compile($("#details-template").html());
    var table = $('#example2').DataTable({
    lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
    autowidth: true,
    serverSide: true,
    processing: false,
    ajax: {
        url : '/admin/transaksi/showData'},
    columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, sortable: false },
        { data: 'tanggal', name: 'tanggal' },
        { data: 'noTrans', name: 'noTrans' },
        { data: 'bank', name: 'bank' },
        { data: 'bukti', name: 'bukti' },
        { data: 'status', name: 'status' }
    ],
    columnDefs: [
        {
            targets: [5],
            className: 'text-right'
        },
        {
            targets: [0,1,3,4],
            className: 'text-center'
        },
    ]
});



$('#example2 tbody').on('click', 'td a.details-control', function (e) {

    var tr = $(this).closest('tr');
    var row = table.row(tr);

    if (row.child.isShown()) {
        row.child.hide();
        tr.removeClass('shown');
    } else {
        row.child(
            template(row.data())
        ).show();
        tr.addClass('shown');
    }
    e.preventDefault();
});
$('#btnSimpanPromo').on('click', function (e) {
        e.preventDefault();
        editStatus();
});
function showPromo(kode, e){
    e.preventDefault();
    $('#notrans').val(kode);
    $('#modalstatus').modal('show');
}

function editStatus() {
    var formData = new FormData($('#formstatus')[0]);
    $.ajax({
        type: 'POST',
        url: '/admin/transaksi/edit',
        dataType: 'JSON',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            console.log(response);
            if (response.valid) {
                if (response.sqlResponse) {
                    alert('Berhasil Merubah Data!');
                    $('#modalstatus').modal('hide');
                    table.draw();
                } else {
                    alert(response.data);
                }
            } else {
                alert('Gagal Merubah Data!');
            }
        },
        error: function (response) {
            alert(response.responseText);
        }

    });
}
    </script>
@endsection