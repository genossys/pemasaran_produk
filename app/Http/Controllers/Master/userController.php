<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Yajra\DataTables\DataTables;

class userController extends Controller
{
    //
    public function getDataUser(){
        $user = User::query()
                ->select('id','username','email','hakAkses','noHp','tglLahir','alamat')
                ->where('hakAkses','!=','customer')
                ->get();
        return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('action', function ($user) {
                return '<a class="btn-sm btn-warning" id="btn-edit" href="#" onclick="" ><i class="fa fa-edit"></i></a>
                            <a class="btn-sm btn-danger" id="btn-delete" href="#" onclick="" ><i class="fa fa-trash"></i></a>
                        ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
