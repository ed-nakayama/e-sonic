<?php

namespace App\Http\Controllers\Cust;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/cust/password/complete';

	public function __construct()
    {
        $this->middleware('guest:cust');
    }

    // リセット画面
	public function showResetForm(Request $request, $token = null)
     {

         return view('cust.auth.passwords.reset')->with(
             ['token' => $token, 'email' => $request->email]
         );
     }
     

    protected function guard()
    {
        return \Auth::guard('cust');
    }


    public function broker()
    {
        return \Password::broker('customers');
    }

    /**
     * Set the user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function setUserPassword($cust, $password)
    {
        $cust->pw_raw = $password;
        $cust->password = Hash::make($password);
    }


}
