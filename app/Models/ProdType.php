<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdType extends Model
{
	use SoftDeletes;

//     protected $table = 'prod_types';

	protected $guarded = [
        'id',
    ];

}
