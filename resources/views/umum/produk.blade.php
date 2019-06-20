@extends('umum.master')
@section('content')
<section class="newproduk">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
            </div>
            <div class="col-sm-7 text-right" style="font-size: 20px;color: aqua">
            </div>
        </div>
    </div>
    <div id="carouspromo" class="carousel slide" data-ride="carousel" data-interval="5000">
        <!-- The slideshow -->
        <div class="carousel-inner container">
            @foreach($productPromo as $pp)
            @if($loop->first)
            <div class="carousel-item active">
                @else
                <div class="carousel-item">
                    @endif
                    <div class="row">
                        <div class="col-sm-5 text-right">
                            <img class="gambarnew img-fluid" src="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}" alt="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}">
                        </div>
                        <div class="col-sm-7 text-white">
                            <h3> {{$pp->namaProduct}}</h3>
                            <p class="mt-4 text-white">{{$pp->deskripsi}}</p>
                            <h3 style="color: white;font-weight: 700"> {{formatRupiah($pp->hargaJual)}}</h3>
                            <div class="tombolpesan text-right">
                                <button class="btn btn-lg btn-primary btn-detail" data-toggle="modal" data-target="#myModal">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev tombolcarousel" href="#carouspromo" data-slide="prev">
                <span><i class="fa fa-arrow-left" aria-hidden="true" style="color: white"></i></span>
            </a>
            <a class="carousel-control-next tombolcarousel" href="#carouspromo" data-slide="next">
                <span><i class="fa fa-arrow-right" aria-hidden="true" style="color: white"></i></span>
            </a>
        </div>
</section>

<section class="baju pt-5">
    <div class="container ">
        <div class="row mb-1" style="min-height: 70px">
            <div class="col-sm-3 offset-sm-5" style="font-size: 12Px">
                <div class="form-group">
                    <label> Kategori</label>
                    <select class="form-control">
                        <option value="baju">Baju</option>
                        <option value="rok">Rok</option>
                        <option value="sepatu">Sepatu</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3" style="font-size: 12Px">
                <div class="form-group">
                    <label> Urutkan</label>
                    <select class="form-control">
                        <option value="termurah">Termurah</option>
                        <option value="termahal">Termahal</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-1" style="font-size: 12Px">
                <div class="form-group">
                <label> <br></label>
                    <button class="form-control btn btn-info"><span><i class="fa fa-search" aria-hidden="true"></i></span></button>
                </div>
            </div>
        </div>
    </div>

    <div class="container" data-ride="carousel">
        <div class="row">
            @foreach($productNonPromo as $pnp)
            <div class="col-md-2 mb-4">
                <div class="kartuproduk">
                    <img src="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}" alt="">
                    <a class="text-left namaproduk" data-toggle="modal" data-target="#myModal"> {{$pnp->namaProduct}}</a>
                    <div class="hargaproduk">
                        <a> {{formatRupiah($pnp->hargaJual)}}</a>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Detail</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>




<!-- Modal Detail Produk -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content modalprodukdialog">
            <!-- Modal body -->
            <div class="modal-body modalprodukbody">
                <div class="modalproduk">
                    <button style="padding-right: 10px" type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                    <div class="jumbotron  panelmodal">
                        <div class="row">
                            <div class="col-sm-5 text-right">
                                <img class="gambarnew img-fluid" src="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}" alt="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="text-white font-weight-bold mb-4"> Model Baju Wanita Terbaru BBSN016 lengan panjang kekinian </h5>
                                <p class="text-white">Bahan: Kain Balotelly Premium + Aplikasi Mutiara
                                    Warna: Navy, Maroon, Pink
                                    Model: Atasan
                                    Berat: 300 gram
                                    Ukuran: All Size Fit To L
                                    Lingkar dada: 95 cm
                                    Panjang Baju: 60 cm</p>
                                <h2 class="text-white font-weight-bold"> Rp. 75.000</h2>
                                <div class="tombolpesan">
                                    <p>
                                    </p>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-light btn-number input-plus" data-type="minus" data-field="quant[2]">
                                                <span>-</span>
                                            </button>
                                        </span>
                                        <input type="text" name="quant[2]" class="input-number text-center" value="1" min="1" max="100" style="width: 50px">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-light btn-number input-min" data-type="plus" data-field="quant[2]">
                                                <span>+</span>
                                            </button>
                                        </span>
                                    </div>
                                    <p></p>
                                    <button class="btn btn-primary">Tambah Ke Keranjang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
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


@section('script')
<script src="{{ asset('/js/tampilan/genosstyle.js') }}"></script>
<script src="{{ asset('/js/tampilan/inputnumber.js') }}"></script>
@endsection
