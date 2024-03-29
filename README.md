
#### 项目介绍

> 项目初衷：在每个实际需要微信公众号功能的项目都要维护一套调用api，为了快速推进项目，将微信的api封装成为可用的SDK，避免重复劳动。
> 

#### 源代码文件目录结构

```text
├── src  //源代码
│   ├── Wechat //微信端
│   │    ├── Publics //公众号
│   │    │     ├── Menu //菜单相关功能
│   │    │     │    ├─ ParamsRemark.php    //参数说明
│   │    │     │    ├─ Menu.php            //操作对象
│   │    │     │    └─ xxxxType.php        //枚举类
│   │    │     |
│   │    │     ├── ... //其他相关功能
│   │    │     ├── AccessToken.php  //公众号全局获取access_token类
│   │    │     ├── Common.php       //通用类方法 trait
│   │    │     ├── Errcode.php      //错误码类
│   │    │     ├── IPList.php       //微信服务器白名单获取类
│   │    │     ├── MagicGetSet.php  //魔术方法 trait
│   │    │     ├── Runtime.php      //运行时函数
│   │    │     └── Singleton.php    //单例方法 trait
│   │    │ 
│   │    └── Miniapp //小程序
|   |          ├── Auth             //登录
|   |          ├── NearbyPoi        //附近的小程序
|   |          ├── Phonenumber      //手机号码
|   |          ├── UniformMessage   //统一服务消息
|   |          ├── Logistics        //物流服务
|   |          └── Wxacode          //小程序码
|   |          
│   ├── Wepay //微信支付
│   │    ├── Qrcode  //付款码支付
│   │    ├── Jsapi   //JSAPI支付
│   │    ├── Miniapp //小程序支付
│   │    ├── Native  //Native支付
│   │    ├── App     //APP支付
│   │    ├── H5      //H5支付
│   │    └── Face    //刷脸支付
│   │
│   ├── Wxwork //企业微信
│        ├── Department      //通讯录管理-部门管理
│        ├── User            //通讯录管理-用户管理
│        ├── ExternalContact //客户联系
│        └── Message         //消息推送
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
 * [客服](docs/06_CUSTOMSERVICE.md)
 * [网页授权](docs/07_WEB.md)
 * [卡券](docs/08_CARD.md)
 * [账号管理](docs/09_UTILS.md)
 * [用户管理](docs/10_USER.md)

#### 运行、启动、调试方式

