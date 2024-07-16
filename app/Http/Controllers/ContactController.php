<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

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

	$name    = isset($request->name)     ? $request->name    : '';
	$mail    = isset($request->mail)     ? $request->mail    : '';
	$title   = isset($request->title)    ? $request->title   : '';
	$known   = isset($request->known)    ? $request->known   : '';
	$content = isset($request->content)  ? $request->content : '';


	// 登録完了のお知らせ
	 Mail::send(new ContactUs($name, $mail, $title, $known, $content));

	return redirect()->route('contact.finish');
  }


  public function finish()
  {

	return view('contact_complete');
  }


}
