<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    public function taoshop(){
    	return $this->hasMany('App\taoshop','user_id','id');
    }
    public function Shop(){
    	return $this->hasMany('App\Shop','user_id','id');
    }
}
