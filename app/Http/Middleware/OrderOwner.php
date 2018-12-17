<?php

namespace App\Http\Middleware;
use App;
use Closure;
use Illuminate\Support\Facades\Auth;

class OrderOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $orderNo = $request->orderNo;

        if($request->user() && $request->user()->isAdmin())
        {
            return $next($request);
        }

        $order = App\Order::where('ordno', $orderNo)
            ->select('user_id')->get();
        if(!empty($order)){
            $id = Auth::user()->id;
            if($order[0]->user_id == $id){
                return $next($request);
            }
        }

        return redirect('/cutestore');
    }
}
