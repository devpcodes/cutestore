<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function orderList()
    {
        $order = App\Order::leftJoin('users','orders.user_id','=','users.id')
            ->orderBy('orders.created_at', 'desc')
            ->select('orders.*','users.name as user_name')
            ->paginate(20);
        return view("admin.order.orderlist",compact("order"));
    }
    public function updateOrder(Request $request)
    {
        $date = date('Y-m-d H:i:s',strtotime($request->send_date));
        App\Order::where('id',$request->id)
            ->update(['send_type'=>$request->send_type,'send_date'=>$date]);
        echo "OK";
    }
    public function delOrder(Request $request)
    {
        App\OrderDetail::where('order_id',$request->id)
            ->delete();
        App\Order::destroy($request->id);
        echo "OK";
    }

    public function orderListCheck()
    {
        $order = App\Order::leftJoin('users','orders.user_id','=','users.id')
            ->where('orders.ispay','1')
            ->where(function ($query) {
                $query->where('orders.send_date','=','0000-00-00 00:00:00')
                    ->orWhere('orders.send_date','=','1970-01-01 00:00:00')
                    ->orWhere('orders.send_type','0');
            })
            ->select('orders.*','users.name as user_name')
            ->paginate(20);
        $type = "待確認";
        return view("admin.order.orderlist",compact("order","type"));
    }

    public function orderListOk()
    {
        $order = App\Order::leftJoin('users','orders.user_id','=','users.id')
            ->where('orders.ispay','1')
            ->where('orders.send_type','1')
            ->where('orders.send_date','!=','1970-01-01 00:00:00')
            ->where('orders.send_date','!=','0000-00-00 00:00:00')
            ->select('orders.*','users.name as user_name')
            ->paginate(20);
        $type = "已完成";
        return view("admin.order.orderlist",compact("order","type"));
    }
}
