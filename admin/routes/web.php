<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get("/blog/{page}",function(Request $req,$page){
//     // return \App\Blog::where("is_top",1)->get();
//     $pageSize = 5;
//     $start = ($page-1) * $pageSize;
//     return \App\Blog::offset($start)->limit($pageSize)->get();
// });

//首页
Route::get("/","IndexController@index")->name("admin");

//系统面板
Route::get("/system","SystemController@index")->name("system");

//文章管理
Route::resource("/blog","BlogController");

//标签管理
Route::resource("/tag","TagController");

//分类管理
Route::resource("/category","CategoryController");

//通知管理
Route::resource("/notice","NoticeController");

//推荐管理
Route::resource("/recommend","RecommendController");
//libs
Route::post("/upload/{filename}","UploadController@uploadImage")->name("upload_image");


Route::get("/test",function(){

    return \App\Services\OSS::getPrivateObjectURLWithExpireTime("hcc-blog","cover/15426815562714.jpg",new \DateTime('+1 day'));


});