<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\productModel;

class productController extends Controller
{
    //
    public function index(){
        return view('umum.produk');
    }

    public function getProduct(Request $request){
        $searchbyname = [['namaProduct', 'LIKE', '%' . $request->schproduk . '%']];
        $searchbydeskripsi = [['deskripsi', 'LIKE', '%' . $request->schproduk . '%']];
        
        $data = productModel::query()
            ->select('kdProduct', 'namaProduct', 'kdKategori', 'kdSatuan', 'hargaJual', 'diskon', 'qty' , 'deskripsi', 'promo', 'urlFoto')
            ->where('promo', '=', 'T')
            ->where(function ($query) use ($searchbyname, $searchbydeskripsi) {
                $query->where($searchbyname)
                ->orWhere($searchbydeskripsi);
            })
            ->orderby('namaProduct', 'ASC')
            ->get();

            $returnHTML = view('content.product')->with(['product' => $data->all()])->render();
        
            return response()->json(array('success' => true, 'html' => $returnHTML));
    }
    public function getPromo(Request $request){

        
        $data = productModel::query()
            ->select('kdProduct', 'namaProduct', 'kdKategori', 'kdSatuan', 'hargaJual', 'diskon', 'qty' , 'deskripsi', 'promo', 'urlFoto')
            ->where('promo', '=', 'Y')
            ->orderby('namaProduct', 'ASC')
            ->get();

            $returnHTML = view('content.promocarousel')->with(['data' => $data->all()])->render();
        
            return response()->json(array('success' => true, 'html' => $returnHTML));
    }



    public function getDetail(Request $request)
    {
        $data = productModel::query()
            ->join('tb_kategori', 'tb_product.kdKategori', '=', 'tb_kategori.kdKategori')
            ->select('tb_product.kdProduct as kdProduct',
                    'tb_product.namaProduct as namaProduct',
                    'tb_product.kdKategori as kdKategori',
                    'tb_kategori.namaKategori as namaKategori',
                    'tb_product.kdSatuan as kdSatuan',
                    'tb_product.hargaJual as hargaJual',
                    'tb_product.diskon as diskon',
                    'tb_product.qty as qty',
                    'tb_product.deskripsi as deskripsi',
                    'tb_product.promo as promo',
                    'tb_product.urlFoto as urlFoto')
            ->where('kdProduct', '=', $request->kdProduct)
            ->get();

            $returnHTML = view('content.modaldetail')->with(['data' => $data->all()])->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
    }
}
