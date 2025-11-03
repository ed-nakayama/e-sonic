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
		$referer = '';
        
		if (!empty($request->referer)) {
			$referer = $request->referer;

			$list = AccessReferer::where('url', 'like', "%{$referer}%")
			->orderBy('id', 'DESC')
				->paginate(30);
        } else {
			$list = AccessReferer::orderBy('id', 'DESC')
				->paginate(30);
		}

		$dist_list = AccessReferer::groupBy('url')
			->selectRaw('url, count(*) as count')
			->orderBy('count', 'DESC')
			->get();
        

		return view('admin/access_referer' ,
		[
			'referer' => $referer,
			'list' => $list,
			'dist_list' => $dist_list,
		]);

    }


/***************************************************
* Inquery Referer
****************************************************/
    public function inquery_referer(Request $request)
    {
		$referer = '';

		if (!empty($request->referer)) {
			$referer = $request->referer;
        
			$list = InqueryReferer::where('url', 'like', "%{$referer}%")
				->orderBy('id', 'DESC')
				->paginate(30);

        } else {
			$list = InqueryReferer::orderBy('id', 'DESC')
				->paginate(30);
		}

		$dist_list = InqueryReferer::groupBy('url')
			->selectRaw('url, count(*) as count')
			->orderBy('count', 'DESC')
			->get();

		return view('admin/inquery_referer' ,
		[
			'referer' => $referer,
			'list' => $list,
			'dist_list' => $dist_list,
		]);

    }
}
