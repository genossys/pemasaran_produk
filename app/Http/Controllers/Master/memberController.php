<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\memberModel;
use Illuminate\Foundation\Auth\RegistersUsers;

class memberController extends Controller
{
    //

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.registermember');
    }

    public function insert(Request $r){
        $member = new memberModel;

    }
}
