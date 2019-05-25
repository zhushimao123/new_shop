<?php

namespace App\Http\Controllers\order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\cartmodel;
use Illuminate\Support\Str;
//use

class OrderController extends Controller
{
    public function order()
    {
        $goodsinfo = DB::table('shop_cart')->where(['user_id'=>1])->get();
       return view('order.order',['goodsinfo'=>$goodsinfo]);
    }
    //确认结算
    public function orderdo()
    {
       if(empty($_GET['goods_id']))
       {
           $response = [
               'errno '=> 'no',
               'msg '=> '商品不存在'
           ];
           die(json_encode($response,JSON_UNESCAPED_UNICODE));
       }
        $goods_id = explode(',',$_GET['goods_id']);
        $shopInfo = cartmodel::where(['user_id'=>1])->get();
        $countprice = 0;
        foreach ($shopInfo as $k=>$v)
        {
            $countprice = $countprice + $v-> goods_price * $v-> buy_number;
        }
        //存入订单表
        $orderInfo['order_amount'] = $countprice;
        $orderInfo['order_no'] = $this-> str();
        $orderInfo['pay_type'] = 1; //1 支付宝
        $orderInfo['user_id'] =1;
        $orderInfo['create_time']= time();
        $res1 = DB::table('shop_order')->insert($orderInfo);
        if(!$res1){
            $response = [
                'errno'=> 'no',
                'msg' => '订单生成失败'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
        $order_id = DB::getPdo()->lastInsertId($res1);
//        var_dump($order_id);die;
        $res2 = DB::table('shop_cart')->whereIn('goods_id',$goods_id)->where(['user_id'=>1])->get();
        $goodsInfo = json_decode($res2,true);
        foreach ($goodsInfo as $k=> $v)
        {
            $goodsInfo[$k]['order_id'] =$order_id;
            $goodsInfo[$k]['user_id'] = 1;
            $goodsInfo[$k]['create_time'] =time();
            $goodsInfo[$k]['update_time'] =time();
            $goodsInfo[$k]['goods_img'] = $v['img'];
            unset($goodsInfo[$k]['cart_id']);
            unset($goodsInfo[$k]['buy_number']);
            unset($goodsInfo[$k]['save_status']);
            unset($goodsInfo[$k]['cart_status']);
            unset($goodsInfo[$k]['cart_id']);
            unset($goodsInfo[$k]['img']);
        }
        $shop_dateil = DB::table('shop_detail')->insert($goodsInfo);
        if(!$shop_dateil){
            $response = [
                'errno'=> 'no',
                'msg' => '订单详情生成失败'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
        //清空购物车
        $res3 = DB::table('shop_cart')->where(['user_id'=> 1])->delete();
        if(!$res3){
            $response = [
                'errno'=> 'no',
                'msg' => '清空购物车失败'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
        $response = [
            'errno'=> 'ok',
            'oreder_id'=> $order_id
        ];
        die(json_encode($response,JSON_UNESCAPED_UNICODE));
    }

    //订单号
    public function str()
    {
        $str = substr(sha1(time() . Str::random(10).'PIKAI_'."_"), 5, 15);
        return $str;
    }
    //订单页面
    public  function orhtml()
    {
        if(empty($_GET['order_id'])){
            $response = [
                'errno'=> 'no',
                'msg'=> '空'
            ];
        }
        $order_no = DB::table('shop_order')->where(['order_id'=> $_GET['order_id']])->first();
        $order_nos = $order_no-> order_no;
        return view('order.orhtml',['order_nos'=> $order_nos]);
    }
    //支付
    public function alipay()
    {
        if(empty($_GET)){
            $response = [
                'errno'=> 'no',
                'msg'=> '订单不存在'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
        $res = DB::table('shop_order')->where(['order_no'=>$_GET['oid']])->first();
        if(!$res){
            $response = [
                'errno'=> 'no',
                'msg'=> '订单不存在'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
        if($_GET['paytype'] =='1'){
            //支付宝支付
            $this-> getalipay($_GET['oid']);
        }else if($_GET['paytype'] =='2'){
            $this-> getWexinpay($_GET['oid']);
        }
    }
    //支付宝支付
    public function getalipay($oid)
    {
        $res = DB::table('shop_order')->where(['order_no'=>$_GET['oid']])->first();
        //业务参数
        $bizcont = [
            'subject' => '月七',//交易标题/订单标题/订单关键
            'out_trade_no'=>$oid, //订单号
            'total_amount'      => $res->order_amount / 100, //支付金额
            'product_code'      => 'QUICK_WAP_WAY', //固定值
        ];
        //公共参数
        $data = [
            'app_id'   => '2016092700608889',
            'method'   => 'alipay.trade.wap.pay',
            'format'   => 'JSON',
            'charset'   => 'utf-8',
            'sign_type'   => 'RSA2',
            'timestamp'   => date('Y-m-d H:i:s'),
            'version'   => '1.0',
            'notify_url'   => 'http://them.mneddx.com/alipayNotify',       //异步通知地址
            'return_url'   => 'http://vm.them.com/succuess',      // 同步通知地址
            'biz_content'   => json_encode($bizcont),
        ];
        //拼接参数
        ksort($data);//根据键以升序对关联数组进行排序
        $i = "";
        foreach ($data as $k=>$v)
        {
            $i.=$k.'='.$v.'&';
        }
        $trim  = rtrim($i,'&');
//        var_dump($trim);die;
        //生成签名 最后拼接为url 格式
        $rsaPrivateKeyFilePath = openssl_get_privatekey('file://'.storage_path('app/keys/private.pem')); //密钥
//           var_dump($rsaPrivateKeyFilePath);
//            $a = openssl_error_string();
//            var_dump($a);die;
        //生成签名
        openssl_sign($trim,$sign,$rsaPrivateKeyFilePath,OPENSSL_ALGO_SHA256);
        $sign = base64_encode($sign);
        $data['sign']=$sign;
        //拼接url
        $a='?';
        foreach($data as $key=>$val){
            $a.=$key.'='.urlencode($val).'&'; //urlencode 将字符串以url形式编码
        }
        $trim2 = rtrim($a,'&');
//        var_dump($trim2);die;
        $url = 'https://openapi.alipaydev.com/gateway.do'.$trim2;
        header('refresh:2;url='.$url);
    }
    //支付成功回调
    public function  succuess()
    {
        echo '支付成功：三秒后跳至首页';
        header('refresh:2;url=/');
    }
    //异步回调
    public function  alipayNotify()
    {
        echo 1111111;
        $p = json_encode($_POST);
        $data=json_decode($p,true);
        $log_str = "\n>>>>>> " .date('Y-m-d H:i:s') . ' '.$p . " \n";
        is_dir('logs') or mkdir('logs', 0777, true);
        file_put_contents('logs/alipay_notify',$log_str,FILE_APPEND);
        echo 'success';
        //TODO 验签 更新订单状态
//        $pay_time = strtotime($data['gmt_payment']);
//        DB::table('api_order')->where('order_no',$data['out_trade_no'])->update(['pay_time'=>$pay_time]);
    }
}
