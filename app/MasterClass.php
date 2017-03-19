<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterClass extends Model
{
	protected $fillable = ['datetime', 'name', 'humans', 'price', 'description', 'user_id', 'view_id'];

	public function view(){
		return $this->belongsTo('App\View');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function ordereds(){
		return $this->hasMany('App\Ordered');
	}
}
