<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;

class ProductController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }


/***************************************************
* 製品マスタ 初期表示
****************************************************/
    public function index(Request $request)
    {
        $query = Product::orderBy('prod_type')
			->orderBy('cat_id');

		if (!empty($request->input('search_prod_type'))) {
	        $query->where('prod_type' ,$request->input('search_prod_type'));
		}

		if (!empty($request->input('search_cat_id'))) {
	        $query->where('cat_id' ,$request->input('search_cat_id'));
		}

		$prodList = $query->get();

		return view('admin/prod_list' ,
		[
			'prodList'         => $prodList,
			'search_prod_type' => $request->input('search_prod_type'),
			'search_cat_id'    => $request->input('search_cat_id'),
		]);

    }


/***************************************************
* 製品マスタ 保存
****************************************************/
    public function store(Request $request)
    {

		$validatedData = $request->validate([
			'name' => ['required','string'],
		]);

		if (empty($request->id) ) {

			$prod = Product::create([
				'prod_type'   => isset($request->prod_type)   ? $request->prod_type   : null,
				'cat_id'      => isset($request->cat_id)      ? $request->cat_id      : null,
				'name'        => $request->name,
				'repair_flag' => isset($request->repair_flag) ? $request->repair_flag : null,
				'secure_flag' => isset($request->secure_flag) ? $request->secure_flag : null,
				'dl_url'      => $request->dl_url,
			]);

		} else {
			$prod = Product::find($request->id);

			if (isset($request->del_flag)) {
				$prod->delete();

			} else {
				$prod->prod_type   = isset($request->prod_type)   ? $request->prod_type   : null;
				$prod->cat_id      = isset($request->cat_id)      ? $request->cat_id      : null;
				$prod->name        = $request->name;
				$prod->repair_flag = isset($request->repair_flag) ? $request->repair_flag : null;
				$prod->secure_flag = isset($request->secure_flag) ? $request->secure_flag : null;
				$prod->dl_url      = $request->dl_url;

				$prod->save();
			}
		}

		return redirect()->route('admin.product', 
			[
				'search_prod_type' => $request->input('search_prod_type'),
				'search_cat_id'    => $request->input('search_cat_id'),
			])
			->with('status', 'success-store');
    }


}
