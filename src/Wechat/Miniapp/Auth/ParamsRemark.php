<?php

namespace Mpcube\Wechat\Miniapp\Auth;


class ParamsRemark
{
    const AUTH_CODE2SESSION_REQ = array(
        'appid' => array('required'=>'是', 'memo'=>'小程序 appId'),
        'secret' => array('required'=>'是', 'memo'=>'小程序 appSecret'),
        'js_code' => array('required'=>'是', 'memo'=>'登录时获取的 code'),
        'grant_type' => array('required'=>'是', 'memo'=>'授权类型，此处只需填写 authorization_code'),
    );

    const AUTH_CODE2SESSION_RES = array(
        'openid' => array('memo'=>'用户唯一标识'),
        'session_key' => array('memo'=>'会话密钥'),
        'unionid' => array('memo'=>'用户在开放平台的唯一标识符，在满足 UnionID 下发条件的情况下会返回，详见 UnionID 机制说明。'),
    );

}