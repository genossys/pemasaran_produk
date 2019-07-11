<div id="carouspromo" class="carousel slide" data-ride="carousel" data-interval="5000">
        <div class="carousel-inner container" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
            @foreach($data as $item)
            @if($loop->first)
            <div class="carousel-item active">
                @else
                <div class="carousel-item">
                    @endif
                    <div class="row">
                        <div class="col-sm-5 text-right">
                            <img id="thumbnailpromo" class="gambarnew img-fluid" src="{{asset ('/foto/'.$item->urlFoto)}}" alt="{{asset ('/foto/'.$item->urlFoto)}}">
                        </div>
                        <div class="col-sm-7 text-white">
                                <h3> {{$item->namaProduct}}</h3>
                                <p>{{$item->deskripsi}}</p>
                                @if ($item->diskon > 0)
                                    <div style="font-size:x-small">Disc {{$item->diskon}}% <strike> {{formatRupiah($item->hargaJual)}} </strike></div>
                                @endif
                            <div style="font-size: medium; font-weight: bolder">
                                        {{ hargaafterdiskon($item->diskon, $item->hargaJual)}}
                            </div>
                            <div style="font-size: small">
                                Stok Tersedia : {{ $item->qty }}
                            </div>
                            <br>
                            <div>
                                <button class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" onclick="showDetail('{{$item->kdProduct}}')">Detail</button>
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
<script>
    
</script>