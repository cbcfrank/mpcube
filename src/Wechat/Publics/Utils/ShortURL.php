<?php
namespace Mpcube\Wechat\Publics\Utils;

//use Mpcube\Wechat\Publics\Common;
use Mpcube\Common\Common;
//use Mpcube\Wechat\Publics\Singleton;
use Mpcube\Common\Singleton;

class ShortURL
{
    use Common, Singleton;

    public function urlShort($long_url, $action='long2short')
    {
        $arr = compact('long_url', 'action');
        $url = $this->WechatApiBaseURL."cgi-bin/shorturl?access_token=".$this->access_token;
        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::SHORTURL_URLSHORT_REQ, ParamsRemark::SHORTURL_URLSHORT_RES);
    }
}