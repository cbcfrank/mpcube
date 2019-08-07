<?php
namespace Mpcube\Wechat\Publics\CustomService;

use Mpcube\Wechat\Publics\Common;
use Mpcube\Wechat\Publics\Singleton;

class Kfsession
{
    use Common, Singleton;

    //会话控制
    public function create($kf_account, $openid)
    {
        $url = $this->WechatApiBaseURL.'customservice/kfsession/create?access_token='.$this->access_token;

        $arr = compact('kf_account', 'openid');

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::CUSTOMSERVICE_KFSESSION_CREATE_REQ);
    }

    //关闭会话
    public function close($kf_account, $openid)
    {
        $url = $this->WechatApiBaseURL.'customservice/kfsession/close?access_token='.$this->access_token;

        $arr = compact('kf_account', 'openid');

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::CUSTOMSERVICE_KFSESSION_CREATE_REQ);
    }

    //获取客户会话状态
    public function getSession($openid)
    {
        $url = $this->WechatApiBaseURL.'customservice/kfsession/getsession?access_token='.$this->access_token.'&openid='.$openid;
        return $this->httpRespToArray($this->curlGet($url), array(),ParamsRemark::CUSTOMSERVICE_KFSESSION_GETSESSION_RES);
    }

    //获取客服会话列表
    public function getSessionList($kf_account)
    {
        $url = $this->WechatApiBaseURL.'customservice/kfsession/getsessionlist?access_token='.$this->access_token.'&kf_account='.$kf_account;
        return $this->httpRespToArray($this->curlGet($url));
    }

    //获取未接入会话列表
    public function getWaitcase()
    {
        $url = $this->WechatApiBaseURL.'customservice/kfsession/getwaitcase?access_token='.$this->access_token;
        return $this->httpRespToArray($this->curlGet($url), array(), ParamsRemark::CUSTOMSERVICE_KFSESSION_GETWAITCASE_RES);
    }

}