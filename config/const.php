<?php

use Illuminate\Support\Str;

return[

    'mail_from_address' => env('MAIL_FROM_ADDRESS'),

	
    // 管理画面用のクッキー名称、セッションテーブル名
    'session_cookie_admin' => env('SESSION_COOKIE_ADMIN', Str::slug(env('APP_NAME', 'laravel'), '_').'_session'),
    'ssession_table_admin' => env('SESSION_TABLE_ADMIN'),

    'session_cookie_cust' => env('SESSION_COOKIE_CUST', Str::slug(env('APP_NAME', 'laravel'), '_').'_session'),
    'ssession_table_cust' => env('SESSION_TABLE_CUST'),
];
