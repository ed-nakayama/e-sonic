<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/corporate/outline', function () { 
    return view('corporate_outline');
});
Route::get('/corporate/policy', function () { 
    return view('corporate_policy');
});
Route::get('/corporate/access', function () { 
    return view('corporate_access');
});


Route::get('/service', function () { 
    return view('service');
});

Route::get('/casestudy/case01', function () { 
    return view('casestudy_case01');
});
Route::get('/casestudy/case02', function () { 
    return view('casestudy_case02');
});

// LP
Route::get('/parametric', function () { 
    return view('parametric');
});
Route::get('/beacon', function () { 
    return view('beacon');
});

Route::get ('/lp/confirm', 'LPController@confirm');
Route::post('/lp/confirm', 'LPController@confirm');
Route::post('/lp/complete', 'LPController@complete');
Route::get ('/lp/complete', function () { 
    return view('lp_complete');
})->name('lp.finish');


Route::get('/contact', 'ContactController@index');
Route::get('/contact/confirm', 'ContactController@confirm');
Route::post('/contact/confirm', 'ContactController@confirm');
Route::get('/contact/complete', 'ContactController@complete');
Route::post('/contact/complete', 'ContactController@complete');
Route::get('/contact/finish', 'ContactController@finish')->name('contact.finish');


Route::get('/cust', 'Cust\Auth\LoginController@showLoginForm')->name('cust.index');
Route::post('/cust', 'Cust\Auth\LoginController@login')->name('cust.login');

Route::get('/admin', 'Admin\Auth\LoginController@showLoginForm')->name('admin.index');
Route::post('/admin', 'Admin\Auth\LoginController@login')->name('admin.login');


/******************************************
* 顧客
*******************************************/
Route::namespace('Cust')->prefix('cust')->name('cust.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => false,
        'reset'    => true,
        'verify'   => false
    ]);
/*
    // ログイン認証後
    Route::middleware('auth:cust')->group(function () {

        // TOPページ
        Route::resource('mypage', 'MypageController', ['only' => 'index']);
    });
*/

});

	// パスワード忘れ
	Route::post('cust/password/reset', 'Cust\ResetPasswordController@reset')->name('cust.password.reupdate');
	Route::get('cust/password/reset', 'Cust\ForgotPasswordController@showLinkRequestForm')->name('cust.password.request');
	Route::post('cust/password/email', 'Cust\ForgotPasswordController@sendResetLinkEmail')->name('cust.password.email');
	Route::get('cust/password/reset/{token}', 'Cust\ResetPasswordController@showResetForm')->name('cust.password.reset');
	Route::get('cust/password/complete', 'Cust\ResetCompleteController@index')->name('cust.password.complete');


Route::group(['prefix' => 'cust'], function(){

	// マイページ
	Route::get('/mypage', 'Cust\MypageController@index')->name('cust.mypage');

	Route::get('/mypage/edit', 'Cust\MypageController@cust_edit')->name('cust.mypage.edit');
	Route::post('/mypage/edit', 'Cust\MypageController@cust_edit');
	Route::get('/mypage/store', 'Cust\MypageController@cust_store')->name('cust.mypage.store');
	Route::post('/mypage/store', 'Cust\MypageController@cust_store');

	// パスワード変更
	Route::get('/password/edit', 'Cust\CustController@editPassword')->name('cust.password.edit');
	Route::post('/password/', 'Cust\CustController@updatePassword')->name('cust.password.update');

	// メールアドレス変更
	Route::post('/email/change', 'Cust\ChangeEmailController@sendChangeEmailLink');
	Route::get('/reset/{token}', 'Cust\ChangeEmailController@reset');

	// 修理依頼
	Route::get('/repair', 'Cust\MypageController@cust_repair')->name('cust.repair');
	Route::post('/repair', 'Cust\MypageController@cust_repair');
	Route::get('/repair/send', 'Cust\MypageController@cust_repair_send')->name('cust.repair.send');
	Route::post('/repair/send', 'Cust\MypageController@cust_repair_send');
	Route::get('/repair/comp', 'Cust\MypageController@cust_repair_comp')->name('cust.repair.comp');

	Route::get('/download/pub', 'Cust\DownloadController@pub')->name('cust.download.pub');
	Route::post('/download/pub', 'Cust\DownloadController@pub');

	Route::get('/download/secure', 'Cust\DownloadController@secure')->name('cust.download.secure');
	Route::post('/download/secure', 'Cust\DownloadController@secure');

	// 保証書
	Route::get('/warranty', 'Cust\MypageController@cust_warranty')->name('cust.warranty');
	Route::post('/warranty', 'Cust\MypageController@cust_warranty');

	// ライセンス
	Route::get('/license', 'Cust\MypageController@cust_license')->name('cust.license');
	Route::post('/license', 'Cust\MypageController@cust_license');

});


/******************************************
* 管理者
*******************************************/
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => false,
        'reset'    => true,
        'verify'   => false
    ]);

});


Route::group(['prefix' => 'admin'], function(){

	// マイページ
	Route::get('/mypage', 'Admin\MypageController@index')->name('admin.mypage');

	// 編集
	Route::get('/cust/edit', 'Admin\MypageController@cust_edit')->name('admin.cust.edit');
//	Route::post('/cust/edit', 'Admin\MypageController@cust_edit');
	Route::get('/cust/store', 'Admin\MypageController@cust_store')->name('admin.cust.store');
	Route::post('/cust/store', 'Admin\MypageController@cust_store');

	// 案内状
	Route::get('/cust/guide', 'Admin\MypageController@cust_guide')->name('admin.cust.guide');
	Route::post('/cust/guide', 'Admin\MypageController@cust_guide');

	// 保有製品
	Route::get('/cust/hold', 'Admin\MypageController@cust_hold')->name('admin.cust.hold');
	Route::get('/cust/hold/save', 'Admin\MypageController@cust_hold_save')->name('admin.cust.hold.save');
	Route::post('/cust/hold/save', 'Admin\MypageController@cust_hold_save');

	// 製品マスタ
	Route::get('/product', 'Admin\ProductController@index')->name('admin.product');
	Route::post('/product', 'Admin\ProductController@index');

	Route::get('/product/store', 'Admin\ProductController@store')->name('admin.product.store');
	Route::post('/product/store', 'Admin\ProductController@store');

});

