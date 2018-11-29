<template>
    <section>
        <div class="loader loader-3">
            <div class="dot dot1"></div>
            <div class="dot dot2"></div>
            <div class="dot dot3"></div>
            <div class="dot dot4"></div>
            <div class="dot dot5"></div>
        </div>
  </section>
</template>
<script>
export default {
    
}
</script>
    
<style scoped>
body {
    background: rgba(0,0,0,.2);
}
section { width: 98%; display: inline-block; text-align: center; min-height: 700px; vertical-align: top;  border-radius: 5px; position:absolute;z-index:100;background-color:#eee;}

@media only screen and (max-width: 600px) {
section { min-width: 350px; }
}
.loader { position: relative; width: 60px; height: 60px; border-radius: 50%; margin: 15%; display: inline-block; vertical-align: middle; }
.loader-star { position: absolute; top: calc(50% - 12px); }
    
.loader-3 .dot { width: 15px; height: 15px; background: #00e676; border-radius: 50%; position: absolute; top: calc(50% - 5px); }
.loader-3 .dot1 { left: 0px; -webkit-animation: dot-jump 0.5s cubic-bezier(0.77, 0.47, 0.64, 0.28) alternate infinite; animation: dot-jump 0.5s cubic-bezier(0.77, 0.47, 0.64, 0.28) alternate infinite; }
.loader-3 .dot2 { left: 30px; -webkit-animation: dot-jump 0.5s 0.2s cubic-bezier(0.77, 0.47, 0.64, 0.28) alternate infinite; animation: dot-jump 0.5s 0.2s cubic-bezier(0.77, 0.47, 0.64, 0.28) alternate infinite; }
.loader-3 .dot3 { left: 60px; -webkit-animation: dot-jump 0.5s 0.4s cubic-bezier(0.77, 0.47, 0.64, 0.28) alternate infinite; animation: dot-jump 0.5s 0.4s cubic-bezier(0.77, 0.47, 0.64, 0.28) alternate infinite; }
.loader-3 .dot4 { left: 90px; -webkit-animation: dot-jump 0.5s 0.4s cubic-bezier(0.77, 0.47, 0.64, 0.28) alternate infinite; animation: dot-jump 0.5s 0.4s cubic-bezier(0.77, 0.47, 0.64, 0.28) alternate infinite; }
.loader-3 .dot5 { left: 120px; -webkit-animation: dot-jump 0.5s 0.4s cubic-bezier(0.77, 0.47, 0.64, 0.28) alternate infinite; animation: dot-jump 0.5s 0.4s cubic-bezier(0.77, 0.47, 0.64, 0.28) alternate infinite; }

@-webkit-keyframes dot-jump {
    0% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
    50% {
        -webkit-transform: translateY(-8px);
        transform: translateY(-8px);
    }
    100% {
        -webkit-transform: translateY(-15px);
        transform: translateY(-15px);
    }
    }
    @keyframes dot-jump {
    0% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }
    50% {
        -webkit-transform: translateY(-8px);
        transform: translateY(-8px);
    }
    100% {
        -webkit-transform: translateY(-15px);
        transform: translateY(-15px);
    }
}
</style>
