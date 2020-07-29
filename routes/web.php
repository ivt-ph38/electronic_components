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


Route::get('/', 'HomeController@index')->name('welcome');

/* -------------------------------------------------------------------------- */

Route::prefix('admin')->group(function ()
{
	Route::get('/product', 'ProductController@index')->name('admin.products.index');

	Route::get('/product/create', 'ProductController@create')->name('admin.products.create');

	Route::post('/product', 'ProductController@store')->name('admin.products.store');

	Route::get('/product/edit/{id}', 'ProductController@edit')->name('admin.products.edit');

	Route::put('/product/{id}', 'ProductController@update')->name('admin.products.update');

	Route::get('copy/product/{id}','ProductController@copy')->name('admin.products.copy');

	Route::put('copy/product/{id}', 'ProductController@clone')->name('admin.products.clone');

	Route::patch('copy/product/{id}', 'ProductController@clone')->name('admin.products.clone');

	Route::delete('/product/{id}', 'ProductController@destroy')->name('admin.products.delete');

});

