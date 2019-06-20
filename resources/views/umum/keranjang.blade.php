@extends('umum.master')
@section('content')
<div class="tabelkeranjang pb-3">
    <div class="container pt-3">
        <h3 class="text-left"> Keranjang</h3>
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




    <div class="catatankusus container">
    <hr>
        <div class="row">
            <div class="col-sm-2">
                <button class="btn btn-primary btn-lg">Check Out</button>
            </div>

            <div class="col-sm-10 text-right">
                <div class="totalkeranjang ">
                 <h4><a>Total: </a> <a class="font-weight-bold" id="totalKeranjang"></a></h4> </div>
            </div>
        </div>
        <hr>
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
@endsection
@section('script')
<script src="{{ asset('/js/tampilan/genosstyle.js') }}"></script>
<script src="{{ asset('/js/tampilan/numeral.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTablesBootstrap4.js') }}"></script>
<script src="{{ asset('/js/Transaksi/keranjang.js') }}"></script>
@endsection
