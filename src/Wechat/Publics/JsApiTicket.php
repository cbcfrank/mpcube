<?php
namespace Mpcube\Wechat\Publics;

use Mpcube\Common\Cache;
use Mpcube\Common\Common;
use Mpcube\Common\Singleton;

class JsApiTicket
{
    use Common, Singleton, Cache;

    const CACHE_DRIVER_FILESYSTEM = 'Filesystem';
    const CACHE_DRIVER_MEMECACHE = 'Memecache';
    const CACHE_DRIVER_REDIS = 'Redis';

    public function getJsApiTicketNoRefresh($appid)
    {
        $arr = json_decode($this->_cache->fetch("{$appid}_jsapi_ticket"), true);
        return isset($arr['ticket']) ? $arr['ticket'] : '';
    }

    public function getJsApiTicket($appid)
    {
        $arr = json_decode($this->_cache->fetch("{$appid}_jsapi_ticket"), true);

        if (!is_array($arr) || (isset($arr['next_time']) && (time()>=$arr['next_time']))) {
            $url = $this->WechatApiBaseURL."cgi-bin/ticket/getticket?type=jsapi&access_token=$this->access_token";
            $arr = json_decode($this->curlGet($url), true);

            if (!is_array($arr)) return '';
            if (!isset($arr['expires_in']) || !isset($arr['ticket'])) return '';

            $left_time = ceil($arr['expires_in'] * 2 / 3);
//            if (!is_integer($left_time) || !($left_time>0)) $left_time = 2400;
            $left_time = $left_time>0 ? $left_time : 2400;

//            $left_time = ceil($arr['expires_in'] * 2 / 3);
//            if (!is_integer($left_time) || !($left_time>0)) $left_time = 2400;
            $arr['next_time'] = time() + $left_time;
            $this->_cache->save("{$appid}_jsapi_ticket", json_encode($arr), $left_time);
//            $arr['next_time'] = time() + ceil($arr['expires_in'] * 2 / 3);
//            $this->_cache->save("{$appid}_jsapi_ticket", json_encode($arr));
        }

        return isset($arr['ticket']) ? $arr['ticket'] : '';
    }
}