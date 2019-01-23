<template>
    <div class="archives-box">
        <h1 style="color:#393D49">归档</h1>
        <br><br><br>
        <ul class="layui-timeline">

            <li class="layui-timeline-item" v-for="v in data">
                <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                <div class="layui-timeline-content layui-text">
                <h3 class="layui-timeline-title">{{v.date}}</h3>
                <ul>
                    <li v-for="v1 in v.list" >
                        <router-link :to="'/content/'+v1.id" style="fontSize:16px;">{{v1.title}}</router-link><span class="datetime">{{v1.created_at}}</span>
                    </li>
                </ul>
                </div>
            </li>

            <li class="layui-timeline-item">
                <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                <div class="layui-timeline-content layui-text">
                    <div class="layui-timeline-title" style="font-size:18px;color:#333;font-weight:500;">2018-11-17博客上线</div>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
import obj from "@/axios/api";

export default {
    metaInfo: {
      title: '归档'+" - Hcc的个人博客", // set a title
      meta: [
        {                 // set meta
            name: 'keywords',
            content: "PHP,Laravel,VUE,jQuery,CSS,HTML,MYSQL,redis,LNMP,Bootstrap,AmazeUI前端,Hcc的个人博客"
        },
        {
            name: 'description',
            content: "归档-Hcc的个人博客"
        }
      ]
    },
    data:function(){
        return {
            data:[],
        }
    },
    mounted:function(){
        this.$store.commit('updateNavActive',"archives");
        obj.getArchives().then((res)=>{
            this.data = res.data;
        })
    }
}
</script>
<style>
.datetime {
    font-size:12px;
    font-style:italic;
    margin-left:5px;
}
</style>