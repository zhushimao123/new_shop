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
        if(Session::get('user_name')==null){
            return redirect()->to("http://them.mneddx.com/login");
        }
        return $next($request);
    }
}
