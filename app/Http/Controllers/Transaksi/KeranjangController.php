<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Transaksi\KeranjangModel;
use Carbon\Carbon;

class KeranjangController extends Controller
{
    //
    public function index(){
        return view('umum.keranjang');
    }

    public function getDataKeranjang(){
        $keranjang = KeranjangModel::query()
            ->join('tb_product', 'tb_keranjang.kdProduct', '=', 'tb_product.kdProduct')
            ->join('tb_user', 'tb_keranjang.username', '=', 'tb_user.username')
            ->select('tb_keranjang.id as id',
                     'tb_keranjang.noTrans as notrans',
                     'tb_keranjang.tanggal as tanggal',
                     'tb_keranjang.username as username', 
                     'tb_keranjang.kdProduct as kdProduct', 
                     'tb_product.namaProduct as namaProduct', 
                     'tb_product.kdSatuan as kdSatuan', 
                     'tb_keranjang.qty as qty', 
                     'tb_keranjang.diskon as diskon', 
                     'tb_product.hargaJual as hargaJual',  
                     'tb_keranjang.checkout as checkout', 
                     'tb_product.urlFoto as urlFoto')
            ->selectRaw('tb_keranjang.qty * tb_product.hargaJual as subtotal')
            ->where('checkout', '=', '0')
            ->get();

        return DataTables::of($keranjang)
                    ->addIndexColumn()
                    ->addColumn('action', function ($keranjang) {
                        return '<a class="btn-sm btn-warning" id="btn-edit" href="#" onclick="" ><i class="fa fa-edit"></i></a>
                                    <a class="btn-sm btn-danger" id="btn-delete" href="#" onclick="" ><i class="fa fa-trash"></i></a>
                                ';
                    })
                    ->addColumn('subtotal', function($keranjang){
                        return formatuang($keranjang->subtotal);
                    })
                    ->addColumn('hargaJual', function($keranjang){
                        return formatuang($keranjang->hargaJual);
                    })
                    ->rawColumns(['action', 'subtotal'])
                    ->make(true);
    }
    
    public function insert(Request $r){
        try {
            $Keranjang = new KeranjangModel();
            $Keranjang->noTrans = NULL;
            $Keranjang->tanggal = Carbon::now()->format('Y-m-d');
            $Keranjang->username = $r->input('username');
            $Keranjang->kdProduct = $r->input('kdProduct');
            $Keranjang->qty = $r->input('qty');
            $Keranjang->diskon = $r->input('diskon');
            $Keranjang->checkout = '0';
            if ($Keranjang->save()) {
                return response()->json([
                    'sqlResponse' => true,
                    'data' => $Keranjang,
                ]);
            }else{
                return response()->json([
                    'sqlResponse' => true,
                    'data' => $Keranjang,
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'sqlResponse' => false,
                'data' => $Keranjang,
            ]);
        }
    }
}
