<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\memberModel;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class memberController extends Controller
{
    //

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        
    }

    public function index(){
        return view( 'admin.master.datamember');
    }

    public function getDataMember()
    {
        $member = memberModel::query()
            ->select('id', 'username', 'email', 'nohp', 'alamat', 'tglLahir')
            ->get();
        return DataTables::of($member)
            ->addIndexColumn()
            ->make(true);
    }

    public function showFormRegistrasi(){
        $this->middleware('guest');
        return view('auth.registermember');
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
            'dateTanggalLahir' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function register(Request $r)
    {
        $this->middleware('guest');
        $this->isValid($r)->validate();
            # code...
            try {
                $member = new memberModel();
                $member->username = $r->username;
                $member->email = $r->email;
                $member->password = Hash::make($r->password);
                $member->nohp = $r->nohp;
                $member->alamat = $r->alamat;
                $member->save();
                $credentials = $r->only('email', 'password');
                    if (Auth::attempt($credentials)) {
                        return redirect()->intended('/');
                    }else{
                        return redirect()->back();
                    }
            } catch (\Throwable $th) {
                return 'Error Program ' . $th;
            }
        
    }
}
