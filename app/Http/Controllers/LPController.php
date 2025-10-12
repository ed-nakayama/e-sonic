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
	$recaptcha_response = $request->recaptchaResponse;
	$recaptcha_secret = '6Ld4AecrAAAAANtXE42Cmqgwow7uNjPpzDwmFrPy';

	$recaptch_url = 'https://www.google.com/recaptcha/api/siteverify';
	$recaptcha_params = [
    	'secret' => $recaptcha_secret,
    	'response' => $recaptcha_response,
	];
	$recaptcha = json_decode(file_get_contents($recaptch_url . '?' . http_build_query($recaptcha_params)));
	
	if ($recaptcha->success) {
		if ($recaptcha->score < 0.5) {
			abort(404);
		}
	} else {
		abort(404);
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
