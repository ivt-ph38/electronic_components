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

//Reset password

Route::get('account/forget-password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('account/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('account/forget-password/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('account/forget-password', 'Auth\ResetPasswordController@reset');

/* -------------------------------------------------------------------------- */

Route::prefix('admin')->group(function ()
{

	Route::get('/product', 'ProductController@index')->name('admin.products.index')->middleware('auth','clearance');
	Route::get('/product/search', 'ProductController@search')->name('live_search.action')->middleware('auth','clearance');
	Route::get('/product/create', 'ProductController@create')->name('admin.products.create')->middleware('auth','clearance');
	Route::post('/product', 'ProductController@store')->name('admin.products.store')->middleware('auth','clearance');
	Route::get('/product/edit/{id}', 'ProductController@edit')->name('admin.products.edit')->middleware('auth','clearance');
	Route::put('/product/{id}', 'ProductController@update')->name('admin.products.update')->middleware('auth','clearance');
	Route::get('copy/product/{id}','ProductController@copy')->name('admin.products.copy')->middleware('auth','clearance');
	Route::put('copy/product/{id}', 'ProductController@clone')->name('admin.products.clone')->middleware('auth','clearance');
	Route::patch('copy/product/{id}', 'ProductController@clone')->name('admin.products.clone')->middleware('auth','clearance');
	Route::delete('/product/{id}', 'ProductController@destroy')->name('admin.products.delete')->middleware('auth','clearance');
	Route::get('/product-images/delete/{id}', 'ProductController@destroy_image')->middleware('auth','clearance');

	Route::get('/categories', 'CategoryController@index')->name('admin.categories.index')->middleware('auth','clearance');
	Route::get('/categories/create', 'CategoryController@create')->name('admin.categories.create')->middleware('auth','clearance');
	Route::post('/categories', 'CategoryController@store')->name('admin.categories.store')->middleware('auth','clearance');
	Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('admin.categories.edit')->middleware('auth','clearance');
	Route::put('/categories/{id}', 'CategoryController@update')->name('admin.categories.update')->middleware('auth','clearance');
	Route::delete('/categories/{id}', 'CategoryController@destroy')->name('admin.categories.delete')->middleware('auth','clearance');

	Route::get('/blogs', 'BlogController@index')->name('admin.blogs.index')->middleware('auth','clearance');
	Route::get('/blogs/create', 'BlogController@create')->name('admin.blogs.create')->middleware('auth','clearance');
	Route::post('/blogs', 'BlogController@store')->name('admin.blogs.store')->middleware('auth','clearance');
	Route::get('/blogs/edit/{id}', 'BlogController@edit')->name('admin.blogs.edit')->middleware('auth','clearance');
	Route::put('/blogs/{id}', 'BlogController@update')->name('admin.blogs.update')->middleware('auth','clearance');
	Route::delete('/blogs/{id}', 'BlogController@destroy')->name('admin.blogs.delete')->middleware('auth','clearance');

	Route::get('/configurations','ConfigurationController@index')->name('admin.configurations.index')->middleware('auth','clearance');
	Route::get('/configurations/edit/{id}','ConfigurationController@edit')->name('admin.configurations.edit')->middleware('auth','clearance');
	Route::put('/configurations/{id}', 'ConfigurationController@update')->name('admin.configurations.update')->middleware('auth','clearance');

	Route::get('/contacts','ContactController@index')->name('admin.contacts.index')->middleware('auth','clearance');
	Route::get('/contacts/{id}','ContactController@show')->name('admin.contacts.show')->middleware('auth','clearance');
	Route::delete('/contacts/{id}','ContactController@destroy')->name('admin.contacts.delete')->middleware('auth','clearance');

	Route::get('/orders', 'OrderController@index')->name('admin.orders.index')->middleware('auth','clearance');
	Route::get('/orders/status/{status}', 'OrderController@searchByStatus')->middleware('auth','clearance');
	Route::get('/orders/search', 'OrderController@search')->middleware('auth','clearance');
	Route::get('/orders/edit/{id}', 'OrderController@edit')->name('admin.orders.edit')->middleware('auth','clearance');
	Route::get('/orders/{id}', 'OrderController@show')->name('admin.orders.show')->middleware('auth','clearance');
	Route::put('/orders/{id}', 'OrderController@update')->name('admin.orders.update')->middleware('auth','clearance');
	Route::delete('/orders/{id}', 'OrderController@destroy')->name('admin.orders.delete')->middleware('auth','clearance');
  
	Route::get('/product', 'ProductController@index')->name('admin.products.index')->middleware('auth','clearance');
	Route::get('/product/create', 'ProductController@create')->name('admin.products.create')->middleware('auth','clearance');
	Route::post('/product', 'ProductController@store')->name('admin.products.store')->middleware('auth','clearance');
	Route::get('/product/edit/{id}', 'ProductController@edit')->name('admin.products.edit')->middleware('auth','clearance');
	Route::put('/product/{id}', 'ProductController@update')->name('admin.products.update')->middleware('auth','clearance');
	Route::get('copy/product/{id}','ProductController@copy')->name('admin.products.copy')->middleware('auth','clearance');
	Route::put('copy/product/{id}', 'ProductController@clone')->name('admin.products.clone')->middleware('auth','clearance');
	Route::patch('copy/product/{id}', 'ProductController@clone')->name('admin.products.clone')->middleware('auth','clearance');
	Route::delete('/product/{id}', 'ProductController@destroy')->name('admin.products.delete')->middleware('auth','clearance');
	Route::get('/product-images/delete/{id}', 'ProductController@destroy_image')->middleware('auth','clearance');

	Route::get('/categories', 'CategoryController@index')->name('admin.categories.index')->middleware('auth','clearance');
	Route::get('/categories/create', 'CategoryController@create')->name('admin.categories.create')->middleware('auth','clearance');
	Route::post('/categories', 'CategoryController@store')->name('admin.categories.store')->middleware('auth','clearance');
	Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('admin.categories.edit')->middleware('auth','clearance');
	Route::put('/categories/{id}', 'CategoryController@update')->name('admin.categories.update')->middleware('auth','clearance');
	Route::delete('/categories/{id}', 'CategoryController@destroy')->name('admin.categories.delete')->middleware('auth','clearance');

	Route::get('/blogs', 'BlogController@index')->name('admin.blogs.index')->middleware('auth','clearance');
	Route::get('/blogs/create', 'BlogController@create')->name('admin.blogs.create')->middleware('auth','clearance');
	Route::post('/blogs', 'BlogController@store')->name('admin.blogs.store')->middleware('auth','clearance');
	Route::get('/blogs/edit/{id}', 'BlogController@edit')->name('admin.blogs.edit')->middleware('auth','clearance');
	Route::put('/blogs/{id}', 'BlogController@update')->name('admin.blogs.update')->middleware('auth','clearance');
	Route::delete('/blogs/{id}', 'BlogController@destroy')->name('admin.blogs.delete')->middleware('auth','clearance');

	Route::get('/configurations','ConfigurationController@index')->name('admin.configurations.index')->middleware('auth','clearance');
	Route::get('/configurations/edit/{id}','ConfigurationController@edit')->name('admin.configurations.edit')->middleware('auth','clearance');
	Route::put('/configurations/{id}', 'ConfigurationController@update')->name('admin.configurations.update')->middleware('auth','clearance');

	Route::get('/contacts','ContactController@index')->name('admin.contacts.index')->middleware('auth','clearance');

	Route::get('/orders', 'OrderController@index')->name('admin.orders.index')->middleware('auth','clearance');
	Route::get('/orders/status/{status}', 'OrderController@searchByStatus')->middleware('auth','clearance');
	Route::get('/orders/search', 'OrderController@search')->middleware('auth','clearance');
	Route::get('/orders/edit/{id}', 'OrderController@edit')->name('admin.orders.edit')->middleware('auth','clearance');
	Route::get('/orders/{id}', 'OrderController@show')->name('admin.orders.show')->middleware('auth','clearance');
	Route::post('/orders/{id}', 'OrderController@update')->name('admin.orders.update')->middleware('auth','clearance');
	Route::delete('/orders/{id}', 'OrderController@destroy')->name('admin.orders.delete')->middleware('auth','clearance');

	Route::get('/banners', 'BannerController@index')->name('admin.banners.index')->middleware('auth','clearance');
	Route::get('/banners/create', 'BannerController@create')->name('admin.banners.create')->middleware('auth','clearance');
	Route::post('/banners', 'BannerController@store')->name('admin.banners.store')->middleware('auth','clearance');
	Route::get('/banners/edit/{id}', 'BannerController@edit')->name('admin.banners.edit')->middleware('auth','clearance');
	Route::put('/banners/{id}', 'BannerController@update')->name('admin.banners.update')->middleware('auth','clearance');
	Route::delete('/banners/{id}', 'BannerController@destroy')->name('admin.banners.delete')->middleware('auth','clearance');

	Route::get('/users','UserController@index')->name('admin.users.index')->middleware('auth','clearance');
	Route::get('/users/edit/{id}','UserController@edit')->name('admin.users.edit')->middleware('auth','clearance');
	Route::put('/users/{id}','UserController@update')->name('admin.users.update')->middleware('auth','clearance');
	Route::get('/users/search','UserController@search')->name('admin.users.search')->middleware('auth','clearance');
	Route::delete('/users/{id}','UserController@destroy')->name('admin.users.delete')->middleware('auth','clearance');

	Route::get('/posts','PostController@index')->name('admin.posts.index')->middleware('auth','clearance');
	Route::get('/posts/create','PostController@create')->name('admin.posts.create')->middleware('auth','clearance');
	Route::post('/posts','PostController@store')->name('admin.posts.store')->middleware('auth','clearance');
	Route::get('/posts/edit/{id}','PostController@edit')->name('admin.posts.edit')->middleware('auth','clearance');
	Route::put('/posts/{id}','PostController@update')->name('admin.posts.update')->middleware('auth','clearance');
	Route::delete('/posts/{id}','PostController@destroy')->name('admin.posts.delete')->middleware('auth','clearance');

	Route::get('/comments', 'CommentController@index')->name('admin.comments.index')->middleware('auth','clearance');
	Route::delete('/comments/{id}', 'CommentController@destroy')->name('admin.comments.delete')->middleware('auth','clearance');

});


Route::get('/product/{id}','ProductController@show')->name('product.show');


Route::get('/products/{id}','ProductController@show')->name('product.show');
Route::get('/blogs','BlogController@show')->name('blog.show');
Route::get('/blog/{id}','BlogController@ShowBlogById')->name('blog.show.by.id');

Route::get('/post/{id}','PostController@show')->name('post.show');

Route::prefix('api')->group(function ()
{
	Route::get('/products/search/{key}', 'HomeController@searchByName');
});

//comments
Route::post('/comments', 'CommentController@store')->name('comments.store');
Route::get('/api/comments/get-comments', 'CommentController@getComments');
