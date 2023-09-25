<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype = Auth()->user()->user_type;
            if($usertype=='user'){
                return view('dashboard');
            }elseif($usertype=='admin'){
                return view('admin.dashboard');
            }else{
                return redirect()->back();
            }
        }
    }
}

