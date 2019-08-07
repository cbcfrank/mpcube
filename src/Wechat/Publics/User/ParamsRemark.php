<?php
namespace Mpcube\Wechat\Publics\User;

class ParamsRemark
{
    const TAGS_CREATE_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'name' => array('required'=>'是', 'memo'=>'标签名（30个字符以内）'),
    );

    const TAGS_CREATE_RES = array(
        'id' => array('memo'=>'标签id，由微信分配'),
        'name' => array('memo'=>'标签名（30个字符以内）'),
    );

    const TAGS_GET_RES = array(
        'id' => array('memo'=>'标签id，由微信分配'),
        'name' => array('memo'=>'标签名（30个字符以内）'),
        'count' => array('memo'=>'此标签下粉丝数'),
    );

    const USER_TAG_GET_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'tagid' => array('required'=>'是', 'memo'=>'标签名（30个字符以内）'),
        'next_openid' => array('required'=>'是', 'memo'=>'第一个拉取的OPENID，不填默认从头开始拉取'),
    );

    const USER_TAG_GET_RES = array(
        'count' => array('required'=>'是', 'memo'=>'这次获取的粉丝数量'),
        'data' => array('required'=>'是', 'memo'=>'粉丝列表'),
        'next_openid' => array('required'=>'是', 'memo'=>'拉取列表最后一个用户的openid'),
    );

    const USER_INFO_UPDATEREMARK_RES = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'openid' => array('required'=>'是', 'memo'=>'用户标识'),
        'remark' => array('required'=>'是', 'memo'=>'新的备注名，长度必须小于30字符'),
    );

    const USER_INFO_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'openid' => array('required'=>'是', 'memo'=>'普通用户的标识，对当前公众号唯一'),
        'lang' => array('required'=>'否', 'memo'=>'返回国家地区语言版本，zh_CN 简体，zh_TW 繁体，en 英语'),
    );

    const USER_INFO_RES = array(
        'subscribe' => array('memo'=>'用户是否订阅该公众号标识，值为0时，代表此用户没有关注该公众号，拉取不到其余信息。'),
        'openid' => array('memo'=>'用户的标识，对当前公众号唯一'),
        'nickname' => array('memo'=>'用户的昵称'),
        'sex' => array('memo'=>'用户的性别，值为1时是男性，值为2时是女性，值为0时是未知'),
        'city' => array('memo'=>'用户所在城市'),
        'country' => array('memo'=>'用户所在国家'),
        'province' => array('memo'=>'用户所在省份'),
        'language' => array('memo'=>'用户的语言，简体中文为zh_CN'),
        'headimgurl' => array('memo'=>'用户头像，最后一个数值代表正方形头像大小（有0、46、64、96、132数值可选，0代表640*640正方形头像），用户没有头像时该项为空。若用户更换头像，原有头像URL将失效。'),
        'subscribe_time' => array('memo'=>'用户关注时间，为时间戳。如果用户曾多次关注，则取最后关注时间'),
        'unionid' => array('memo'=>'只有在用户将公众号绑定到微信开放平台帐号后，才会出现该字段。'),
        'remark' => array('memo'=>'公众号运营者对粉丝的备注，公众号运营者可在微信公众平台用户管理界面对粉丝添加备注'),
        'groupid' => array('memo'=>'用户所在的分组ID（兼容旧的用户分组接口）'),
        'tagid_list' => array('memo'=>'用户被打上的标签ID列表'),
        'subscribe_scene' => array('memo'=>'返回用户关注的渠道来源，ADD_SCENE_SEARCH 公众号搜索，ADD_SCENE_ACCOUNT_MIGRATION 公众号迁移，ADD_SCENE_PROFILE_CARD 名片分享，ADD_SCENE_QR_CODE 扫描二维码，ADD_SCENEPROFILE LINK 图文页内名称点击，ADD_SCENE_PROFILE_ITEM 图文页右上角菜单，ADD_SCENE_PAID 支付后关注，ADD_SCENE_OTHERS 其他'),
        'qr_scene' => array('memo'=>'二维码扫码场景（开发者自定义）'),
        'qr_scene_str' => array('memo'=>'二维码扫码场景描述（开发者自定义）'),
    );

    const USER_INFO_BATCHGET_REQ = self::USER_INFO_REQ;

    const USER_INFO_BATCHGET_RES = array(
        'subscribe' => array('memo'=>'用户是否订阅该公众号标识，值为0时，代表此用户没有关注该公众号，拉取不到其余信息。'),
        'openid' => array('memo'=>'用户的标识，对当前公众号唯一'),
        'nickname' => array('memo'=>'用户的昵称'),
        'sex' => array('memo'=>'用户的性别，值为1时是男性，值为2时是女性，值为0时是未知'),
        'city' => array('memo'=>'用户所在城市'),
        'country' => array('memo'=>'用户所在国家'),
        'province' => array('memo'=>'用户所在省份'),
        'language' => array('memo'=>'用户的语言，简体中文为zh_CN'),
        'headimgurl' => array('memo'=>'用户头像，最后一个数值代表正方形头像大小（有0、46、64、96、132数值可选，0代表640*640正方形头像），用户没有头像时该项为空。若用户更换头像，原有头像URL将失效。'),
        'subscribe_time' => array('memo'=>'用户关注时间，为时间戳。如果用户曾多次关注，则取最后关注时间'),
        'unionid' => array('memo'=>'只有在用户将公众号绑定到微信开放平台帐号后，才会出现该字段。'),
        'remark' => array('memo'=>'公众号运营者对粉丝的备注，公众号运营者可在微信公众平台用户管理界面对粉丝添加备注'),
        'groupid' => array('memo'=>'用户所在的分组ID（暂时兼容用户分组旧接口）'),
        'tagid_list' => array('memo'=>'用户被打上的标签ID列表'),
        'subscribe_scene' => array('memo'=>'返回用户关注的渠道来源，ADD_SCENE_SEARCH 公众号搜索，ADD_SCENE_ACCOUNT_MIGRATION 公众号迁移，ADD_SCENE_PROFILE_CARD 名片分享，ADD_SCENE_QR_CODE 扫描二维码，ADD_SCENEPROFILE LINK 图文页内名称点击，ADD_SCENE_PROFILE_ITEM 图文页右上角菜单，ADD_SCENE_PAID 支付后关注，ADD_SCENE_OTHERS 其他'),
        'qr_scene' => array('memo'=>'二维码扫码场景（开发者自定义）'),
        'qr_scene_str' => array('memo'=>'二维码扫码场景描述（开发者自定义）'),
    );

    const USER_GET_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'next_openid' => array('required'=>'是', 'memo'=>'第一个拉取的OPENID，不填默认从头开始拉取'),
    );

    const USER_GET_RES = array(
        'total' => array('memo'=>'关注该公众账号的总用户数'),
        'count' => array('memo'=>'拉取的OPENID个数，最大值为10000'),
        'data' => array('memo'=>'列表数据，OPENID的列表'),
        'next_openid' => array('memo'=>'拉取列表的最后一个用户的OPENID'),
    );
}