<template>

    <div class="list-box" style="borderRadius: 5px;">
        
        <div class="layui-card" style="">
            <div class="layui-card-body">
                <h2>Hcc博客</h2>
                <p style="color:#98a6ad;">世上最好的保鲜就是不断进步，成为一个更好更值得被爱的人。</p>
            </div>
        </div>
        <!-- 通知栏:中小屏显示的样式 -->
        <div class="layui-hide-lg">
            <right></right>
        </div>

        <list-header></list-header>
        <div id="post">
            <article class="post"v-for="v in list">
                <fieldset class="layui-elem-field layui-field-title" style="marginBottom:10px;">
                    <legend><router-link :to="'/content/'+v.id" :title="v.title">{{v.title}}</router-link></legend>
                    <div class="layui-field-box">
                        <div class="entry-content">
                            <p style="padding:15px;"><router-link :to="'/content/'+v.id"><img v-show="v.cover" :src="v.cover" :alt="v.cover_desc" class="list_cover"></router-link></p>
                            <!-- <p class="sketch">由于前端技术的蓬勃发展和你自身的不断努力，很多小伙伴已经打通了任督二脉，做到了前后端通吃。你们就是自己程序世界里的神，在这里你们无所不能，创造世界，制定规则和逻辑。当一个属于你的世界做好后，你需要展示给朋友，发布于众人，让爱你的人欣赏。这时候我们需要一个强有力的服务器作为容器，而Nginx可以满足你的一切幻想。</p> -->
                            <blockquote class="layui-elem-quote sketch" v-html="v.preface"></blockquote>
                            <p class="more">
                                <router-link :to="'/content/'+v.id">阅读全文 »</router-link>
                            </p>
                        </div>
                    </div>
                </fieldset>
            </article>
        </div>
        <div id="more"></div>
    </div>

</template>
<script>
import listHeader from "@/components/list-header"
import right from "@/components/right"
import obj from '@/axios/api.js'
export default {
    components:{
        listHeader,
        right
    },
    data:function(){
        return {
            laypage:"",
            list:[],
        }
    },
    mounted:function(){
        this.$store.commit("updateNavActive","index");
        this.$store.commit("updateIsLoding",true);

        var that = this;
        // 分页懒加载
        layui.use("flow",function(){
            that.flow = layui.flow;
            that.flow.load({
                elem:"#more",
                done:function(page,next){
                    var lis = that.list;
                    obj.getIndexList(page).then((res)=>{
                        setTimeout(function(){
                            that.$store.commit("updateIsLoding",false);

                            res.data.data.forEach(function(e){
                                lis.push(e);
                            })
                            
                            next("", page<res.data.last_page); //假设总页数为 10

                        },400)
                    });
                }
            })
        })
      
    },
    methods:{

 
    }

}
</script>
<style>
.post {
    /* background-color: rgba(0,0,0,0.5); */
    /* background-color: rgb(247, 247, 247); */
    background-color: #fff;
    padding:10px 25px;
    border-radius: 3px;
    border:1px solid #ddd;
    border-top:none;
    /* box-shadow: 4px 4px 1px -2px rgba(0,0,0,.2), 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12); */
    margin-top:30px;
}
.list_cover {
    width:100%;
    max-height:230px;
    border:1px solid #a58d8d;
    border-radius: 2px;
}
.sketch{
    margin-bottom:0px;
    padding-bottom:5px;
    color:#5f5151;
    font-size:16px;
    line-height:1.8;
    /* background-color:rgb(247, 247, 247); */
    background-color: #fff;
}
.more {
    float:right;
    margin-right: 15px;
}
.more a{
    color: #01AAED;
}
#post legend {
    font-size:26px;
    font-weight:500;
}
#post img{
    cursor: pointer;
    transition: all 0.6s;
}
#post img:hover{
    transform: scale(1.02);
}
#post a:hover{
    color: #00bcd4;
}
</style>
