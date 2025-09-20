<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessReferer extends Model
{
	const UPDATED_AT = null;

    protected $table = 'access_referer';

	protected $guarded = [
        'id',
    ];

}
