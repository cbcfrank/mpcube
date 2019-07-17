<?php
namespace Minicub\Wechat\Publics\Web;

class ParamsRemark
{
    const SNS_OAUTH2_ACCESS_TOKEN_REQ = array(
        'appid' => array('required'=>'是', 'memo'=>'公众号的唯一标识'),
        'secret' => array('required'=>'是', 'memo'=>'公众号的appsecret'),
        'code' => array('required'=>'是', 'memo'=>'填写第一步获取的code参数'),
        'grant_type' => array('required'=>'是', 'memo'=>'填写为authorization_code'),
    );

    const SNS_OAUTH2_ACCESS_TOKEN_RES = array(
        'access_token' => array('memo'=>'网页授权接口调用凭证,注意：此access_token与基础支持的access_token不同'),
        'expires_in' => array('memo'=>'access_token接口调用凭证超时时间，单位（秒）'),
        'refresh_token' => array('memo'=>'用户刷新access_token'),
        'openid' => array('memo'=>'用户唯一标识，请注意，在未关注公众号时，用户访问公众号的网页，也会产生一个用户和公众号唯一的OpenID'),
        'scope' => array('memo'=>'用户授权的作用域，使用逗号（,）分隔'),
    );

    const SNS_OAUTH2_REFRESH_TOKEN_REQ = array(
        'appid' => array('required'=>'是', 'memo'=>'公众号的唯一标识'),
        'grant_type' => array('required'=>'是', 'memo'=>'填写为refresh_token'),
        'refresh_token' => array('required'=>'是', 'memo'=>'填写通过access_token获取到的refresh_token参数'),
    );

    const SNS_OAUTH2_REFRESH_TOKEN_RES = self::SNS_OAUTH2_ACCESS_TOKEN_RES;

    const SNS_USERINFO_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'网页授权接口调用凭证,注意：此access_token与基础支持的access_token不同'),
        'openid' => array('required'=>'是', 'memo'=>'用户的唯一标识'),
        'lang' => array('required'=>'是', 'memo'=>'返回国家地区语言版本，zh_CN 简体，zh_TW 繁体，en 英语'),
    );

    const SNS_USERINFO_RES = array(
        'openid' => array('memo'=>'用户的唯一标识'),
        'nickname' => array('memo'=>'用户昵称'),
        'sex' => array('memo'=>'用户的性别，值为1时是男性，值为2时是女性，值为0时是未知'),
        'province' => array('memo'=>'用户个人资料填写的省份'),
        'city' => array('memo'=>'普通用户个人资料填写的城市'),
        'country' => array('memo'=>'国家，如中国为CN'),
        'headimgurl' => array('memo'=>'用户头像，最后一个数值代表正方形头像大小（有0、46、64、96、132数值可选，0代表640*640正方形头像），用户没有头像时该项为空。若用户更换头像，原有头像URL将失效。'),
        'privilege' => array('memo'=>'用户特权信息，json 数组，如微信沃卡用户为（chinaunicom）'),
        'unionid' => array('memo'=>'只有在用户将公众号绑定到微信开放平台帐号后，才会出现该字段。'),
    );
}