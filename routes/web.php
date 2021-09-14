<?php

use Illuminate\Support\Facades\Route;

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
//根路由

//【第3章 - Laravel実践 - 第5部 - ルーティング】
//3.「http://XXXXXX.jp/XXX というアクセスが来たときに、 AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください

// Route::group(['prefix' => 'XXX'], function() {
//      Route::get('',  'XXX\AAAController@bbb');
// });

// ４．【応用】 前章でAdmin/ProfileControllerを作成し、add Action, edit Actionを追加しました。web.phpを編集して、getメソッドでadmin/profile/create にアクセスしたら ProfileController の add Action に、admin/profile/edit にアクセスしたら ProfileController の edit Action に割り当てるように設定してください
// Route::group(['prefix' => 'admin'], function() {
//      Route::get('profile/create','Admin\ProfileController@add');
//      Route::get('profile/edit',  'Admin\ProfileController@edit');

Route::get('/', function () {
     return view('welcome');
});

// Route::group(['prefix' => 'admin'], function() {
//      Route::get('news/create', 'Admin\NewsController@add');
//      Route::post('news/create', 'Admin\NewsController@create');
//  });

Route::group(['prefix' => 'admin'], function() {
     Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
     Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
     Route::get('news', 'Admin\NewsController@index')->middleware('auth'); // 追記
     Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth'); // 追記
     Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth'); 
     Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
});// 追記


// Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
//      Route::get('news/create', 'Admin\NewsController@add');
//      Route::post('news/create', 'Admin\NewsController@create'); 
//      Route::get('news', 'Admin\NewsController@index')->middleware('auth');# 追記
// });


// Route::group(['prefix' => 'admin'], function() {
//      Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
//      Route::get('news/edit',  'Admin\NewsController@add')->middleware  ('auth');
//  });

 Route::group(['prefix' => 'admin'], function() {
     Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
    Route::post('profile/create', 'Admin\ProfileController@create')->middleware('auth');
    Route::get('profile', 'Admin\ProfileController@index')->middleware('auth');
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth'); 
    Route::post('profile/edit', 'Admin\ProfileController@update')->middleware('auth');
});






// 【第3章 - Laravel実践 - 第9部 - ニュース投稿画面】
// 2.【応用】 routes/web.php を編集して、 admin/profile/create に POSTメソッドでアクセスしたら ProfileController の create Action に割り当てるように設定してください

// Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
//      Route::get('news/create', 'Admin\profileController@add');
//      Route::post('news/create', 'Admin\profileController@create');
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'NewsController@index');

