<?php
namespace Mpcube\Wechat\Publics\Template;

use Mpcube\Wechat\Publics\Common;
use Mpcube\Wechat\Publics\Singleton;

class Template
{
    use Common, Singleton;

    private $_message_content = array();

    //设置所属行业
    public function setIndustry($industry_id1, $industry_id2)
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/template/api_set_industry?access_token='.$this->access_token;

        $arr = compact("industry_id1","industry_id2");

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::API_SET_INDUSTRY_REQ);
    }

    //获取设置的行业信息
    public function getIndustry()
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/template/get_industry?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlGet($url), array(), ParamsRemark::GET_INDUSTRY_RES);
    }

    //获得模板ID
    public function addTemplate($template_id_short)
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/template/api_add_template?access_token='.$this->access_token;

        $arr = compact('template_id_short');

        return $this->httpRespToArray($this->curlPost($url, $arr),ParamsRemark::API_ADD_TEMPLATE_RES);
    }

    //获取模板列表
    public function getAllPrivateTemplate()
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/template/get_all_private_template?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlGet($url),ParamsRemark::GET_ALL_PRIVATE_TEMPLATE_REQ, ParamsRemark::GET_ALL_PRIVATE_TEMPLATE_RES);
    }

    //删除模板
    public function delPrivateTemplate($template_id)
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/template/del_private_template?access_token='.$this->access_token;

        $arr = compact('template_id');

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::DEL_PRIVATE_TEMPLATE_REQ);
    }

    //模板消息的内容
    public function setMessageContent($touser, $template_id, array $data, $url='', $miniprogram_appid='', $miniprogram_pagepath='')
    {
        $arr = compact('touser', 'template_id', 'url');
        $this->_message_content = array_filter(array_merge($arr, array(
            'miniprogram' => array('appid'=>$miniprogram_appid, 'pagepath'=>$miniprogram_pagepath),
            'data' => $data,
        )));
        return $this;
    }

    //发送模板消息
    public function sendMessage()
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/message/template/send?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlPost($url, $this->_message_content), ParamsRemark::MESSAGE_TEMPLATE_SEND_REQ);
    }

}