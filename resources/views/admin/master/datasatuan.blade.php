@extends('admin.master')

@section('judul')
Data Satuan
@endsection

@section('content')
<br>
    <div>
        <button id="btnTambah" type="button" style="margin-bottom: 10px"class="btn btn-primary box-tools pull-right" onclick="showTambahSatuan()">
            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Tambah Satuan
        </button>
        <br>
        <br>
        <hr>
    </div>

    <div class="table-responsive-lg">
        <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>KD Satuan</th>
                    <th>Nama Satuan</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="modal fade" id="modalSatuan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Satuan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" method="POST" id="formsatuan" class="form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-success" style="display:none"></div>
                    <input type="hidden" id="oldkdSatuan" name="oldkdSatuan">
                    <div class="form-group">
                        <label>Kode Satuan </label>
                        <input type="text" class="form-control" placeholder="Kode Satuan" id="kdSatuan" name="kdSatuan">
                    </div>
                    <div class="form-group">
                        <label>Nama Satuan</label>
                        <input type="text" class="form-control" placeholder="Nama Satuan" id="namaSatuan" name="namaSatuan">
                    </div>
                    
                    <div class="text-right">
                        <button id="btnSimpan" class="btn btn-primary"><i id="iconbtn" class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;</button>
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
<script src="{{ asset('/js/tampilan/fileinput.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTablesBootstrap4.js') }}"></script>
<script src="{{ asset('/js/Master/satuan.js') }}"></script>
@endsection