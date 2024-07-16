<?php

namespace App\Http\Controllers\Cust;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Models\Application;
use App\Mail\RepairRequest;

use App\Models\Customer;
use App\Models\Product;
use App\Models\ProdList;

class MypageController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:cust');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$customer = Auth::user();

		$prodList = ProdList::leftJoin('products','prod_lists.product_id','=','products.id')
			->where('prod_lists.customer_id' ,$customer->id)
			->selectRaw("prod_lists.*, products.name as prod_name, products.dl_url as dl_url, products.repair_flag as repair_flag, products.secure_flag as secure_flag, products.license_flag as license_flag")
			->orderBy('buy_date')
			->orderBy('prod_type')
			->orderBy('cat_id')
			->get();

		return view('cust/mypage' ,compact(
			'customer',
			'prodList',
			));

    }


/***************************************************
* お客様情報 編集
****************************************************/
    public function cust_edit()
    {
		$customer = Auth::user();

		return view('cust/cust_edit' ,compact(
			'customer',
			));

    }


/***************************************************
* お客様情報 保存
****************************************************/
    public function cust_store(Request $request)
    {
		$customer = Auth::user();
		
		$cust = Customer::find($customer->id);

		$cust->name = $request->name;
		$cust->zip_code = $request->zip_code;
		$cust->address = $request->address;
		$cust->unit_name = $request->unit_name;
		$cust->person_name = $request->person_name;
		$cust->tel = $request->tel;

		$cust->save();

		return redirect('/cust/mypage');
    }


/***************************************************
* お客様情報 編集
****************************************************/
    public function cust_repair(Request $request)
    {
		$customer = Auth::user();

		$prodList = ProdList::leftJoin('products','prod_lists.product_id','=','products.id')
			->where('prod_lists.id' ,$request->prod_list_id)
			->selectRaw("prod_lists.*, products.name as prod_name")
			->first();

		return view('cust/cust_repair' ,compact(
			'customer',
			'prodList',
			));

    }


/***************************************************
* 修理依頼　送信
****************************************************/
    public function cust_repair_send(Request $request)
    {
		$validatedData = $request->validate([
			'content'    => ['required','string'],
			'privacy'    => ['required'],
		]);

		$customer = Auth::user();

		$prodList = ProdList::leftJoin('products','prod_lists.product_id','=','products.id')
			->where('prod_lists.id' ,$request->prod_list_id)
			->selectRaw("prod_lists.*, products.name as prod_name")
			->first();

		$content = $request->content;

		// 修理依頼完了のお知らせ
		 Mail::send(new RepairRequest($customer, $prodList, $content));

		return redirect('/cust/repair/comp');
    }


/***************************************************
* 修理依頼　完了
****************************************************/
    public function cust_repair_comp()
    {
		$customer = Auth::user();

		return view('cust/cust_repair_comp');

    }


/***************************************************
* お客様 保証書
****************************************************/
    public function cust_warranty(Request $request)
    {
        
		$customer = Auth::user();

		$prodList = "";
		if ( !empty($request->prod_list_id) ) {
			$prodList = ProdList::join('products','prod_lists.product_id','products.id')
			->where('prod_lists.id', $request->prod_list_id)
			->selectRaw('prod_lists.*, products.name as prod_name')
			->first();
		}
		
		$pdf = \PDF::loadView('pdf_templates.cust_warranty',
			[
			'customer' => $customer, 
			'prodList' => $prodList,
			],
		);
		$pdf->setPaper('A4');
		
		return $pdf->stream('cust_warranty.pdf');

    }


/***************************************************
* お客様 ライセンス
****************************************************/
    public function cust_license(Request $request)
    {
        
		$customer = Auth::user();

		$prodList = "";
		if ( !empty($request->prod_list_id) ) {
			$prodList = ProdList::join('products','prod_lists.product_id','products.id')
			->where('prod_lists.id', $request->prod_list_id)
			->selectRaw('prod_lists.*, products.name as prod_name')
			->first();
		}
		
		$pdf = \PDF::loadView('pdf_templates.cust_license',
			[
			'customer' => $customer, 
			'prodList' => $prodList,
			],
		);
		$pdf->setPaper('A4');
		
		return $pdf->stream('cust_license.pdf');

    }


}
