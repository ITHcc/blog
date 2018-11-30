<?php


//在webhooks页面配置的秘钥
$key = "847404572a";

//接收Github发送给我们的数据
$contents = file_get_contents("php://input");
//将json转为数组
$data = json_decode($contents);

//获取请求通中的sha1签名
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];
list($algo,$hash) = explode("=",$signature);

$newHash = hash_hmac($algo,$contents,$key);
if($hash==$newHash){
    exec("git pull");

}else{
    echo "签名错误";
}
