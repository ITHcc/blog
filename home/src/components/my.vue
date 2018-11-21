<template>

    <div class="my-box">
        <h1 style="color:#393D49">关于我</h1>
        <br>

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

.my-box ul {
    margin-left:30px;
    font-size:16px;

}
.my-box li {
    list-style: disc;
    margin-top:8px;
}
</style>