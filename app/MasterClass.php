<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterClass extends Model
{
	protected $fillable = ['datetime', 'name', 'humans', 'price', 'description', 'user_id', 'view_id'];
}
