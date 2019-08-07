<?php
namespace Mpcube\Wechat\Publics\Event;

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

    // region 卡券事件

    //买单事件推送
    const USER_PAY_FROM_PAY_CELL = 'user_pay_from_pay_cell';

    //审核事件推送 - 通过
    const CARD_PASS_CHECK = 'card_pass_check';

    //审核事件推送 - 不通过
    const CARD_NOT_PASS_CHECK = 'card_not_pass_check';

    //领取事件推送
    const USER_GET_CARD = 'user_get_card';

    //转赠事件推送
    const USER_GIFTING_CARD = 'user_gifting_card';

    //删除事件推送
    const USER_DEL_CARD = 'user_del_card';

    //核销事件推送
    const USER_CONSUME_CARD = 'user_consume_card';

    //进入会员卡事件推送
    const USER_VIEW_CARD = 'user_view_card';

    //从卡券进入公众号会话事件推送
    const USER_ENTER_SESSION_FROM_CARD = 'user_enter_session_from_card';

    //会员卡内容更新事件
    const UPDATE_MEMBER_CARD = 'update_member_card';

    //库存报警事件
    const CARD_SKU_REMIND = 'card_sku_remind';

    //券点流水详情事件
    const CARD_PAY_ORDER = 'card_pay_order';

    //会员卡激活事件推送
    const SUBMIT_MEMBERCARD_USER_INFO = 'submit_membercard_user_info';

    // endregion

    // region 微信认证事件推送

    //资质认证成功（此时立即获得接口权限）
    const QUALIFICATION_VERIFY_SUCCESS = 'qualification_verify_success';

    //资质认证失败
    const QUALIFICATION_VERIFY_FAIL = 'qualification_verify_fail';

    //名称认证成功（即命名成功）
    const NAMING_VERIFY_SUCCESS = 'naming_verify_success';

    //名称认证失败（这时虽然客户端不打勾，但仍有接口权限）
    const NAMING_VERIFY_FAIL = 'naming_verify_fail';

    //年审通知
    const ANNUAL_RENEW = 'annual_renew';

    //认证过期失效通知审通知
    const VERIFY_EXPIRED = 'verify_expired';

    // endregion
}