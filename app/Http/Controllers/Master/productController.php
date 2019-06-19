<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\productModel;

class productController extends Controller
{
    //
    public function index(){
        $productPromo = productModel::query()
                    ->select( 'kdProduct', 'namaProduct', 'kdKategori', 'kdSatuan', 'hargaJual', 'diskon', 'deskripsi', 'promo', 'urlFoto')
                    ->where('promo', '=', 'Y')
                    ->get();

        $productNonPromo = productModel::query()
                    ->select( 'kdProduct', 'namaProduct', 'kdKategori', 'kdSatuan', 'hargaJual', 'diskon', 'deskripsi', 'promo', 'urlFoto')
                    ->where('promo', '=', 'T')
                    ->get();
        
        return view('/umum/produk')->with(['productPromo' => $productPromo, 'productNonPromo' => $productNonPromo]);
    }
}
