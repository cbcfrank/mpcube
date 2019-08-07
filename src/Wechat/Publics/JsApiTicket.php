<?php
namespace Mpcube\Wechat\Publics;

class JsApiTicket
{
    use Common, Singleton, Cache;

    const CACHE_DRIVER_FILESYSTEM = 'Filesystem';
    const CACHE_DRIVER_MEMECACHE = 'Memecache';
    const CACHE_DRIVER_REDIS = 'Redis';

    public function getJsApiTicket($appid)
    {
        $arr = json_decode($this->_cache->fetch("{$appid}_jsapi_ticket"), true);

        if (!is_array($arr) || (isset($arr['next_time']) && (time()>$arr['next_time']))) {
            $url = $this->WechatApiBaseURL."cgi-bin/ticket/getticket?type=jsapi&access_token=$this->access_token";
            $arr = json_decode($this->curlGet($url), true);
            $arr['next_time'] = time() + ceil($arr['expires_in'] * 2 / 3);
            $this->_cache->save("{$appid}_jsapi_ticket", json_encode($arr));
        }

        return $arr['ticket'];
    }
}