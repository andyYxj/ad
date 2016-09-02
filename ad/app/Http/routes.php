<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
   // return view('这是首页而已');
    echo "这是首页";
});

/*不需要验证登录的路由组*/

Route::get('/admin/login','Admin\UserController@login');
Route::post('/admin/user_login','Admin\UserController@userLogin');
Route::get('/admin/veri_code','Admin\UserController@veriCode');

//获取捷酷广告数据
Route::match(['get','post'],'/admin/getJkData','Admin\JkController@getData');

/*Route::group(['middleware'=>['web'] ],function(){
    Route::get('/admin/login','Admin\UserController@login');
    Route::post('/admin/user_login','Admin\UserController@userLogin');
    Route::get('/admin/veri_code','Admin\UserController@veriCode');

});*/

/*需要验证登录的组*/
Route::group(['middleware'=>['admin.login']],function(){
 //   Route::get('/admin/index','Admin\IndexController@index');
    Route::match(['get','post'],'/admin/index','Admin\IndexController@index');
    Route::match(['get','post'],'/admin/logout','Admin\UserController@userLogout');
    Route::match(['get','post'],'/admin/add_user','Admin\UserController@addUser');//增加用户页面
    Route::match(['get','post'],'/admin/add_user_info','Admin\UserController@addUserInfo');//增加用户方法
    Route::match(['get','post'],'/admin/reset_passwd','Admin\UserController@resetPasswd');//重置密码页面
    Route::match(['get','post'],'/admin/reset_password','Admin\UserController@resetPassword');//重置密码方法
    Route::match(['get','post'],'/admin/app_manage/{appName?}','Admin\AppManageController@appManage');//app列表显示页面
    Route::match(['get','post'],'/admin/add_app','Admin\AppManageController@addApp');//app增加页面
    Route::match(['get','post'],'/admin/add_app_info','Admin\AppManageController@addAppInfo');//app新增

    Route::match(['get','post'],'/admin/add_adPosition/{app_id}','Admin\AppManageController@addAdPosition');//增加广告位页面
    Route::match(['get','post'],'/admin/add_adPositionInfo/','Admin\AppManageController@addAdPositionInfo');//增加广告位方法
    Route::match(['get','post'],'/admin/del_adPosition/{appAd_id}','Admin\AppManageController@delAdPosition');//删除广告位方法



});


Route::get('test', function ($name = null) {
    return date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
});


Route::get('testResponseCookie',function(){
    $content = 'Hello LaravelAcademy！';
  /*  $status = 200;
    $value = 'text/html;charset=utf-8';
    return response($content,$status)->header('Content-Type',$value)
        ->withCookie('site','LaravelAcademy.org');*/
   setcookie('site','LaravelAcademy1',time(),'D:\\cookiefiles');
    //setrawcookie('site','LaravelAcademy12');
});


Route::get('getcookie',function(){
    echo $_COOKIE['site'];
});
