<?php

namespace App\Http\Controllers\Cust;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Http\Requests\UpdatePasswordRequest;

class CustController extends Controller
{

	public function __construct()
	{
 		$this->middleware('auth:cust');
	}

/*************************************
* パスワード変更
**************************************/
	public function editPassword(){
        return view('cust.password_edit');
    }


/*************************************
* パスワード更新
**************************************/
    public function updatePassword(UpdatePasswordRequest $request){

        $user = \Auth::user();
        $user->pw_raw = $request->get('new-password');
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('update_password_success', 'パスワードを変更しました。');
    }


}



