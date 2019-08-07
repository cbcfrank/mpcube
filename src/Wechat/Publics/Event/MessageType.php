<?php
namespace Mpcube\Wechat\Publics\Event;

class MessageType
{
    //文本消息
    const TEXT = 'text';

    //图片消息
    const IMAGE = 'image';

    //语音消息
    const VOICE = 'voice';

    //视频消息
    const VIDEO = 'video';

    //小视频消息
    const SHORTVIDEO = 'shortvideo';

    //地理位置消息
    const LOCATION = 'location';

    //链接消息
    const LINK = 'link';

    //事件推送
    const EVENT = 'event';

    //音乐消息
    const MUSIC = 'music';

    //图文消息
    const NEWS = 'news';

    //图文消息
    const MPNEWS = 'mpnews';

    //菜单消息
    const MSGMENU = 'msgmenu';

    //卡券
    const WXCARD = 'wxcard';

    //小程序
    const MINIPROGRAMPAGE = 'miniprogrampage';

    //消息转发到客服
    const TRANSFER_CUSTOMER_SERVICE = 'transfer_customer_service';
}