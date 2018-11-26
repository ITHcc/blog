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


//登录
Route::get("/login","LoginController@login")->name("login");
Route::post("/dologin","LoginController@dologin")->name("dologin");


Route::group(['middleware'=>"CheckAdmin"],function(){

    //退出登录
    Route::get("/logout","LoginController@logout")->name("logout");

    //首页
    Route::get("/","IndexController@index")->name("admin");

    //系统面板
    Route::get("/system","SystemController@index")->name("system");

    //banner管理
    Route::put("/banner/status/{id}","BannerController@status")->name("banner.status");
    Route::resource("/banner","BannerController");

    //文章管理
    Route::put("/blog/status/{id}","BlogController@status")->name("blog.status");
    Route::resource("/blog","BlogController");

    //标签管理
    Route::resource("/tag","TagController");

    //分类管理
    Route::resource("/category","CategoryController");

    //通知管理
    Route::resource("/notice","NoticeController");

    //推荐管理
    Route::put("/recommend/status/{id}","RecommendController@status")->name("recommend.status");
    Route::resource("/recommend","RecommendController");

    //关于管理
    Route::get("/about","AboutController@index")->name("about");
    Route::put("/about/update","AboutController@update")->name("about.update");

    //友链管理
    Route::get("/friend","FriendController@index")->name("friend");
    Route::put("/friend/update","FriendController@update")->name("friend.update");

    //libs
    Route::post("/upload/{filename}$","UploadController@uploadImage")->name("upload_image");
    Route::post("/editor/upload/{filename}","UploadController@editorUploadImage")->name("editor.upload");
});





Route::get("/test",function(){

    return view("admin.test.create");
    return \App\Services\OSS::getPrivateObjectURLWithExpireTime("hcc-blog","cover/15426815562714.jpg",new \DateTime('+1 day'));

});
Route::post("/test",function(){
    $info = \App\Blog::find(1);
    $info->content = $_POST['content-html-code'];
    $info->save();
    return $_POST['content-html-code'];
    return $_POST['preface'];
})->name("test");