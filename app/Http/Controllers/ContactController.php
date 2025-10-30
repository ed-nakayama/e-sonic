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
