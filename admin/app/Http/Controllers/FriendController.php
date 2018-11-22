<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Friend;

class FriendController extends Controller
{
    public function index(){
        $info = Friend::find(1);
        return view("admin.friend.index",[
            "info"=>$info
        ]);
    }

    public function update(Request $request){


        Friend::find(1)->update($request->all());

    }
}
