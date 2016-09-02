<?php
/**
 * Created by PhpStorm.
 * User: yuxianjun
 * Date: 2016/8/26
 * Time: 11:27
 */

$redis = new redis();
$redis->connect('192.168.190.129', 6379);
$redis->set('test',"1111111111111");
echo $redis->get('test');   //结果：1111111111111
$redis->delete('test');
var_dump($redis->get('test'));  //结果：bool(false)