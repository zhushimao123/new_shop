<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\cartmodel;
class CartController extends Controller
{
    public function cartdet(){
        $data=cartmodel::select()->paginate(6);
        return view('cart.cart',['data'=>$data]);
    }
}
