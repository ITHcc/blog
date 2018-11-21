<template>
    <div class="layui-col-xs10 layui-col-sm10 layui-col-md10 layui-col-lg10">
        <div class="layui-card" v-for="v in notice" style="borderRadius: 4px;">
            <div class="layui-card-header" v-show="v.title" v-html="v.title"></div>
            <div class="layui-card-body">
                <!-- <img v-show="v.cover" :src="v.cover" :alt="v.title" style="width:100%;" > -->
                <div v-show="v.content" v-html="v.content"></div>
            </div>
        </div>
    </div>
</template>
<style>
    
</style>
<script>
import obj from '@/axios/api.js'
export default {
    data:function(){
        return {
            notice:[],
        }
    },
    mounted:function(){
        obj.getNotice().then((res)=>{
            this.notice = res.data
        })
    }
}
</script>
