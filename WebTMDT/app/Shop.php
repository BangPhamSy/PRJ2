<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = "shop";
    public function users(){
    	return $this->belongsTo('App\Users','user_id');
    }
}
