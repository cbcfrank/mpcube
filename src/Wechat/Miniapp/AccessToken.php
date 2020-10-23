<?php

namespace Mpcube\Wechat\Miniapp;

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

    /**
     * @param $appid
     * @param $appsecret
     * @return false|float|int|mixed
     * 返回数据示例
        正常返回    {"access_token":"ACCESS_TOKEN","expires_in":7200}
        错误时返回  {"errcode":40013,"errmsg":"invalid appid"}
            access_token 的存储与更新
            access_token 的存储至少要保留 512 个字符空间；
            access_token 的有效期目前为 2 个小时，需定时刷新，重复获取将导致上次获取的 access_token 失效；
            建议开发者使用中控服务器统一获取和刷新 access_token，其他业务逻辑服务器所使用的 access_token 均来自于该中控服务器，不应该各自去刷新，否则容易造成冲突，导致 access_token 覆盖而影响业务；
            access_token 的有效期通过返回的 expires_in 来传达，目前是7200秒之内的值，中控服务器需要根据这个有效时间提前去刷新。在刷新过程中，中控服务器可对外继续输出的老 access_token，此时公众平台后台会保证在5分钟内，新老 access_token 都可用，这保证了第三方业务的平滑过渡；
            access_token 的有效时间可能会在未来有调整，所以中控服务器不仅需要内部定时主动刷新，还需要提供被动刷新 access_token 的接口，这样便于业务服务器在API调用获知 access_token 已超时的情况下，可以触发 access_token 的刷新流程。
            详情可参考微信公众平台文档 《获取access_token》 https://developers.weixin.qq.com/doc/offiaccount/Basic_Information/Get_access_token.html
     */

    public function getToken($appid, $appsecret)
    {
        $arr = json_decode($this->_cache->fetch("{$appid}_access_token"), true);

        if (!is_array($arr) || (isset($arr['next_time']) && (time()>$arr['next_time']))) {
            $url = $this->WechatApiBaseURL."cgi-bin/token?grant_type=".GrantType::CLIENT_CREDENTIAL."&appid={$appid}&secret={$appsecret}";
            $arr = json_decode($this->curlGet($url), true);
            $arr['next_time'] = time() + ceil($arr['expires_in'] * 2 / 3);
            $this->_cache->save("{$appid}_access_token", json_encode($arr));
        }

        return $arr['access_token'];
    }
}