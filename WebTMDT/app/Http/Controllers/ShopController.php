<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Shop;
use\App\Sanpham;
use\App\Loaisanpham;

class ShopController extends Controller
{
   public function shop($id){
        $shop = Shop::find($id);
        view()->share('shop',$shop);
        
    	return view('pages_shop.trangchu',['shop'=>$shop]);
    }

    //====================QUẢN LÝ SẢN PHẨM===========================//

    public function getProduct($id)
    {
        $shop = Shop::find($id);
        view()->share('shop',$shop);
        $loaisanpham  = Loaisanpham::all();
        return view('pages_shop.themsp_shop',compact('shop','loaisanpham'));
    }


    public function postProduct($id, Request $request)
    {
    	$shop = Shop::find($id);
        view()->share('shop',$shop);
    	$this->validate($request,
    		[
    			'tensanpham' => 'required|unique:sanpham,tensanpham',
    			'gia'		=>'required',
    		],
    		[
    			'tensanpham.required'=>'Tên sản phẩm không được bỏ trống',
    			'tensanpham.unique'=>'Tên sản phẩm đã tồn tại',
    			'gia.required'=>'Giá không được bỏ trống'

    		]);
        $new_product = new Sanpham();

        $new_product->shop_id 		= $shop->id;
        $new_product->tensanpham 	= $request->tensanpham;
        $new_product->gia 			= $request->gia;
        $new_product->mota 			= $request->mota;
        $new_product->tilekhuyenmai = $request->tilekhuyenmai;
        $new_product->loaisanpham_id= $request->loaisanpham;

        if($request->hasFile('hinhanh')){
        	$file = $request->file('hinhanh');
        	$duoi = $file->getClientOriginalExtension();
        	if($duoi != 'jpg' && $duoi != "png" && $duoi != "jpeg"){
        		return redirect()->back()->with('loi','Định dạng ảnh phải là jpg,png,jpeg');
        	}

        	$name = $file->getClientOriginalName();
        	$hinhanh= str_random(4)."_".$name;
        	while(file_exists("upload".$hinhanh)){
        		$hinhanh= str_random(4)."_".$name;
        	}
        	
        	$file->move("upload",$hinhanh);
        	$new_product->hinhanh = $hinhanh;
        }
        else
        {
        	$new_product->hinhanh = "";
        }
        

        $new_product->save();
        return redirect()->back()->with('thanhcong','Thêm sản phẩm thành công');
    }

     public function danhsach_sp($id)
    {
        $shop = Shop::find($id);
        view()->share('shop',$shop);

        $list_sp = Sanpham::where('shop_id',$id)->paginate(5);
        return view('pages_shop.danhsach_sp',compact('shop','list_sp'));
    }
    public function getUpdate($id,$idsp)
    {
    	$shop = Shop::find($id);
        view()->share('shop',$shop);
        $loaisanpham  = Loaisanpham::all();
        $sanpham = Sanpham::find($idsp);
        return view('pages_shop.suasp_shop',compact('shop','loaisanpham','sanpham'));
    }
    public function postUpdate($id,$idsp, Request $request)
    {
    	$shop = Shop::find($id);
        view()->share('shop',$shop);
        $updatesp = Sanpham::find($idsp);
        $updatesp->tensanpham 	= $request->tensanpham;
        $updatesp->gia 			= $request->gia;
        $updatesp->mota 		= $request->mota;
        //$update_sp->loaisanpham_id= $request->loaisanpham;
        $updatesp->tilekhuyenmai= $request->tilekhuyenmai;

        if($request->hasFile('hinhanh')){
        	$file = $request->file('hinhanh');
        	$duoi = $file->getClientOriginalExtension();
        	if($duoi != 'jpg' && $duoi != "png" && $duoi != "jpeg"){
        		return redirect()->back()->with('loi','Định dạng ảnh phải là jpg,png,jpeg');
        	}

        	$name = $file->getClientOriginalName();
        	$hinhanh= str_random(4)."_".$name;
        	while(file_exists("upload".$hinhanh)){
        		$hinhanh= str_random(4)."_".$name;
        	}
        	
        	$file->move("upload",$hinhanh);
        	$updatesp->hinhanh = $hinhanh;
        }
        
        $updatesp->save();

        
        return redirect()->back()->with('thanhcong','Cập nhật sản phẩm thành công');
    }
    //=============HẾT PHẦN QUẢN LÝ SẢN PHẨM========================//

//====================QUẢN LÝ ĐƠN HÀNG================================//
    public function getDonhang($id){
    	$shop = Shop::find($id);
        view()->share('shop',$shop);
    	return view('pages_shop.donhang',compact('shop'));
    }
    public function getChitietdon($id){
    	$shop = Shop::find($id);
        view()->share('shop',$shop);
    	return view('pages_shop.chitiet_donhang',compact('shop'));
    }

//====================QUẢN LÝ KHUYẾN MẠI==============================//

    public function getSanphamkhuyenmai($id){
    	$shop = Shop::find($id);
        view()->share('shop',$shop);
        $list_sp = Sanpham::where('shop_id',$id)->paginate(5);
    	return view('pages_shop.sp_khuyenmai',compact('shop','list_sp'));
    }
    public function getChapnhan($id){
    	$shop = Shop::find($id);
        view()->share('shop',$shop);
        $list_sp = Sanpham::where('shop_id',$id)->paginate(5);
    	return view('pages_shop.sp_khuyenmai',compact('shop','list_sp'));
    }

    public function getChienluockhuyenmai($id){
    	$shop = Shop::find($id);
        view()->share('shop',$shop);
    	return view('pages_shop.chienluoc_km',compact('shop'));
    }
    public function getTichdiem($id){
    	$shop = Shop::find($id);
        view()->share('shop',$shop);
    	return view('pages_shop.tichdiem',compact('shop'));
    }
//====================QUẢN LÝ KHO HÀNG==============================//
    public function getKho($id){
    	$shop = Shop::find($id);
        view()->share('shop',$shop);
    	return view('pages_shop.khohang',compact('shop'));
    }

}
