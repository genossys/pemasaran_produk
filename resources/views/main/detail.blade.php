@extends('main.master')

@section('content')
    <section class="pallete-detail-product">
        <div class="row">
            <div class="col-md-5">
                <img class="img-detail" style="margin-left: 0px; margin-bottom: 0px;" id="thumbnailnonpromo" src="{{asset ('/foto/'.$data[0]->urlFoto.'')}}" alt="{{asset ('/foto/'.$data[0]->urlFoto.'')}}">
            </div>
            <div class="col-md-5">
                <div class="productinfo">Product {{ $data[0]->namaKategori }} dari Najwa Collection</div>
                <div class="productname">{{ $data[0]->namaProduct }}</div>
                <div class="productinfo">Deskripsi Product : <br> {{ $data[0]->deskripsi }}</div>
                <br>
                <div class="productstock">Stok Tersisa : {{ $data[0]->qty }} | Terjual : {{ $data[0]->terjual }}</div>
                @if ($data[0]->diskon > 0)
                    <div class="productdisc">
                        <div class="discpercent">Disc : {{$data[0]->diskon}} % </div> <strike>{{formatRupiah($data[0]->hargaJual)}}</strike>
                    </div>
                @endif
                <div class="productprice">{{ hargaafterdiskon($data[0]->diskon, $data[0]->hargaJual)}}</div>
                <br>
                Jumlah Beli :
                <div class="input-group">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-number input-plus" data-type="minus" data-field="quant[2]">
                            <span><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
                        </button>
                    </span>
                    <input type="text" id="qty" name="quant[2]" class="input-number text-center" value="1" min="1" max="100" style="width: 50px">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-number input-min" data-type="plus" data-field="quant[2]">
                            <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                        </button>
                    </span>
                </div>
                <br>
                <br>
                <div class="row">
                    @if (auth()->check())
                        <div class="col-md-6"><button class="btn btn-primary btn-proccess"  onclick="tambahKeranjang(false, '{{ auth()->user()->username }}')">Tambah Ke Keranjang</button></div>
                        <div class="col-md-6" style="padding-left: 0px"><button class="btn btn-warning btn-proccess" onclick="tambahKeranjang(true, '{{ auth()->user()->username }}')">Beli Sekarang</button></div>
                    @else
                        <div class="col-md-6"><button class="btn btn-primary btn-proccess" onclick="javascript:alert('Anda Harus Login Dulu!')">Tambah Ke Keranjang</button></div>
                        <div class="col-md-6" style="padding-left: 0px"><button class="btn btn-warning btn-proccess" onclick="javascript:alert('Anda Harus Login Dulu!')">Beli Sekarang</button></div>
                    @endif
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        
    </section>
@endsection

@section('css')
    <style>
        .productdisc .discpercent   {
            font-size: 13px;
            overflow: hidden;
            color: indianred;
            font-weight: 500;
            display: inline;
        }
        .productdisc{
            font-size: 13px;
            overflow: hidden;
            color: grey;
            font-weight: 500;
        }
        .productprice{
            font-size: 30px;
            overflow: hidden;
            color: indianred;
            font-weight: 500;
        }
        .pallete-detail-product{
            margin-top: 20px;
            margin-bottom: 10px;
            font-family: 'Segoe UI';
        }
        .img-detail{
            width: 100%;
            height: 100%;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            margin-left: 0px;
        }
        .productname{
            font-size: 40px;
            font-weight: 700;
        }
        .productinfo{
            color: gray;
        }
        .btn-proccess{
            width: 100%;
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('/js/tampilan/inputnumber.js') }}"></script>
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    function tambahKeranjang(redirect, username){
        var qty = $('#qty').val();
        var username = username;
        var kode = '{{$data[0]->kdProduct}}';
        $.ajax({
        type: 'POST',
        url: '/transaksi/tambahKeranjang',
        dataType: 'JSON',
        data: {
            username: username,
            kdProduct: kode,
            qty: qty,
        },
        success: function (response) {
            if (response.sqlResponse) {
                alert('Berhasil Menambahkan Keranjang!');
                if (redirect) {
                    window.location.replace('/transaksi/keranjang')
                }
            } else {
                alert(response.data);
            }
        },
        error: function (response) {
            console.log(response);
            alert('gagal \n' + response.responseText);
        }

    });
    }

</script>
@endsection