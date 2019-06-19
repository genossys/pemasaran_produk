<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\satuanModel;
use Yajra\DataTables\DataTables;

class satuanController extends Controller
{
    //
    public function index(){
        return view('admin.master.datasatuan');
    }

    public function getDataSatuan(){
        $satuan = satuanModel::query()
            ->select('kdSatuan', 'namaSatuan')
            ->get();

        return DataTables::of($satuan)
            ->addIndexColumn()
            ->addColumn('action', function ($satuan) {
                return '<a class="btn-sm btn-warning" id="btn-edit" href="#" onclick="" ><i class="fa fa-edit"></i></a>
                            <a class="btn-sm btn-danger" id="btn-delete" href="#" onclick="" ><i class="fa fa-trash"></i></a>
                        ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    private function isValid(Request $r)
    {
        $messages = [
            'required'  => 'Field :attribute Tidak Boleh Kosong',
            'max'       => 'Filed :attribute Maksimal :max',
        ];

        $rules = [
            'kdSatuan' => 'required|max:10',
            'namaSatuan' => 'required|max:255',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function insert(Request $r){
        $this->isValid($r)->validate();
        try {
            $satuan = new satuanModel();
            $satuan->username = $r->kdSatuan;
            $satuan->email = $r->namaSatuan;
            $satuan->save();
            return response()->json([
                'sqlResponse' => true,
                'data' => $satuan
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'sqlResponse' => false,
                'data' => $th
            ]);
        }
    }
}
