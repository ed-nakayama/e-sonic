<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN_MYPAGE;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('admin');
    }


	/***********************************************
    * ログイン画面
	************************************************/
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }


	/***********************************************
    * ログアウト
	************************************************/
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        Session::flush();

        return $this->loggedOut($request);
    }


	/***********************************************
    * ログアウトした時のリダイレクト先
	************************************************/
    public function loggedOut(Request $request)
    {
        return redirect(route('admin.index'));
    }    

}
