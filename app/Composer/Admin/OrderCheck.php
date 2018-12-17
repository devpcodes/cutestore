<?php
namespace App\Composer\Admin;
use App;
use DB;

class OrderCheck{
	public function checkNum()
	{
		$order = App\Order::leftJoin('users','orders.user_id','=','users.id')
			->where('orders.ispay','1')
			->where(function ($query) {
				$query->where('orders.send_date','=','0000-00-00 00:00:00')
					->orWhere('orders.send_date','=','1970-01-01 00:00:00')
					->orWhere('orders.send_type','0');
			})
			->select('orders.id')
			->get();
		//debug($result);
		return count($order);
	}
}