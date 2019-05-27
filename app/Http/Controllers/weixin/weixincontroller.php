<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class weixincontroller extends Controller
{
    public function code(){

        $url='https://open.weixin.qq.com/connect/oauth2/authorize?appid='.env('APPID').'&redirect_uri='.urlEncode('http://them.mneddx.com/getcode').'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
    return $url;
    }
    public function getcode(){

        //   echo '<pre>';print_r($_GET);echo '</pre>';

        // echo '<pre>';print_r($_GET);echo '</pre>';

        $code = $_GET['code'];

        //获取 access_token
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.env('WX_APP_ID').'&secret='.env('WX_APP_SEC').'&code='.$code.'&grant_type=authorization_code';
        $response = json_decode(file_get_contents($url),true);

        //echo '<pre>';print_r($response);echo '</pre>';
        $access_token = $response['access_token'];
        $openid = $response['openid'];
        //获取用户信息
        $url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
        $user_info = json_decode(file_get_contents($url),true);


        $openid=$user_info['openid'];
        $wx_id='oYL3b5krtrmqxlwXs0A_7cv4vaJg';
        $res= info::where(['openid'=>$user_info['openid']])->first();
        if($res){
            header('Refresh:3;url=http://them.mneddx.com');
            echo '欢迎回来';

        }else{
            $info=[
                'openid'=>$user_info['openid'],
                'nickname'=>$user_info['nickname'],
                'sex'=>$user_info['sex'],
                'language'=>$user_info['language'],
                'city'=>$user_info['city'],
                'province'=>$user_info['province'],
                'country'=>$user_info['country'],
                'head'=>$user_info['headimgurl']
            ];
            info::insert($info);
            header('Refresh:3;url=http://them.mneddx.com');
            echo '欢迎关注';

        }


    }
}
