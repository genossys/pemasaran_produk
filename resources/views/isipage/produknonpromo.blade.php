
<section class="pt-2" id="produknonpromo">
    <div class="container" data-ride="carousel">
        <div class="row">
            @foreach($productNonPromo as $pnp)
            <div class="col-md-2 mb-4">
                <div class="kartuproduk">
                    <img id="thumbnailnonpromo" src="{{asset ('/foto/'.$pnp->urlFoto)}}" alt="{{asset ('/foto/'.$pnp->urlFoto) }}">
                    <a class="text-left namaproduk" data-toggle="modal" data-target="#myModal"> {{$pnp->namaProduct}}</a>
                    <div class="hargaproduk">
                        <a> {{formatRupiah($pnp->hargaJual)}}</a>
                    </div>
                    @if (auth()->check())
                    <div class="text-right">
                        <button class="btn btn-sm btn-primary" onclick="showModal('{{$pnp->kdProduct}}','{{$pnp->namaProduct}}', '{{$pnp->deskripsi}}', '{{$pnp->diskon}}','{{$pnp->hargaJual}}','{{asset ('/foto/'.$pnp->urlFoto)}}', '{{auth()->user()->username}}')">Detail</button>
                    </div>
                    @else
                    <div class="text-right">
                        <button class="btn btn-sm btn-primary" onclick="showModal('{{$pnp->kdProduct}}','{{$pnp->namaProduct}}', '{{$pnp->deskripsi}}', '{{$pnp->diskon}}','{{$pnp->hargaJual}}','{{asset ('/foto/'.$pnp->urlFoto)}}', '')">Detail</button>
                    </div>
                    @endif

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
