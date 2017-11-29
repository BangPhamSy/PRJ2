<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Session;
use Hash;
use Auth;
use App\Shop;
use App\taoshop;
use App\Sanpham;
use App\Loaisanpham;
use App\Tichdiem;
use App\Donhang;
use Cart;

class pagesController extends Controller
{
   
    public function post_dangki(Request $request){
    	$this->validate($request,
    		[
    			'email'		=>'required|email|unique:users,email',
    			'password'	=>'required|min:6|max:20',
    			'name'	=>'required|unique:users,name',
    		],

    		[
    			'email.required'	=>'Vui lòng nhập email',
    			'email.email'		=>'Không đúng định dạng email',
    			'email.unique'		=>'Email đã có người sử dụng',
                'name.unique'       =>'Tên đã có người sử dụng',
    			'password.required'	=>'Vui lòng nhập password',
    			'name.required'		=>'Vui lòng nhập tên',
                'name.unique'       =>'Tên tài khoản đã tồn tại',
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


    public function trangchu(){
        $danhsach = Sanpham::where('tilekhuyenmai','>','0')->paginate(6);
        $sanphammoi = Sanpham::where('trangthai','1')->paginate(6);
        return view('pages_client.trangchu',compact('danhsach','sanphammoi'));
    }
    public function loaisanpham($id){
        $tenlsp = Loaisanpham::find($id);
        $loaisanpham = Sanpham::where('loaisanpham_id',$id)->paginate(6);
         return view('pages_client.loaisanpham',compact('loaisanpham','tenlsp'));
    }
    public function thuonghieu($tenth)
    {
        $tenth = $tenth;
        $thuonghieu = Sanpham::where('hangsx',$tenth)->paginate(6);
        return view('pages_client.thuonghieu',compact('thuonghieu','tenth'));
    }

    public function xemSanPham($id){
        $sanpham = Sanpham::find($id);
        return view('pages_client.product_detail',compact('sanpham'));
    }
    public function gioHang(){
        $content = Cart::content();
        $total_money = Cart::subtotal();
        return view('pages_client.cart',compact('spmua','content','total_money'));
    }
    public function themgiohang($idsp){
        $spmua = Sanpham::where('id',$idsp)->first();
        Cart::add(
                    array(
                        'id'    =>$idsp,
                        'name'  =>$spmua->tensanpham,
                        'qty'   =>1,
                        'price' =>$spmua->gia,
                        'options'
                                =>array('img'=>$spmua->hinhanh)
                    )
                );
        return redirect()->back();
    }
    public function xoa_san_pham($id){
        $remove = Cart::remove($id);
        return redirect()->back();
    }
    public function thongtindonhang(){
       $diemthuong = Tichdiem::where('user_id',2)->first();
       if(0<$diemthuong->diem&&$diemthuong->diem<30)
       {
            $tienquydoi = 20000;
       }
       else if(30<$diemthuong->diem&&$diemthuong->diem<60)
       {
            $tienquydoi = 30000;
       }
       else if(60<$diemthuong->diem&&$diemthuong->diem<100)
       {
            $tienquydoi = 50000;
       }
       else
            $tienquydoi = 70000;
        view()->share('diemthuong',$diemthuong);
        
        return view('pages_client.checkout',compact('diemthuong','tienquydoi'));

    }
    public function postDonhang(Request $request)
    {
        $this->validate($request,
            [  
                'hoten'         => 'required',
                'email'         => 'required|email',
                'diachi'        =>'required',
                'sodienthoai'   =>'required'

            ],
            [
                'hoten.required'        =>'Bạn chưa điền tên',
                'email.required'        =>'Bạn chưa điền email',
                'diachi.required'       =>'Bạn chưa điền địa chỉ',
                'sodienthoai.required'  =>'Bạn cần điền số điện thoại'
            ]
            );


        $diemthuong = Tichdiem::where('user_id',2)->first();
       if(0<$diemthuong->diem&&$diemthuong->diem<30)
       {
            $tienquydoi = 20000;
       }
       else if(30<$diemthuong->diem&&$diemthuong->diem<60)
       {
            $tienquydoi = 30000;
       }
       else if(60<$diemthuong->diem&&$diemthuong->diem<100)
       {
            $tienquydoi = 50000;
       }
       else
            $tienquydoi = 70000;
        view()->share('diemthuong',$diemthuong);


        $total_money = floatval(preg_replace('/[^\d.]/', '',Cart::subtotal()));
        $donhang                = new Donhang();
        $donhang->user_id       = Auth::User()->id;
        $donhang->hoten         = $request->hoten;
        $donhang->email         = $request->email;
        $donhang->diachi        = $request->diachi;
        $donhang->ghichu        = $request->ghichu;
        $donhang->sodienthoai   = $request->sodienthoai;
        if($request->tichdiem==1)
        {
             $total_money = $total_money-$tienquydoi;
        }
        $donhang->tongtien      = $total_money;
        $donhang->save();

         return redirect()->back()->with('thanhcong','Đặt hàng thành công');
    }
}
