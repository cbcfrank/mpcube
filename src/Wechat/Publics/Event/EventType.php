<?php
namespace Minicub\Wechat\Publics\Event;

class EventType
{
    //关注事件
    const SUBSCRIBE = 'subscribe';

    //取消关注事件
    const UNSUBSCRIBE = 'unsubscribe';

    //扫描带参数二维码事件
    //用户扫描带场景值二维码时，可能推送以下两种事件：
    //如果用户还未关注公众号，则用户可以关注公众号，关注后微信会将带场景值关注事件推送给开发者。
    //如果用户已经关注公众号，则微信会将带场景值扫描事件推送给开发者。
    // https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1421140454
    const SCAN = 'SCAN';

    //上报地理位置事件
    const LOCATION = 'LOCATION';

    //自定义菜单事件 - 点击菜单拉取消息时的事件推送
    const CLICK = 'CLICK';

    //自定义菜单事件 - 点击菜单跳转链接时的事件推送
    const VIEW = 'VIEW';

    //模版消息发送任务完成后，微信服务器会将是否送达成功作为通知
    const TEMPLATESENDJOBFINISH = 'TEMPLATESENDJOBFINISH';


}