<?php
namespace Minicub\Wechat\Publics;


class Network
{
    use Common;

    //获取微信服务器IP地址
    public function getCallbackIP()
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/getcallbackip?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlGet($url));
    }

    //网络检测
    public function callbackCheck($action, $check_operator)
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/callback/check?access_token='.$this->access_token;

        $arr = compact('action', 'check_operator');

        return $this->httpRespToArray($this->curlPost($url, $arr));
    }


}