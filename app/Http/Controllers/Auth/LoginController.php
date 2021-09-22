<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        if(Auth::check() && Auth::user()->role->id==1) {
            $this->redirectTo=route('superadmin.dashboard');
        }elseif(Auth::check() && Auth::user()->role->id==2){
            $this->redirectTo=route('admin.dashboard');     
        }elseif(Auth::check() && Auth::user()->role->id==3){
            $this->redirectTo=route('editor.dashboard');     
        }else{
            $this->redirectTo=route('author.dashboard');     
        }
        $this->middleware('guest')->except('logout');
    }
}
