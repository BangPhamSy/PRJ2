<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class baseController extends Controller
{
   

    
     public function __construct()
    {
    	
       public function shop($id){
        $shop = Shop::find($id);
        view()->share('shop',$shop);
        
    	return view('pages_shop.trangchu',['shop'=>$shop]);
    	//return view('pages_shop.trangchu');
    	}
       

    }
}
