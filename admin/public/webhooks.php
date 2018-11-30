<?php


//在webhooks页面配置的秘钥
$key = "847404572a";

//接收Github发送给我们的数据
$contents = file_get_contents("php://input");
//将json转为数组
$data = json_decode($contents);

//获取请求通中的sha1签名
$signature = $_SERVER;
file_put_contents("log",json_encode($signature));

die;
list($algo,$hash) = explode("=",$data);
