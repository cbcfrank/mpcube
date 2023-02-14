<?php

namespace Mpcube\Wxwork\Internal\Message;

use Mpcube\Common\Common;
use Mpcube\Common\Singleton;

class Message
{
    use Common, Singleton;

    /**
     * 发送应用消息
     * @link https://developer.work.weixin.qq.com/document/path/90236
     * @return mixed
     */
    public function send(array $messageBody)
    {
        $url = $this->WxworkApiBaseURL.'cgi-bin/message/send?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlPost($url, $messageBody), ParamsRemark::MESSAGE_SEND_REQ, ParamsRemark::MESSAGE_SEND_RES);
    }

}
