<?php

namespace Mpcube\Wechat\Miniapp\UniformMessage;

use Mpcube\Common\Common;
use Mpcube\Common\Singleton;
use Mpcube\Wechat\Miniapp\UniformMessage\ParamsRemark;

class UniformMessage
{
    use Common, Singleton;

    //下发小程序服务消息
    public function sendWeappTemplateMsg($touser, $template_id, $page, $form_id, array $data, $emphasis_keyword)
    {
        $url = $this->WechatApiBaseURL."cgi-bin/message/wxopen/template/uniform_send?access_token={$this->access_token}";

        $weapp_template_msg = compact('template_id', 'page', 'form_id', 'data', 'emphasis_keyword');
        $arr = compact('touser', 'weapp_template_msg');
        $ret = $this->curlPost($url, $arr);

        return $this->httpRespToArray($ret, ParamsRemark::UNIFORMMESSAGE_WEAPPTEMPLATEMSG_REQ, ParamsRemark::UNIFORMMESSAGE_RES);
    }

    //下发公众号统一的服务消息
    public function sendMpTemplateMsg($touser, $appid, $template_id, $url, array $miniprogram, array $data)
    {
        $url = $this->WechatApiBaseURL."cgi-bin/message/wxopen/template/uniform_send?access_token={$this->access_token}";

        $mp_template_msg = compact('template_id', 'appid', 'template_id', 'url', 'data');
        $arr = compact('touser', 'mp_template_msg');
        $ret = $this->curlPost($url, $arr);

        return $this->httpRespToArray($ret, ParamsRemark::UNIFORMMESSAGE_MPTEMPLATEMSG_REQ, ParamsRemark::UNIFORMMESSAGE_RES);
    }
}
