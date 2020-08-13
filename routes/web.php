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


Route::get('/','HomeController@index')->name('welcome');
Route::get('/categories/{id}/products', 'HomeController@listProductsByCategory')->name('categories.products');
Route::get('/categories/{id}/products/{groupby}/{orderby}', 'HomeController@listProductsByCategory')->name('categories.products.filter');

Route::get('/products','ProductController@listProducts')->name('all.product');
Route::get('/products/{groupby}/{orderby}', 'ProductController@listProducts')->name('categories.products.filter');

//Shopping cart
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/add-to-cart/{id}', 'CartController@addToCart')->name('addToCart');
Route::post('api/cart/remove-item', 'CartController@remove');
Route::post('api/cart/update-item', 'CartController@update');

//Checkout
Route::get('/checkout', 'OrderController@checkout_form')->name('checkout');
Route::post('/checkout', 'OrderController@store');
Route::get('/order/{code}', 'OrderController@show');

//Contacts
Route::get('/contacts','ContactController@create')->name('contacts.create');
Route::post('/contacts','ContactController@store')->name('contacts.store');

//Login
Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);

Route::get('register', 'Auth\RegisterController@getRegister')->name('register');
Route::post('register', 'Auth\RegisterController@postRegister');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/* -------------------------------------------------------------------------- */

