<?php
/**
 * Created by PhpStorm.
 * User: yuxianjun
 * Date: 2016/9/10
 * Time: 15:19
 */

$base=base64_encode(1);
echo $base.'   ';

$base2=base64_decode($base);
echo $base2;