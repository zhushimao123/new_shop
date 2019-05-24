<?php

namespace App\Http\Controllers\order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order()
    {
        $goodsinfo = DB::table('shop_cart')->where(['user_id'=>1])->get();
       return view('order.order',['goodsinfo'=>$goodsinfo]);
    }
}
