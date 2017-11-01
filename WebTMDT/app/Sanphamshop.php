<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanphamshop extends Model
{
    protected $table = "sanpham";
  	public function Shop()
  	{
  		return $this->belongsToMany('App\Shop');
  	}
  	public function Users()
  	{
  		return $this->belongsToMany('App\Users');
  	}
}
