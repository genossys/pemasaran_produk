@extends('main.master')

@section('content')
    <div class="slick-slider" id="wrapper"">
        <div class="slick-list"><img class="img-fluid" src="{{ asset('/images/banner1.jpg') }}" alt=""></div>
        <div class="slick-list"><img class="img-fluid" src="{{ asset('/images/banner2.jpg') }}" alt=""></div>
        <div class="slick-list"><img class="img-fluid" src="{{ asset('/images/banner3.jpg') }}" alt=""></div>
    </div>

    <section class="promo pallete-product">
        <div class="row">
            @switch($index)
                @case('all')
                    <div class="col-md-6" style="font-weight: 900">DAFTAR SEMUA PRODUCT KAMI</div>
                    @break
                @case(2)
                    <div class="col-md-6" style="font-weight: 900">DAFTAR SEMUA PROMO KAMI</div>
                    @break
                @case('recommend')
                    <div class="col-md-6" style="font-weight: 900">DAFTAR PRODUCT REKOMENDASI UNTUK ANDA</div>
                    @break
                @default
                    <div class="col-md-6" style="font-weight: 900">DAFTAR SEMUA PRODUCT KAMI</div>
                    @break
            @endswitch
            <div class="col-md-6 text-right"></div>
        </div>
        <div  id="allcontent"></div>
    </section>
@endsection

@section('css')
    <link href="{{ asset('/css/slick/slick.css') }}" rel="stylesheet"  />
    <link href="{{ asset('/css/slick/slick-theme.css') }}" rel="stylesheet"  />
@endsection

@section('script')
    <script type="text/javascript">
    $(document).ready(function(){
        $('.slick-slider').slick({
            accessibility: true,
            autoplay: true,
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            centerMode: true,
            variableWidth: true
        });
        
    });
  </script>
  <script>
      var idx = '{{ $index }}';
      switch (idx) {
          case 'all':
              showAllProduct();
              break;
          case 'promo':
              showPromo();
              break;
          case 'recommend':
              showRecommend();
              break;
          default:
              showAllProduct();
              break;
      }
      
    function showPromo() {
        $.ajax({
            type: 'GET',
            url: '/showAllPromo',
            success: function(response) {
                console.log(response);
                $("#allcontent").html(response.html);
            },
            error: function (response) {
                console.log(response);
            alert('gagal \n' + response.responseText);
            }
        });
    }

    function showRecommend() {
        $.ajax({
            type: 'GET',
            url: '/showAllRecommed',
            success: function(response) {
                console.log(response);
                $("#allcontent").html(response.html);
            },
            error: function (response) {
                console.log(response);
            alert('gagal \n' + response.responseText);
            }
        });
    }

    function showAllProduct() {
        $.ajax({
            type: 'GET',
            url: '/showAllPrduct',
            success: function(response) {
                console.log(response);
                $("#allcontent").html(response.html);
            },
            error: function (response) {
                console.log(response);
            alert('gagal \n' + response.responseText);
            }
        });
    }
  </script>
@endsection