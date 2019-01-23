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

use Elasticsearch\ClientBuilder;

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




Route::get("/search",function(){
    $client = ClientBuilder::create()->setHosts(["127.0.0.1:9200"])->build();
    $params = [
        'index' => 'blog',
        'type' => '_doc',
        'body' => [
            'query' => [
                'match' => [
                    'title' => 'git'
                ]
            ]
        ]
    ];
    $response = $client->search($params);
    return $response;
});


Route::get("/test",function(){
    $client = ClientBuilder::create()->setHosts(["127.0.0.1:9200"])->build();

    $data = \App\Blog::with(["tags"=>function($query){
        $query->select('tags.id','tag_name');
    },"category"=>function($query){
        $query->select('categorys.id',"cate_name");
    }])->get();

    foreach($data as $v){
        $params = [
            'index' => 'blog',
            'type' => '_doc',
            'id' => $v['id'],
            'body' => $v
        ];
        $response = $client->index($params);
    }

    return $response;

    $client = ClientBuilder::create()->setHosts(["127.0.0.1:9200"])->build();
    $params = [
        'index' => 'blog',
        'body' => [
           'mappings'=>[
               '_doc'=>[
                   'properties'=>[
                       'title'=>[
                           'type'=>'text',
                           'analyzer'=>'ik_max_word',
                       ],
                       'preface'=>[
                           'type'=>'text',
                           'analyzer'=>'ik_max_word',
                       ],
                       'content'=>[
                           'type'=>'text',
                           'analyzer'=>'ik_max_word',
                       ],
                       'content_mark'=>[
                            'type'=>'text',
                            'analyzer'=>'ik_max_word',
                       ],
                       'cover'=>[
                           'type'=>'keyword',
                       ],
                       'cover_desc'=>[
                           'type'=>'keyword',
                       ],
                       'category_id'=>[
                           'type'=>'short',
                       ],
                       'is_top'=>[
                           'type'=>'byte',
                       ],
                       'score'=>[
                           'type'=>'short',
                       ],
                       'comment'=>[
                           'type'=>'short',
                       ],
                       'created_at'=>[
                            'type'=>'keyword',
                       ],
                       'updated_at'=>[
                            'type'=>'keyword',
                       ],
                       'tags'=>[
                            'type'=>'nested',
                            'properties'=>[
                                'id'=>['type'=>'short'],
                                'tag_name'=>['type'=>'text','analyzer'=>'ik_max_word'],
                            ]
                        ],
                        'category'=>[
                            'type'=>'nested',
                            'properties'=>[
                                'id'=>['type'=>'short'],
                                'cate_name'=>['type'=>'text','analyzer'=>'ik_max_word'],
                            ]
                        ]
                   ]
               ]
           ]
        ]
    ];
    
    $response = $client->indices()->create($params);
    print_r($response);
});
Route::post("/test",function(){
    $info = \App\Blog::find(1);
    $info->content = $_POST['content-html-code'];
    $info->save();
    return $_POST['content-html-code'];
    return $_POST['preface'];
})->name("test");