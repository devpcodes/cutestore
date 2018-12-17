<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	public function orderDetails()
	{
		return $this->hasMany(\App\OrderDetail::class);
	}
	protected $table = 'orders';

	protected $fillable = ['ordno','ispay','order_date','order_price','order_memo','pay_type',
		'pay_memo','send_type','send_date','email','phone','name','address','user_id'];

	public function user()
	{
		return $this->belongsTo(\App\User::class);
	}
}
