<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\AccessReferer;
use App\Models\InqueryReferer;

class RefererController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }


/***************************************************
* Access Referer
****************************************************/
    public function access_referer(Request $request)
    {
        $list = AccessReferer::orderBy('id', 'DESC')
        	->paginate(30);

		return view('admin/access_referer' ,
		[
			'list' => $list,
		]);

    }


/***************************************************
* Inquery Referer
****************************************************/
    public function inquery_referer(Request $request)
    {
        $list = InqueryReferer::orderBy('id', 'DESC')
        	->paginate(30);

		return view('admin/inquery_referer' ,
		[
			'list' => $list,
		]);

    }
}
