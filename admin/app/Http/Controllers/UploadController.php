<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\OSS;

class UploadController extends Controller
{
    public function uploadImage($filename,$savePath="cover"){

        $info = pathinfo($_FILES[$filename]['name']);
        $path = $savePath."/".time().rand(1,9999).".".$info['extension'];

        OSS::publicUpload("hcc-blog",$path,$_FILES[$filename]['tmp_name'],["ContentType"=>"image/jpeg"]);

        return json_encode([
            "path"=>$path
        ]);
    }
}
