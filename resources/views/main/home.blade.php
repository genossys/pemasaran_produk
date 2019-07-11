@extends('main.master')

@section('content')
    <div class="slick-slider" id="wrapper"">
        <div class="slick-list"><img class="img-fluid" src="{{ asset('/images/banner1.jpg') }}" alt=""></div>
        <div class="slick-list"><img class="img-fluid" src="{{ asset('/images/banner2.jpg') }}" alt=""></div>
        <div class="slick-list"><img class="img-fluid" src="{{ asset('/images/banner3.jpg') }}" alt=""></div>
    </div>

    <section class="promo pallete-product">
        <div class="row">
            <div class="col-md-6" style="font-weight: 900">PROMO KAMI</div>
            <div class="col-md-6 text-right"><a href="/showMore/promo">Lihat Lebih Banyak >></a></div>
        </div>
        <div class="slider-promo" id="promocontent">
        </div>
    </section>

    <section class="recommend pallete-product">
        <div class="row">
            <div class="col-md-6" style="font-weight: 900">REKOMENDASI UNTUK ANDA</div>
            <div class="col-md-6 text-right"><a href="/showMore/recommend">Lihat Lebih Banyak >></a></div>
        </div>
        <div class="slider-recommend" id="recommendcontent">
        </div>
    </section>
@endsection

@section('footer')
    
@endsection

@section('css')
    <link href="{{ asset('/css/slick/slick.css') }}" rel="stylesheet"  />
    <link href="{{ asset('/css/slick/slick-theme.css') }}" rel="stylesheet"  />
    <style type="text/css">
        
        #wrapper{
            width: 100%;
            margin: 0 auto;
            margin-bottom: 20px;
        }
        .title-content{
            font-size: large;
            font-weight: bold;
        }

        .more-item{
            font-size: large;
            font-weight: bold;
            color: forestgreen;
        }
        .slick-list img {
            width: 100%;
            height: auto;
            border-radius: 8px 8px 8px 8px;
            margin: 20px;
        }
        .slick-prev {
            left: 20px;
            z-index: 1;
        }
        .slick-next {
            right: 50px;
        }
    </style>
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
    function search() {
        
    }
        showPromo();
        showRecommend();
        
        function activeSlick(){
            $('.slider-promo').slick({
                    dots: false,
                    autoplay: true,
                    speed: 300,
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    arrows: false,
                });
        }
        function showPromo() {
        $.ajax({
            type: 'GET',
            url: '/showPromo',
            success: function(response) {
                console.log(response);
                $("#promocontent").html(response.html);
                activeSlick();
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
            url: '/showRecommend',
            success: function(response) {
                console.log(response);
                $("#recommendcontent").html(response.html);
                $('.slider-recommend').slick({
                    dots: false,
                    autoplay: true,
                    speed: 300,
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    arrows: false,
                });
            },
            error: function (response) {
                console.log(response);
            alert('gagal \n' + response.responseText);
            }
        });
    }
</script>
    
    
@endsection