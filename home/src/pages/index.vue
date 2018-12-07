<template>
  <div>
      

      <header>

          <a href="javascript:;"  id='toogleAside'><i class="layui-icon layui-icon-spread-left" style="color:#fff;font-size:20px;"></i></a>

        <a href="" @click.prevent="search()"><i class="layui-icon layui-icon-search" style="color:#fff;font-size:20px;"></i></a>

      </header>
      
      <banner @resize="resize"></banner>
      <!-- ,backgroundColor:'#f7f7f7' -->
      
      <div  class="layui-fluid box" ref="box" :style="{marginTop:bannerMargin,paddingTop:'20px',minHeight:'700px'}">
        <loding  v-show="$store.state.isLoding"></loding>

        <div class="layui-row layui-col-space30">
            <div class="layui-col-xs12 layui-col-sm12 layui-col-md11 layui-col-lg7 layui-col-lg-offset1">
               
               <div class="layui-row">
                  <div class="layui-col-xs12 layui-col-sm12 layui-col-md12 layui-col-lg10 layui-col-lg-offset2 container-box">
                      <!-- 通知:超小屏幕,小屏幕,大屏幕显示  -->
        
                      <router-view name="main"/> 
                                                              
                      <footer  v-show="$store.state.navActive!='index'" class="footer">
                        <p class="reprint">转载声明：商业转载请联系作者获得授权,非商业转载请注明出处 © Hcc</p>
                        Copyright © 2018&nbsp;-&nbsp; Hcc&nbsp;&nbsp;鄂ICP备17027437号
                        
                          &nbsp;-&nbsp;<a href="/">52qy.top</a>

                      </footer>
                  </div>

              </div>
            </div>
            <!-- 通知:超大屏显示 -->
            <div class="layui-col-lg3  layui-hide-xs layui-hide-sm layui-hide-md layui-show-lg-block">
              <router-view name="right"/>
            </div>
        </div>
      </div> 
      
  </div>
</template>

<script>
import banner from "@/components/banner"
import loding from "@/components/loding"


export default {
  name: 'index',
  components:{
    banner,
    loding,
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
  }
  
 
}
</script>

<style>
body {
  background-color: #eee;
}

.container-box {
    border-radius: 5px;
    background-color:#fff;
    padding:60px 20px 0px;
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

</style>
