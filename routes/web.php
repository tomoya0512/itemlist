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


/*
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return redirect('/home'); });


/*
|--------------------------------------------------------------------------
| 2) User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('home','UserController@home');
    Route::get('signup','UserController@signup');
});

/*
|--------------------------------------------------------------------------
| 4) Admin ログイン後
|--------------------------------------------------------------------------
*/
route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'],function() {
  Route::get('category/create','Admin\CategoryController@add');
  Route::post('category/create','Admin\CategoryController@create');
  Route::get('category', 'Admin\CategoryController@index');
  Route::get('category/edit', 'Admin\CategoryController@edit');
  Route::post('category/edit', 'Admin\CategoryController@update');
  Route::get('category/delete', 'Admin\CategoryController@delete');
  Route::get('item/create','Admin\ItemController@add');
  Route::post('item/create','Admin\ItemController@create');
  Route::get('item', 'Admin\ItemController@index');
  Route::get('item/edit', 'Admin\ItemController@edit');
  Route::post('item/edit', 'Admin\ItemController@update');
  Route::get('item/delete', 'Admin\ItemController@delete');

<<<<<<< HEAD
});

Auth::routes();

Route::group(['prefix' => 'admin'], function(){
    Route::get('home', 'Admin\HomeController@index')->name('admin_auth.home');
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin_auth.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login');
    Route::post('logout', 'Admin\LoginController@logout')->name('admin_auth.logout');
    Route::get('register', 'Admin\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('register', 'Admin\RegisterController@register')->name('admin_auth.register');
});
=======
  Route::get('home', 'AdminHomeController@index')->name('admin_auth.home');
  Route::get('login', 'AdminAuth\LoginController@showLoginForm')->name('admin_auth.login');
  Route::post('login', 'AdminAuth\LoginController@login')->name('admin_auth.login');
  Route::post('logout', 'AdminAuth\LoginController@logout')->name('admin_auth.logout');
  Route::get('register', 'AdminAuth\RegisterController@showRegisterForm')->name('admin_auth.register');
  Route::post('register', 'AdminAuth\RegisterController@register')->name('admin_auth.register');
});





Route::group(['prefix' => 'admin'], function() {
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});
Auth::routes();
>>>>>>> ee3b45f27350e4dc8ecf9f19a533c9279578f0de

Route::get('/home', 'HomeController@index')->name('home');
