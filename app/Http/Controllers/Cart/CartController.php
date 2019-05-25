<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\cartmodel;
class CartController extends Controller
{
    public function cartdet(Request $request){

        $txt=$request->input('num');
        $id=$request->input('id');
       $del= cartmodel::where(['goods_id'=>$id])->update(['buy_number'=>$txt]);
        if($del==1){
            $req=[
                'status'=>0,
                'msg'=>'ok'
            ];
            echo json_encode($req,JSON_UNESCAPED_UNICODE);die;
        }else{
            $req=[
                'status'=>2,
                'msg'=>'no'
            ];
        }


        $data=cartmodel::where(['cart_status'=>1])->select()->paginate(6);
        $count=0;
        foreach ($data as $k => $v){
        $price=$v->buy_number*$v->goods_price;
            $count=$count+=$price;
        }
       $a=$data->count();
      if($a==0){

        return view('cart.no',['a'=>$a,'count'=>$count]);
      }else{
          return view('cart.cart',['data'=>$data],['count'=>$count,'a'=>$a]);
      }

    }
    public function delete(Request $request){
      $goods_id=$request->input('id');
      $res=cartmodel::where(['goods_id'=>$goods_id])->update(['cart_status'=>2]);
      if($res==1){
          $req=[
              'status'=>0,
              'msg'=>'删除成功'
          ];
      }else{
          $req=[
              'status'=>2,
              'msg'=>'删除失败'
          ];
      }
      return json_encode($req,JSON_UNESCAPED_UNICODE);
    }

}
