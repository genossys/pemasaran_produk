<?php

namespace App\Http\Controllers\Master;

use App\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    //

    //menampilkan halaman user
    public function index(){
        return view('admin.master.datauser');
    }

    //menampilkan data user
    public function getDataUser(){
        $user = User::query()
                ->select('id','username','email','hakAkses','noHp')
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

    private function isValid(Request $r)
    {
        $messages = [
            'required'  => 'Field :attribute Tidak Boleh Kosong',
            'max'       => 'Filed :attribute Maksimal :max',
        ];

        $rules = [
            'username' => 'required|max:191|unique:tb_user,username',
            'email' => 'required|max:191',
            'nohp' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function addUser(Request $r){
        $this->isValid($r)->validate();
        # code...
        try {
            $user = new User();
            $user->username = $r->username;
            $user->email = $r->email;
            $user->password = Hash::make($r->password);
            $user->nohp = $r->nohp;
            $user->hakAkses = $r->hakAkses;
            $user->save();
            return response()->json([
                'sqlResponse' => true,
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'sqlResponse' => false,
                'data' => $th
            ]);
        }
    }
}
