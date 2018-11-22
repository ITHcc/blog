<template>
  <div>
      

      <header>

          <a href="javascript:;"  id='toogleAside'><i class="layui-icon layui-icon-spread-left" style="color:#fff;font-size:20px;"></i></a>

        <a href="" @click.prevent="search()"><i class="layui-icon layui-icon-search" style="color:#fff;font-size:20px;"></i></a>

      </header>
      
      <banner @resize="resize"></banner>
      <!-- ,backgroundColor:'#f7f7f7' -->
      <div  class="layui-fluid box" ref="box" :style="{marginTop:bannerMargin,paddingTop:'20px',minHeight:'700px'}">
        <div class="layui-row ">
            <div class="layui-col-xs7 layui-col-sm7 layui-col-md7 layui-col-lg7 layui-col-xs-offset2 layui-col-xs-offset2 layui-col-sm-offset2 layui-col-md-offset2 layui-col-lg-offset2">
               
                  <div class="layui-row">
                    <div class="layui-col-xs11 layui-col-sm11 layui-col-md11 layui-col-lg11 container-box">
                        <router-view name="main"/> 
                        
                        <footer  v-show="$store.state.navActive!='index'" class="footer">
                          <p class="reprint">转载声明：商业转载请联系作者获得授权,非商业转载请注明出处 © Hcc</p>
                          Copyright © 2018&nbsp;-&nbsp; Hcc&nbsp;&nbsp;鄂ICP备17027437号
                          
                            &nbsp;-&nbsp;<a href="/">52qy.top</a>
  
                        </footer>

                    </div>
                </div>
            </div>
            <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 layui-col-lg3">
              <router-view name="right"/>
            </div>
        </div>
      </div> 
      
      <asideNav v-show="asideStatus" class="layui-anim layui-anim-fadein" ref="asideNav"></asideNav>


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

      <div :class="[{'zhegai':$store.state.asideStatus}]" ></div>
  </div>
</template>

<script>
import asideNav from "@/components/aside-nav"
import banner from "@/components/banner"


export default {
  name: 'index',
  components:{
    asideNav,
    banner
  },
  data(){
    return {
      layer:"",
      banner:"",
      bannerMargin:"1px",
      clientHeight:document.documentElement.clientHeight,
    }
  },
  mounted:function(){

    var that = this;
    layui.use("layer",function(){      
      that.layer = layui.layer;
    })
  },
  methods:{
    search:function(){

      this.layer.open({
        type:1,
        title:"搜索",
        content: `<div class="search-box layui-fluid">
        <div class="layui-row">
          <div class="layui-col-xs10 layui-col-sm10 layui-col-md11 layui-col-lg11">
            <input type="text" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">  
          </div>
          <div class="layui-col-xs2 layui-col-sm2 layui-col-md1 layui-col-lg1">
            <button class="layui-btn layui-btn-radius layui-btn-normal">搜索</button>
          </div>
        </div>
      </div>`, 
        // skin:"layui-layer-lan",
        area:['50%','90px']
      });
      
    },

    resize:function(value){
      
      this.bannerMargin = value;
    },
  },
  computed:{
    asideStatus(){
      return this.$store.state.asideStatus;
    }
  }
  
 
}
</script>

<style>
body {
  background-color: #eee;
}
.box {
  /* background-color: #f7f7f7; */
  /* background-color:#eee; */
  /* background-image:url("/static/images/192642-15327772028c2d.jpg"); */
  /* background-size:100% 800px; */
}
.container-box {
    border-radius: 5px;
    background-color:#fff;
    padding:60px 60px 0px;
    min-height:700px;
    overflow: hidden;
    /* position:absolute; */
}
.container-box>:first-child {
  margin-bottom:130px;
}
header {
  box-sizing: border-box;
  width:100%;
  padding:0 40px;
  line-height: 60px;
  position:absolute;
  top:0px;
  z-index: 999;
  text-align:justify;
  text-align-last:justify;
}
.header i {
  z-index:2;
}

.box .layui-row{
  height:100%;
}

/*搜索*/
.search-box input {
  border-radius: 20px;
}
.reprint {
  margin-bottom:10px;
}
.footer {
  width: 100%;
  position:absolute;
  bottom:25px;
  left:0px;
  line-height: 22px;
  text-align: center;
}
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
