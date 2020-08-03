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
Route::get('/categories/{id}/products', 'HomeController@listProductsByCategory')->name('categories.products');
Route::get('/categories/{id}/products/{groupby}/{orderby}', 'HomeController@listProductsByCategory')->name('categories.products.filter');

//Shopping cart
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/add-to-cart/{id}', 'CartController@addToCart')->name('addToCart');
Route::post('api/cart/remove-item', 'CartController@remove');

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

	Route::get('/categories', 'CategoryController@index')->name('admin.categories.index');
	Route::get('/categories/create', 'CategoryController@create')->name('admin.categories.create');
	Route::post('/categories', 'CategoryController@store')->name('admin.categories.store');
	Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('admin.categories.edit');
	Route::put('/categories/{id}', 'CategoryController@update')->name('admin.categories.update');
	Route::delete('/categories/{id}', 'CategoryController@destroy')->name('admin.categories.delete');

	Route::get('/blogs', 'BlogController@index')->name('admin.blogs.index');
	Route::get('/blogs/create', 'BlogController@create')->name('admin.blogs.create');
	Route::post('/blogs', 'BlogController@store')->name('admin.blogs.store');
	Route::get('/blogs/edit/{id}', 'BlogController@edit')->name('admin.blogs.edit');
	Route::put('/blogs/{id}', 'BlogController@update')->name('admin.blogs.update');
	Route::delete('/blogs/{id}', 'BlogController@destroy')->name('admin.blogs.delete');
});

Route::prefix('api')->group(function ()
{
	Route::get('/products/search/{key}', 'HomeController@searchByName');
});