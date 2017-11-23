<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
  	protected $table = "sanpham";
  	public function Sanphamshop()
  	{
  		return $this->hasOne('App\Sanphamshop');
  	}
  	public function Loaisanpham()
  	{
  		return $this->belongsTo('App\Loaisanpham','loaisanpham_id','id');
  	}

}
