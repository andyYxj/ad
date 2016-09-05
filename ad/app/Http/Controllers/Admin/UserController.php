<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Http\Model\UserModel;
use App\Http\Model\Role;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Exception;

require_once 'public/org/code/Code.class.php';

class UserController extends BaseController
{
    /**
     * 显示登录页
     */
    public function login(){
     /*   $pass='123456';
        $pass= Crypt::encrypt($pass);
   echo date('Y年m月d日 H时i分s秒');*/
       return  view('admin/login');
    }

    /**
     * 用户登录
     */
    public function userLogin(){

        if($input=Input::all()){
            $code = new \Captcha(90,50,4);
            $_code=$code->getCode();
           // $user=User::first();
            $user=new UserModel();
            $user=$user->getUserInfo($input['username']);
            try {
                if ($user->uname != $input['username'] || Crypt::decrypt($user->passwd) != $input['password']) {
                    return back()->with('msg', '用户名或者密码错误！');
                }
            }catch (Crypt $e){
                return back()->with('msg', '用户名或者密码错误！');
            }

            if($input['verCode']!=$_code){
                return back()->with('msg','验证码错误！');
            }
            session(['user'=>$user]);
           // var_dump(session('user')->uname);die();
            $user=session('user');

            return view('admin/index');

        }else{
            return back()->with('msg','请填写登录信息！');
        }
       //dd( DB::connection()->getPdo());die();
     //   echo "hello";die();

    }

    /**
     * 生成验证码
     */
    public function veriCode(){
        $captcha = new \Captcha(80,30,4);
        $captcha->showImg();die();

    }

    /**
     * 获取当前验证码
     */
    public function getCode(){
        $captcha = new \Captcha(80,30,4);
       echo  $captcha->getCode();die();

    }

    /**
     * 用户退出
     */
    public function userLogout(){
        Session::forget('user');
        if(!Session::has('user')){
            return redirect('/admin/login');
        }

        return redirect('admin/login');

    }

    /**
     * 添加用户 页面
     */
    public function addUser(){
        $role=Role::get();
      // var_dump($role);
        return view('/admin/add_user',['roles'=>$role]);
    }

    /**
     * 添加用户信息
     */
    public function addUserInfo(){
       if($input=Input::all()){
           $user=new UserModel();
           $status=$user->add_user($input);
          if($status==100){
              return back()->with('msg','用户名已经存在！');
          }
           if($status==101){
               return back()->with('msg','用户添加成功！');
           }else if($status==102){
               return back()->with('msg','用户添加失败！');
           }

       }

    }

    /**
     * 用户密码重置页面
     */
    public  function resetPasswd(){
        return view('/admin/reset_passwd');
    }

    public function resetPassword(){
        $user=session('user');
        if(isset($user)){
            if($input=Input::all()){
                //原密码不正确
                if(Crypt::decrypt($user->passwd) != $input['old_passwd']){
                    return back()->with('msg','原密码不正确，请重新输入');
                }
                if($input['new_passwd']!=$input['new_passwd_again']){
                    return back()->with('msg','两次输入的密码不一致，请重新输入');
                }
            }

        }

        $uname=$user->uname;
        $uid=$user->uid;
        $passwd=Crypt::encrypt($input['new_passwd']);
        //var_dump($passwd);die();
        $result=new UserModel();
        $result=$result->resetPasswd($uid,$passwd);


     // $user=$request->session()->get('user');



    }

    /**
     * 获取用户信息
     */
    public function getUserInfo(){
        $user=session('user');
        if(isset($user)){
            var_dump($user);die();
            return view('/layouts/admin',['user'=>$user]);
        }

    }
}
