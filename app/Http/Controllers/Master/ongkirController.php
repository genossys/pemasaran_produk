<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\ongkirModel;

class ongkirController extends Controller
{
    //
    public function getOngkir(){
        $ongkir = ongkirModel::query()
            ->select('kota', 'biaya')
            ->get();
        
            return response()->json($ongkir);
    }

    public function getBiayaOngkir($kota){
        $biaya = ongkirModel::where('kota','=',$kota)->get();
        // return response()->json(['biaya' => formatuang($biaya[0]->biaya)]);
        return response()->json(['biaya' => $biaya[0]->biaya]);
    }

}
