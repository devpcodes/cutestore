<?php

namespace App\Http\Middleware;

use Closure;

class NotOffer
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
        if(\Cookie::get('key')=="payment"){
            return redirect('/cutestore/payment');
        }
        return $next($request);
    }
}
