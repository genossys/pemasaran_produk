<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Transaksi\KeranjangModel;
use Carbon\Carbon;
use App\Transaksi\belanjaModel;
use App\Master\ongkirModel;

class KeranjangController extends Controller
{
    //
    public function index(){
        $kota = ongkirModel::query()
            ->select('id','kota', 'biaya')
            ->orderBy('id', 'ASC')
            ->get();
        $biaya = $kota[0]->biaya;
        return view('main.keranjang')->with(['kota' => $kota, 'biaya' => $biaya]);
    }
    public function showPaymentPage(){
        return view( 'main.konfirmasibelanja');
    }

    public function getDataKeranjang(Request $request){
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
                     'tb_keranjang.harga as harga', 
                     'tb_keranjang.checkout as checkout', 
                     'tb_product.urlFoto as urlFoto')
            ->selectRaw( 'tb_keranjang.qty * tb_keranjang.harga as subtotal')
            ->where('notrans', '=', null)
            ->where('tb_keranjang.username', '=', $request->username)
            ->get();

        $grandtotal = $keranjang->sum( 'subtotal');
        $qtyTotal = $keranjang->sum('qty');
        return DataTables::of($keranjang)
                    ->addIndexColumn()
                    ->addColumn('action', function ($keranjang) {
                        return '
                                    <a class="btn-sm btn-danger" id="btn-delete" href="#" onclick="" ><i class="fa fa-trash"></i></a>
                                ';
                    })
                    ->addColumn('urlFoto', function ($keranjang) {
                        return '<img height="42" width="42" class="img-fluid" src="/foto/'. $keranjang->urlFoto.'" alt="">';
                    })
                    ->addColumn('subtotal', function($keranjang){
                        return formatuang($keranjang->subtotal);
                    })
                    ->addColumn('harga', function($keranjang){
                        return formatuang($keranjang->harga);
                    })
                    ->rawColumns(['action', 'subtotal', 'urlFoto'])
                    ->with(['grandtotal' => $grandtotal, 'qtytotal' => $qtyTotal])
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
            $Keranjang->checkout = '0';
            $Keranjang->save();
            return response()->json([
                'sqlResponse' => true,
                'data' => $Keranjang,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'sqlResponse' => false,
                'data' => $Keranjang,
            ]);
        }
    }

    public function cekout(Request $r){
        try {
            $Keranjang = new belanjaModel();
            $Keranjang->noTrans = NULL;
            $Keranjang->username = $r->username;
            $Keranjang->tanggal = Carbon::now()->format('Y-m-d');
            $Keranjang->subTotal = 0;
            $Keranjang->ongkir = $r->ongkir;
            $Keranjang->confirmed = '0';
            $Keranjang->status = 'Pending';
            $Keranjang->alamat = $r->alamat;
            $Keranjang->save();
            return response()->json([
                'sqlResponse' => true,
                'data' => $Keranjang,
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'sqlResponse' => false,
                'data' => $Keranjang,
                'ex' => $th
            ]);
        }
    }
}
