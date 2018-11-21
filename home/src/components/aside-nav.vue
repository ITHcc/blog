<template>
    <!-- 侧边栏导航 -->
    <div  class="aside-box layui-col-xs2 layui-col-sm2 layui-col-md2 layui-col-lg2" id="aside">
      <div class="">
        <div class="user">
            <img src="http://parui8x60.bkt.clouddn.com/touxiang1.jpg" alt="" width="120" height="120">
            <p class="username">Hcc</p>
            <p class="signature">专注于技术分享。</p>
        </div>
        <div class="aside-nav">
            <ul class="layui-nav layui-nav-tree" lay-filter="">
                <li :class="['layui-nav-item',$store.state.navActive=='index' ? 'layui-this' : '' ]">
                  <router-link to="/"><i class="layui-icon layui-icon-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;首页</router-link>
                </li>
               
                <li :class="['layui-nav-item',$store.state.navActive=='category' ? 'layui-nav-itemed' : '' ]" >
                  <a href="javascript:;"><i class="layui-icon layui-icon-app">&nbsp;&nbsp;&nbsp;&nbsp;分类</i></a>
                  
                  <dl class="layui-nav-child">
                                                                                                                       <!-- {name: 'applename', params: { color: 'red' }} -->
                                                                                                                       <!-- {path: 'apple', params: { color: 'red' }} -->
                    <dd v-for="v in category" :class="[$store.state.cateActive==v.id ? 'layui-cate-this' : '']"><router-link :to="'/cateblog/'+v.id">{{v.cate_name}}</router-link></dd>
                  </dl>
                </li>

                <li :class="['layui-nav-item',$store.state.navActive=='archives' ? 'layui-this' : '' ]">
                  <router-link to="/archives" @click.native="jump('archives')"><i class="layui-icon layui-icon-date"></i>&nbsp;&nbsp;&nbsp;&nbsp;归档</router-link>
                </li>

                <li :class="['layui-nav-item',$store.state.navActive=='tags' ? 'layui-this' : '' ]">
                  <router-link to="/tags" @click.native="jump('tags')"><i class="layui-icon layui-icon-note"></i>&nbsp;&nbsp;&nbsp;&nbsp;标签</router-link>
                </li>

                <li :class="['layui-nav-item',$store.state.navActive=='my' ? 'layui-this' : '' ]">
                  <router-link to="/my" @click.native="jump('my')"><i class="layui-icon layui-icon-friends"></i>&nbsp;&nbsp;&nbsp;&nbsp;关于</router-link>
                </li>

                <li :class="['layui-nav-item',$store.state.navActive=='friends' ? 'layui-this' : '' ]">
                  <router-link to="/friends" @click.native="jump('friends')"><i class="layui-icon layui-icon-link"></i>&nbsp;&nbsp;&nbsp;&nbsp;友链</router-link>
                </li>
                
            </ul>
        </div>
      </div>
    </div>
</template>
<script>
import obj from '@/axios/api.js'
export default {
    data:function(){
      return {
        category:[],
      }
    },
    mounted:function(){
      layui.use('element', function(){
        var element = layui.element;
      });
      obj.getIndexCate().then((res)=>{
          this.category = res.data;
      });
    },
    computed:{

    },
    methods:{
      jump:function(value){

        this.$store.commit("updateNavActive",value)
        // console.log(this.$store.state.navActive);
      }
    }
}
</script>
<style>

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
  z-index:999;
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
</style>
