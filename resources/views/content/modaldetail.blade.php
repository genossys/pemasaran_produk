
<div class="row">
    @foreach ($data as $item)
        
   
    <div class="col-sm-5 text-right">
        <img id="gambarnew" class="gambarnew img-fluid" src="{{asset ('/foto/'.$item->urlFoto)}}" alt="">
    </div>
    <div class="col-sm-7" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
        <h3 class="text-dark font-weight-bold mb-4">{{$item->namaProduct}}</h3>
        Deskripsi Product :
        <p class="text-dark" >{{$item->deskripsi}}</p>
        @if ($item->diskon > 0)
                <div style="font-size: small">Disc {{$item->diskon}}% <strike> {{formatRupiah($item->hargaJual)}} </strike></div>
        @endif
        <div style="font-size: larger; font-weight: bolder">
                {{ hargaafterdiskon($item->diskon, $item->hargaJual)}}
        </div>
        <div style="font-size: small">
            Stok Tersedia : {{ $item->qty }}
        </div>

        <div class="tombolpesan">
            <p>
            </p>
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
            <p></p>
            @if (auth()->check())
                <button class="btn btn-primary" id="btnKeranjang" onclick="tambahKeranjang('{{$item->kdProduct}}', '{{ auth()->user()->username}}')">Tambah Ke Keranjang</button>
                <button class="btn btn-primary" id="btnBeli">Beli</button>
            @else
                <button class="btn btn-primary" onclick="javascript:alert('Anda Harus Login Dulu!')">Tambah Ke Keranjang</button>
                <button class="btn btn-primary" onclick="javascript:alert('Anda Harus Login Dulu!')">Beli</button>
            @endif


        </div>
    </div>
     @endforeach
</div>

<script src="{{ asset('/js/tampilan/inputnumber.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    function tambahKeranjang(kode, username){
        var qty = $('#qty').val();
        $.ajax({
        type: 'POST',
        url: '/product/tambahKeranjang',
        dataType: 'JSON',
        data: {
            username: username,
            kdProduct: kode,
            qty: qty,
        },
        success: function (response) {
            if (response.sqlResponse) {
                alert('Berhasil Menambahkan Keranjang!');
                $('#myModal').modal('hide');
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

