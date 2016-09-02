<?php

namespace App\Http\Controllers\Admin;

use Faker\Provider\Base;
use Illuminate\Http\Request;
use App\Http\Model\AppModel;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

/**
 * app应用管理类
 * Class AppManageController
 * @package App\Http\Controllers\Admin
 */
class AppManageController extends BaseController
{
    /**
     * app管理首页
     */
    public  function appManage($appName=null){

        $user=session('user');
        $uid=$user->uid;
        $app=new AppModel();
         $result=$app->appList($uid,$appName);
        return view('/admin/app_manage',['appInfo'=>$result]);
    }

    /**
     * 新增app信息页面
     */
    public function addApp(){
        return view('/admin/add_app');
    }

    /*
     * 新增app信息
     */
    public  function addAppInfo(){
        $user=session('user');
        $uid=$user->uid;
        if($input=Input::all()){

            $app=new AppModel();
            $status=$app->addAppInfo($input,$uid);
            if($status==101){
                return back()->with('msg','应用添加成功！');
            }
            if($status==102){
                return back()->with('msg','应用添加失败！');
            }



        }



    }
}
