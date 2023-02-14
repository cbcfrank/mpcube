<?php

namespace Mpcube\Wxwork\Internal;

use Mpcube\Common\Cache;
use Mpcube\Common\Common;
use Mpcube\Common\Singleton;

class AccessToken
{
    use Common, Singleton, Cache;

    const CACHE_DRIVER_FILESYSTEM = 'Filesystem';
    const CACHE_DRIVER_MEMECACHE = 'Memecache';
    const CACHE_DRIVER_REDIS = 'Redis';

    public function getTokenNoRefresh($corpid, $agentid)
    {
        $arr = json_decode($this->_cache->fetch("{$corpid}_{$agentid}_access_token"), true);
        return isset($arr['access_token']) ? $arr['access_token'] : '';
    }

    public function getToken($corpid, $agentid, $corpsecret)
    {
        $arr = json_decode($this->_cache->fetch("{$corpid}_{$agentid}_access_token"), true);

        if (!is_array($arr) || (isset($arr['next_time']) && (time()>=$arr['next_time']))) {

            $url = $this->WxworkApiBaseURL."cgi-bin/gettoken?corpid={$corpid}&corpsecret={$corpsecret}";
            $arr = json_decode($this->curlGet($url), true);

            if (!is_array($arr)) return '';
            if (!isset($arr['expires_in']) || !isset($arr['access_token'])) return '';

            $left_time = ceil($arr['expires_in'] * 2 / 3);
            $left_time = $left_time>0 ? $left_time : 2400;
            $arr['next_time'] = time() + $left_time;
            $this->_cache->save("{$corpid}_{$agentid}_access_token", json_encode($arr));
        }

        return isset($arr['access_token']) ? $arr['access_token'] : '';
    }
}