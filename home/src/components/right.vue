<template>
    <div class="notice">

        <div class="layui-hide-xs layui-hide-sm layui-hide-md layui-show-lg-block	 layui-col-lg10 layui-col-lg-offset1" :style="{'borderRadius': '4px'}">
            <div v-for="(v,k) in notice" class="layui-card">
                <div class="layui-card-header" v-show="v.title" v-html="v.title"></div>
                <div class="layui-card-body">
                    <!-- <img v-show="v.cover" :src="v.cover" :alt="v.title" style="width:100%;" > -->
                    <div v-show="v.content" v-html="v.content"></div>
                </div>
            </div>
        </div>
        <div style="display:flex;justify-content: space-between;align-items: self-end;">
            <div class="layui-card layui-col-xs5 layui-col-sm5 layui-col-md5 layui-hide-lg" v-for="(v,k) in notice" :style="{'borderRadius': '4px'}">
                <div class="layui-card-header" v-show="v.title" v-html="v.title"></div>
                <div class="layui-card-body">
                    <!-- <img v-show="v.cover" :src="v.cover" :alt="v.title" style="width:100%;" > -->
                    <div v-show="v.content" v-html="v.content"></div>
                </div>
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
