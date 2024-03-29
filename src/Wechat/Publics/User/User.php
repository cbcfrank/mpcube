<?php
namespace Mpcube\Wechat\Publics\User;

//use Mpcube\Wechat\Publics\Common;
use Mpcube\Common\Common;
//use Mpcube\Wechat\Publics\Singleton;
use Mpcube\Common\Singleton;

class User
{
    use Common, Singleton;

    private $_user_list = array();

    //获取标签下粉丝列表
    public function tagGet($tagid, $next_openid='')
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/user/tag/get?access_token='.$this->access_token;

        $arr = compact('tagid', 'next_openid');

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::USER_TAG_GET_REQ, ParamsRemark::USER_TAG_GET_RES);
    }

    //设置用户备注名
    public function infoUpdateRemark($openid, $remark)
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/user/info/updateremark?access_token='.$this->access_token;

        $arr = compact('openid', 'remark');

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::USER_INFO_UPDATEREMARK_RES);
    }

    //获取用户基本信息(UnionID机制)
    public function info($openid, $lang='zh_CN')
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/user/info?access_token='.$this->access_token.'&openid='.$openid.'&lang='.$lang;
        return $this->httpRespToArray($this->curlGet($url), ParamsRemark::USER_INFO_REQ, ParamsRemark::USER_INFO_RES);
    }

    public function setUserList($openid, $lang='zh_CN')
    {
        $this->_user_list[] = compact('openid', 'lang');
        return $this;
    }

    public function getUserList()
    {
        return $this->_user_list;
    }

    public function clearUserList()
    {
        $this->_user_list = array();
        return $this;
    }

    //批量获取用户基本信息
    //开发者可通过该接口来批量获取用户基本信息。最多支持一次拉取100条。
    public function infoBatchGet()
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/user/info/batchget?access_token='.$this->access_token;

        $arr = array("user_list" => $this->_user_list);

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::USER_INFO_BATCHGET_REQ, ParamsRemark::USER_INFO_BATCHGET_RES);
    }

    //获取用户列表
    public function get($next_openid='')
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/user/get?access_token='.$this->access_token.'&next_openid='.$next_openid;

        return $this->httpRespToArray($this->curlGet($url), ParamsRemark::USER_GET_REQ, ParamsRemark::USER_GET_RES);
    }

}