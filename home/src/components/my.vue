<template>

    <div class="my-box">
        <h1 style="color:#393D49">关于我</h1>
        <br>
        <p>开始招友链，要求前端博客，并且有20篇以上原创文章，剩下的没有要求。</p>
        <hr class="layui-bg-green">
        <div class="content">
            <ul>
                <li>这位用户是一个自然人</li>
                <li>这位用户使用Google搜索</li>
                <li>这位用户说PHP是世界上最好的语言</li>
                <li>这位用户擅长用PHP、Python制造bug</li>
                <li>这位用户</li>
            </ul>
        </div>
    </div>

</template>
<script>
export default {
    mounted:function(){
        this.$store.commit('updateNavActive',"my");
    }
}
</script>
<style>
.my-box {
    font-size: 16px;
    line-height: 28px;
}

</style>