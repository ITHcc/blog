<template>
  <div id="app" @click="changeAside">

      <router-view/> 


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

export default {
  name: 'App',
  data:function(){
    return {
      
    }
  },
  mounted:function(){

    //  var that = this;
    //  layui.use(['element','layer','form','laypage'], function(){
    //   that.element = layui.element;
    //   that.layer = layui.layer;
    //   that.form = layui.form;
    //   that.laypage = layui.laypage;
    //  });
  },
  methods:{
    changeAside:function(){

      var sp = document.querySelector("#aside");
      var sp1 = document.querySelector("#toogleAside")
      // console.log(sp.contains);
      if(!sp.contains(event.target)){
        this.$store.commit('updateAside',false);
      }
      if(sp1.contains(event.target)){
        var value = this.$store.state.asideStatus ? false : true;
        this.$store.commit('updateAside',value);
      }

    }
  }
}
</script>
<style>
a {
  /* color:#01AAED; */
}
/* body {
  background-color: transparent;
} */
body {
  

}
</style>

