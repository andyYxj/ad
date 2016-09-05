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
            $result=DB::table('app_info')->where('uid',$uid)->get();
        }else if($appName!=null){
           // $result=DB::table('app_info')->where('uid',$uid)->where('app_name',$appName)->get();
            $result = DB::table('app_info')->where('uid',$uid)->where('app_name', 'like', "%$appName%")->get();
           // var_dump($result);die();
        }
      //  var_dump($result);die();
        return  $this->object_array($result);
    }

    /**
     * 分页获取app列表
     */
    public function appPaging($uid,$appName){
        if($appName==null){
            return DB::table('app_info')->where('uid',$uid)->simplePaginate(8);
        }else if($appName!=null){
            return DB::table('app_info')->where('uid',$uid)->where('app_name', 'like', "%$appName%")->simplePaginate(8);
        }

    }

    /**
     * 新增app信息
     */
    public function addAppInfo($data,$uid){
        $result=DB::table('app_info')->insert([
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

    /**
     * 获取广告类型
     */
    public function getAdType(){
        $result=DB::table('ad_type')->get();
       // return  $this->object_array($result);
        return $result;
    }

    /**
     * 获取广告位信息
     */
    public function getAdPos($uid,$app_id){
        $result=DB::table('app_ad')
            ->leftJoin('ad_type', 'app_ad.adType_id', '=', 'ad_type.aT_id')
            ->where(['uid'=>$uid,'app_id'=>$app_id,'enabled'=>1])
            ->get();
        return $result;
    }

    /**
     * 分页获取广告位信息
     */
    public function getAdPaging($uid,$app_id){
        $result=DB::table('app_ad')
            ->leftJoin('ad_type', 'app_ad.adType_id', '=', 'ad_type.aT_id')
            ->where(['uid'=>$uid,'app_id'=>$app_id,'enabled'=>1])
            ->simplePaginate(5);
        return $result;

}

    /**
     *增加广告位信息
     */
    public function addAdPositionInfo($uid,$data){
        $result=DB::table('app_ad')->insert([
            'uid'=>$uid,
            'app_id'=>$data['app_id'],
            'adType_id'=>$data['adType_id'],
            'ad_position_id'=> date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT),
            'ad_position_name'=>$data['ad_position_name'],
            'create_time'=>date("Y-m-d H:i:s"), //H 24xiaoshi  h 12xiaoshi
            'update_time'=>date("Y-m-d H:i:s"),
        ]);

        if($result){
            return $status=101;//添加成功
        }else{
            return $status=102;//添加失败

        }

    }

    /**
     * 删除广告位
     */
    public function delAdPosition($appAd_id){
        $result=DB::table('app_ad')
            ->where('appAd_id',$appAd_id)
            ->update(['enabled' => 0]);
      //  var_dump($result);die();

        if($result){
            return $status=101;//添加成功
        }else{
            return $status=102;//添加失败

        }
    }


}
