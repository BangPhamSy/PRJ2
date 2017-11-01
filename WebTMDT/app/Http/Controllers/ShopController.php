<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Shop;

class ShopController extends Controller
{
    public function themsp( Request $id)
    {
    	$addtion = Shop::find($id);
    	return view('pages_shop.themsp_shop',compact('addtion'));
    }
}
