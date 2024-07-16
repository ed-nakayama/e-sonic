<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

use App\Models\ProdType;
use App\Models\ProdCat;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        $url->forceScheme('https');
        //
/*
        // 管理画面用のクッキー名称、セッションテーブル名を変更する
        $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
//        if (strpos($uri, '/admin/') === 0 || $uri === '/admin') {
        if (strpos($uri, '/admin/') === 0) {
            config([
                'session.cookie' => config('const.session_cookie_admin'),
                'session.table' => config('const.ssession_table_admin'),
            ]);
            
//        } elseif (strpos($uri, '/cust/') === 0 || $uri === '/cust') {
        } elseif (strpos($uri, '/cust/') === 0 ) {
            config([
                'session.cookie' => config('const.session_cookie_cust'),
                'session.table' => config('const.ssession_table_cust'),
            ]);
        }
*/

		view()->share('prodTypeList', ProdType::orderBy('id')->get());
		view()->share('prodCatList', ProdCat::orderBy('id')->get());

    }
}
