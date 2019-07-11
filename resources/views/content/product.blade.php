@if (count($product) > 0)
    <div class="container" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
    PRODUK KAMI
        <div class="row">
            @foreach($product as $item)
            <div class="col-md-2 mb-4" >
                <div class="kartuproduk">
                    <img id ="thumbnailnonpromo" src="{{asset ('/foto/'.$item->urlFoto)}}" alt="{{asset ('/foto/'.$item->urlFoto) }}">
                    <a class="text-left namaproduk"> {{$item->namaProduct}}</a>
                     @if ($item->diskon > 0)
                        <div style="font-size:x-small">Disc {{$item->diskon}}% <strike> {{formatRupiah($item->hargaJual)}} </strike></div>
                    @endif
                    <div style="font-size: medium; font-weight: bolder">
                                {{ hargaafterdiskon($item->diskon, $item->hargaJual)}}
                    </div>
                    <div class="text-right">
                        <button class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#myModal" onclick="showDetail('{{$item->kdProduct}}')">Detail</button>
                    </div>
                    
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
@else
<br>
    <div>
        <h4 class="text-center" style="color: rgba(100, 100, 100, 0.5);margin-top: 5px">Maaf, Produk yang anda cari tidak di temukan. </h4>
    </div>
@endif


