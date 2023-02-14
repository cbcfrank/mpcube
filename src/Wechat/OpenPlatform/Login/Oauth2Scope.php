<?php
namespace Mpcube\Wechat\OpenPlatform\Login;

/**
 * @link https://developers.weixin.qq.com/doc/oplatform/Website_App/WeChat_Login/Wechat_Login.html
 */
class Oauth2Scope
{
    //snsapi_login 第三方使用网站应用授权登录前请注意已获取相应网页授权作用域
    const snsapi_login = 'snsapi_login';

    //snsapi_base （不弹出授权页面，直接跳转，只能获取用户openid）
    const snsapi_base = 'snsapi_base';

    //snsapi_userinfo （获取用户个人信息）
    const snsapi_userinfo = 'snsapi_userinfo';
}
