<?php

namespace App\Transaksi;

use Illuminate\Database\Eloquent\Model;

class KeranjangModel extends Model
{
    //
    protected $table = 'tb_keranjang';
    protected $fillable = ['noTrans', 'tanggal', 'username', 'kdProduct', 'qty', 'harga', 'checkout'];
}
