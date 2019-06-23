@extends('admin.master')

@section('judul')
Data Produk
@endsection

@section('content')


<!-- Button to Open the Modal -->
<br>
<!-- Button to Open the Modal -->
<section>
    <div>
        <button id="btnTambah" type="button" class="btn btn-primary btn-sm box-tools pull-left" onclick="showTambahUser()">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
        </button>
    </div>
</section>

<div class="table-responsive-lg">
    <table id="example2" class="table table-striped  table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Satuan</th>
                <th>Diskon</th>
                <th>Harga</th>
                <th>Promo</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<!--Srart Modal -->
<div class="modal fade" id="modalProduct">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Data Produk</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" method="POST" id="formSimpanProduk" class="form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="alert alert-success" style="display:none"></div>
                    <input type="hidden" id="oldkdProduk" name="oldkdProduk">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ID Produk </label>
                                <input type="text" class="form-control" placeholder="ID Produk" id="kdProduk" name="kdProduk">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" placeholder="Nama Produk" id="namaProduk" name="namaProduk">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" id="kategori" name="kategori">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" id="satuan" name="satuan">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Harga Produk</label>
                                <input type="number" class="form-control" placeholder="Harga Produk" id="hargaProduk" name="hargaProduk">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Diskon</label>
                                <input type="number" class="form-control" placeholder="Harga Produk" id="diskon" name="diskon">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label id="labelKetSnack">Deskripsi Produk </label>
                        <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status Promo</label>
                                <select class="form-control" id="promo" name="promo">
                                    <option value="Y">Ya</option>
                                    <option value="T">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="labelGambarSnack">Gambar Produk </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="text-right">
                        <button id="btnSimpan" class="btn btn-primary"><i id="iconbtn" class="fa fa-floppy-o" aria-hidden="true"></i></button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- EndModal -->

<div class="modal fade" id="modalPromo">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Ganti Status Promo</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" method="POST" id="formpromo" class="formpromo">
                <input type="hidden" name="idpromo" id="idpromo">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Status Promo</label>
                        <select class="form-control" id="promoedit" name="promoedit">
                            <option value="Y">Ya</option>
                            <option value="T">Tidak</option>
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
<link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap4.min.css')}}">
@endsection


@section('script')
<script src="{{ asset('/js/tampilan/fileinput.js') }}"></script>
<script src="{{ asset('/js/tampilan/changemodal.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTablesBootstrap4.js') }}"></script>
<script src="{{ asset('js/handlebars.js') }}"></script>
<script id="details-template" type="text/x-handlebars-templatel">
    @verbatim
    <div class="row">
        <div id="foto" class="col-sm-2 text-center">
                        <img src="/foto/{{ 'urlFoto' }}" height="100" width="100">
            </div>
            <div id="detail" class="col-sm-10">
            <table class="table table-light">
                <tbody>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>

                        <td>{{ 'namaKategori' }}"</td>

                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td>{{ 'deskripsi' }}"</td>
                    </tr>
                </tbody>
            </table>
            </div>

    </div>

    @endverbatim
        </script>
<script src="{{ asset('/js/Master/product.js') }}"></script>
@endsection
