<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class ongkirModel extends Model
{
    //pro
    protected $table = 'tb_ongkir';
    protected $fillable = ['kota', 'biaya'];
    public $timestamps = false;
}
