<template>
    <div class="friends-box">

        <h1 style="color:#393D49" v-html="data.title">友情链接</h1>
        <br>
        
        <p v-html="data.preface"></p>
        <hr class="layui-bg-green">
        <div class="content" v-html="data.content">
            
        </div>

    </div>
</template>
<script>
import obj from "@/axios/api"
export default {
     metaInfo: {
      title: '友链'+" - Hcc的个人博客", 
      meta: [
        {  
            name: 'keywords',
            content: "PHP,Laravel,VUE,jQuery,CSS,HTML,MYSQL,redis,LNMP,Bootstrap,AmazeUI前端,Hcc的个人博客"
        },
        {
            name: 'description',
            content: "友链-Hcc的个人博客"
        }
      ]
    },
    data:function(){
        return {
            data:[],
        }
    },
    mounted:function(){
        obj.getFriend().then((res)=>{
            this.data = res.data
        })
        this.$store.commit('updateNavActive',"friends");
    }
}
</script>
<style>
.friends-box{
    font-size:16px;
    line-height: 28px;
}

</style>