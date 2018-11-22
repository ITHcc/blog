<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Admin;
use Hash;
class LoginController extends Controller
{
    public function login(){
        if(session("admin")) return redirect("/");
        return view("admin.login.index");
    }


    public function dologin(Request $req){
        
        $info = Admin::where("login_name",$req->login_name)->first();
        if(!$info){
            return back()->withErrors([
                "admin"=>"管理员账号有误!",
            ]);
        }
        if(Hash::check($req->login_pwd,$info['login_pwd'])){
            session([
                "admin"=>"login_name"
            ]);
            return redirect("/");
        }else{
            return back()->withErrors([
                "admin"=>"管理员密码错误!",
            ]);
        }

    }

    public function logout(){

        session()->flush();
        return redirect("/login");

    }
}
