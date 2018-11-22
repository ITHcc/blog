<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title")->comment("标题");
            $table->string('preface',2000)->nullable()->comment("前言");
            $table->text("content")->comment("内容");
            $table->string("cover")->nullable()->comment("封面");
            $table->string("cover_desc")->nullable()->comment("封面描述");
            $table->unsignedInteger("category_id")->comment("分类id");
            $table->unsignedTinyInteger("is_top")->default(0)->comment("是否置顶");
            $table->unsignedTinyInteger("is_show")->default(1)->comment("是否显示");
            $table->unsignedTinyInteger("score")->default(0)->comment("排序分值");
            $table->unsignedInteger("comment")->default(0)->comment("评论数");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
