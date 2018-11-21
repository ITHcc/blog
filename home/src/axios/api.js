import axios from "axios"


// axios.defaults.baseURL = 'http://localhost:8080/v1/'

export default{

    getTop:() =>{
        return axios.get("/api/recommend")
    },
    getNotice:() =>{
        return axios.get("/api/notice")
    },
    getIndexList:(page) =>{
        if(page=="" || page<=0){
            page=1;
        }
        // return axios.get("/index/list/"+page)
        return axios.get("/api/blog/"+page);

    },
    //获取所有文章数量
    getIndexListCount:() =>{
        return axios.get("/api/blog/count");
    },
    //分类
    getIndexCate:() =>{
        return axios.get("/api/category")
    },
    //获取该分类下文章列表
    getCateBlog:(cat_id,page) =>{
        if(page=="" || page<=0){
            page=1;
        }
        return axios.get("/api/category/blog/"+cat_id+"/"+page)
    },
    //获取该分类下文章数量
    // getCateBlogCount:(cat_id) =>{
    //     return axios.get("/category/count/"+cat_id)
    // },
    // 归档
    getArchives:() =>{
        return axios.get("/api/archives")
    },
    //标签
    getTags:() =>{
        return axios.get("/api/tags")
    },
    //获取文章
    getContent:(id) =>{
        return axios.get("/api/blog/content/"+id)
    }

}