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
    Route::match(['get','post'],'/admin/add_user','Admin\UserController@addUser');//页面
    Route::match(['get','post'],'/admin/add_user_info','Admin\UserController@addUserInfo');
    Route::match(['get','post'],'/admin/reset_passwd','Admin\UserController@resetPasswd');//页面
    Route::match(['get','post'],'/admin/reset_password','Admin\UserController@resetPassword');
    Route::match(['get','post'],'/admin/app_manage/{appName?}','Admin\AppManageController@appManage');//app列表显示页面
    Route::match(['get','post'],'/admin/add_app','Admin\AppManageController@addApp');//app增加页面
    Route::match(['get','post'],'/admin/add_app_info','Admin\AppManageController@addAppInfo');//app新增

});


Route::get('user/{name?}', function ($name = null) {
    return $name;
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
