<template>
    <div class="content-box">
        <fieldset class="layui-elem-field">
            <legend style="" class="title">{{data.title}}</legend>
        
            <p v-html="data.preface"></p>
            <hr class="layui-bg-green">
            <div class="layui-field-box content" v-html="data.content"></div>
        </fieldset>
    </div>
</template>
 <script>
 import obj from "@/axios/api"
 
 export default {
     data:function(){
         return {
             data:[],
         }
     },
     mounted:function(){
         this.$store.commit('updateNavActive',"category");
         
         obj.getContent(this.$route.params.id).then((res)=>{
            //  console.log(res);
             this.data = res.data;
             this.$store.commit("updateCateActive",this.data.cate_id)
         })
     }
 }
 </script>
 <style scoped>
 .title {
    color:#666;
    font-size:25px;
    font-weight:bold;
 }
 .content {
    font-size:18px;
    margin-top:20px;
 }
 </style>