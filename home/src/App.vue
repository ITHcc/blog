<template>
  <div id="app" @click="changeAside">

      <router-view/> 

<!-- 侧边栏导航 -->
    <div v-show="asideStatus"  class="aside-box layui-col-xs6 layui-col-sm4 layui-col-md3 layui-col-lg2" id="aside">
      <div class="">
        <div class="user">
            <img src="/static/images/touxiang.jpeg" alt="" width="120" height="120">
            <p class="username">Hcc</p>
            <p class="signature">专注于技术分享。</p>
        </div>
        <div class="aside-nav">
            <ul class="layui-nav layui-nav-tree" lay-filter="">
                <li :class="['layui-nav-item',$store.state.navActive=='index' ? 'layui-this' : '' ]">
                  <router-link to="/"><i class="layui-icon layui-icon-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;首页</router-link>
                </li>
               
                <li :class="['layui-nav-item',$store.state.navActive=='category' ? 'layui-nav-itemed' : '' ]" >
                  <a href="javascript:;"><i class="layui-icon layui-icon-app">&nbsp;&nbsp;&nbsp;&nbsp;分类 
                    </i></a>
                  
                  <dl class="layui-nav-child">
                    <dd v-for="v in category" :class="[$store.state.cateActive==v.id ? 'layui-cate-this' : '']"><router-link :to="'/cateblog/'+v.id">{{v.cate_name}}</router-link></dd>
                  </dl>
                </li>

                <li :class="['layui-nav-item',$store.state.navActive=='archives' ? 'layui-this' : '' ]">
                  <router-link to="/archives" @click.native="jump('archives')"><i class="layui-icon layui-icon-date"></i>&nbsp;&nbsp;&nbsp;&nbsp;归档</router-link>
                </li>

                <li :class="['layui-nav-item',$store.state.navActive=='tags' ? 'layui-this' : '' ]">
                  <router-link to="/tags" @click.native="jump('tags')"><i class="layui-icon layui-icon-note"></i>&nbsp;&nbsp;&nbsp;&nbsp;标签</router-link>
                </li>

                <li :class="['layui-nav-item',$store.state.navActive=='about' ? 'layui-this' : '' ]">
                  <router-link to="/about" @click.native="jump('about')"><i class="layui-icon layui-icon-friends"></i>&nbsp;&nbsp;&nbsp;&nbsp;关于</router-link>
                </li>

                <li :class="['layui-nav-item',$store.state.navActive=='friends' ? 'layui-this' : '' ]">
                  <router-link to="/friends" @click.native="jump('friends')"><i class="layui-icon layui-icon-link"></i>&nbsp;&nbsp;&nbsp;&nbsp;友链</router-link>
                </li>
                <li v-show="0" :class="['layui-nav-item',$store.state.navActive=='bug' ? 'layui-this' : '' ]">
                  <router-link to="/friends" @click.native="jump('friends')"><i class="layui-icon layui-icon-link"></i>&nbsp;&nbsp;&nbsp;&nbsp;bug</router-link>
                </li>
            </ul>
        </div>
      </div>
    </div>
    <div :class="[{'zhegai':$store.state.asideStatus}]" ></div>

      <!-- 搜索框 -->
      <!-- <div class="search-box layui-fluid">
        <div class="layui-row">
          <div class="layui-col-xs8 layui-col-sm8 layui-col-md10 layui-col-lg10">
            <input type="text" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">  
          </div>
          <div class="layui-col-xs4 layui-col-sm4 layui-col-md2 layui-col-lg2">
            <button class="layui-btn layui-btn-radius layui-btn-normal">搜索</button>
          </div>
        </div>
      </div> -->
  </div>
</template>

<script>
import obj from '@/axios/api.js'

export default {
  name: 'App',
  data:function(){
    return {
        isRouterAlive: true,
        category:[],
    }
  },
  created:function(){

    layui.use('element', function(){
        var element = layui.element;
    });
    obj.getIndexCate().then((res)=>{
        this.category = res.data;
    });
  },
  methods:{
    changeAside:function(){

      var sp = document.querySelector("#aside");
      var sp1 = document.querySelector("#toogleAside")

      if(!sp.contains(event.target)){
        this.$store.commit('updateAside',false);
      }
      if(sp1.contains(event.target)){
        var value = this.$store.state.asideStatus ? false : true;
        this.$store.commit('updateAside',value);
      }

    },
    jump:function(value){

        this.$store.commit("updateNavActive",value)
    }
  },
  computed:{
    asideStatus(){
      return this.$store.state.asideStatus;
    }
  }
}
</script>
<style>
/*侧边导航样式   S */
.user {
  box-sizing: border-box;
  width: 100%;
  height: 210px;
  padding:20px 0px;
  background-image: url("/static/images/329964-150x300.jpg");
  text-align: center;
  font-size:14px;
  line-height:22px;
}
.user img {
  width: 120px;
  height: 120px;
  border-radius: 50%;
}
.user .username {
  margin-top:5px;
  color:#fff;
  font-weight: 700;
}
.user .signature{
  font-size:12px;
  color:hsla(0,0%,100%,.7);
}
.layui-nav .layui-nav-item a{
  padding-left:30px;
}
.aside-box {
  height:100%;
  position:fixed;
  top:0px;
  left:0px;
  z-index:10;
}
.aside-nav {
  position:absolute;
  top:210px;
  width:100%;
  height:100%;
}
.aside-nav ul{
  width:100%;
  height:100%;
}
/* 修改layui个别样式 */
.layui-nav-tree .layui-this>:first-child{
    background-color: #009688;
    color: #fff;
}
.layui-nav-tree .layui-this {
  background-color: transparent;
}
.layui-nav-tree .layui-cate-this {
    background-color: #009688;
    color: #fff;
}
/*侧边导航样式   E */


/* 遮盖 */
.zhegai {
  width: 100%;
  height:100%;
  position: fixed;
  top:0px;
  left:0px;
  background: rgba(0,0,0,.2);
  z-index:5;
}
</style>

