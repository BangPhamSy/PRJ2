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
//===========================CLIENT====================================//
Route::get('/', function () {
    return view('welcome');
});
Route::get('index',function(){
	return view('pages_client.trangchu');
})->name('index');
Route::get('login',[
	'as'=>'login',
	'uses'=>'pagesController@dangnhap'
]);
/*Route::get('shop',[
	'as'=>'shop',
	'uses'=>'pagesController@shop'
]);
/*Route::get('blog',[
	return view('pages_client.blog');
]);*/
Route::get('giohang',[
	'as'=>'giohang',
	'uses'=>'pagesController@giohang'
]);
Route::get('contact',[
	'as'=>'contact',
	'uses'=>'pagesController@contact'
]);
Route::get('product_detail',[
	'as'=>'product_detail',
	'uses'=>'pagesController@chitietsanpham'
]);
Route::get('checkout',[
	'as'=>'product_detail',
	'uses'=>'pagesController@donhang'
]);
Route::get('blog_single',[
	'as'=>'product_detail',
	'uses'=>'pagesController@chitietsanpham'
]);
Route::get('dangki',[
	'as'	=>'dangki',
	'uses'	=>'pagesController@dangki'
]);
Route::post('dangki',[
	'as'	=>'dangki',
	'uses'	=>'pagesController@post_dangki'
]);
Route::get('dangnhap',[
	'as'	=>'dangnhap',
	'uses'	=>'pagesController@dangnhap'
]);
Route::post('dangnhap',[

	'as'	=>'dangnhap',
	'uses'	=>'pagesController@post_dangnhap'
]);
Route::get('dangxuat',[

	'as'	=>'dangxuat',
	'uses'	=>'pagesController@dangxuat'
]);
Route::get('taoshop',[
	'as'	=>'taoshop',
	'uses'	=>'pagesController@taoshop'
]);


Route::post('taoshop',[

	'as'	=>'taoshop',
	'uses'	=>'pagesController@post_createshop'
]);

//===========================SHOP=====================================//


Route::group(['prefix'=>'qlshop'],function(){

	Route::get('shop/{id}','ShopController@shop');
	Route::group(['prefix'=>'shop/{id}'],function(){

		Route::group(['prefix'=>'sanpham'],function(){
			Route::get('danhsach','ShopController@danhsach_sp');

			Route::get('them','ShopController@getProduct');
			Route::post('them','ShopController@postProduct');
		});

		Route::group(['prefix'=>'donhang'],function(){
			
		});

		Route::group(['prefix'=>'kho'],function(){
			
		});
		
	});

	
});




//===========================ADMIN====================================//
Route::get('page_admin',[
	'as'	=>'page_admin',
	'uses'	=>'AdminController@page_admin'
]);
Route::get('approve_shop',array(
		'as'=>'approve_shop',
		'uses'=>'AdminController@approve_shop'
));
Route::get('agree_shop/{id}',array(
		'as'=>'agree_shop',
		'uses'=>'AdminController@agree_shop'
));
Route::get('cancel_shop/{id}',array(
		'as'=>'cancel_shop',
		'uses'=>'AdminController@cancel_shop'
));
Route::get('management_shop',array(
		'as'=>'management_shop',
		'uses'=>'AdminController@management_shop'
));
Route::get('quantity_shop/{qt}',array(
		'as'=>'quantity_shop',
		'uses'=>'AdminController@quantity_shop'
));

Route::get('management_user',array(
		'as'=>'management_user',
		'uses'=>'AdminController@management_user'
));
Route::get('delete_user/{id}',array(
		'as'=>'delete_user',
		'uses'=>'AdminController@delete_user'
));

?>


