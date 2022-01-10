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
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
