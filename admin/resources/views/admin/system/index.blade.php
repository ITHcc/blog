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
    </head>
    <body>
    <div class="x-body layui-anim layui-anim-up">
        <blockquote class="layui-elem-quote">欢迎管理员：
            <span class="x-red">admin</span>！当前时间:{{date("Y-m-d H:i:s")}}</blockquote>
        <fieldset class="layui-elem-field">
            <legend>数据统计</legend>
            <div class="layui-field-box">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">
                                <div carousel-item="">
                                    <ul class="layui-row layui-col-space10 layui-this">
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>文章数</h3>
                                                <p>
                                                    <cite>{{$blogs}}</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>访问数</h3>
                                                <p>
                                                    <cite>0</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>分类数</h3>
                                                <p>
                                                    <cite>{{$categorys}}</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>标签数</h3>
                                                <p>
                                                    <cite>{{$tags}}</cite></p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统通知</legend>
            <div class="layui-field-box">
                {{-- <table class="layui-table" lay-skin="line">
                    <tbody>
                        <tr>
                            <td >
                                <a class="x-a" href="/" target="_blank">新版x-admin 2.0上线了</a>
                            </td>
                        </tr>
                        <tr>
                            <td >
                                <a class="x-a" href="/" target="_blank">交流qq群:(519492808)</a>
                            </td>
                        </tr>
                    </tbody>
                </table> --}}
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统信息</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>xxx版本</th>
                            <td>1.0.180420</td></tr>
                        <tr>
                            <th>服务器地址</th>
                            <td>{{$_SERVER['HTTP_HOST']}}</td></tr>
                        <tr>
                            <th>操作系统</th>
                            <td>{{php_uname('s')}}</td></tr>
                        <tr>
                            <th>运行环境</th>
                            <td>{{PHP_SAPI}}</td></tr>
                        <tr>
                            <th>PHP版本</th>
                            <td>{{PHP_VERSION}}</td></tr>
                        <tr>
                            <th>PHP运行方式</th>
                            <td>{{php_sapi_name()}}</td></tr>
                        <tr>
                            <th>Laravel版本</th>
                            <td>{{app()::VERSION}}</td></tr>
                        <tr>
                            <th>上传附件限制</th>
                            <td>{{get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件"}}</td></tr>
                        <tr>
                            <th>执行时间限制</th>
                            <td>{{get_cfg_var("max_execution_time")."s"}}</td></tr>
                        <tr>
                            <th>剩余空间</th>
                            <td>86015.2M</td></tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>开发团队</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>版权所有</th>
                            <td>Blog系统(Hcc)
                                <a href="http://www.root2.cn/" class='x-a' target="_blank">访问官网</a></td>
                        </tr>
                        <tr>
                            <th>开发者</th>
                            <td>怀闯闯(847404572@qq.com)</td></tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <blockquote class="layui-elem-quote layui-quote-nm">感谢layui,百度Echarts,jquery,本系统由x-admin提供技术支持。</blockquote>
    </div>
        <script>
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