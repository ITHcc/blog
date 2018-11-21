<?php

use Illuminate\Http\Request;

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

    Route::get("/blog/{page}",function(Request $req,$page){
        // return \App\Blog::where("is_top",1)->get();
        $pageSize = 5;
        $start = ($page-1) * $pageSize;

        return \App\Blog::offset($start)->limit($pageSize)->get();
        

    })->where('page', '\d+');


    Route::get("/blog/count",function(){

        return \App\Blog::count();
    });


    Route::get("/blog/content/{id}",function($id){

        return \App\Blog::find($id);
    })->where("id","\d+");
    

    Route::get("/recommend",function(){

        return \App\Recommend::all();
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
    Route::get("/category/blog/{id}/{page}",function($id,$page){
        $pageSize = 5;
        $start = ($page-1) * $pageSize;
        $blog = \App\Blog::where("category_id",$id)->offset($start)->limit($pageSize)->get();
        $count = \App\Blog::where("category_id",$id)->count();

        return [
            "blog"=>$blog,
            "count"=>$count
        ];
    });


    //归档
    Route::get("/archives",function(){
        // select *,date_format(created_at, '%Y-%m')   from blog group by date_format(created_at, '%Y-%m');
        $date = \DB::select("select date_format(created_at, '%Y-%m') date  from blog group by date_format(created_at, '%Y-%m')");

        $data = [];
        foreach($date as $k=>$v){

            $v = (array)$v;

            $arr = explode("-",$v['date']);

            $data[$k]['date'] = $v['date'];
            $data[$k]['list'] = \DB::table("blog")->whereYear("created_at",$arr[0])->whereMonth("created_at",$arr[1])->get();
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
});
