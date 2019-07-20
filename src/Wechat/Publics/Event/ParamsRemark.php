<?php
namespace Minicub\Wechat\Publics\Event;

class ParamsRemark
{
    // region 接收的普通消息

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

    const MSG_TRANSFER_CUSTOMER_SERVICE = array(
        'ToUserName'=>array('memo'=>'接收方帐号（收到的OpenID）'),
        'FromUserName'=>array('memo'=>'开发者微信号'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'transfer_customer_service'),
        'KfAccount'=>array('memo'=>'指定会话接入的客服账号'),
    );

    // endregion

    // region 普通事件

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

    // endregion

    // region 模板消息

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

    // endregion

    // region 卡券事件

    //买单事件推送
    const  EVENT_USER_PAY_FROM_PAY_CELL = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'事件类型，User_pay_from_pay_cell(微信买单事件)'),
        'CardId'=>array('memo'=>'卡券ID'),
        'UserCardCode'=>array('memo'=>'卡券Code码'),
        'TransId'=>array('memo'=>'微信支付交易订单号（只有使用买单功能核销的卡券才会出现）'),
        'LocationId'=>array('memo'=>'门店ID，当前卡券核销的门店ID（只有通过卡券商户助手和买单核销时才会出现）'),
        'Fee'=>array('memo'=>'实付金额，单位为分'),
        'OriginalFee'=>array('memo'=>'应付金额，单位为分'),
    );

    //审核事件推送 - 通过
    const EVENT_CARD_PASS_CHECK = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，card_pass_check(卡券通过审核)'),
        'CardId'=>array('memo'=>'卡券ID'),
        'RefuseReason'=>array('memo'=>'审核不通过原因'),
    );

    //审核事件推送 - 不通过
    const EVENT_CARD_NOT_PASS_CHECK = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，card_not_pass_check（卡券未通过审核）'),
        'CardId'=>array('memo'=>'卡券ID'),
        'RefuseReason'=>array('memo'=>'审核不通过原因'),
    );

    //领取事件推送
    const EVENT_USER_GET_CARD = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'领券方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，user_get_card(用户领取卡券)'),
        'CardId'=>array('memo'=>'卡券ID'),
        'IsGiveByFriend'=>array('memo'=>'是否为转赠领取，1代表是，0代表否。'),
        'FriendUserName'=>array('memo'=>'当IsGiveByFriend为1时填入的字段，表示发起转赠用户的openid'),
        'UserCardCode'=>array('memo'=>'code序列号'),
        'OldUserCardCode'=>array('memo'=>'为保证安全，微信会在转赠发生后变更该卡券的code号，该字段表示转赠前的code'),
        'OuterStr'=>array('memo'=>'领取场景值，用于领取渠道数据统计。可在生成二维码接口及添加Addcard接口中自定义该字段的字符串值'),
        'IsRestoreMemberCard'=>array('memo'=>'用户删除会员卡后可重新找回，当用户本次操作为找回时，该值为1，否则为0'),
        'UnionId'=>array('memo'=>'领券用户的UnionId'),
    );

    //转赠事件推送
    const EVENT_USER_GIFTING_CARD = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'领券方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，user_gifting_card(用户转赠卡券)'),
        'CardId'=>array('memo'=>'卡券ID'),
        'IsGiveByFriend'=>array('memo'=>'是否为转赠领取，1代表是，0代表否。'),
        'FriendUserName'=>array('memo'=>'接收卡券用户的openid'),
        'UserCardCode'=>array('memo'=>'code序列号'),
        'IsReturnBack'=>array('memo'=>'是否转赠退回，0代表不是，1代表是。'),
        'IsChatRoom'=>array('memo'=>'是否是群转赠'),
    );

    //删除事件推送
    const EVENT_USER_DEL_CARD = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，user_del_card(用户删除卡券)'),
        'CardId'=>array('memo'=>'卡券ID'),
        'UserCardCode'=>array('memo'=>'code序列号。自定义code及非自定义code的卡券被领取后都支持事件推送。'),
    );

    //核销事件推送
    const EVENT_USER_CONSUME_CARD = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，user_consume_card(核销事件)'),
        'CardId'=>array('memo'=>'卡券ID'),
        'UserCardCode'=>array('memo'=>'卡券Code码。'),
        'ConsumeSource'=>array('memo'=>'核销来源。支持开发者统计API核销（FROM_API）、公众平台核销（FROM_MP）、卡券商户助手核销（FROM_MOBILE_HELPER）（核销员微信号）。'),
        'LocationName'=>array('memo'=>'门店名称，当前卡券核销的门店名称（只有通过自助核销和买单核销时才会出现该字段）。'),
        'StaffOpenId'=>array('memo'=>'核销该卡券核销员的openid（只有通过卡券商户助手核销时才会出现）。'),
        'VerifyCode'=>array('memo'=>'自助核销时，用户输入的验证码。'),
        'RemarkAmount'=>array('memo'=>'自助核销 时 ，用户输入的备注金额。'),
        'OuterStr'=>array('memo'=>'开发者发起核销时传入的自定义参数，用于进行核销渠道统计。'),
    );

    //进入会员卡事件推送
    const EVENT_USER_VIEW_CARD = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，user_view_card(用户点击会员卡)'),
        'CardId'=>array('memo'=>'卡券ID'),
        'UserCardCode'=>array('memo'=>'商户自定义code值。非自定code推送为空串。。'),
        'OuterStr'=>array('memo'=>'商户自定义二维码渠道参数，用于标识本次扫码打开会员卡来源来自于某个渠道值的二维码'),
    );

    //从卡券进入公众号会话事件推送
    const EVENT_USER_ENTER_SESSION_FROM_CARD = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，user_enter_session_from_card(用户从卡券进入公众号会话)'),
        'CardId'=>array('memo'=>'卡券ID'),
        'UserCardCode'=>array('memo'=>'Code码'),
    );

    //会员卡内容更新事件
    const EVENT_UPDATE_MEMBER_CARD = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，update_member_card(会员卡内容更新）'),
        'CardId'=>array('memo'=>'卡券ID'),
        'UserCardCode'=>array('memo'=>'Code码'),
        'ModifyBonus'=>array('memo'=>'变动的积分值'),
        'ModifyBalance'=>array('memo'=>'变动的余额值'),
    );

    //库存报警事件
    const EVENT_CARD_SKU_REMIND = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方，微信'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，card_sku_remind库存报警'),
        'CardId'=>array('memo'=>'卡券ID'),
        'Detail'=>array('memo'=>'报警详细信息'),
    );

    //券点流水详情事件
    const EVENT_CARD_PAY_ORDER = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方，微信'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，card_pay_order券点流水详情事件'),
        'OrderId'=>array('memo'=>'本次推送对应的订单号'),
        'Status'=>array('memo'=>'本次订单号的状态,ORDER_STATUS_WAITING 等待支付 ORDER_STATUS_SUCC 支付成功 ORDER_STATUS_FINANCE_SUCC 加代币成功 ORDER_STATUS_QUANTITY_SUCC 加库存成功 ORDER_STATUS_HAS_REFUND 已退币 ORDER_STATUS_REFUND_WAITING 等待退币确认 ORDER_STATUS_ROLLBACK 已回退,系统失败 ORDER_STATUS_HAS_RECEIPT 已开发票'),
        'CreateOrderTime'=>array('memo'=>'购买券点时，支付二维码的生成时间'),
        'PayFinishTime'=>array('memo'=>'购买券点时，实际支付成功的时间'),
        'Desc'=>array('memo'=>'支付方式，一般为微信支付充值'),
        'FreeCoinCount'=>array('memo'=>'剩余免费券点数量'),
        'PayCoinCount'=>array('memo'=>'剩余付费券点数量'),
        'RefundFreeCoinCount'=>array('memo'=>'本次变动的免费券点数量'),
        'RefundPayCoinCount'=>array('memo'=>'本次变动的付费券点数量'),
        'OrderType'=>array('memo'=>'所要拉取的订单类型 ORDER_TYPE_SYS_ADD 平台赠送券点 ORDER_TYPE_WXPAY 充值券点 ORDER_TYPE_REFUND 库存未使用回退券点 ORDER_TYPE_REDUCE 券点兑换库存 ORDER_TYPE_SYS_REDUCE 平台扣减'),
        'Memo'=>array('memo'=>'系统备注，说明此次变动的缘由，如开通账户奖励、门店奖励、核销奖励以及充值、扣减。'),
        'ReceiptInfo'=>array('memo'=>'所开发票的详情'),
    );

    //会员卡激活事件推送
    const EVENT_SUBMIT_MEMBERCARD_USER_INFO = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型）'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，submit_membercard_user_info'),
        'CardId'=>array('memo'=>'卡券ID'),
        'UserCardCode'=>array('memo'=>'卡券Code码'),
    );

    // endregion

    // region 微信认证事件推送

    //资质认证成功（此时立即获得接口权限）
    const EVENT_QUALIFICATION_VERIFY_SUCCESS = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID，此时发送方是系统帐号）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型），时间戳'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，qualification_verify_success'),
        'ExpiredTime'=>array('memo'=>'有效期 (整形)，指的是时间戳，将于该时间戳认证过期'),
    );

    //资质认证失败
    const EVENT_QUALIFICATION_VERIFY_FAIL = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID，此时发送方是系统帐号）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型），时间戳'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，qualification_verify_fail'),
        'FailTime'=>array('memo'=>'失败发生时间 (整形)，时间戳'),
        'FailReason'=>array('memo'=>'认证失败的原因'),
    );

    //名称认证成功（即命名成功）
    const EVENT_NAMING_VERIFY_SUCCESS = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID，此时发送方是系统帐号）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型），时间戳'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，naming_verify_success'),
        'ExpiredTime'=>array('memo'=>'有效期 (整形)，指的是时间戳，将于该时间戳认证过期'),
    );

    //名称认证失败（这时虽然客户端不打勾，但仍有接口权限）
    const EVENT_NAMING_VERIFY_FAIL = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID，此时发送方是系统帐号）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型），时间戳'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，naming_verify_fail'),
        'FailTime'=>array('memo'=>'失败发生时间 (整形)，时间戳'),
        'FailReason'=>array('memo'=>'认证失败的原因'),
    );

    //年审通知
    const EVENT_ANNUAL_RENEW = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID，此时发送方是系统帐号）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型），时间戳'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，annual_renew，提醒公众号需要去年审了'),
        'ExpiredTime'=>array('memo'=>'有效期 (整形)，指的是时间戳，将于该时间戳认证过期，需尽快年审'),
    );

    //认证过期失效通知审通知
    const EVENT_VERIFY_EXPIRED = array(
        'ToUserName'=>array('memo'=>'开发者微信号'),
        'FromUserName'=>array('memo'=>'发送方帐号（一个OpenID，此时发送方是系统帐号）'),
        'CreateTime'=>array('memo'=>'消息创建时间 （整型），时间戳'),
        'MsgType'=>array('memo'=>'消息类型，event'),
        'Event'=>array('memo'=>'Event	事件类型，verify_expired'),
        'ExpiredTime'=>array('memo'=>'有效期 (整形)，指的是时间戳，表示已于该时间戳认证过期，需要重新发起微信认证'),
    );

    // endregion
}