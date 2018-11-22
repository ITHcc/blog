<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title','preface','content','logo','cover','cover_desc','category_id','is_top','is_show','score','comment'];

    public function category(){
        return $this->hasOne("\App\Category","id","category_id");
    }

    public function tags(){
        return $this->belongsToMany("App\Tag");
    }
    
}
