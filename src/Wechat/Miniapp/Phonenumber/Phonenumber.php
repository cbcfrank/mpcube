<?php

namespace Mpcube\Wechat\Miniapp\Phonenumber;

use Mpcube\Common\Common;
use Mpcube\Common\Singleton;

class Phonenumber
{
    use Common, Singleton;

    public function getPhoneNumber($code)
    {
        $url = $this->WechatApiBaseURL."/wxa/business/getuserphonenumber?&access_token={$this->access_token}";
        $arr = compact('code');
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::PHONENUMBER_GETPHONENUMBER_REQ, ParamsRemark::PHONENUMBER_GETPHONENUMBER_RES);
    }
}
