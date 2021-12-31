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
  Route::get('item/create','Admin\ItemlistController@add')->middleware('auth');
  Route::post('item/create','Admin\ItemlistController@create')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
