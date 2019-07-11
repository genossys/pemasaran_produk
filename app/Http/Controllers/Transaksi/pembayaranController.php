<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaksi\pembayaranModel;
use Yajra\DataTables\DataTables;

class pembayaranController extends Controller
{
    //
    public function index()
    {
        return view('admin.transaksi.pembayaran');
    }
    
    public function getDataPembayaran(){
        $pembayaran = pembayaranModel::query()
            ->select('tanggal', 'noTrans', 'bank', 'urlBukti', 'status')
            ->get();

        return DataTables::of($pembayaran)
            ->addIndexColumn()
            ->addColumn('bukti', function ($pembayaran) {
                    return '<a class="btn-sm btn-warning details-control" id="btn-detail" href="#">Bukti Transfer</a>';
            })
            ->addColumn('status', function ($pembayaran) {
                return '<a class="btn-sm btn-primary" id="btn-konfrimasi" href="#" onclick="showPromo(\''. $pembayaran->noTrans.'\', event)"> '. $pembayaran->status.' </a>';
            })
            ->rawColumns(['status', 'bukti'])
            ->make(true);
    }

    public function edit(Request $r)
    {
        try {
            $id = $r->notrans;
            $data = [
                'status' => $r->status,
            ];

            pembayaranModel::query()
                ->where('noTrans', '=', $id)
                ->update($data);
            return response()
                ->json([
                    'sqlResponse' => true,
                    'sukses' => $data,
                    'valid' => true,
                ]);
        } catch (\Throwable $th) {
            return response()->json([
                'sqlResponse' => false,
                'data' => $th,
                'valid' => true,
            ]);
        }
    }

}
