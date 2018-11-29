<template>
    <div class="banner" ref="banner"></div>
</template>
<script>
export default {
    name:"banner",
    data(){
        return {
            banner:null,
            bannerMargin:null,
            clientHeight:document.documentElement.clientHeight,
        }
    },
    mounted:function(){
        this.banner = this.$refs.banner;
        const that = this;
        window.onresize = () => {
            return (() => {
                window.clientHeight = document.documentElement.clientHeight
                that.clientHeight = window.clientHeight
            })()
        }
        this.$emit('resize', window.getComputedStyle(this.banner).height)
        
    },
    watch:{
        banner:function(newValue,oldValue){
            
            this.bannerMargin = window.getComputedStyle(newValue).height;
            this.$emit('bannerMaring', this.bannerMargin)
        },
        clientHeight:function(val) {

            this.bannerMargin = window.getComputedStyle(this.banner).height;
            this.$emit('resize', this.bannerMargin)
        }
    },
}
</script>
<style>
.banner {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 40%;
  background-image: url("/static/images/192642-15327772028c2b.jpg");
  background-position: center center;
  background-size: cover;
  z-index: 5;
}
</style>