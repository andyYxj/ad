<?php

namespace App\Http\Model;
use Illuminate\Support\Facades\DB;
use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class UserModel extends BaseModel
{
   // protected  $table='user';
   // protected $primaryKey='uid';
    //public $timestamps=true;

    /**
     * 获取用户信息
     */
    public function getUserInfo($username){

          $result=DB::table("user")
            ->where(['uname'=>$username])
            ->get();
          return $result[0];


    }

    /**
     * 新增用户
     */
    public function add_user($data){
        $result=DB::table('user')->where(['uname'=>$data['username']])->first();
        if($result){
            return $status=100;//用户存在
        }

        $result=DB::table('user')->insert([
            'uname'=>$data['username'],
            'passwd'=>Crypt::encrypt($data['password']),
            'role_id'=>$data['role_id'],
            'created_at'=>date("Y-m-d H:i:s"), //H 24xiaoshi  h 12xiaoshi
        ]);
     if($result){
         return $status=101;//添加成功
     }else{
         return $status=102;//添加失败
     }

    }


    /**
     * 重置用户密码
     */
    public function resetPasswd($uid,$passwd){
        $result=DB::table('user')
            ->where('uid',$uid)
            ->update(['passwd'=>$passwd]);

    }

    /**
     * 获取所有公司用户(role_id=4)应用，广告位id信息
     */

    public  function  getAllInfo(){
        $result=DB::table('user')
            ->leftJoin('app_info','user.uid','=','app_info.uid')
            ->leftJoin('ad_infosave','app_info.app_id','=','app_ad.app_id')
            ->where('user.role_id','=',4)
             ->get();

        var_dump($result);die();
    }
}
