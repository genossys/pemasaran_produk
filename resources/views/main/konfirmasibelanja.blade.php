@extends('main.master')
@section('content')
    <div class="tabelkeranjang pb-3" style="margin-top: -120px">
    <div class="container pt-3">
        <h3 class="text-left"> Daftar Pembayaran Yang Harus Di Konfirmasi </h3>
        <div class="table-responsive-lg ">
            <table id="example2" class="table table-striped  table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>No. Transaksi</th>
                        <th>Sub. Total</th>
                        <th>Ongkir</th>
                        <th>Total</th>
                        <th>Action</th>
                        <th>status</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>
@endsection

@section('footer') 

@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap4.min.css')}}">
@endsection
@section('script')
    <script src="{{ asset('/js/tampilan/genosstyle.js') }}"></script>
    <script src="{{ asset('/js/tampilan/numeral.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTablesBootstrap4.js') }}"></script>
    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


var a = '{{ auth()->user()->username }}';
        var table = $('#example2').DataTable({
    lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
    autowidth: true,
    serverSide: true,
    processing: false,
    ajax: {
        url : '/transaksi/showKonfirmasi',
        data: {
            username : a,
        }},
    columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, sortable: false },
        { data: 'tanggal', name: 'tanggal' },
        { data: 'noTrans', name: 'noTrans' },
        { data: 'subTotal', name: 'subTotal' },
        { data: 'ongkir', name: 'ongkir' },
        { data: 'total', name: 'total' },
        { data: 'action', name: 'action', searchable: false, orderable: false },
        { data: 'status', name: 'status'}
    ],
    columnDefs: [
        {
            targets: [5,6],
            className: 'text-right'
        },
        {
            targets: [0,1,3,4],
            className: 'text-center'
        },
    ],
});
    </script>
@endsection

