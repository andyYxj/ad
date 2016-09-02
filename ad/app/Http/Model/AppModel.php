<?php

namespace App\Http\Model;
use Illuminate\Support\Facades\DB;
use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class AppModel extends BaseModel
{
    /**
     * app列表
     */
    public function appList($uid,$appName){
        if($appName==null){
            $result=DB::table('appinfo')->where('uid',$uid)->get();
        }else if($appName!=null){
           // $result=DB::table('appinfo')->where('uid',$uid)->where('app_name',$appName)->get();
            $result = DB::table('appinfo')->where('uid',$uid)->where('app_name', 'like', "%$appName%")->get();
           // var_dump($result);die();
        }
      //  var_dump($result);die();
        return  $this->object_array($result);
    }

    /**
     * 新增app信息
     */
    public function addAppInfo($data,$uid){
        $result=DB::table('appinfo')->insert([
            'uid'=>$uid,
            'app_name'=>$data['appName'],
            'app_remark'=>$data['appRemark'],
            'create_time'=>date("Y-m-d H:i:s"), //H 24xiaoshi  h 12xiaoshi
            'update_time'=>date("Y-m-d H:i:s"),
        ]);

        if($result){
            return $status=101;//添加成功
        }else{
            return $status=102;//添加失败

        }
    }

}
