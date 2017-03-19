<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordered extends Model
{
    protected $fillable = ['user_id', 'master_class_id'];

    public function masterClass(){
    	return $this->belongsTo('App\MasterClass');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
