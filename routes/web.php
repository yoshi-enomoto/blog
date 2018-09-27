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
    return view('welcome');
});

Route::resource('posts', 'PostController');
  // 『resource』で生成した場合、自動的にnameの設定がされている。
  // 第三引数にonly、exceptの使用が可能
  // 『Route::resource('hoge', 'HogeController', ['only' => ['index', 'create', 'edit', 'store', 'destroy']]);』

// 基本routeを単体で生成する場合
// Route::get('/posts', 'PostsController@index');
// Route::get('/posts/{post}', 'PostsController@show')->where('post','[0-9]+');
   // idのみを取得する様に制限をかける。
   // 正規表現により、postに入る値を数字のみ受け付ける処理をさせる。
// Route::get('/posts/create', 'PostsController@create');
// Route::post('/posts', 'PostsController@store');
// Route::get('/posts/{post}/edit', 'PostsController@edit');
// Route::patch('/posts/{post}', 'PostsController@update');
// Route::delete('/posts/{post}', 'PostsController@destroy');
