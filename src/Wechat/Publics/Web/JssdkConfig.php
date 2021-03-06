<?php
namespace Mpcube\Wechat\Publics\Web;

use Mpcube\Common\Common;
use Mpcube\Common\Singleton;

class JssdkConfig
{
    use Common, Singleton;

    public function getSignPackage($appid, $jsapiTicket, $url=null)
    {
        // 注意 URL 一定要动态获取，不能 hardcode.
        if (empty($url)) {
            $url = $_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];;
        }

        $timestamp = time();
        $nonceStr = $this->createNonceStr();

        // 这里参数的顺序要按照 key 值 ASCII 码升序排序
        $string = "jsapi_ticket={$jsapiTicket}&noncestr={$nonceStr}&timestamp={$timestamp}&url={$url}";

        $signature = sha1($string);

        $signPackage = array(
            "appId" => $appid,
            "nonceStr" => $nonceStr,
            "timestamp" => $timestamp,
            "url" => $url,
            "signature" => $signature,
            "rawString" => $string
        );
        return $signPackage;
    }

    private function createNonceStr($length = 16)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

}