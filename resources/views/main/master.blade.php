<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset ('adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/genosstyle.css') }}" rel="stylesheet" />
    <style type="text/css">
      
    </style>

    <title>Najwa Collection</title>

    @yield('css')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="height: 50px">
    <a href="/"><img src="{{ asset('/images/brand.png') }} " alt="logo" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="form-inline ml-auto">
            <input class="form-control mr-sm-2" type="text" placeholder="Cari Nama atau deskripsi product..." style="min-width: 400px;">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/showMore/all">Product</a>
      </li>
      <li class="nav-item ">
            <a class="nav-link" href="">Contact</a>
        </li>
      @if (auth()->check())

                @if (auth()->user()->hakAkses == 'admin' || auth()->user()->hakAkses == 'pimpinan')
                    <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin')}}">Dashboard</a>
                </li>
                @endif

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{auth()->user()->username}}
                        <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <a href="{{route('keranjang')}}" class="dropdown-item dropdown-footer">Keranjang <span class="badge badge-danger"></span></a>
                        <a href="{{route('pageconfirm')}}" class="dropdown-item dropdown-footer">Konfirmasi Pembayaran</a>
                        <a href="{{route('logout')}}" class="dropdown-item dropdown-footer">Daftar Belanja</a>
                        <hr>
                        <a href="{{route('logout')}}" class="dropdown-item dropdown-footer">Logout</a>
                    </div>
                </li>
                @else
                <li class="nav-item ">
                    <a class="nav-link" href="/login">
                        Login
                        <i class="fa fa-user"></i>
                    </a>
                </li>
                @endif
    </ul>
    
    
  </div>
</nav>

<div class="container">
  
  @yield('content')
</div>
 @yield('footer')

<section>
    <footer>
        <div class="footer">
            &copy; Copyright 2019
        </div>
    </footer>
</section>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/slick/slick.min.js') }}"></script>


@yield('script')
</body>
</html>