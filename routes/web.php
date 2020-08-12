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
	Route::get('/product-images/delete/{id}', 'ProductController@destroy_image');

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

	Route::get('/configurations','ConfigurationController@index')->name('admin.configurations.index');
	Route::get('/configurations/edit/{id}','ConfigurationController@edit')->name('admin.configurations.edit');
	Route::put('/configurations/{id}', 'ConfigurationController@update')->name('admin.configurations.update');

	Route::get('/contacts','ContactController@index')->name('admin.contacts.index');

	Route::get('/orders', 'OrderController@index')->name('admin.orders.index');
	Route::get('/orders/status/{status}', 'OrderController@searchByStatus');
	Route::get('/orders/search', 'OrderController@search');
	Route::get('/orders/edit/{id}', 'OrderController@edit')->name('admin.orders.edit');
	Route::get('/orders/{id}', 'OrderController@show')->name('admin.orders.show');
	Route::put('/orders/{id}', 'OrderController@update')->name('admin.orders.update');
	Route::delete('/orders/{id}', 'OrderController@destroy')->name('admin.orders.delete');

	Route::get('/banners', 'BannerController@index')->name('admin.banners.index');
	Route::get('/banners/create', 'BannerController@create')->name('admin.banners.create');
	Route::post('/banners', 'BannerController@store')->name('admin.banners.store');
	Route::get('/banners/edit/{id}', 'BannerController@edit')->name('admin.banners.edit');
	Route::put('/banners/{id}', 'BannerController@update')->name('admin.banners.update');
	Route::delete('/banners/{id}', 'BannerController@destroy')->name('admin.banners.delete');
});


Route::get('/product/{id}','ProductController@show')->name('product.show');


Route::get('/products/{id}','ProductController@show')->name('product.show');
Route::get('/blogs','BlogController@show')->name('blog.show');
Route::get('/blog/{id}','BlogController@ShowBlogById')->name('blog.show.by.id');
Route::prefix('api')->group(function ()
{
	Route::get('/products/search/{key}', 'HomeController@searchByName');
});
