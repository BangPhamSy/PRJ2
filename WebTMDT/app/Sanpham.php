<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
  	protected $table = "sanpham";
  	public function Sanphamshop()
  	{
  		return $this->belongsToMany('App\Sanphamshop');
  	}
}
