@extends('main.master')
@section('content')
<div class="tabelkeranjang pt-3" style="margin-top: -120px"></div>
<div class="tabelkeranjang">
    <div class="container pt-3 pb-3" style="background-color: RGBA(200,200,200,0.4)">
        <div class="notransaksi">No. Transaksi : {{ $data->noTrans }}</div>
        <div class="tgltransaksi">Tanggal : {{ $data->tanggal }}</div>
        
        <div>Detail Pembayaran</div>
        <div class="container">
            <div class="row text-center" style="background: grey; font-weight: bolder;">
                <div class="col-sm-10">Description</div>
                <div class="col-sm-2">Total</div>
            </div>
            <div class="row">
                <div class="col-sm-9">Total Belanja</div>
                <div class="col-sm-1 text-right">Rp. </div>
                <div class="col-sm-2 text-right">{{ formatuang($data->subTotal) }}</div>
            </div>
            <div class="row">
                 <div class="col-sm-9">Biaya Pengiriman</div>
                 <div class="col-sm-1 text-right">Rp. </div>
                <div class="col-sm-2 text-right">{{ formatuang($data->ongkir) }}</div>
            </div>
            <hr>
            <div class="row">
                 <div class="col-sm-9">Total Biaya</div>
                 <div class="col-sm-1 text-right">Rp. </div>
                <div class="col-sm-2 text-right">{{ formatuang($data->subTotal + $data->ongkir) }}</div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Alamat Pengiriman</label>
                        <textarea readonly class="form-control" rows="3" id="alamat" name="alamat">{{ $data->alamat}}</textarea>
                    </div>
                </div>
            </div>
            <hr>
            <p style="font-weight: 700"> Upload Bukti Transfer dan Alamat pengiriman:</p>
            <form action="#" method="POST" id="formbayar">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bank">BANK</label>
                        <select id="bank" class="form-control" name="bank">
                            <option value="BCA">BCA</option>
                            <option value="BRI">BRI</option>
                            <option value="BNI">BNI</option>
                            <option value="MANDIRI">MANDIRI</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Bukti Transfer </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileBuktiTf" name="fileBuktiTf">
                            <label class="custom-file-label" for="customFile">Pilih file</label>
                        </div>
                    </div>
                </div>
            </div>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg" id="btnSimpan">Konfirmasi Pembayaran</button>
                    </div>
                </div>
               
            </div>
        </div>
        
        <p>Pembayaran akan di cek dalam 24 jam setelah bukti transfer di upload. </p>
        <hr>
        <p style="font-weight: 700"> Cara Pembayaran:</p>
        <p> 1. Gunakan ATM / iBanking / Setor Tunai untuk transfer ke rekening NAJWA COLLECTION berikut ini</p>
        <div class="rekening pl-2 pt-1">
            <p class="mb-0"> Bank: BCA</p>
            <p class="mb-0"> No Rekening: 73178238</p>
            <p class="mb-0"> Cabang: Solo</p>
            <p class="mb-1 pb-2"> Nama Rekening: --------</p>
            <br>
            <p class="mb-0"> Bank: BRI</p>
            <p class="mb-0"> No Rekening: 73178238</p>
            <p class="mb-0"> Cabang: Solo</p>
            <p class="mb-1 pb-2"> Nama Rekening: --------</p>
            <br>
            <p class="mb-0"> Bank: BNI</p>
            <p class="mb-0"> No Rekening: 73178238</p>
            <p class="mb-0"> Cabang: Solo</p>
            <p class="mb-1 pb-2"> Nama Rekening: --------</p>
            <br>
            <p class="mb-0"> Bank: MANDIRI</p>
            <p class="mb-0"> No Rekening: 73178238</p>
            <p class="mb-0"> Cabang: Solo</p>
            <p class="mb-1 pb-2"> Nama Rekening: --------</p>
            <br>
        </div>
        <p> 2. Silahkan upload bukti Pembayaran sebelum tanggal --------</p>
        <p> 3. Demi kenyamanan transaksi, mohon untuk tidak membagikan bukti atau konfirmasi pembayaran pesanan
            kepada siapapun selain mengunggahnya ke website NAJWA COLLECTION
        </p>
        <hr>
        
    </div>
</div>


</div> @endsection @section('footer') <section>
    <footer>
        <div class="footer">
            &copy; Copyright 2019
        </div>
    </footer>
</section>
@endsection


@section('script')
<script src="{{ asset('/js/tampilan/genosstyle.js') }}"></script>
<script src="{{ asset('js/tampilan/fileinput.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#btnSimpan').on('click', function (e) {
            e.preventDefault();
            simpan();
       
    });

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }

    

    function simpan() {

            var formData = new FormData($('#formbayar')[0]);
            formData.append('noTrans', '{{ $data->noTrans }}');
            $.ajax({
                type: 'POST',
                url: '/transaksi/konfirmasi',
                dataType: 'JSON',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    
                    console.log(response);
                    if (response.valid) {
                        if (response.sqlResponse) {
                            window.location.replace('/transaksi/konfirmasibayar');
                        }else{
                            alert(response.data);
                        }
                        
                    }else{
                        alert(response.errors);
                    }
                },
                error: function (response) {
                    alert('error' + response.responseText);
                }
            
            });
    }

    
</script>

@endsection
