<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\About;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = About::find(1);
        return view("admin.about.index",[
            "info"=>$info
        ]);
    }

    public function update(Request $request){
        
        About::find(1)->update($request->all());
    }
}
