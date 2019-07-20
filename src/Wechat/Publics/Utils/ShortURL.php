<?php
namespace Minicub\Wechat\Publics\Utils;

use Minicub\Wechat\Publics\Common;
use Minicub\Wechat\Publics\Singleton;

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