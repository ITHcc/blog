<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\OSS;
use App\Libs\Functions;
use App\Blog;
use App\Category;
use App\Tag;
use App\BlogTag;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $m = Blog::where("id","!=",0);
        
        //给模型设置搜索条件

        if(isset($_GET['start']) && $_GET['start']!="" ){
            $m = $m->where("created_at",">=",$_GET['start']);
        }

        if(isset($_GET['end'])  && $_GET['end']!="" ){
            $m = $m->where("created_at","<=",$_GET['end']);
        }

        if(isset($_GET['keyword'])  && $_GET['keyword']!="" ){
            $m = $m->where("title","like","%{$_GET['keyword']}%");
        }
        if(isset($_GET['category_id']) && $_GET['category_id']!="" ){
            $m = $m->where("category_id",$_GET['category_id']);
        }
        
        

        //获取分页
        $data = $m->paginate(10);  


        if(isset($_GET['tag_id']) && $_GET['tag_id']!="" ){
            foreach($data as $k=>$v){
                $arr = [];
                foreach($v->tags as $v1){
                    $arr[] = $v1['id'];
                }
               

                if(!in_array($_GET['tag_id'],$arr)){
                    unset($data[$k]);
                }
                

            }
        }

        //给分页代码添加搜索条件
        $data->start = isset($_GET['start'])? $_GET['start'] : "";
        $data->end = isset($_GET['end'])? $_GET['end'] : "";
        $data->keyword = isset($_GET['keyword'])? $_GET['keyword'] : "";
        $data->category_id = isset($_GET['category_id'])? $_GET['category_id'] : "";
        $data->tag_id = isset($_GET['tag_id'])? $_GET['tag_id'] : "";

        //获取图片的OSS地址
        foreach($data as $v){
            if(!$v['cover']) continue;
            $v['cover'] = Functions::getImageUrl($v['cover']);
        }

        //获取分类
        $category = Category::all();
        //获取标签
        $tags = Tag::all();
        return view("admin.blog.index",[
            "data"=>$data,
            "category"=>$category,
            "tags"=>$tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tags = Tag::all();

        return view("admin.blog.create",[
            "category"=>$category,
            "tags"=>$tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info = Blog::create($request->all());

         //插入文章标签
         foreach($request->tags as $k=>$v){
            BlogTag::create([
                "blog_id"=>$info['id'],
                "tag_id"=>$k
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取文章信息
        $info = Blog::find($id);
        //根据路径获取oss上的url地址
        $info['cover'] = Functions::getImageUrl($info['cover']);

        $category = Category::all();
        $tags = Tag::all();


        return view("admin.blog.edit",[
            "info"=>$info,
            "category"=>$category,
            "tags"=>$tags
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
        $info = Blog::find($id);
        $data = $request->all();

        //判断是否上传了新图片
        if($data['cover']==""){
            unset($data['cover']);
        }else{
             //删除以前的图片
            if($info['cover']!=""){
                
                @OSS::publicDeleteObject("hcc-blog","/".$info['cover']);
                
            }
        }       

        $info->update($data);
        //删除标签
        BlogTag::where("blog_id",$id)->delete();
        //插入新标签
        foreach($request->tags as $k=>$v){
            BlogTag::create([
                "blog_id"=>$id,
                "tag_id"=>$k
            ]);
        }


    }

    public function status($id){
        $info = Blog::find($id);
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
        $info = Blog::find($id);
        @OSS::publicDeleteObject("hcc-blog",$info['cover']);     
        $info->delete();
    }


}
