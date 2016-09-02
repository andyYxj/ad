<?php
 $redis=new Redis();
 $redis->connect('192.168.190.132',6379);
// $redis->auth('123456');
 $redis->set('test','helloworld');
 echo $redis->get('test');
?>