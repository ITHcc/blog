<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\OSS;
use Illuminate\Support\Facades\Redis;

class UploadController extends Controller
{
    public function uploadImage($filename,$savePath="cover"){

        $info = pathinfo($_FILES[$filename]['name']);
        $path = $savePath."/".time().rand(1,9999).".".$info['extension'];

        OSS::publicUpload("hcc-blog",$path,$_FILES[$filename]['tmp_name'],["ContentType"=>"image/jpeg"]);
        //将地址保存到redis中,6小时后过期
        Redis::setex("tmp-".$path, 3600*6, 'predis');
        return json_encode([
            "path"=>$path
        ]);
    }
}
