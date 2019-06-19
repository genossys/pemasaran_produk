<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\memberModel;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterMemberController extends Controller
{
    //
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.registermember');
    }


    private function isValid(Request $r)
    {
        $messages = [
            'required'  => 'Field :attribute Tidak Boleh Kosong',
            'max'       => 'Filed :attribute Maksimal :max',
        ];

        $rules = [
            'username' => 'required|max:191|unique:tb_user',
            'email' => 'required|max:191',
            'nohp' => 'required|numeric',
            'dateTanggalLahir' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function register(Request $r)
    {
        if (!$this->isValid($r)->fails()) {
            # code...
            try {
                //code...
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
                }
            } catch (\Throwable $th) {
                //throw $th;
                return 'Eror Program '.$th;
            }
            

        }
    }

    
}
