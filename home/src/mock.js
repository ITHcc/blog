import Mock from "mockjs"



//列表页置顶推荐
// Mock.mock('/index/setTop',"get",{
//     "data|3":[{
//         "title":"@csentence(8,20)",
//         "cover":"@dataImage('250x100')"
//     }]
// })

// Mock.mock("/notice","get",{
//     "data|3":[{
//         "title":"@csentence(8,20)",
//         "cover":"@dataImage('300x200')",
//         "cover_desc":"@csentence(5,10)",
//         "content":"@csentence(20,50)",
//     }]
// })

// Mock.mock(/\/index\/list\/\d+/,"get",{
//     "data|3":[{
//         "id":"@integer(1,10000)",
//         "title":"@csentence(15,30)",
//         "cover":"@dataImage('750x167')",
//         "cover_desc":"@csentence(5,10)",
//         "content":"@csentence(100,500)"
//     }]
// })

// Mock.mock("/index/listCount","get",{
//     "count":"@integer(20,100)"
// })
//分类
// Mock.mock("/index/category","get",{
//     "data|3-5":[{    
//         "id":"@integer(1,10000)",
//         "cate_name":"@cname",
//         "url":"@url('http')",
//     }]
// })
//获取该分类下文章列表
// Mock.mock(/\/category\/\d+/,"get",{
//     "data|3":[{
//         "id":"@integer(1,10000)",
//         "title":"@csentence(15,30)",
//         "cover":"@dataImage('750x167')",
//         "cover_desc":"@csentence(5,10)",
//         "content":"@csentence(100,500)"
//     }]
// })
// Mock.mock(/\/category\/count\/\d+/,"get",{
//     "count":"@integer(20,100)"
// })
//归档
// Mock.mock("/archives/index","get",{
//     "data|3-8":[{
//         "date":"@date('yyyy年MM月')",
//         "list|1-5":[{
//             "id":"@integer(1,10000)",
//             "title":"@csentence(15,30)",
//             "date":"@datetime()"
//         }]
//     }]
// })

//标签
// Mock.mock("/tags/index","get",{
//     "data|3-8":[{
//         "id":"@integer(1,10000)",
//         "tag_name":"@cname",
//         "count":"@integer(1,100)",
//         "url":"@url('http')",
//     }]
// })

//内容
// Mock.mock(/\/content\/\d+/,"get",{
//     "id":"@integer(1,10000)",
//     "title":"@csentence(15,50)",
//     "preface":"@csentence(50,100)",
//     "content":"@csentence(1000,5000)",
//     "cate_id":"@integer(1,10000)"
// })

