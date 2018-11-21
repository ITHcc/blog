<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/css/font.css">
    <link rel="stylesheet" href="/css/xadmin.css">
    <link href="https://cdn.bootcss.com/wangEditor/10.0.13/wangEditor.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/wangEditor/10.0.13/wangEditor.min.js"></script>
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
  .layui-upload-img{
      width:330px;
      height:80px;
      margin: 0 10px 10px 0;
  }
  </style>
  <body>
    <div class="x-body">
        <form class="layui-form" id="update" enctype="application/x-www-form-urlencoded">
          <div class="layui-form-item">
                <label class="layui-form-label">
                    <span class="x-red">*</span>标签名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" name="cate_name" lay-verify="title|required" value=""  autocomplete="off" placeholder="请输入标题" class="layui-input">
                </div>
          </div>
          @csrf
          <input type="hidden" name="cover" id="cover">
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  增加
              </button>
          </div>
      </form>
    </div>
    <script>
 

      //layui
      layui.use(['form','layer'], function(){
          $ = layui.jquery;
        var form = layui.form
        ,layer = layui.layer;

        //监听提交
        form.on('submit(add)', function(data){
      
          //发异步，把数据提交给php
          $.ajax({
              url:"{{  route('category.store')  }}",
              type:"post",
              data:$("#update").serialize(),
              success:function(data){
                  console.log(data);
              }
          })
          layer.alert("增加成功", {icon: 6},function () {
              // 获得frame索引
              var index = parent.layer.getFrameIndex(window.name);
            //   console.log(index);
              //关闭当前frame
              parent.layer.close(index);
          });
          return false;
        });
        
        
      });
  </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
  </body>

</html>