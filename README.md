

## 功能描述

一个基于vue全家桶开发的的个人博客

demo: http://blog.52qy.top/

### 前台功能:

​	首页:置顶文章,通知消息,推荐广告

​	分类:根据分类查找文章

​	归档:按月份查看文章列表

​	标签:根据标签查看对应文章列表

​	关于: 显示关于本站的信息

​	友链: 显示本站的友链

### 后台功能:

​	文章管理:  显示文章列表、搜索文章、添加文章,修改文章、删除文章

​	推荐管理: 显示推荐列表、添加推荐、修改推荐、删除推荐

​	banner图管理: 显示、添加、修改、删除

​	标签管理: 显示、添加、修改、删除

​	分类管理:显示、添加、修改、删除

​	通知管理:显示、添加、修改、删除

​	关于管理:显示、修改

​	友链管理:显示、修改

## 开发环境

php7.2

nginx1.4

mysql5.6

### 前台

​	前台使用vue全家桶(vue-cli、router、vuex)开发。axios库请求api,使用layui构建的页面。样式是仿的技术胖个人博客http://jspang.com/ 。

### 后台

​	后台使用laravel5.7框架开发。用的X-admin后台模板。AliyunOss对象存储,使用redis中的订阅者模式监听key失效事件,来删除 ajax上传文件后未提交表单造成大量无主文件。



## 安装

1. 使用 git clone下载源码
2. 修改.env配置文件
3. 导入sql文件
4. 前台
   - 在home目录中运行 npm install 依赖包（需要node环境）
   - 运行npm run dev 编译项目
   - http://localhost:3000
5. 后台
   - 在admin目录中运行composer install 安装依赖包（需要安装composer）
   - 运行php artisan serve命令,打开web服务器
   - 修改Redis配置文件,搜索"notify-keyspace-events"修改为notify-keyspace-events=”Ex“
   - 运行nohup php artisan image:clear >> image-clear.log 2>&1 & 监听失效的key删除无主文件

## 更新

安装有什么问题或者有什么建议,可以联系我 qq847404572

后期持续更新



​	

​	

​	