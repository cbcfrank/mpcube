<?php
namespace Mpcube\Wechat\Publics\Web;

use Mpcube\Common\ICache;
//use Mpcube\Wechat\Publics\Cache;
use Mpcube\Common\Cache;
//use Mpcube\Wechat\Publics\Common;
use Mpcube\Common\Common;
use Mpcube\Wechat\Publics\Errcode;
//use Mpcube\Wechat\Publics\Singleton;
use Mpcube\Common\Singleton;

class Oauth2 implements ICache
{
    use Common, Singleton, Cache;

//    const CACHE_DRIVER_FILESYSTEM = 'Filesystem';
//    const CACHE_DRIVER_MEMECACHE = 'Memecache';
//    const CACHE_DRIVER_REDIS = 'Redis';

    public function authorize($appid, $redirecturl, $snsapi_type=Oauth2Scope::snsapi_base, $state=array(), $redirect=false)
    {
        $statestr = urlencode(json_encode($state));
        $urlcode = urlencode($redirecturl);
        $codeurl = $this->WechatOpenBaseURL."connect/oauth2/authorize?appid={$appid}&redirect_uri={$urlcode}&response_type=code&scope={$snsapi_type}&state={$statestr}#wechat_redirect";
//        header("location:{$codeurl}");
//        exit();

        if ($redirect==true) {
            header("location:{$codeurl}");
            exit();
        }

        return $codeurl;
    }

    public function getFullWebAccessToken($appid, $appsecret, $code)
    {
        //error_reporting(E_ALL);
        //$arr = $this->httpRespToArray($this->_cache->fetch("{$appid}_web_access_token"),ParamsRemark::SNS_OAUTH2_ACCESS_TOKEN_REQ,ParamsRemark::SNS_OAUTH2_ACCESS_TOKEN_RES);
        $arr = json_decode($this->_cache->fetch("{$appid}_web_access_token_{$code}"), true);

        if (!is_array($arr) || (isset($arr['next_time']) && (time()>$arr['next_time']))) {
            $url = $this->WechatApiBaseURL."sns/oauth2/access_token?appid=".$appid."&secret=".$appsecret."&code=".$code."&grant_type=authorization_code";
            $arr = json_decode($this->curlGet($url), true);
            $arr['next_time'] = time() + ceil($arr['expires_in'] * 2 / 3);
            $this->_cache->save("{$appid}_web_access_token_{$code}", json_encode($arr));
        }

        return $arr;
    }

    public function getFullWebAccessTokenAndOpenid($appid, $appsecret, $code, &$openid=null, &$scope=null)
    {
        $arr = $this->getFullWebAccessToken($appid, $appsecret, $code);

        $openid = $arr['openid'];
        $scope = $arr['scope'];
        return $arr['access_token'];
    }

    //刷新access_token（如果需要）
    public function refreshToken($appid, $refresh_token)
    {
        $url = $this->WechatApiBaseURL."sns/oauth2/refresh_token?appid={$appid}&grant_type=refresh_token&refresh_token={$refresh_token}";
        return $this->httpRespToArray($this->curlGet($url), ParamsRemark::SNS_OAUTH2_REFRESH_TOKEN_REQ, ParamsRemark::SNS_OAUTH2_REFRESH_TOKEN_RES);
    }

    //拉取用户信息(需scope为 snsapi_userinfo)
    public function getUserinfo($web_access_token, $openid, $lang='zh_CN')
    {
        $url = $this->WechatApiBaseURL."sns/userinfo?access_token={$web_access_token}&openid={$openid}&lang={$lang}";
        return $this->httpRespToArray($this->curlGet($url), ParamsRemark::SNS_USERINFO_REQ, ParamsRemark::SNS_USERINFO_RES);
    }

    //检验授权凭证（access_token）是否有效
    public function auth($web_access_token, $openid)
    {
        $url = $this->WechatApiBaseURL."sns/auth?access_token={$web_access_token}&openid={$openid}";
        return $this->httpRespToArray($this->curlGet($url));
    }

}