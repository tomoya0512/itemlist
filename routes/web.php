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

route::group(['prefix' => 'admin'],
function() {
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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
