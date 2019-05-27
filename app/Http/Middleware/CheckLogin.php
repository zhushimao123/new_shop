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
<<<<<<< HEAD
        if(Session::get('user_name')==null){
            return redirect()->to("http://vm.them.com/login");
=======
        if(Session::get('user_name')==null&&Session::get('user_id')==null){
            return redirect()->to("/login");
>>>>>>> 3bd5b49886da64e9c4370b7dbc986090da28fb06
        }
        return $next($request);
    }
}
