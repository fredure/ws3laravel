<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = ['name', 'description'];

    public function masterClasses(){
    	return $this->hasMany('App\MasterClass');
    }
}