Route::prefix('admin')->group(function ()
{

	Route::get('/product', 'ProductController@index')->name('admin.products.index')->middleware('auth');
	Route::get('/product/create', 'ProductController@create')->name('admin.products.create')->middleware('auth');
	Route::post('/product', 'ProductController@store')->name('admin.products.store')->middleware('auth');
	Route::get('/product/edit/{id}', 'ProductController@edit')->name('admin.products.edit')->middleware('auth');
	Route::put('/product/{id}', 'ProductController@update')->name('admin.products.update')->middleware('auth');
	Route::get('copy/product/{id}','ProductController@copy')->name('admin.products.copy')->middleware('auth');
	Route::put('copy/product/{id}', 'ProductController@clone')->name('admin.products.clone')->middleware('auth');
	Route::patch('copy/product/{id}', 'ProductController@clone')->name('admin.products.clone')->middleware('auth');
	Route::delete('/product/{id}', 'ProductController@destroy')->name('admin.products.delete')->middleware('auth');
	Route::get('/product-images/delete/{id}', 'ProductController@destroy_image')->middleware('auth');

	Route::get('/categories', 'CategoryController@index')->name('admin.categories.index')->middleware('auth');
	Route::get('/categories/create', 'CategoryController@create')->name('admin.categories.create')->middleware('auth');
	Route::post('/categories', 'CategoryController@store')->name('admin.categories.store')->middleware('auth');
	Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('admin.categories.edit')->middleware('auth');
	Route::put('/categories/{id}', 'CategoryController@update')->name('admin.categories.update')->middleware('auth');
	Route::delete('/categories/{id}', 'CategoryController@destroy')->name('admin.categories.delete')->middleware('auth');

	Route::get('/blogs', 'BlogController@index')->name('admin.blogs.index')->middleware('auth');
	Route::get('/blogs/create', 'BlogController@create')->name('admin.blogs.create')->middleware('auth');
	Route::post('/blogs', 'BlogController@store')->name('admin.blogs.store')->middleware('auth');
	Route::get('/blogs/edit/{id}', 'BlogController@edit')->name('admin.blogs.edit')->middleware('auth');
	Route::put('/blogs/{id}', 'BlogController@update')->name('admin.blogs.update')->middleware('auth');
	Route::delete('/blogs/{id}', 'BlogController@destroy')->name('admin.blogs.delete')->middleware('auth');

	Route::get('/configurations','ConfigurationController@index')->name('admin.configurations.index')->middleware('auth');
	Route::get('/configurations/edit/{id}','ConfigurationController@edit')->name('admin.configurations.edit')->middleware('auth');
	Route::put('/configurations/{id}', 'ConfigurationController@update')->name('admin.configurations.update')->middleware('auth');

	Route::get('/contacts','ContactController@index')->name('admin.contacts.index')->middleware('auth');
	Route::get('/contacts/{id}','ContactController@show')->name('admin.contacts.show')->middleware('auth');
	Route::delete('/contacts/{id}','ContactController@destroy')->name('admin.contacts.delete')->middleware('auth');

	Route::get('/orders', 'OrderController@index')->name('admin.orders.index')->middleware('auth');
	Route::get('/orders/status/{status}', 'OrderController@searchByStatus')->middleware('auth');
	Route::get('/orders/search', 'OrderController@search')->middleware('auth');
	Route::get('/orders/edit/{id}', 'OrderController@edit')->name('admin.orders.edit')->middleware('auth');
	Route::get('/orders/{id}', 'OrderController@show')->name('admin.orders.show')->middleware('auth');
	Route::put('/orders/{id}', 'OrderController@update')->name('admin.orders.update')->middleware('auth');
	Route::delete('/orders/{id}', 'OrderController@destroy')->name('admin.orders.delete')->middleware('auth');
  
	Route::get('/product', 'ProductController@index')->name('admin.products.index')->middleware('auth');
	Route::get('/product/create', 'ProductController@create')->name('admin.products.create')->middleware('auth');
	Route::post('/product', 'ProductController@store')->name('admin.products.store')->middleware('auth');
	Route::get('/product/edit/{id}', 'ProductController@edit')->name('admin.products.edit')->middleware('auth');
	Route::put('/product/{id}', 'ProductController@update')->name('admin.products.update')->middleware('auth');
	Route::get('copy/product/{id}','ProductController@copy')->name('admin.products.copy')->middleware('auth');
	Route::put('copy/product/{id}', 'ProductController@clone')->name('admin.products.clone')->middleware('auth');
	Route::patch('copy/product/{id}', 'ProductController@clone')->name('admin.products.clone')->middleware('auth');
	Route::delete('/product/{id}', 'ProductController@destroy')->name('admin.products.delete')->middleware('auth');
	Route::get('/product-images/delete/{id}', 'ProductController@destroy_image')->middleware('auth');

	Route::get('/categories', 'CategoryController@index')->name('admin.categories.index')->middleware('auth');
	Route::get('/categories/create', 'CategoryController@create')->name('admin.categories.create')->middleware('auth');
	Route::post('/categories', 'CategoryController@store')->name('admin.categories.store')->middleware('auth');
	Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('admin.categories.edit')->middleware('auth');
	Route::put('/categories/{id}', 'CategoryController@update')->name('admin.categories.update')->middleware('auth');
	Route::delete('/categories/{id}', 'CategoryController@destroy')->name('admin.categories.delete')->middleware('auth');

	Route::get('/blogs', 'BlogController@index')->name('admin.blogs.index')->middleware('auth');
	Route::get('/blogs/create', 'BlogController@create')->name('admin.blogs.create')->middleware('auth');
	Route::post('/blogs', 'BlogController@store')->name('admin.blogs.store')->middleware('auth');
	Route::get('/blogs/edit/{id}', 'BlogController@edit')->name('admin.blogs.edit')->middleware('auth');
	Route::put('/blogs/{id}', 'BlogController@update')->name('admin.blogs.update')->middleware('auth');
	Route::delete('/blogs/{id}', 'BlogController@destroy')->name('admin.blogs.delete')->middleware('auth');

	Route::get('/configurations','ConfigurationController@index')->name('admin.configurations.index')->middleware('auth');
	Route::get('/configurations/edit/{id}','ConfigurationController@edit')->name('admin.configurations.edit')->middleware('auth');
	Route::put('/configurations/{id}', 'ConfigurationController@update')->name('admin.configurations.update')->middleware('auth');

	Route::get('/contacts','ContactController@index')->name('admin.contacts.index')->middleware('auth');

	Route::get('/orders', 'OrderController@index')->name('admin.orders.index')->middleware('auth');
	Route::get('/orders/status/{status}', 'OrderController@searchByStatus')->middleware('auth');
	Route::get('/orders/search', 'OrderController@search')->middleware('auth');
	Route::get('/orders/edit/{id}', 'OrderController@edit')->name('admin.orders.edit')->middleware('auth');
	Route::get('/orders/{id}', 'OrderController@show')->name('admin.orders.show')->middleware('auth');
	Route::put('/orders/{id}', 'OrderController@update')->name('admin.orders.update')->middleware('auth');
	Route::delete('/orders/{id}', 'OrderController@destroy')->name('admin.orders.delete')->middleware('auth');

	Route::get('/banners', 'BannerController@index')->name('admin.banners.index')->middleware('auth');
	Route::get('/banners/create', 'BannerController@create')->name('admin.banners.create')->middleware('auth');
	Route::post('/banners', 'BannerController@store')->name('admin.banners.store')->middleware('auth');
	Route::get('/banners/edit/{id}', 'BannerController@edit')->name('admin.banners.edit')->middleware('auth');
	Route::put('/banners/{id}', 'BannerController@update')->name('admin.banners.update')->middleware('auth');
	Route::delete('/banners/{id}', 'BannerController@destroy')->name('admin.banners.delete')->middleware('auth');
});


Route::get('/product/{id}','ProductController@show')->name('product.show');


Route::get('/products/{id}','ProductController@show')->name('product.show');
Route::get('/blogs','BlogController@show')->name('blog.show');
Route::get('/blog/{id}','BlogController@ShowBlogById')->name('blog.show.by.id');
Route::prefix('api')->group(function ()
{
	Route::get('/products/search/{key}', 'HomeController@searchByName');
});
