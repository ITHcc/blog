<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录-X-admin2.0</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./css/font.css">
	<link rel="stylesheet" href="./css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>

</head>
<body>
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="./index.html">Hcc个人博客-后台管理</a></div>
        <div class="left_open">
            <i title="展开左侧栏" class="iconfont">&#xe699;</i>
        </div>
        <ul class="layui-nav left fast-add" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">+新增</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onclick="x_admin_show('资讯','http://www.baidu.com')"><i class="iconfont">&#xe6a2;</i>资讯</a></dd>
              <dd><a onclick="x_admin_show('图片','http://www.baidu.com')"><i class="iconfont">&#xe6a8;</i>图片</a></dd>
               <dd><a onclick="x_admin_show('用户','http://www.baidu.com')"><i class="iconfont">&#xe6b8;</i>用户</a></dd>
            </dl>
          </li>
        </ul>
        <ul class="layui-nav right" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">admin</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              {{-- <dd><a onclick="x_admin_show('个人信息','http://www.baidu.com')">个人信息</a></dd> --}}
              {{-- <dd><a onclick="x_admin_show('切换帐号','http://www.baidu.com')">切换帐号</a></dd> --}}
              <dd><a href="{{ route('logout') }}">退出</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item to-index"><a href="http://blog.52qy.top">前台首页</a></li>
        </ul>
        
    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
     <!-- 左侧菜单开始 -->
    <div class="left-nav">
      <div id="side-nav">
        <ul id="nav">
            <li>
                <li>
                    <a _href="{{route('blog.index')}}">
                        <i class="iconfont">&#xe705;</i>
                        <cite>文章管理</cite>
                    </a>
                </li>

            </li>
            <li>
                <li>
                    <a _href="{{route('recommend.index')}}">
                        <i class="iconfont">&#xe717;</i>
                        <cite>推荐管理</cite>
                    </a>
                </li>

            </li>
            <li>
                <li>
                    <a _href="{{route('banner.index')}}">
                        <i class="iconfont">&#xe6c5;</i>
                        <cite>banner管理</cite>
                    </a>
                </li>

            </li>
            <li>
                <li>
                    <a _href="{{route('tag.index')}}">
                        <i class="iconfont">&#xe6c5;</i>
                        <cite>标签管理</cite>
                    </a>
                </li>

            </li>
            <li>
                <li>
                    <a _href="{{route('category.index')}}">
                        <i class="iconfont">&#xe699;</i>
                        <cite>分类管理</cite>
                    </a>
                </li>

            </li>
            <li>
                <li>
                    <a _href="{{route('notice.index')}}">
                        <i class="iconfont">&#xe713;</i>
                        <cite>通知管理</cite>
                    </a>
                </li>

            </li>
            <li>
                <li>
                    <a _href="{{route('about')}}">
                        <i class="iconfont">&#xe6ba;</i>
                        <cite>关于管理</cite>
                    </a>
                </li>

            </li>
            <li>
                <li>
                    <a _href="{{route('friend')}}">
                        <i class="iconfont">&#xe6c0;</i>
                        <cite>友链管理</cite>
                    </a>
                </li>

            </li>

            <li>
                <li>
                    <a _href="https://tongji.baidu.com/web/welcome/login">
                        <i class="iconfont">&#xe6ae;</i>
                        <cite>流量统计</cite>
                    </a>
                </li>

            </li>
            
        </ul>
      </div>
    </div>
    <!-- <div class="x-slide_left"></div> -->
    <!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
          <ul class="layui-tab-title">
            <li class="home"><i class="layui-icon">&#xe68e;</i>我的桌面</li>
          </ul>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='{{route('system')}}' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
          </div>
        </div>
    </div>
    <div class="page-content-bg"></div>
    <!-- 右侧主体结束 -->
    <!-- 中部结束 -->
    <!-- 底部开始 -->
    <div class="footer">
        <div class="copyright">Copyright ©2017 x-admin v2.3 All Rights Reserved</div>  
    </div>
    <!-- 底部结束 -->
    <script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
</body>
</html>