<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreRegisterPost;
use App\Http\Requests\StoreLoginPost;
class UserController extends Controller
{
    //注册首页
    public function register()
    {
        $session_name=Session::get('user_name');
        return view('user/register',['session_name'=>$session_name]);
    }
    //注册执行
    public function regdo(Request $request)
    {
        $user_name=$request->input('user_name');
        $user_email=$request->input('user_email');
        $user_pwd=$request->input('user_pwd');
        $info=User::where(['user_name'=>$user_name])->first();
        if($user_name==''){
            echo json_encode(['msg'=>'用户名不为空哦','code'=>2]);die;
        }
        if($user_pwd==''){
            echo json_encode(['msg'=>'密码不为空哦','code'=>2]);die;
        }
        if($user_email==''){
            echo json_encode(['msg'=>'邮箱不为空哦','code'=>2]);die;
        }
        if($info){
            echo json_encode(['msg'=>'用户名不能重复哦','code'=>2]);die;
        }
        $p=password_hash($user_pwd,PASSWORD_DEFAULT);
        $data=[
            'user_name'=>$user_name,
            'user_email'=>$user_email,
            'user_pwd'=>$p,
            'create_time'=>time(),
        ];
        $res=User::insert($data);
        if($res){
            echo json_encode(['msg'=>'注册成功','code'=>1]);
        }else{
            echo json_encode(['msg'=>'注册失败','code'=>2]);die;
        }
    }
    //登录首页
    public function login()
    {
        $session_name=Session::get('user_name');
        return view('user/login',['session_name'=>$session_name]);
    }
    //登录执行
    public function logindo(Request $request)
    {
        $user_name=$request->input('user_name');
        $user_pwd=$request->input('user_pwd');
        $userInfo=User::where(['user_name'=>$user_name])->first();
        if($user_name==''){
            echo json_encode(['msg'=>'用户名不为空哦','code'=>2]);die;
        }
        if($user_pwd==''){
            echo json_encode(['msg'=>'密码不为空哦','code'=>2]);die;
        }
        if($userInfo){
            if(password_verify($user_pwd,$userInfo->user_pwd)){
                //设置session
                $user_id=$userInfo->user_id;
                Session::put(['user_id'=>$user_id,'user_name'=>$user_name]);
//                var_dump(Session::all());
//                echo Session::getId();
//                $request->session()->flush();
                echo json_encode(['msg'=>'登录成功','code'=>1]);
            }else{
                echo json_encode(['msg'=>'密码不对','code'=>2]);die;
            }
        }else{
            echo json_encode(['msg'=>'用户名或密码不对','code'=>2],JSON_UNESCAPED_UNICODE);die;
        }
    }
    //退出
    public function logout(Request $request)
    {
        $request->session()->forget('user_name');
        $s=Session::get('user_name');
        if(!$s){
<<<<<<< HEAD
            header('refresh:1;url=http://vm.them.com');
=======
            return redirect()->to("http://www.newshop.com");
>>>>>>> b8424fc0ea9240100e8be9266f224115118d36dc
        }
    }
}
