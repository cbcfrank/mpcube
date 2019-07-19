<?php
namespace Minicub\Wechat\Publics\CustomService;

class ParamsRemark
{
    //客服接口-发消息
    const CUSTOMSERVICE_MESSAGE_CUSTOM_SEND_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭证'),
        'touser' => array('required'=>'是', 'memo'=>'普通用户openid'),
        'msgtype' => array('required'=>'是', 'memo'=>'消息类型，文本为text，图片为image，语音为voice，视频消息为video，音乐消息为music，图文消息（点击跳转到外链）为news，图文消息（点击跳转到图文消息页面）为mpnews，卡券为wxcard，小程序为miniprogrampage'),
        'content' => array('required'=>'是', 'memo'=>'文本消息内容'),
        'media_id' => array('required'=>'是', 'memo'=>'发送的图片/语音/视频/图文消息（点击跳转到图文消息页）的媒体ID'),
        'thumb_media_id' => array('required'=>'是', 'memo'=>'缩略图/小程序卡片图片的媒体ID，小程序卡片图片建议大小为520*416'),
        'title' => array('required'=>'否', 'memo'=>'图文消息/视频消息/音乐消息/小程序卡片的标题'),
        'description' => array('required'=>'否', 'memo'=>'图文消息/视频消息/音乐消息的描述'),
        'musicurl' => array('required'=>'是', 'memo'=>'音乐链接'),
        'hqmusicurl' => array('required'=>'是', 'memo'=>'高品质音乐链接，wifi环境优先使用该链接播放音乐'),
        'url' => array('required'=>'否', 'memo'=>'图文消息被点击后跳转的链接'),
        'picurl' => array('required'=>'否', 'memo'=>'图文消息的图片链接，支持JPG、PNG格式，较好的效果为大图640*320，小图80*80'),
        'appid' => array('required'=>'是', 'memo'=>'小程序的appid，要求小程序的appid需要与公众号有关联关系'),
        'pagepath' => array('required'=>'是', 'memo'=>'小程序的页面路径，跟app.json对齐，支持参数，比如pages/index/index?foo=bar'),
    );

    //客服输入状态
    const CUSTOMSERVICE_MESSAGE_CUSTOM_TYPING_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭证'),
        'touser' => array('required'=>'是', 'memo'=>'普通用户openid'),
        'command' => array('required'=>'是', 'memo'=>'"Typing"：对用户下发“正在输入"状态 "CancelTyping"：取消对用户的”正在输入"状态'),
    );

    //获取客服基本信息
    const CUSTOMSERVICE_KFACCOUNT_GETKFlIST_RES = array(
        'kf_account' => array('memo'=>'完整客服帐号，格式为：帐号前缀@公众号微信号'),
        'kf_nick' => array('memo'=>'客服昵称'),
        'kf_id' => array('memo'=>'客服编号'),
        'kf_headimgurl' => array('memo'=>'客服头像'),
        'kf_wx' => array('memo'=>'如果客服帐号已绑定了客服人员微信号， 则此处显示微信号'),
        'invite_wx' => array('memo'=>'如果客服帐号尚未绑定微信号，但是已经发起了一个绑定邀请， 则此处显示绑定邀请的微信号'),
        'invite_expire_time' => array('memo'=>'如果客服帐号尚未绑定微信号，但是已经发起过一个绑定邀请， 邀请的过期时间，为unix 时间戳'),
        'invite_status' => array('memo'=>'邀请的状态，有等待确认“waiting”，被拒绝“rejected”， 过期“expired”'),
    );

    //获取在线客服信息
    const CUSTOMSERVICE_KFACCOUNT_GETONLINE_KFlIST_RES = array(
        'kf_account' => array('memo'=>'完整客服帐号，格式为：帐号前缀@公众号微信号'),
        'status' => array('memo'=>'客服在线状态，目前为：1、web 在线'),
        'kf_id' => array('memo'=>'客服编号'),
        'accepted_case' => array('memo'=>'客服当前正在接待的会话数'),
    );


    //获取在线客服信息
    const CUSTOMSERVICE_KFACCOUNT_ADD_REQ = array(
        'kf_account' => array('required'=>'是', 'memo'=>'完整客服帐号，格式为：帐号前缀@公众号微信号，帐号前缀最多10个字符，必须是英文、数字字符或者下划线，后缀为公众号微信号，长度不超过30个字符'),
        'nickname' => array('required'=>'是', 'memo'=>'客服昵称，最长16个字'),
    );

    //邀请绑定客服帐号
    const CUSTOMSERVICE_KFACCOUNT_INVITEWORKER_REQ = array(
        'kf_account' => array('required'=>'是', 'memo'=>'完整客服帐号，格式为：帐号前缀@公众号微信号'),
        'invite_wx' => array('required'=>'是', 'memo'=>'接收绑定邀请的客服微信号'),
    );

    //设置客服信息
    const CUSTOMSERVICE_KFACCOUNT_UPDATE_REQ = self::CUSTOMSERVICE_KFACCOUNT_ADD_REQ;

    //上传客服头像
    const CUSTOMSERVICE_KFACCOUNT_UPLOADHEADIMG_REQ = array(
        'kf_account' => array('required'=>'是', 'memo'=>'完整客服帐号，格式为：帐号前缀@公众号微信号'),
        'media' => array('required'=>'是', 'memo'=>'form-data 中媒体文件标识，有filename、filelength、content-type 等信息，文件大小为5M 以内'),
    );

    //邀请绑定客服帐号
    const CUSTOMSERVICE_KFACCOUNT_DEL_REQ = array(
        'kf_account' => array('required'=>'是', 'memo'=>'完整客服帐号，格式为：帐号前缀@公众号微信号'),
    );

    //创建会话
    const CUSTOMSERVICE_KFSESSION_CREATE_REQ = array(
        'kf_account' => array('required'=>'是', 'memo'=>'完整客服帐号，格式为：帐号前缀@公众号微信号'),
        'openid' => array('required'=>'是', 'memo'=>'粉丝的openid'),
    );

    //关闭会话
    const CUSTOMSERVICE_KFSESSION_CLOSE_REQ = self::CUSTOMSERVICE_KFSESSION_CREATE_REQ;

    //获取客户会话状态
    const CUSTOMSERVICE_KFSESSION_GETSESSION_RES = array(
        'kf_account' => array('memo'=>'正在接待的客服，为空表示没有人在接待'),
        'createtime' => array('memo'=>'会话接入的时间'),
    );

    //获取未接入会话列表
    const CUSTOMSERVICE_KFSESSION_GETWAITCASE_RES = array(
        'count' => array('memo'=>'未接入会话数量'),
        'waitcaselist' => array('memo'=>'未接入会话列表，最多返回100条数据，按照来访顺序'),
        'openid' => array('memo'=>'粉丝的openid'),
        'latest_time' => array('memo'=>'粉丝的最后一条消息的时间'),
    );

    //获取聊天记录
    const CUSTOMSERVICE_MSGRECORD_GETMSGLIST_REQ = array(
        'starttime' => array('required'=>'是', 'memo'=>'起始时间，unix时间戳'),
        'endtime' => array('required'=>'是', 'memo'=>'结束时间，unix时间戳，每次查询时段不能超过24小时'),
        'msgid' => array('required'=>'是', 'memo'=>'消息id顺序从小到大，从1开始'),
        'number' => array('required'=>'是', 'memo'=>'每次获取条数，最多10000条'),
    );

    //获取聊天记录
    const CUSTOMSERVICE_MSGRECORD_GETMSGLIST_RES = array(
        'worker' => array('memo'=>'完整客服帐号，格式为：帐号前缀@公众号微信号'),
        'openid' => array('memo'=>'用户标识'),
        'opercode' => array('memo'=>'操作码，2002（客服发送信息），2003（客服接收消息）'),
        'text' => array('memo'=>'聊天记录'),
        'time' => array('memo'=>'操作时间，unix时间戳'),
    );

}