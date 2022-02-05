<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'],function() {
  Route::get('home', 'User\ItemListController@home')->name('home');
  Route::get('list/create', 'User\ItemListController@add');
  Route::post('list/create', 'User\ItemListController@create');
  Route::get('list', 'User\ItemListController@index');
});  

Route::group(['prefix' => 'admin'], function(){
  Route::get('home', 'Admin\HomeController@index')->name('admin.home');
  Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('login', 'Admin\LoginController@login')->name('admin.login');
  Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
  Route::get('register', 'Admin\RegisterController@showRegisterForm')->name('admin.register');
  Route::post('register', 'Admin\RegisterController@register')->name('adminauth.register');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'],function() {
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

