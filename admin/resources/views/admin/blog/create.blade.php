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
    <link rel="stylesheet" href="/lib/editormd/css/editormd.min.css" />
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/lib/editormd/editormd.min.js"></script>
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
                    <span class="x-red">*</span>文章名称
                </label>
                <div class="layui-input-block">
                    <input type="text" name="title" lay-verify="title|required" value=""  autocomplete="off" placeholder="请输入标题" class="layui-input">
                </div>
          </div>
          <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    <span class="x-red">*</span>所属分类
                </label>
                <div class="layui-input-inline">
                    <select name="category_id" lay-verify="required" lay-search="">
                        @foreach ($category as $item)
                            <option value="{{$item['id']}}"  >{{$item['cate_name']}}</option>
                        @endforeach
                        
                    </select>
                </div>
          </div>
          <div class="layui-form-item">
                <label class="layui-form-label">文章标签</label>
                <div class="layui-input-block">
                  @foreach ($tags as $item)

                    <input type="checkbox" name="tags[{{$item['id']}}]"   title="{{$item['tag_name']}}">
                  
                  @endforeach
                </div>
          </div>
            
          <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red">*</span>封面
              </label>
              <div class="layui-input-inline">
                    <div class="layui-upload">
                    <button type="button" class="layui-btn" id="test1">上传图片</button>
                    <div class="layui-upload-list">
                        <img class="layui-upload-img" id="demo1">
                        <p id="demoText"></p>
                    </div>
                    </div>   
              </div>
          </div>
          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">前言</label>
            <div class="layui-input-block">
              <textarea placeholder="请输入内容" name="preface" class="layui-textarea"></textarea>
            </div>
          </div>
          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">内容</label>
            <div class="layui-input-block">
                <div id="content">
                    <textarea style="display:none;">### Hello Editor.md !</textarea>
                </div>
            </div>
          </div>
      
  
          <div class="layui-form-item">
            <label class="layui-form-label">是否置顶</label>
            <div class="layui-input-block">
              <input type="radio" name="is_top" value="1" title="是">
              <input type="radio" name="is_top" value="0" title="否" checked>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">是否显示</label>
            <div class="layui-input-block">
              <input type="radio" name="is_show" value="1" title="是" checked>
              <input type="radio" name="is_show" value="0" title="否" >
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">排序分值</label>
            <div class="layui-input-inline">
              <input type="text" name="score" lay-verify="number" value="0" placeholder="分值越高,排序越前" class="layui-input">
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
    $(function() {

        var editor = editormd({
            id   : "content",
            path : "/lib/editormd/lib/",
            saveHTMLToTextarea:true,
            height:400,
            emoji: true,//emoji表情，默认关闭
            taskList: true,
            tocm: true, // Using [TOCM]
            tex: true,// 开启科学公式TeX语言支持，默认关闭

            flowChart: true,//开启流程图支持，默认关闭
            sequenceDiagram: true,//开启时序/序列图支持，默认关闭,

            dialogLockScreen : false,//设置弹出层对话框不锁屏，全局通用，默认为true
            dialogShowMask : false,//设置弹出层对话框显示透明遮罩层，全局通用，默认为true
            dialogDraggable : false,//设置弹出层对话框不可拖动，全局通用，默认为true
            dialogMaskOpacity : 0.4, //设置透明遮罩层的透明度，全局通用，默认值为0.1
            dialogMaskBgColor : "#fff",//设置透明遮罩层的背景颜色，全局通用，默认为#fff

            codeFold: true,

            imageUpload : true,
            imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
            imageUploadURL : "{{  route('editor.upload',['filename'=>'editormd-image-file'])  }}",
            token:"{{csrf_token()}}",

            /*上传图片成功后可以做一些自己的处理*/
            onload: function () {
                //console.log('onload', this);
                //this.fullscreen();
                //this.unwatch();
                //this.watch().fullscreen();
                //this.width("100%");
                //this.height(480);
                //this.resize("100%", 640);
            },

            /**设置主题颜色*/


        });
        

    });

      //layui
      layui.use(['form','layer','upload'], function(){
          $ = layui.jquery;
        var form = layui.form
        ,layer = layui.layer
        ,upload = layui.upload;

        //上传图片配置
        var uploadInst = upload.render({
            elem: '#test1'
            ,url: "{{route('upload_image',['filename'=>'cover'])}}"
            ,data: {
                _token:"{{csrf_token()}}"
            }
            ,accept:"images"
            ,field:"cover"
            ,before: function(obj){
            //预读本地文件示例，不支持ie8
            obj.preview(function(index, file, result){
                $('#demo1').attr('src', result); //图片链接（base64）
            });
            }
            ,done: function(res,index,upload){
                //如果上传失败
                if(res.code > 0){
                    return layer.msg('上传失败');
                }
                //上传成功
                // console.log(res.path);
                // console.log($("input[name=cover]"));
                $("#cover").val(res.path);
            }
            ,error: function(index,upload){
                //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });


        //监听提交
        form.on('submit(add)', function(data){
      
          //发异步，把数据提交给php
          $.ajax({
              url:"{{  route('blog.store')  }}",
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