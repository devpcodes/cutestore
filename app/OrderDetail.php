<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	public function order()
	{
		return $this->belongsTo(\App\Order::class);
	}
	protected $table = 'order-details';

	protected $fillable = ['order_id','product_id','product_name','product_options','product_pricy','product_qty',
		'product_src','product_subtotal'];
}
