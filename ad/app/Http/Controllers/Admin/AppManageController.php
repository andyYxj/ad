<?php

namespace App\Http\Controllers\Admin;

use Faker\Provider\Base;
use Illuminate\Http\Request;
use App\Http\Model\AppModel;
use App\Http\Requests;
use Illuminate\Support\Facades\App;
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
/*    public  function appManage($appName=null){

        $user=session('user');
        $uid=$user->uid;
        $app=new AppModel();
         $result=$app->appList($uid,$appName);
        return view('/admin/app_manage',['appInfo'=>$result]);
    }*/

    /**
     *
     * app列表分页
     */
    public  function appPaging($appName=null){
        $user=session('user');
        $uid=$user->uid;
        $app=new AppModel();
        $result=$app->appPaging($uid,$appName);
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
        if($input=Input::all()){
            $user=session('user');
            $uid=$user->uid;
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

    /**
     * 增加广告位页面
     */
/*    public function addAdPosition($app_id){
        $user=session('user');
        $uid=$user->uid;
        $result=new AppModel();
        $type=$result->getAdType();
        $adInfo=$result->getAdPos($uid,$app_id);
        return view('/admin/add_adPosition',['app_id'=>$app_id,'ad_type'=>$type,'ad_info'=>$adInfo]);

    }*/

    /**
     *分页 广告位
     */
    public function addAdPaging($app_id){
        $user=session('user');
        $uid=$user->uid;
        $result=new AppModel();
        $type=$result->getAdType();
        $adInfo=$result->getAdPaging($uid,$app_id);
        return view('/admin/add_adPosition',['app_id'=>$app_id,'ad_type'=>$type,'ad_info'=>$adInfo]);

    }

    /**
     * 增加广告位
     */
    public function addAdPositionInfo(){
        if($input=Input::all()){
            $user=session('user');
            $uid=$user->uid;
            $result=new AppModel();
            $status=$result->addAdPositionInfo($uid,$input);
            if($status==101){
                return back()->with('msg','广告位添加成功！');
            }
            if($status==102){
                return back()->with('msg','广告位添加失败！');
            }
        }

    }

    /**
     * 删除广告位置
     */
    public function delAdPosition($appAd_id){
        //var_dump($appAd_id);
        $result=new AppModel();
        $status=$result->delAdPosition($appAd_id);
        if($status==101){
            return back()->with('msg','广告位删除成功！');
        }
        if($status==102){
            return back()->with('msg','广告位删除失败！');
        }

    }


    //需要在用户登录的时候就获取列表，需要改
    /**
     * 获取app广告列表，应用广告统计栏目
     */
        public  function getAppList(){
         //   echo 111;die();
        $user=session('user');
        $uid=$user->uid;
        $app=new AppModel();
         $result=$app->appList($uid);
            var_dump($result);die();
            //session('appList',$result);

         return view('/layouts/admin',['appList'=>$result]);
    }


    /**
     * 显示广告折线图
     */
    public function  showAdData(){
        return view('/admin/data_analysis');

    }
}
