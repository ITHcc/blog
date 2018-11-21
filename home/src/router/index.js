import Vue from 'vue'
import Router from 'vue-router'

import index from "@/pages/index"
  import test from "@/components/test"
  import list from "@/components/list"
  import right from "@/components/right"
  import content from "@/components/content"
  import archives from "@/components/archives"
  import tags from "@/components/tags"
  import my from "@/components/my"
  import friends from "@/components/friends"
  import cateblog from "@/components/cateBlog"

Vue.use(Router)

export default new Router({
  mode:"history",
  routes: [
    {
      path:"/",
      component:index,
      children:[
        {
          path:"/",
          components:{
            main:list,
            right:right
          }
        },
        {
          path:"/archives",
          components:{
            main:archives,
            right:right
          }
        },
        {
          path:"/tags",
          components:{
            main:tags,
            right:right,
          }
        },
        {
          path:"/my",
          components:{
            main:my,
            right:right,
          }
        },
        {
          path:"/friends",
          components:{
            main:friends,
            right:right
          }
        },
        {
          path:"/content/:id",
          components:{
            main:content,
            right:right
          }
        },
        {
          path:"/cateblog/:id",
          components:{
            main:cateblog,
            right:right
          }
        },
      ]
    }
  ]
})
