<?php
/**
 * Created by PhpStorm.
 * User: yuxianjun
 * Date: 2016/9/9
 * Time: 16:08
 */

$data=array(
   //需要返回的数据，数据类型为array()
    'real_data'=>array(
        //总收入
        'all_income'=>'',
        // 展现次数
        'show_num'=>'',
        //点击次数
        'click_num'=>'',
        //点击率
        'click_rate'=>'',
        //每1000次展示收入
        'show_income_perThousand'=>'',
    ),

    'time'=>array(1,2,3,4,5,6,7)
);

echo json_encode($data);
