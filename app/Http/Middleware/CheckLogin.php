<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
class CheckLogin
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
        //echo Session::get('user_name');die;
        if(Session::get('user_id')==null){
            return redirect()->to("http://www.newshop.com");
        }
        return $next($request);
    }
}
