<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Banner;
use \App\Libs\Functions;
use \App\Libs\OSS;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::all();
        //获取图片的OSS地址
        foreach($data as $v){
            if(!$v['banner']) continue;
            $v['banner'] = Functions::getImageUrl($v['banner']);
        }
        return view("admin.banner.index",[
            "data"=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.banner.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //删除redis中保存的图片路径
        \Redis::del("tmp-".$request->banner);
        Banner::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Banner::find($id);
        $info['banner'] = Functions::getImageUrl($info['banner']);

        return view("admin.banner.edit",[
            "info"=>$info
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //更新banner
        $info = Banner::find($id);
        $data = $request->all();

        $data['is_show'] = $request->has('is_show')? 1 : 0;

        //判断是否上传了新图片
        if($data['banner']==""){
            unset($data['banner']);
        }else{
            //删除redis中保存的图片路径
            \Redis::del("tmp-".$data['banner']);
            //删除以前的图片
            if($info['banner']!=""){
                
                @OSS::publicDeleteObject("hcc-blog",$info['banner']);
                
            }
        }       
        $info->update($data);
    }


    public function status($id){
        $info = Banner::find($id);
        $info->update([
            "is_show"=>!$info->is_show*1
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Banner::find($id);
        @OSS::publicDeleteObject("hcc-blog",$info['banner']);     
        $info->delete();
    }
}
