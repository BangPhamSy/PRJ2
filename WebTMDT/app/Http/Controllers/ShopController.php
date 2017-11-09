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

}
