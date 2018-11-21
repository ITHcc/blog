<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
   
    //查询所有文章
    //查出每个文章对应的标签
    protected $table = "blog_tag";
    protected $fillable = ["blog_id","tag_id"];
    

    

}
