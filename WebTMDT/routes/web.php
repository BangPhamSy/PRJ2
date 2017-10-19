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
Route::get('index',function(){
	return view('pages_client.trangchu');
});
Route::get('login',function(){
	return view('pages_client.login');
});
Route::get('shop',function(){
	return view('pages_client.shop');
});
Route::get('blog',function(){
	return view('pages_client.blog');
});
Route::get('cart',function(){
	return view('pages_client.cart');
});
Route::get('contact',function(){
	return view('pages_client.contact');
});
Route::get('product_detail',function(){
	return view('pages_client.product_detail');
});
Route::get('checkout',function(){
	return view('pages_client.checkout');
});
Route::get('blog_single',function(){
	return view('pages_client.blog_single');
});





