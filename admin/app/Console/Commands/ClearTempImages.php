<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Libs\OSS;
use Illuminate\Support\Facades\Redis;
class ClearTempImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '清除上传成功且未提交的表单的图片!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //监听key失效事件
        Redis::psubscribe(['__keyevent@0__:expired'], function($key) {
            $arr = explode("tmp-",$key);
            //判断key是否是临时图片,防止误删
            if(count($arr)>1){
                @OSS::publicDeleteObject("hcc-blog",$arr[1]);
            }
            $this->info("文件:".$arr[1]."------删除成功!");
            
        });
    }
}
