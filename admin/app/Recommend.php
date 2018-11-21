<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $fillable = ["title","cover","url","is_show"];
}
