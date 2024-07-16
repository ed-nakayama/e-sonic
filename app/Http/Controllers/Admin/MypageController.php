<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\Application;
use App\Mail\RepairRequest;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProdList;

use Hashids\Hashids;

class MypageController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$custList = Customer::orderBy('created_at', 'desc')
			->get();

		return view('admin/mypage' ,compact(
			'custList',
			));

    }


/***************************************************
* お客様情報 編集
****************************************************/
    public function cust_edit(Request $request)
    {
		if (empty($request->cust_id) ) {
			$customer = new Customer();
	} else {
			$customer = Customer::find($request->cust_id);
		}
		
		return view('admin/cust_edit' ,compact(
			'customer',
			));

    }


/***************************************************
* お客様情報 保存
****************************************************/
    public function cust_store(Request $request)
    {

		$validatedData = $request->validate([
			'name'        => ['required','string'],
			'name_kana'   => ['required','string'],
			'email'       => ['required', 'string', 'email', 'max:80',
							Rule::unique('customers', 'email')->whereNull('deleted_at')->ignore($request->cust_id)],
			'zip_code'    => ['required','string'],
			'address'     => ['required','string'],
			'person_name' => ['required','string'],
			'tel'         => ['required','string'],
		]);

		if (empty($request->cust_id) ) {

			$customer = Customer::create([
				'name'       => $request->name,
				'name_kana'   => $request->name_kana,
				'email'       => $request->email,
				'zip_code'    => $request->zip_code,
				'address'     => $request->address,
				'unit_name'   => $request->unit_name,
				'person_name' => $request->person_name,
				'tel'         => $request->tel,
			]);

			$customer = Customer::find($customer->id);
			$passIds = new Hashids(config('app.user_pass_salt'), 10);
			
			$pw_raw = $passIds->encode($customer->id);
			$customer->pw_raw = $pw_raw;
			$customer->password = Hash::make($pw_raw);

			$customer->save();

		} else {
			$customer = Customer::find($request->cust_id);

			$customer->name        = $request->name;
			$customer->name_kana   = $request->name_kana;
			$customer->email       = $request->email;
			$customer->zip_code    = $request->zip_code;
			$customer->address     = $request->address;
			$customer->unit_name   = $request->unit_name;
			$customer->person_name = $request->person_name;
			$customer->tel         = $request->tel;

			$customer->save();
		}

		return redirect('/admin/mypage');
    }


/***************************************************
* お客様情報 案内状
****************************************************/
    public function cust_guide(Request $request)
    {
		$customer = "";
		if ( !empty($request->cust_id) ) {
			$customer = Customer::find($request->cust_id);
		}
		
		$pdf = \PDF::loadView('pdf_templates.customer_guide',
			['customer' => $customer],
		);
		$pdf->setPaper('A4');
		
		return $pdf->download('customer_guide.pdf');

    }


/***************************************************
* お客様情報 保有製品
****************************************************/
    public function cust_hold(Request $request)
    {
		$customer = "";
		if ( !empty($request->cust_id) ) {
			$customer = Customer::find($request->cust_id);
		}

		$product = Product::get();

		$prodList = ProdList::leftJoin('products','prod_lists.product_id','=','products.id')
			->where('prod_lists.customer_id' ,$customer->id)
			->selectRaw("prod_lists.*, products.name as prod_name ,products.name as prod_name")
			->orderBy('buy_date')
			->orderBy('prod_type')
			->orderBy('cat_id')
			->get();

		return view('admin/cust_hold' ,compact(
			'customer',
			'prodList',
			'product',
			));
    }


/***************************************************
* お客様情報 保有製品 保存
****************************************************/
    public function cust_hold_save(Request $request)
    {

		if (empty($request->prod_list_id) ) {
			$validatedData = $request->validate([
				'new_cust_id'            => ['required','string'],
				'new_prod_id'            => ['required','string'],
				'new_buy_date'           => ['required','string'],
				'new_prod_num'           => ['required','string'],
				'new_prod_serial'        => ['required','string'],
			]);

			$prod_list = ProdList::create([
				'customer_id'        => $request->new_cust_id,
				'product_id'         => $request->new_prod_id,
				'buy_date'           => $request->new_buy_date,
				'prod_num'           => $request->new_prod_num,
				'prod_serial'        => $request->new_prod_serial,
				'support_start_date' => $request->new_support_start_date,
				'support_end_date'   => $request->new_support_end_date,
				'comment'            => $request->new_comment,
				'claim_no'           => $request->new_claim_no,
			]);

		} else {
			$validatedData = $request->validate([
				'cust_id'            => ['required','string'],
				'prod_id'            => ['required','string'],
				'buy_date'           => ['required','string'],
				'prod_num'           => ['required','string'],
				'prod_serial'        => ['required','string'],
			]);

			$prod_list = ProdList::find($request->prod_list_id);

			if (isset($request->del_flag)) {
				$prod_list->delete();

			} else {
				$prod_list->product_id         = $request->prod_id;
				$prod_list->buy_date           = $request->buy_date;
				$prod_list->prod_num           = $request->prod_num;
				$prod_list->prod_serial        = $request->prod_serial;
				$prod_list->support_start_date = $request->support_start_date;
				$prod_list->support_end_date   = $request->support_end_date;
				$prod_list->comment            = $request->comment;
				$prod_list->claim_no           = $request->claim_no;

				$prod_list->save();
			}
		}

		return redirect()->route('admin.cust.hold', ['cust_id' => $prod_list->customer_id ]);
    }

}
