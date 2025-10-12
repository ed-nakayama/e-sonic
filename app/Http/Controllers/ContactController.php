<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use App\Models\InqueryReferer;

class ContactController extends Controller
{
  public function index()
  {
	return view('contact');
  }


  public function confirm(Request $request)
  {
	$validatedData = $request->validate([
		'name'    => ['required','string'],
		'mail'    => ['required','string','email'],
		'title'   => ['required','string'],
		'known'  => ['required'],
		'content' => ['required','string'],
		'privacy' => ['required'],
	]);

	$name    = isset($request->name)     ? $request->name    : '';
	$mail    = isset($request->mail)     ? $request->mail    : '';
	$title   = isset($request->title)    ? $request->title : '';
	$known   = isset($request->known)    ? $request->known   : '';
	$content = isset($request->content)  ? $request->content  : '';

	return view('contact_confirm' ,compact(
 			'name',
 			'mail',
 			'title',
 			'known',
 			'content',
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
	$mail    = isset($request->mail)     ? $request->mail    : '';
	$title   = isset($request->title)    ? $request->title   : '';
	$known   = isset($request->known)    ? $request->known   : '';
	$content = isset($request->content)  ? $request->content : '';


	// 登録完了のお知らせ
	 Mail::send(new ContactUs($name, $mail, $title, $known, $content));

	$referer = session()->get('lp_ref');

	InqueryReferer::create([
		'url' => $referer,
	]);


	return redirect()->route('contact.finish');
  }


  public function finish()
  {

	return view('contact_complete');
  }


}
