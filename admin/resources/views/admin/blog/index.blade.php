<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body class="layui-anim layui-anim-up">
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:2.4em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          <input class="layui-input" placeholder="开始日" name="start" id="start">
          <input class="layui-input" placeholder="截止日" name="end" id="end">
          <input type="text" name="keyword"  placeholder="请输入关键字" autocomplete="off" class="layui-input">
            <div class="layui-input-inline">
              <select name="category_id" lay-verify="required" lay-search="">
                <option value="">所属分类</option>
                @foreach ($category as $item)
                    <option value="{{$item['id']}}">{{$item['cate_name']}}</option>
                @endforeach
              </select>
            </div>
            <div class="layui-input-inline">
              <select name="tag_id" lay-verify="required" lay-search="">
                <option value="">所属标签</option>
                @foreach ($tags as $item)
                  <option value="{{$item['id']}}">{{$item['tag_name']}}</option>
                @endforeach
              </select>
            </div>
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick='x_admin_show("添加用户","{{ route('blog.create') }}",1100,700)'><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：{{count($data)}} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>标题</th>
            <th>封面</th>
            <th>所属分类</th>
            <th>文章标签</th>
            <th>评论数量</th>
            <th>排序分值</th>
            <th>是否置顶</th>
            <th>发表时间</th>
            <th>状态</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $v)
            <tr>
              <td>
                <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
              </td>
              <td>{{$v['id']}}</td>
              <td>{{$v['title']}}</td>
              <td>
                <img src="{{$v['cover']}}" alt="{{$v['cover_desc']}}">
              </td>
              <td>{{$v->category['cate_name']}}</td>
              <td>
                {{-- @foreach($v->tags as $v1)
                  {{$v1['tag_name'].","}}
                @endforeach   --}}
                {{ implode("、"  , array_column($v->tags->toArray(),"tag_name") )}}
              </td>
              <td>{{$v['comment']}}</td>
              <td>{{$v['score']}}</td>
              <td>
                @if($v['is_top'])
                  是  
                @else
                  否
                @endif
              </td>
              <td>{{$v['created_at']}}</td>
              <td class="td-status">
                  @if($v['is_show'])
                    <span class="layui-btn layui-btn-normal layui-btn-mini">已显示</span>
                  @else
                    <span class="layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled">已隐藏</span>
                  @endif
              </td>
              <td class="td-manage">

                @if(!$v['is_show'])
                  <a onclick="member_stop(this,{{$v['id']}})" href="javascript:;"  title="隐藏">
                    <i class="layui-icon">&#xe62f;</i>
                  </a>
                @else
                  <a onclick="member_stop(this,{{$v['id']}})" href="javascript:;"  title="显示">
                    <i class="layui-icon">&#xe601;</i>
                  </a>
                @endif
               
                <a title="编辑"  onclick='x_admin_show("编辑","{{ route('blog.edit',['id'=>$v['id']]) }}",1100,700)' href="javascript:;">
                  <i class="layui-icon">&#xe642;</i>
                </a>
                <a title="删除" onclick="member_del(this,{{$v['id']}})" href="javascript:;">
                  <i class="layui-icon">&#xe640;</i>
                </a>
              </td>
            </tr>           
          @endforeach
        </tbody>
      </table>
      
      <div class="page">
        {{ $data->appends(['start'=>$data->start, 'end'=>$data->end, 'keyword'=>$data->keyword, 'category_id'=>$data->category_id, 'tag_id'=>$data->tag_id])->render() }}

      </div>

    </div>
    <script>
      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

       /*用户-隐藏*/
      function member_stop(obj,id){
          layer.confirm('确认要修改吗？',function(index){

              let larvelUrl = "{{  route('blog.status',['id'=>777])  }}";
              var url = larvelUrl.replace(777,id);
              //发异步删除数据
              $.ajax({
                url:url,
                type:"put",
                data:{_token:"{{csrf_token()}}"},
                success:function(data){
                    if($(obj).attr('title')=='显示'){

                      //发异步把用户状态进行更改
                      $(obj).attr('title','隐藏')
                      $(obj).find('i').html('&#xe62f;');

                      $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已隐藏');
                      layer.msg('已隐藏!',{icon: 5,time:1000});

                      }else{
                      $(obj).attr('title','显示')
                      $(obj).find('i').html('&#xe601;');

                      $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已显示');
                      layer.msg('已显示!',{icon: 1,time:1000});
                    }
                }
              })
              
              
          });
      }

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              
              let url = "{{  route('blog.destroy',['id'=>777])  }}";
              url = url.replace(777,id);
              //发异步删除数据
              $.ajax({
                url:url,
                type:"delete",
                data:{_token:"{{csrf_token()}}"},
                success:function(data){
                  $(obj).parents("tr").remove();
                  layer.msg('已删除!',{icon:1,time:1000});
                }
              })
            
          });
      }



      function delAll (argument) {

        var data = tableCheck.getData();
  
        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
      }
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
  </body>

</html>