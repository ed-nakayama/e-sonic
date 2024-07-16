<?php

namespace App\Http\Controllers\Cust\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::MYPAGE;

    public function __construct()
    {
        $this->middleware('guest:cust')->except('logout');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('cust');
    }


	/***********************************************
    * ログイン画面
	************************************************/
    public function showLoginForm()
    {
        return view('cust.auth.login');
    }


	/***********************************************
    * ログアウト
	************************************************/
    public function logout(Request $request)
    {
        Auth::guard('cust')->logout();
        Session::flush();

        return $this->loggedOut($request);
    }


	/***********************************************
    * ログアウトした時のリダイレクト先
	************************************************/
    public function loggedOut(Request $request)
    {
        return redirect(route('cust.index'));
    }    

}
