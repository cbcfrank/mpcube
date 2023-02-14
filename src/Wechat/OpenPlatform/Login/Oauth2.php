<?php
namespace Mpcube\Wechat\OpenPlatform\Login;

use Mpcube\Common\ICache;
use Mpcube\Common\Cache;
use Mpcube\Common\Common;
use Mpcube\Wechat\Publics\Errcode;
use Mpcube\Common\Singleton;

class Oauth2 implements ICache
{
    use Common, Singleton, Cache;

//    const CACHE_DRIVER_FILESYSTEM = 'Filesystem';
//    const CACHE_DRIVER_MEMECACHE = 'Memecache';
//    const CACHE_DRIVER_REDIS = 'Redis';

    public function authorize($appid, $redirecturl, $snsapi_type=Oauth2Scope::snsapi_login, $state=array(), $redirect=false)
    {
        $statestr = urlencode(json_encode($state));
        $urlcode = urlencode($redirecturl);
        $codeurl = $this->WechatOpenBaseURL."connect/qrconnect?appid={$appid}&redirect_uri={$urlcode}&response_type=code&scope={$snsapi_type}&state={$statestr}#wechat_redirect";

        if ($redirect==true) {
            header("location:{$codeurl}");
            exit();
        }

        return $codeurl;
    }

    public function getAccessToken($appid, $appsecret, $code)
    {
        $arr = json_decode($this->_cache->fetch("{$appid}_openplatform_access_token_{$code}"), true);

        if (!is_array($arr) || (isset($arr['next_time']) && (time()>$arr['next_time']))) {
            $url = $this->WechatApiBaseURL."sns/oauth2/access_token?appid=".$appid."&secret=".$appsecret."&code=".$code."&grant_type=authorization_code";
            $ret = $this->curlGet($url);
            $arr = json_decode($ret, true);

            if (!isset($arr['expires_in'])) return $this->httpRespToArray($ret, ParamsRemark::SNS_OAUTH2_REFRESH_TOKEN_REQ, ParamsRemark::SNS_OAUTH2_REFRESH_TOKEN_RES);

            $arr['next_time'] = time() + ceil($arr['expires_in'] * 2 / 3);
            $this->_cache->save("{$appid}_openplatform_access_token_{$code}", json_encode($arr));
        }

        return $arr;
    }
//
//    public function getFullWebAccessTokenAndOpenid($appid, $appsecret, $code, &$openid=null, &$scope=null)
//    {
//        $arr = $this->getFullWebAccessToken($appid, $appsecret, $code);
//
//        $openid = $arr['openid'];
//        $scope = $arr['scope'];
//        return $arr['access_token'];
//    }

    //刷新access_token（如果需要）
    public function refreshToken($appid, $refresh_token)
    {
        $url = $this->WechatApiBaseURL."sns/oauth2/refresh_token?appid={$appid}&grant_type=refresh_token&refresh_token={$refresh_token}";
        return $this->httpRespToArray($this->curlGet($url), ParamsRemark::SNS_OAUTH2_REFRESH_TOKEN_REQ, ParamsRemark::SNS_OAUTH2_REFRESH_TOKEN_RES);
    }

    //拉取用户信息(需scope为 snsapi_userinfo)
    public function getUserinfo($openplatform_access_token, $openid, $lang='zh_CN')
    {
        $url = $this->WechatApiBaseURL."sns/userinfo?access_token={$openplatform_access_token}&openid={$openid}&lang={$lang}";
        return $this->httpRespToArray($this->curlGet($url), ParamsRemark::SNS_USERINFO_REQ, ParamsRemark::SNS_USERINFO_RES);
    }

    //检验授权凭证（access_token）是否有效
    public function auth($openplatform_access_token, $openid)
    {
        $url = $this->WechatApiBaseURL."sns/auth?access_token={$openplatform_access_token}&openid={$openid}";
        return $this->httpRespToArray($this->curlGet($url));
    }

}
