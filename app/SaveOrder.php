<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaveOrder extends Model
{
	protected $fillable = ['name','phone','email','address','user_id'];
	protected $table = 'saveorders';
	public function user()
	{
		return $this->hasOne('App\User');
	}
}
