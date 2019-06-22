@extends('admin.master')

@section('judul')
Data Kategori
@endsection

@section('content')


<!-- Button to Open the Modal -->
<br>
<div>
    <div>
        <button id="btnTambah" type="button" style="margin-bottom: 10px"class="btn btn-primary box-tools pull-right" onclick="showTambahkategori()">
            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Tambah Kategori
        </button>
    </div>
    <br>
    <br>
    <hr>
</div>

<div class="table-responsive-lg">
    <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<!--Srart Modal -->
<div class="modal fade" id="modalKategori">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Data Kategori</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" method="POST" id="formkategori" class="form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-success" style="display:none"></div>

                    <input type="hidden" id="oldkdKategori" name="oldkdKategori">
                    <div class="form-group">
                        <label>ID Kategori </label>
                        <input type="text" class="form-control" placeholder="ID Kategori" id="kdKategori" name="kdKategori">
                    </div>


                    <div class="form-group">
                        <label>Nama </label>
                        <input type="text" class="form-control" placeholder="Nama Kategori" id="namaKategori" name="namaKategori">
                    </div>

                    <div class="text-right">
                        <button id="btnSimpan" class="btn btn-primary"><i id="iconbtn" class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- EndModal -->

@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap4.min.css')}}">
@endsection


@section('script')
<script src="{{ asset('/js/tampilan/fileinput.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTablesBootstrap4.js') }}"></script>
<script src="{{ asset('/js/Master/kategori.js') }}"></script>
@endsection
