<?php

use Illuminate\Http\Request;
use \App\Libs\Functions;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {

    //首页
    Route::get("/blog",function(Request $req){
        // return \App\Blog::where("is_top",1)->get();
        $pageSize = 5;

        // $data =  \App\Blog::where("is_show",1)->orderBy("is_top","desc")->orderBy("score","desc")->offset($start)->limit($pageSize)->get();
        $data =  \App\Blog::where("is_show",1)->orderBy("is_top","desc")->orderBy("score","desc")->paginate($pageSize);
        
        foreach($data as $v){
            if(!$v['cover']) continue;
            $v['cover'] = Functions::getImageUrl($v['cover']);
        }
        return $data;
    });


    Route::get("/blog/count",function(){

        return \App\Blog::where("is_show",1)->count();
    });

    //内容
    Route::get("/blog/content/{id}",function($id){

        return \App\Blog::where("is_show",1)->find($id);
    })->where("id","\d+");
    
    //推荐
    Route::get("/recommend",function(){

        $data = \App\Recommend::where("is_show",1)->get();
        foreach($data as $v){
            if(!$v['cover']) continue;
            $v['cover'] = Functions::getImageUrl($v['cover']);
        }
        return $data;
    });

    //通知
    Route::get("/notice",function(){
        return \App\Notice::all();
    });

    //获取分类
    Route::get("/category",function(){
        return \App\Category::where("pid",0)->get();
    });

    //获取指定分类下文章
    Route::get("/category/blog/{id}",function($id){

        $pageSize = 1;
        $blog = \App\Blog::where("category_id",$id)->where("is_show",1)->paginate($pageSize);

        foreach($blog as $v){
            if(!$v['cover']) continue;
            $v['cover'] = Functions::getImageUrl($v['cover']);
        }
        return $blog;
        
    });


    //归档
    Route::get("/archives",function(){

        $date = \DB::select("select date_format(created_at, '%Y-%m') date  from blogs group by date_format(created_at, '%Y-%m')");

        $data = [];
        foreach($date as $k=>$v){

            $v = (array)$v;

            $arr = explode("-",$v['date']);

            $data[$k]['date'] = $v['date'];
            $data[$k]['list'] = \DB::table("blogs")->where("is_show",1)->whereYear("created_at",$arr[0])->whereMonth("created_at",$arr[1])->get();
        }
        
        return $data;
    });

    //标签
    Route::get("/tags",function(){
        $data = \App\Tag::all();
        foreach($data as $v){
            $v['count'] = count($v->blog);
        }
        return $data;
    });

    //找出含有指定标签的文章
    Route::get("/tags/blog/{id}",function($id){

        $info = \App\Tag::with([
            //查出文章为显示状态的
            "blog"=>function($query){
                $query->select()
                ->where("is_show",1);
            },
        ])
        ->find($id);
        
        return $info->blog;
    });


    //关于
    Route::get("/about",function(){
        return \App\About::find(1);
    });

    //友链
    Route::get("/friend",function(){
        return \App\Friend::find(1);
    });
});
