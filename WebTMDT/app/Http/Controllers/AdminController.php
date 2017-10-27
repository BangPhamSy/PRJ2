<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taoshop;
use App\Users;
use App\Shop;

class AdminController extends Controller
{
	public function page_admin(){
    	return view('pages_admin.admin');
    }
    public function approve_shop(){
    	$list_shop = taoshop::all();

    	//Users::where('id',$list_shop->user_id)->first('name');
    	return view('pages_admin.approve_shop',compact('list_shop'));
    }
    public function agree_shop( Request $id){
    	$take_shop = taoshop::where('id',$id->id)->select('user_id','tenshop','created_at')->first();
    	$agree_shop= new Shop();
    	//$agree_shop->id = $take_shop->id;
    	$agree_shop->user_id = $take_shop->user_id;
    	$agree_shop->tenshop = $take_shop->tenshop;
    	$agree_shop->created_at = $take_shop->created_at;
    	$agree_shop->save();
    	$cancel_shop = taoshop::find($id->id);
    	$cancel_shop->delete();
    	return view('pages_admin.admin',compact('agree_shop','take_shop','cancel_shop'));
    }
    public function cancel_shop(Request $id){
    	$cancel_shop = taoshop::destroy($id->id);
    		return view('pages_admin.admin',compact('cancel_shop'));
    }
    public function management_shop(){
    	$shop = Shop::select('user_id')->groupBy('user_id')->get() ;
    	/*$name =Shop::
           		join('Users', 'Shop.user_id', '=', 'Users.id')
           		->select('Users.name')
           		->get();*/
    	$quantity = $shop->count();
    	
    	return view('pages_admin.management_shop',compact('shop','quantity'));
    }
    public function quantity_shop(Request $qt)
    {
    	$count = Shop::where('user_id',$qt->qt)->get();
    	return view('pages_admin.quantity_shop',compact('count'));
    }

    public function management_user()
    {
    	$user = Users::all();
    	return view('pages_admin.management_user',compact('user'));
    }
    public function delete_user(Request $id)
    {
    	$delete = Users::destroy($id->id);
    	return redirect()->back();
    }
}
