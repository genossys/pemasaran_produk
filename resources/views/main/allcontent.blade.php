@foreach ($data->chunk(6) as $items)
                <div class="row">
                    @foreach ($items as $item)
                        <div class="col-md-2">
                            <div class="kartuproduk" >
                                <a href="{{ route('pagedetail', ['kdproduct'=>$item->kdProduct]) }}">
                                    <img style="margin-left: 0px; margin-bottom: 0px;" id="thumbnailnonpromo" src="{{asset ('/foto/'.$item->urlFoto.'')}}" alt="{{asset ('/foto/'.$item->urlFoto.'')}}">
                                </a>
                                <div class="namaproduk">
                                    {{$item->namaProduct}}
                                </div>
                                @if ($item->diskon > 0)
                                    <div class="diskonproduk">
                                        <div class="diskonpersen">Disc : {{$item->diskon}}% % </div> <strike>{{formatRupiah($item->hargaJual)}}</strike>
                                    </div>
                                @endif
                                <div class="hargaproduk">
                                    {{ hargaafterdiskon($item->diskon, $item->hargaJual)}}
                                </div>
                                <div class="stokproduk">
                                    Stok Tersedia : {{ $item->qty }}
                                </div>
                                <div class="stokterjual">
                                    Terjual : {{ $item->terjual }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach