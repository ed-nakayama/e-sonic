<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

use App\Models\ProdType;
use App\Models\ProdCat;
use App\Models\AccessReferer;

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

		$referer = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

		$appUrl = config('app.url');

		if ( !empty($referer)
			&& (strpos($referer ,$appUrl) === false)
			&& (strpos($referer ,'https://www.aci7.com') === false)
			&& (strpos($referer ,'http://www.aci7.com') === false)
			&& (strpos($referer ,'https://www.e-sonic.co.jp') === false)
			&& (strpos($referer ,'http://www.e-sonic.co.jp') === false)
			&& (strpos($referer ,'http://e-sonic.co.jp') === false) ) {
			$url_info = parse_url($referer);
			$root_url = $url_info['scheme'] . '://' . $url_info['host'];
		
			session()->put('lp_ref', $referer);

			AccessReferer::create([
				'url' => $root_url,
			]);
		}


		view()->share('prodTypeList', ProdType::orderBy('id')->get());
		view()->share('prodCatList', ProdCat::orderBy('id')->get());

    }
}
