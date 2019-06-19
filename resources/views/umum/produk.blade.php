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
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-sm-5 text-right">
                        <img class="gambarnew img-fluid" src="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}" alt="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}">
                    </div>
                    <div class="col-sm-7 text-white">
                        <h3> (Baru) Model Baju Wanita Terbaru BBSN016 lengan panjang kekinian </h3>
                        <p class="mt-4 text-white">Bahan: Kain Balotelly Premium + Aplikasi Mutiara
                            Warna: Navy, Maroon, Pink
                            Model: Atasan
                            Berat: 300 gram
                            Ukuran: All Size Fit To L
                            Lingkar dada: 95 cm
                            Panjang Baju: 60 cm</p>
                        <h3 style="color: white;font-weight: 700"> Rp. 50.000</h3>
                        <div class="tombolpesan text-right">
                            <button class="btn btn-lg btn-primary btn-detail">Detail</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="row">
                    <div class="col-sm-5 text-right">
                        <img class="gambarnew img-fluid" src="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}" alt="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}">
                    </div>
                    <div class="col-sm-7 text-white">
                        <h3> (Baru) Model Baju Wanita Terbaru BBSN016 lengan panjang kekinian </h3>
                        <p class="mt-4 text-white">Bahan: Kain Balotelly Premium + Aplikasi Mutiara
                            Warna: Navy, Maroon, Pink
                            Model: Atasan
                            Berat: 300 gram
                            Ukuran: All Size Fit To L
                            Lingkar dada: 95 cm
                            Panjang Baju: 60 cm</p>
                        <h3 style="color: white;font-weight: 700"> Rp. 50.000</h3>
                        <div class="tombolpesan text-right">
                            <button class="btn btn-lg btn-primary btn-detail">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-sm-5 text-right">
                        <img class="gambarnew img-fluid" src="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}" alt="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}">
                    </div>
                    <div class="col-sm-7 text-white">
                        <h3> (Baru) Model Baju Wanita Terbaru BBSN016 lengan panjang kekinian </h3>
                        <p class="mt-4 text-white">Bahan: Kain Balotelly Premium + Aplikasi Mutiara
                            Warna: Navy, Maroon, Pink
                            Model: Atasan
                            Berat: 300 gram
                            Ukuran: All Size Fit To L
                            Lingkar dada: 95 cm
                            Panjang Baju: 60 cm</p>
                        <h3 style="color: white;font-weight: 700"> Rp. 50.000</h3>
                        <div class="tombolpesan text-right">
                            <button class="btn btn-lg btn-primary btn-detail">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
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

<section class="baju">
    <div class="container">
        <div class="row  pt-5">
            <div class="col-sm-5">
                <h5 class="text-left mb-3"> Baju</h5>
            </div>
            <div class="col-sm-7 text-right" style="font-size: 14px">
                <a class="text-left" style="color:cornflowerblue"> Lihat Semua</a> <span><i class="fa fa-arrow-right" aria-hidden="true" style="color: cornflowerblue"></i></span>
            </div>
        </div>
    </div>
    <div id="carouspaket" class="carousel slide" data-ride="carousel" data-interval="7000">

        <!-- The slideshow -->
        <div class="carousel-inner container">
            <div class="carousel-item active">
                <div class="row mb-2">
                    <div class="col-md-2">
                        <div class="kartuproduk">
                            <img src="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}" alt="">
                            <a class="text-left namaproduk" data-toggle="modal" data-target="#myModal"> Model Baju Wanita Terbaru BBSN016 lengan panjang kekinian </a>
                            <div class="hargaproduk">
                                <a> Rp 75.000</a>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Detail</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="kartuproduk">
                            <img src="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}" alt="">
                            <a class="text-left namaproduk" data-toggle="modal" data-target="#myModal"> Model Baju Wanita Terbaru BBSN016 lengan panjang kekinian </a>
                            <div class="hargaproduk">
                                <a> Rp 75.000</a>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Detail</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="kartuproduk">
                            <img src="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}" alt="">
                            <a class="text-left namaproduk" data-toggle="modal" data-target="#myModal"> Model Baju Wanita Terbaru BBSN016 lengan panjang kekinian </a>
                            <div class="hargaproduk">
                                <a> Rp 75.000</a>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Detail</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="kartuproduk">
                            <img src="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}" alt="">
                            <a class="text-left namaproduk" data-toggle="modal" data-target="#myModal"> Model Baju Wanita Terbaru BBSN016 lengan panjang kekinian </a>
                            <div class="hargaproduk">
                                <a> Rp 75.000</a>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Detail</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="kartuproduk">
                            <img src="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}" alt="">
                            <a class="text-left namaproduk" data-toggle="modal" data-target="#myModal"> Model Baju Wanita Terbaru BBSN016 lengan panjang kekinian </a>
                            <div class="hargaproduk">
                                <a> Rp 75.000</a>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Detail</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="kartuproduk">
                            <img src="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}" alt="">
                            <a class="text-left namaproduk" data-toggle="modal" data-target="#myModal"> Model Baju Wanita Terbaru BBSN016 lengan panjang kekinian </a>
                            <div class="hargaproduk">
                                <a> Rp 75.000</a>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-2">
                        <div class="kartuproduk">
                            <img src="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}" alt="">
                            <a class="text-left namaproduk" data-toggle="modal" data-target="#myModal"> Model Baju Wanita Terbaru BBSN016 lengan panjang kekinian </a>
                            <div class="hargaproduk">
                                <a> Rp 75.000</a>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-2">
                        <div class="kartuproduk">
                            <img src="{{asset ('/assets/gambar/baju_wanita_panjang.jpg')}}" alt="">
                            <a class="text-left namaproduk" data-toggle="modal" data-target="#myModal"> Model Baju Wanita Terbaru BBSN016 lengan panjang kekinian </a>
                            <div class="hargaproduk">
                                <a> Rp 75.000</a>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev tombolcarousel" href="#carouspaket" data-slide="prev">
            <span><i class="fa fa-arrow-left" aria-hidden="true" style="color: black"></i></span>
        </a>
        <a class="carousel-control-next tombolcarousel" href="#carouspaket" data-slide="next">
            <span><i class="fa fa-arrow-right" aria-hidden="true" style="color: black"></i></span>
        </a>
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
