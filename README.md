
#### 项目介绍

> 项目初衷：在每个实际需要微信公众号功能的项目都要维护一套调用api，为了快速推进项目，将微信的api封装成为可用的SDK，避免重复劳动。
> 

#### 源代码文件目录结构

```text
├── src  //源代码
│   └── Wechat //微信端
│        └── Publics //公众号
│             ├── Menu //菜单相关功能
│             │                  ├─ aps    //短信监控相关代码
│             │                  ├─ common //公用
│             │                  └─ dkm    //代扣监控相关代码
│             ├── ... //其他相关功能
│             ├── db
│             │    └── migration
│             │          ├── V1__init_database.sql  // flyway相关配置见下方详细描述
│             │          └── V2__alter_cmm_dkm_should_send_sum.sql
│             ├── AccessToken.php  //公众号全局获取access_token类
│             ├── Common.php       //通用类方法 trait
│             ├── Errcode.php      //错误码类
│             ├── IPList.php       //微信服务器白名单获取类
│             ├── MagicGetSet.php  //魔术方法 trait
│             ├── Runtime.php      //运行时函数
│             └── Singleton.php    //单例方法 trait
│
├── runtime //运行时目录
│  
├── test  //测试代码
│
└── docs  //设计及开发文档存放，markdown格式

```

#### 文档目录导航
 * [开始](docs/01_KICKOFF.md)
 * [菜单](docs/02_MENU.md)
 * [事件及消息](docs/03_EVENT_MESSAGE.md)
 * [素材](docs/04_MATERIAL.md)
 * [模板消息](docs/05_TEMPLATE.md)
 * 客服
 * [网页授权](docs/07_WEB.md)
 

#### 运行、启动、调试方式

