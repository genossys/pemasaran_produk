@extends('umum.master')
@section('content')
<div class="tabelkeranjang pt-3"></div>
<div class="tabelkeranjang">
    <div class="container pt-3 pb-3" style="background-color: RGBA(200,200,200,0.4)">
        <p>Total Pembayaran:</p>
        <p style="font-size: 50px;color: red">Rp 50.000</p>
        <p>Pembayaran akan di cek dalam 24 jam setelah bukti transfer di upload. </p>
        <hr>
        <p style="font-weight: 700"> Cara Pembayaran:</p>
        <p> 1. Gunakan ATM / iBanking / Setor Tunai untuk transfer ke rekening crm katering berikut ini</p>
        <div class="rekening pl-2 pt-1">
            <p class="mb-0"> Bank: BCA</p>
            <p class="mb-0"> No Rekening: 73178238</p>
            <p class="mb-0"> Cabang: Solo</p>
            <p class="mb-1 pb-2"> Nama Rekening: --------</p>
        </div>
        <p> 2. Silahkan upload bukti Pembayaran sebelum tanggal --------</p>
        <p> 3. Demi kenyamanan transaksi, mohon untuk tidak membagikan bukti atau konfirmasi pembayaran pesanan
            kepada siapapun selain mengunggahnya ke website crm katering
        </p>
        <hr>
        <p style="font-weight: 700"> Upload Bukti Transfer dan Alamat pengiriman:</p>
        <form action="" method="POST">
            <div class="form-group">
                <label>Bukti Transfer </label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="fileBuktiTf" name="fileBuktiTf">
                    <label class="custom-file-label" for="customFile">Pilih file</label>
                </div>
            </div>

            <div class="form-group">
                <label >Alamat Pengiriman </label>
                <textarea class="form-control" rows="3" id="txtAlamatPengiriman" name="txtAlamatPengiriman"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-lg">Kirimkan</button>
            </div>
        </form>
    </div>
</div>

<div class="tabelkeranjang pt-3"></div>

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
@endsection
