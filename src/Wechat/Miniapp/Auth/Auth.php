<?php

namespace Mpcube\Wechat\Miniapp\Auth;

use Mpcube\Common\Cache;
use Mpcube\Common\Common;
use Mpcube\Common\ICache;
use Mpcube\Common\Singleton;
use Mpcube\Wechat\Miniapp\GrantType;

class Auth implements ICache
{
    use Common, Singleton, Cache;

    public function code2Session($appid, $secret, $jsCode)
    {
        $url = $this->WechatApiBaseURL."sns/jscode2session?appid=".$appid."&secret=".$secret."&js_code=".$jsCode."&grant_type=".GrantType::AUTHORIZATION_CODE;
        return $this->httpRespToArray($this->curlGet($url), ParamsRemark::AUTH_CODE2SESSION_REQ, ParamsRemark::AUTH_CODE2SESSION_RES);
    }

    // todo auth.getPaidUnionId
    public function getPaidUnionId($openid)
    {
//        https://api.weixin.qq.com/wxa/getpaidunionid?access_token=ACCESS_TOKEN&openid=OPENID
        $url = $this->WechatApiBaseURL."wxa/getpaidunionid?access_token={$this->access_token}&openid={$openid}";
    }

}