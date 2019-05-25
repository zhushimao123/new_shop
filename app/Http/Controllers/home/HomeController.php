<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\goods;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    public function  index()
    {
        $session_name=Session::get('user_name');
        //新品
        $new_shop = goods::where(['goods_new'=>1])->limit(4)->get();
        $shop = goods::where(['goods_hot'=>1])->paginate(6);
        return view('home.index',['shop'=>$shop,'new_shop'=>$new_shop,'session_name'=>$session_name]);
    }
}
