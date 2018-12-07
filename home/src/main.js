// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import vuexStore from './store' 
import axios from 'axios'

import hljs from 'highlight.js'
import 'highlight.js/styles/agate.css' //样式文件
Vue.directive('highlight',function (el) {
  let blocks = el.querySelectorAll('pre code');
  blocks.forEach((block)=>{
    hljs.highlightBlock(block)
  })

})

Vue.prototype.$http = axios

Vue.config.productionTip = false

require("./mock.js")

/* eslint-disable no-new */
router.beforeEach((to, from, next) => {
    
    if(from.name!="content" && to.name=="content"){
      // router.go("/content/"+to.params.id);
    }
    if(from.meta.isfirst){

    }
    if(to.meta.title){
      document.title = to.meta.title+" -Hcc个人博客";
    }else{
      document.title = "Hcc个人博客";
    }
    next();
})
new Vue({
  el: '#app',
  store:vuexStore,
  router,
  components: { App },
  template: '<App/>'
})
