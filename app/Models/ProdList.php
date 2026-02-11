<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Customer;
use App\Models\Product;

class ProdList extends Model
{
	use SoftDeletes;

//     protected $table = 'prod_lists';

	public $product;

	protected $guarded = [
        'id',
    ];


/*************************************
* 顧客名取得
**************************************/
	public function getCustomerName()
	{
		$result = null;

		if (!empty($this->customer_id)) {
			$temp = Customer::find($this->customer_id);
			$result = $temp->name;
		}

		return $result;
	}


/*************************************
* 製品名取得
**************************************/
	public function getProduct()
	{
		$this->prod = null;

		if (!empty($this->product_id)) {
			$this->prod = Product::find($this->product_id);
		}
	}


}
