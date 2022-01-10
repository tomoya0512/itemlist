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
  Route::get('category/create','Admin\CategoryController@add')->middleware('auth');
  Route::post('category/create','Admin\CategoryController@create')->middleware('auth');
  Route::get('category', 'Admin\CategoryController@index')->middleware('auth');
  Route::get('category/edit', 'Admin\CategoryController@edit')->middleware('auth');
  Route::post('category/edit', 'Admin\CategoryController@update')->middleware('auth');
  Route::get('category/delete', 'Admin\CategoryController@delete')->middleware('auth');
  Route::get('item/create','Admin\ItemController@add')->middleware('auth');
  Route::post('item/create','Admin\ItemController@create')->middleware('auth');
  Route::get('item', 'Admin\ItemController@index')->middleware('auth');
  Route::get('item/edit', 'Admin\ItemController@edit')->middleware('auth');
  Route::post('item/edit', 'Admin\ItemController@update')->middleware('auth');
  Route::get('item/delete', 'Admin\ItemController@delete')->middleware('auth');
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
