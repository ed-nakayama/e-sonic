<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Redirect;
use URL;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactLP;
use App\Models\InqueryReferer;

class LPController extends Controller
{
  public function confirm(Request $request)
  {
   $validator = Validator::make($request->all(), [
			'name'    => ['required','string'],
			'email'   => ['required','string','email'],
			'title'   => ['required','string'],
			'inquiry' => ['required','string'],
			'privacy' => ['required'],
    ]);

    if($validator->fails()) {
        return Redirect::to(URL::previous() . "#inquiry")->withInput()->with('errors', $validator->messages());
    } //Thats I want

	$name    = isset($request->name)     ? $request->name    : '';
	$email    = isset($request->email)     ? $request->email    : '';
	$title   = isset($request->title)    ? $request->title : '';
	$inquiry = isset($request->inquiry)  ? $request->inquiry  : '';

	return view('lp_confirm' ,compact(
 			'name',
 			'email',
 			'title',
 			'inquiry',
 			));
  }


  public function complete(Request $request)
  {
	if (!empty($_POST['g-recaptcha-response'])) {
		$recaptcha = $_POST['g-recaptcha-response'];
	} else {
	    $recaptcha = '';
	}
	$secretKey = "6Lf9oPwrAAAAAJ4IGH0UGDGN3-ehjv-hv41sIfC_";
	$url="https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptcha}";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	$result = curl_exec( $ch );
	curl_close($ch);

	$resp_result = json_decode($result,true);
	if(intval($resp_result["success"]) !== 1) {
		return view('contact_error');
	}

	$name    = isset($request->name)     ? $request->name    : '';
	$email    = isset($request->email)     ? $request->email    : '';
	$title   = isset($request->title)    ? $request->title   : '';
	$inquiry = isset($request->inquiry)  ? $request->inquiry : '';


	// 登録完了のお知らせ
	 Mail::send(new ContactLP($name, $email, $title, $inquiry));

	$referer = session()->get('lp_ref');

	InqueryReferer::create([
		'url' => $referer,
	]);

	return redirect()->route('lp.finish');
  }


}
