<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Recommend;
use \App\Libs\OSS;
use \App\Libs\Functions;

class RecommendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Recommend::all();
        //获取图片的OSS地址
        foreach($data as $v){
            if(!$v['cover']) continue;
            $v['cover'] = Functions::getImageUrl($v['cover']);
        }

        return view("admin.recommend.index",[
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
        return view("admin.recommend.create");
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
        \Redis::del("tmp-".$request->cover);
        Recommend::create($request->all());
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
        $info = Recommend::find($id);
        $info['cover'] = Functions::getImageUrl($info['cover']);

        return view("admin.recommend.edit",[
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
           //更新文章
           $info = Recommend::find($id);
           $data = $request->all();
           $data['is_show'] = $request->has('is_show')? 1 : 0;

   
           //判断是否上传了新图片
           if($data['cover']==""){
               unset($data['cover']);
           }else{
                //删除redis中保存的图片路径
                \Redis::del("tmp-".$data['cover']);

                //删除以前的图片
               if($info['cover']!=""){
                   
                   @OSS::publicDeleteObject("hcc-blog",$info['cover']);
                   
               }
           }       
   
           $info->update($data);
           
    }


    public function status($id){
        $info = Recommend::find($id);
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
        
        $info = Recommend::find($id);
        @OSS::publicDeleteObject("hcc-blog",$info['cover']);     
        $info->delete();

    }
}
