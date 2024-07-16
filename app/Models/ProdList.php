<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdList extends Model
{
	use SoftDeletes;

//     protected $table = 'prod_lists';

	protected $guarded = [
        'id',
    ];

}
