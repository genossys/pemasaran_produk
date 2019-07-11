@extends('main.master')
@section('content')
<div class="container pallete">
    <h3 class="text-left"> Keranjang Belanja {{auth()->user()->username}} </h3>
        <div class="table-responsive-lg ">
            <table id="example2" class="table table-striped  table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Qty</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Sub Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
</div>
<div class="container pallete">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="kota">Biaya Pengiriman Ke :</label>
                        <select id="kota" class="form-control" name="kota" data-style="btn-xs">
                            @foreach ($kota as $item)
                                <option value="{{$item->kota}}">{{$item->kota}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat Pengiriman</label>
                        <textarea class="form-control" rows="3" id="alamat" name="alamat"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6 text-right">Total Belanja : </div>
                <div class="col-md-1 text-right">Rp.</div>
                <div class="col-md-3 text-right" id="totalKeranjang"></div>
                <div class="col-md-2 text-right"></div>
            </div>
            <div class="row">
                <div class="col-md-6 text-right">Ongkir : </div>
                <div class="col-md-1 text-right">Rp.</div>
                <div class="col-md-3 text-right" id="ongkir">{{formatuang($biaya)}}</div>
                <div class="col-md-2 text-right"></div>
            </div>
            <div class="row">
                <div class="col-md-12"><hr></div>
            </div>
            <div class="row">
                <div class="col-md-6 text-right">Grand Total : </div>
                <div class="col-md-1 text-right">Rp.</div>
                <div class="col-md-3 text-right" id="grandtotal"></div>
                <div class="col-md-2 text-right"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <button class="btn btn-primary btn-lg" onclick="cekout()" style="width: 100%"> Check Out </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

@section('footer') 
<section>
    <footer>
        <div class="footer">
            &copy; Copyright 2019
        </div>
    </footer>
</section>
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap4.min.css')}}">
    <style type="text/css">
    body {
        background: rgb(204,204,204); 
    }
    .pallete {
        background: white; 
        margin-top: 20px;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
        border-radius: 8px;
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>
@endsection
@section('script')
<script src="{{ asset('/js/tampilan/genosstyle.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTablesBootstrap4.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#kota').on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        getBiaya(valueSelected);
        $(document).ajaxComplete(function(){
            hitungTotal();
        });
        
    });


var table = $('#example2').DataTable({
    lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
    autowidth: true,
    serverSide: true,
    processing: false,
    ajax: {
        url : '/transaksi/getDataKeranjang',
        data: {
            username : '{{ auth()->user()->username }}',
        }},
    columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, sortable: false },
        { data: 'urlFoto', name: 'urlFoto' },
        { data: 'namaProduct', name: 'namaProduct' },
        { data: 'qty', name: 'qty' },
        { data: 'kdSatuan', name: 'kdSatuan' },
        { data: 'harga', name: 'harga' },
        { data: 'subtotal', name: 'subtotal' },
        { data: 'action', name: 'action', searchable: false, orderable: false }
    ],
    columnDefs: [
        {
            targets: [5,6],
            className: 'text-right'
        },
        {
            targets: [0,1,3,4,7],
            className: 'text-center'
        },
    ],
    fnDrawCallback: function (row, data, start, end, display) {
        var api = this.api(), data;
        var intVal = function (i) {
            return typeof i === 'string' ?
                i.replace('.', '') * 1 :
                typeof i === 'number' ?
                i : 0;
        };
        var grandtotal = api.ajax.json().grandtotal;
        var qtytotal = api.ajax.json().qtytotal;
        
        $('#totalKeranjang').html(
            formatNumber(grandtotal)
        );
        
        $('#totalqty').html(
            qtytotal
        );

        hitungTotal();
    }

});

function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }

function cekout() {
    var ongkir = $('#ongkir').html().replace(/\./g,'');
    var alamat = $('#alamat').val();
    $.ajax({
        type: 'POST',
        url: '/transaksi/cekout',
        dataType: 'JSON',
        data: {
            username : '{{ auth()->user()->username }}',
            ongkir : ongkir,
            alamat: alamat
        },
        success: function (response) {
            console.log(response);
            window.location.replace('/transaksi/konfirmasibayar');
        },
        error: function (response) {
            alert('error' + response.responseText);
        }
    
    });
}


function getBiaya(kota) {
    $.ajax({
        type: 'GET',
        url: '/transaksi/showbiaya/'+kota,
        dataType: 'JSON',
        success: function (response) {
            console.log(response);
            $('#ongkir').html(formatNumber(response.biaya));
        },
        error: function (response) {
            alert('error' + response.responseText);
        }
    
    });
}
function hitungTotal(){
    var sub = $('#totalKeranjang').html();
    var okr = $('#ongkir').html();
    var tempsub = sub.replace(/\./g,'');
    var tempokr = okr.replace(/\./g,'');
    var hasil = parseInt(tempsub) + parseInt(tempokr);
    $('#grandtotal').html(formatNumber(hasil));
}
</script>
@endsection
