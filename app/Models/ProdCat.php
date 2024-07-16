<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdCat extends Model
{
	use SoftDeletes;

//     protected $table = 'prod_cats';

	protected $guarded = [
        'id',
    ];

}
