<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaksi\belanjaModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Transaksi\pembayaranModel;

class belanjaController extends Controller
{
    //
    public function index($nota){
        
        $belanja = belanjaModel::where('noTrans','=', $nota)->get();
         return view('main.pembayaran')->with(['data' => $belanja[0]]);
    }

    public function getkonfirmasi(Request $request){
        $keranjang = belanjaModel::query()
            ->select('noTrans', 'username', 'tanggal', 'subTotal', 'ongkir', 'confirmed', 'status')
            ->selectRaw( '(subTotal + ongkir) as total')
            ->where('username', '=', $request->username)
            ->get();

        return DataTables::of($keranjang)
            ->addIndexColumn()
            ->addColumn('action', function ($keranjang) {
                if ($keranjang->confirmed == '0') {
                    $url = route('pembayaran', ['nota' => $keranjang->noTrans]);
                    return '<a class="btn-sm btn-warning" id="btn-konfrimasi" href="' . $url . '" onclick="" >Konfirmasi</a>';
                }
                return 'Confirmed';
            })
            ->addColumn('subTotal', function ($keranjang) {
                return formatuang($keranjang->subTotal);
            })
            ->addColumn('ongkir', function ($keranjang) {
                return formatuang($keranjang->ongkir);
            })
            ->addColumn('total', function ($keranjang) {
                return formatuang($keranjang->total);
            })
            ->rawColumns(['action', 'subTotal', 'ongkir', 'total'])
            ->make(true);
    }

    private function isValid(Request $r)
    {
        $messages = [
            'required'  => 'Field :attribute Tidak Boleh Kosong',
            'max'       => 'Field :attribute Maksimal :max',
            'image'       => 'Field :attribute Harus File Gambar',
        ];

        $rules = [
            'fileBuktiTf' => 'required',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function insert(Request $r){

        if ($this->isValid($r)->fails()) {
            return response()->json([
                'valid' => false,
                'errors' => $this->isValid($r)->errors()->all(),
            ]);
        } else {

            if ($r->hasFile('fileBuktiTf')) {
                $upFoto = $r->file('fileBuktiTf');
                $namaFoto = $r->noTrans.'.'.$upFoto->getClientOriginalExtension();
            } else {
                $namaFoto = '';
            }

            try {
                $belanja = new pembayaranModel;
                $belanja->tanggal = Carbon::now()->format('Y-m-d');
                $belanja->noTrans = $r->noTrans;
                $belanja->bank = $r->bank;
                $belanja->urlBukti = $namaFoto;
                $belanja->status = 'Tunggu';
                
                if ($belanja->save()) {
                    # code...
                    if ($r->hasFile('fileBuktiTf')) {
                        $r->fileBuktiTf->move(public_path('bukti'), $namaFoto);
                    }
                }
               
                return response()->json([
                    'valid' => true,
                    'sqlResponse' => true,
                    'data' => $belanja,
                ]);
            } catch (\Exception  $e) {
                //throw $th;
                $exData = explode('(', $e->getMessage());
                return response()->json([
                    'valid' => true,
                    'sqlResponse' => false,
                    'data' => $exData[0],
                ]);
            }
        }

    }
    




}
