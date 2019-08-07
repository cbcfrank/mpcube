<?php
namespace Mpcube\Wechat\Publics\Web;

class Oauth2Scope
{
    //snsapi_base （不弹出授权页面，直接跳转，只能获取用户openid）
    const snsapi_base = 'snsapi_base';

    //snsapi_userinfo （弹出授权页面，可通过openid拿到昵称、性别、所在地。并且， 即使在未关注的情况下，只要用户授权，也能获取其信息 ）
    const snsapi_userinfo = 'snsapi_userinfo';
}