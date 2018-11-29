<template>
    <div class="layui-row layui-col-space15">
        <div class="layui-col-xs4 layui-col-msm4 layui-col-md4 layui-col-lg4" v-for="v in top">
            <a :href="v.url">
                <img :src="v.cover" :alt="v.title" class="top-image">

            </a>
        </div>
    </div>
</template>
<script>

import obj from '@/axios/api.js'

export default {
    data(){
        return {
            top:[],
        }
    },
    mounted:function(){
        obj.getTop().then((res)=>{
            this.top = res.data;
        })

    }
}
</script>
<style>
.top-image {
    max-height: 165px;
}
</style>
