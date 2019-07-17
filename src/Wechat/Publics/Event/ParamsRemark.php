<?php
namespace Minicub\Wechat\Publics\Event;

class ParamsRemark
{
    //文本消息
    const MSG_TEXT = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，文本为text'),
        'Content'=>array('memo'=>'文本消息内容'),
        'MsgId'=>array('memo'=>'消息id，64位整型'),
    );

    //图片消息
    const MSG_IMAGE = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，图片为image'),
        'PicUrl'=>array('memo'=>'图片链接（由系统生成）'),
        'MediaId'=>array('memo'=>'图片消息媒体id，可以调用获取临时素材接口拉取数据。'),
        'MsgId'=>array('memo'=>'消息id，64位整型'),
    );

    //语音消息
    const MSG_VOICE = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'语音为voice'),
        'MediaId'=>array('memo'=>'语音消息媒体id，可以调用获取临时素材接口拉取数据。'),
        'Format'=>array('memo'=>'语音格式，如amr，speex等'),
        'Recognition'=>array('memo'=>'语音识别结果，UTF8编码'),
        'MsgID'=>array('memo'=>'消息id，64位整型'),
    );

    //视频消息
    const MSG_VIDEO = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'视频为video'),
        'MediaId'=>array('memo'=>'视频消息媒体id，可以调用获取临时素材接口拉取数据。'),
        'ThumbMediaId'=>array('memo'=>'视频消息缩略图的媒体id，可以调用多媒体文件下载接口拉取数据。'),
        'MsgId'=>array('memo'=>'消息id，64位整型'),
    );

    //小视频消息
    const MSG_SHORTVIDEO = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'小视频为shortvideo'),
        'MediaId'=>array('memo'=>'视频消息媒体id，可以调用获取临时素材接口拉取数据。'),
        'ThumbMediaId'=>array('memo'=>'视频消息缩略图的媒体id，可以调用获取临时素材接口拉取数据。'),
        'MsgId'=>array('memo'=>'消息id，64位整型'),
    );

    //地理位置消息
    const MSG_LOCATION = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，地理位置为location'),
        'Location_X'=>array('memo'=>'地理位置维度'),
        'Location_Y'=>array('memo'=>'地理位置经度'),
        'Scale'=>array('memo'=>'地图缩放大小'),
        'Label'=>array('memo'=>'地理位置信息'),
        'MsgId'=>array('memo'=>'消息id，64位整型'),
    );

    //链接消息
    const MSG_LINK = array(
        'ToUserName'=>array('memo'=>'接收方微信号'),
        'FromUserName'=>array('memo'=>'发送方微信号，若为普通用户，则是一个OpenID'),
        'CreateTime'=>array('memo'=>'消息创建时间'),
        'MsgType'=>array('memo'=>'消息类型，链接为link'),
        'Title'=>array('memo'=>'消息标题'),
        'Description'=>array('memo'=>'消息描述'),
        'Url'=>array('memo'=>'消息链接'),
        'MsgId'=>array('memo'=>'消息id，64位整型'),
    );

    //关注/取消关注事件
    const EVENT_SUB_UNSUB = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'事件类型，subscribe(订阅)、unsubscribe(取消订阅)'),
    );

    //扫描带参数二维码事件 - 用户还未关注公众号
    const EVENT_SCAN_SUB = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'事件类型，subscribe'),
        'EventKey'=>array('memo'=>'事件KEY值，qrscene_为前缀，后面为二维码的参数值'),
        'Ticket'=>array('memo'=>'二维码的ticket，可用来换取二维码图片'),
    );

    //扫描带参数二维码事件 - 用户已经关注公众号
    const EVENT_SCAN_NORMAL = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'事件类型，SCAN'),
        'EventKey'=>array('memo'=>'事件KEY值，是一个32位无符号整数，即创建二维码时的二维码scene_id'),
        'Ticket'=>array('memo'=>'二维码的ticket，可用来换取二维码图片'),
    );

    //上报地理位置事件
    const EVENT_LOCATION = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'事件类型，LOCATION'),
        'Latitude'=>array('memo'=>'地理位置纬度'),
        'Longitude'=>array('memo'=>'地理位置经度'),
        'Precision'=>array('memo'=>'地理位置精度'),
    );

    //自定义菜单事件 - 点击菜单拉取消息时的事件推送
    const EVENT_MENU_CLICK = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'事件类型，CLICK'),
        'EventKey'=>array('memo'=>'事件KEY值，与自定义菜单接口中KEY值对应'),
    );

    //自定义菜单事件 - 点击菜单跳转链接时的事件推送
    const EVENT_MENU_VIEW = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'事件类型，VIEW'),
        'EventKey'=>array('memo'=>'事件KEY值，设置的跳转URL'),
    );

    //模版消息发送任务完成后 - 送达成功时
    const EVENT_TEMPLATESENDJOBFINISH_SUCCESS = array(
        'ToUserName'=>array('memo'=>'公众号微信号'),
        'FromUserName'=>array('memo'=>'接收模板消息的用户的openid'),
        'CreateTime'=>array('memo'=>'创建时间'),
        'MsgType'=>array('memo'=>'消息类型是事件'),
        'Event'=>array('memo'=>'事件为模板消息发送结束'),
        'MsgID'=>array('memo'=>'消息id'),
        'Status'=>array('memo'=>'发送状态为成功'),
    );

    //模版消息发送任务完成后 - 送达由于用户拒收（用户设置拒绝接收公众号消息）而失败时
    const EVENT_TEMPLATESENDJOBFINISH_USER_BLOCK = array(
        'ToUserName'=>array('memo'=>'公众号微信号'),
        'FromUserName'=>array('memo'=>'接收模板消息的用户的openid'),
        'CreateTime'=>array('memo'=>'创建时间'),
        'MsgType'=>array('memo'=>'消息类型是事件'),
        'Event'=>array('memo'=>'事件为模板消息发送结束'),
        'MsgID'=>array('memo'=>'消息id'),
        'Status'=>array('memo'=>'发送状态为用户拒绝接收'),
    );

    //模版消息发送任务完成后 - 送达由于其他原因失败时
    const EVENT_TEMPLATESENDJOBFINISH_SYSTEM_FAILED = array(
        'ToUserName'=>array('memo'=>'公众号微信号'),
        'FromUserName'=>array('memo'=>'接收模板消息的用户的openid'),
        'CreateTime'=>array('memo'=>'创建时间'),
        'MsgType'=>array('memo'=>'消息类型是事件'),
        'Event'=>array('memo'=>'事件为模板消息发送结束'),
        'MsgID'=>array('memo'=>'消息id'),
        'Status'=>array('memo'=>'发送状态为发送失败（非用户拒绝）'),
    );
}