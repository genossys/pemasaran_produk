<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\productModel;

class homeController extends Controller
{
    //
    public function index()
    {
        return view('main.home');
    }

    public function showmore($index)
    {
        return view('main.showmore')->with(['index' => $index]);
    }

    public function invoice()
    {
        return view('main.invoice');
    }
    public function getDetailProduct($kdproduct)
    {
        $data = productModel::query()
            ->join('tb_kategori', 'tb_product.kdKategori', '=', 'tb_kategori.kdKategori')
            ->select('kdProduct', 'namaProduct', 'tb_product.kdKategori', 'kdSatuan', 'hargaJual', 'diskon', 'qty', 'deskripsi', 'promo', 'urlFoto', 'tb_kategori.namaKategori as namaKategori')
            ->selectRaw('getTerjual(`kdProduct`) as terjual')
            ->where('kdProduct', '=', $kdproduct)
            ->get();
        return view('main.detail')->with(['data' => $data]);
    }

    public function getPromo(Request $request){
        $searchbyname = [['namaProduct', 'LIKE', '%' . $request->schproduk . '%']];
        $searchbydeskripsi = [['deskripsi', 'LIKE', '%' . $request->schproduk . '%']];

        $data = productModel::query()
            ->select('kdProduct', 'namaProduct', 'kdKategori', 'kdSatuan', 'hargaJual', 'diskon', 'qty', 'deskripsi', 'promo', 'urlFoto')
            ->selectRaw('getTerjual(`kdProduct`) as terjual')
            ->where('promo', '=', 'Y')
            ->where(function ($query) use ($searchbyname, $searchbydeskripsi) {
                $query->where($searchbyname)
                    ->orWhere($searchbydeskripsi);
            })
            ->limit(12)
            ->orderby('namaProduct', 'ASC')
            ->get();

        $returnHTML = view( 'main.content')->with(['data' => $data])->render();

        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function getRecommend(Request $request){
        $searchbyname = [['namaProduct', 'LIKE', '%' . $request->schproduk . '%']];
        $searchbydeskripsi = [['deskripsi', 'LIKE', '%' . $request->schproduk . '%']];

        $data = productModel::query()
            ->select('kdProduct', 'namaProduct', 'kdKategori', 'kdSatuan', 'hargaJual', 'diskon', 'qty', 'deskripsi', 'promo', 'urlFoto')
            ->selectRaw('getTerjual(`kdProduct`) as terjual')
            ->where(function ($query) use ($searchbyname, $searchbydeskripsi) {
                $query->where($searchbyname)
                    ->orWhere($searchbydeskripsi);
            })
            ->limit(12)
            ->orderby('terjual', 'ASC')
            ->get();

        $returnHTML = view('main.content')->with(['data' => $data])->render();

        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function getAllPrduct(Request $request)
    {
        $searchbyname = [['namaProduct', 'LIKE', '%' . $request->schproduk . '%']];
        $searchbydeskripsi = [['deskripsi', 'LIKE', '%' . $request->schproduk . '%']];

        $data = productModel::query()
            ->select('kdProduct', 'namaProduct', 'kdKategori', 'kdSatuan', 'hargaJual', 'diskon', 'qty', 'deskripsi', 'promo', 'urlFoto')
            ->selectRaw('getTerjual(`kdProduct`) as terjual')
            ->where(function ($query) use ($searchbyname, $searchbydeskripsi) {
                $query->where($searchbyname)
                    ->orWhere($searchbydeskripsi);
            })
            ->orderby('namaProduct', 'ASC')
            ->get();

        $returnHTML = view('main.allcontent')->with(['data' => $data])->render();

        return response()->json(array('success' => true, 'html' => $returnHTML));
    }
    public function getAllPromo(Request $request)
    {
        $searchbyname = [['namaProduct', 'LIKE', '%' . $request->schproduk . '%']];
        $searchbydeskripsi = [['deskripsi', 'LIKE', '%' . $request->schproduk . '%']];

        $data = productModel::query()
            ->select('kdProduct', 'namaProduct', 'kdKategori', 'kdSatuan', 'hargaJual', 'diskon', 'qty', 'deskripsi', 'promo', 'urlFoto')
            ->selectRaw('getTerjual(`kdProduct`) as terjual')
            ->where('promo', '=', 'Y')
            ->where(function ($query) use ($searchbyname, $searchbydeskripsi) {
                $query->where($searchbyname)
                    ->orWhere($searchbydeskripsi);
            })
            ->orderby('namaProduct', 'ASC')
            ->get();

        $returnHTML = view('main.allcontent')->with(['data' => $data])->render();

        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function getAllRecommend(Request $request)
    {
        $searchbyname = [['namaProduct', 'LIKE', '%' . $request->schproduk . '%']];
        $searchbydeskripsi = [['deskripsi', 'LIKE', '%' . $request->schproduk . '%']];

        $data = productModel::query()
            ->select('kdProduct', 'namaProduct', 'kdKategori', 'kdSatuan', 'hargaJual', 'diskon', 'qty', 'deskripsi', 'promo', 'urlFoto')
            ->selectRaw('getTerjual(`kdProduct`) as terjual')
            ->where(function ($query) use ($searchbyname, $searchbydeskripsi) {
                $query->where($searchbyname)
                    ->orWhere($searchbydeskripsi);
            })
            ->orderby('terjual', 'ASC')
            ->get();

        $returnHTML = view('main.allcontent')->with(['data' => $data])->render();

        return response()->json(array('success' => true, 'html' => $returnHTML));
    }
}
