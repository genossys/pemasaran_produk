<?php

namespace App\Transaksi;

use Illuminate\Database\Eloquent\Model;

class belanjaModel extends Model
{
    protected $table = 'tb_belanja';
    protected $fillable = ['noTrans', 'username', 'tanggal', 'subTotal', 'ongkir', 'confirmed', 'status', 'alamat'];
}
