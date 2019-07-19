<?php
namespace Minicub\Wechat\Publics\CustomService;

use Minicub\Wechat\Publics\Common;
use Minicub\Wechat\Publics\Singleton;

class MsgRecord
{
    use Common, Singleton;

    //邀请绑定客服帐号
    public function getMsgList($starttime, $endtime, $msgid, $number)
    {
        $url = $this->WechatApiBaseURL.'customservice/msgrecord/getmsglist?access_token='.$this->access_token;

        $arr = compact('starttime', 'endtime', 'msgid', 'number');

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::CUSTOMSERVICE_MSGRECORD_GETMSGLIST_REQ, ParamsRemark::CUSTOMSERVICE_MSGRECORD_GETMSGLIST_RES);
    }
}