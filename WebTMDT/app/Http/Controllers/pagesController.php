<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Session;
use Hash;
use Auth;
use App\taoshop;

class pagesController extends Controller
{
    public function post_dangki(Request $request){
    	$this->validate($request,
    		[
    			'email'		=>'required|email|unique:users,email',
    			'password'	=>'required|min:6|max:20',
    			'name'	=>'required',
    		],

    		[
    			'email.required'	=>'Vui lòng nhập email',
    			'email.email'		=>'Không đúng định dạng email',
    			'email.unique'		=>'Email đã có người sử dụng',
    			'password.required'	=>'Vui lòng nhập password',
    			'name.required'		=>'Vui lòng nhập tên',
    			'password.min'		=>'Mật khẩu ít nhất 6 kí tự'
    		]
    	);
    	$users = new Users();
    	$users->name 	= $request->name;
    	$users->email   =$request->email;
    	$users->password= Hash::make($request->password);
    	$users->diachi = $request->address;
    	$users->sodienthoai   =$request->phone;
    	$users->role_id = 1; 
    	$users->save();
    	return redirect()->back()->with('thanhcong','tạo tài khoản thành công');
    }
    public function dangki(){
    	return view('pages_client.dangki');
    }

    public function post_dangnhap(Request $request){
    	$this->validate($request,[
    		'email' 	=>'required',
    		'password'	=>'required'
    	],
    	[
    		'email.required' => 'Vui lòng nhập email!',
    		'password.required'=>'Vui lòng nhập mật khẩu'
    	]);
    	$credentials = array('email'=>$request->email,'password'=>$request->password);
    	$check_admin = array('email'=>$request->email,'password'=>$request->password,'role_id'=>4);
    	if(Auth::attempt($check_admin))
    		return redirect()->route('page_admin');
    	else if(Auth::attempt($credentials))
    		return redirect()->route('index');
    	else
    		return redirect()->back()->with('message','Đăng nhập thất bại!');
    }
    
    public function dangnhap(){
    	return view('pages_client.login');
    }
    public function dangxuat(){
    	Auth::logout();
    	return redirect()->route('index');
    }
    public function taoshop(){
    	return view('pages_client.taoshop');
    }
    public function qlshop(){
    	return view('pages_shop.qldonhang_shop');
    }
    public function post_createshop(Request $request){
    	$this->validate($request,[
    		'tenshop' =>'required|unique:shop,tenshop'
    	],
    	[
    		'tenshop.required'=>'Vui lòng nhập tên shop',
    		'tenshop.unique'	=>'Shop đã tồn tại,vui lòng chọn tên khác'
    	]
    	);
    	$shop = new taoshop();
    	if(Auth::check())
    	{
    		$shop->user_id = Auth::User()->id;
	    	$shop->tenshop = $request->tenshop;
            $shop->name    = Auth::User()->name;
	    	$shop->save();
            
    	}
	    	
    	return redirect()->back()->with('success','Vui lòng đợi phê duyệt');
    }
}
