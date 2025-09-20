<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InqueryReferer extends Model
{
	const UPDATED_AT = null;

    protected $table = 'inquery_referer';

	protected $guarded = [
        'id',
    ];

}
