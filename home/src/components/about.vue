<template>

    <div class="about-box">
        <h1 style="color:#393D49" v-html="data.title">关于我</h1>
        <br>
        <p v-html="data.preface">开始招友链，要求前端博客，并且有20篇以上原创文章，剩下的没有要求。</p>
        <hr class="layui-bg-green">
        <div class="content" v-html="data.content">
           
        </div>
    </div>

</template>
<script>
import obj from "@/axios/api";
export default {
     metaInfo: {
      title: '关于'+" - Hcc的个人博客",
      meta: [
        {  
            name: 'keywords',
            content: "PHP,Laravel,VUE,jQuery,CSS,HTML,MYSQL,redis,LNMP,Bootstrap,AmazeUI前端,Hcc的个人博客"
        },
        {
            name: 'description',
            content: "关于-Hcc的个人博客"
        }
      ]
    },
    data:function(){
        return {
            data:[],
        }
    },
    mounted:function(){
        obj.getAbout().then((res)=>{
            this.data = res.data;
        })
        this.$store.commit('updateNavActive',"about");
    }
}
</script>
<style>
.about-box {
    font-size: 16px;
    line-height: 28px;
}

</style>