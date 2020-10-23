<?php

namespace Mpcube\Wechat\Publics;

use Mpcube\Common\ICache;
use Mpcube\Common\Singleton;
use Mpcube\Common\Common;
use Mpcube\Common\Cache;

class AccessToken implements ICache
{
    use Common, Singleton, Cache;

//    const CACHE_DRIVER_FILESYSTEM = 'Filesystem';
//    const CACHE_DRIVER_MEMECACHE = 'Memecache';
//    const CACHE_DRIVER_REDIS = 'Redis';

    public function getToken($appid, $appsecret)
    {
        $arr = json_decode($this->_cache->fetch("{$appid}_access_token"), true);

        if (!is_array($arr) || (isset($arr['next_time']) && (time()>$arr['next_time']))) {
            $url = $this->WechatApiBaseURL."cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsecret}";
            $arr = json_decode($this->curlGet($url), true);
            $arr['next_time'] = time() + ceil($arr['expires_in'] * 2 / 3);
            $this->_cache->save("{$appid}_access_token", json_encode($arr));
        }

        return $arr['access_token'];
    }
}