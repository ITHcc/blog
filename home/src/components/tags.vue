<template>

    <div class="tags-box">
        <h1 style="color:#393D49">标签</h1>
        <br><hr><br>
        <ul>
            <li v-for="v in data">
                <router-link :to="'/tagblog/'+v.id" class="tag-btn">{{v.tag_name}} ({{v.count}}) </router-link>
            </li>
        </ul>
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
        this.$store.commit('updateNavActive',"tags");
        obj.getTags().then((res)=>{
            this.data = res.data;
        })
    }
}
</script>

<style>
.tags-box {
    overflow: hidden;
}
.tags-box li{
    float: left;
}
.tag-btn {
    display: inline-block;
    font-size: 14px;
    padding: 0 15px;
    height: 40px;
    line-height: 40px;
    color: rgba(36,121,204,.8);
    border: 1px solid rgba(36,121,204,.8);
    border-radius: 4px;
    margin: 0 15px 10px 0;
    text-decoration: none;
}
.tag-btn:hover {
    color: #2479CC;
    border-color: #2479CC;
}
</style>
