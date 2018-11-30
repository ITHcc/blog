<?php
	//秘钥
	$token = "123456";

	//接收github发送的通知内容
	$json = file_get_contents("php://input");
	$data = json_decode($json,true);

	file_put_contents("log",$data);


	//验证仓库密码是否正确
	 exec("git pull");
