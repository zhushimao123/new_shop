<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\detial;
use App\Model\cartmodel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;
class GoodsdetialController extends Controller
{
    public function detial(Request $request){
        $session_name=Session::get('user_name');
        $data=cartmodel::where(['cart_status'=>1])->select()->paginate(6);
        $count=0;
        foreach ($data as $k => $v){
            $price=$v->buy_number*$v->goods_price;
            $count=$count+=$price;
        }
        $a=$data->count();

        $id=$request->input('goods_id');

       $data= detial::where(['goods_id'=>$id])->first();
      // var_dump($data);exit;
        return view('goods.detil',['data'=>$data,'session_name'=>$session_name,'a'=>$a]);
    }
    public function cart(Request $request){
        $id=$request->input('id');
        $img=detial::where(['goods_id'=>$id])->first();
        $sel=cartmodel::where(['goods_id'=>$id])->first();
        if($sel){
            $buy_number=$sel->buy_number+1;
           $num=cartmodel::where(['goods_id'=>$id])->update(['buy_number'=>$buy_number]);
            if($num==1){
                $response=[
                    'status'=>0,
                    'msg'=>'加入购物车成功'
                ];
            }else{
                $response=[
                    'status'=>0,
                    'msg'=>'加入购物车成功'
                ];
            }
            return json_encode($response,JSON_UNESCAPED_UNICODE);
        }else{
            $user_id=1;
           $buy_number=1;
            $create_time=time();
            $data=[
                'user_id'=>$user_id,
                'goods_id'=>$id,
                'buy_number'=>$buy_number,
                'create_time'=>$create_time,
                'img'=>$img['goods_img'],
                'goods_name'=>$img['goods_name'],
                'goods_price'=>$img['goods_price']
            ];
            $res=cartmodel::insert($data);
            if($res==true){
                $response=[
                    'status'=>0,
                    'msg'=>'加入购物车成功'
                ];
            }else{
                $response=[
                    'status'=>0,
                    'msg'=>'加入购物车成功'
                ];
            }
            return json_encode($response,JSON_UNESCAPED_UNICODE);
        }

    }
}
