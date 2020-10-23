<?php
namespace Mpcube\Wechat\Publics\Utils;

//use Mpcube\Wechat\Publics\Common;
use Mpcube\Common\Common;
//use Mpcube\Wechat\Publics\Singleton;
use Mpcube\Common\Singleton;

class Qrcode
{
    use Common, Singleton;

    // region 生成带参数的二维码

    //临时的整型参数值
    public function createQrcodeByQRSCENE($expire_seconds, $scene_id)
    {
        $arr = array(
            "expire_seconds" => $expire_seconds,
            "action_name" => QrcodeActionName::QR_SCENE,
            "action_info" => array("scene" => compact('scene_id')
            )
        );
        $url = $this->WechatApiBaseURL."cgi-bin/qrcode/create?access_token=".$this->access_token;
        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::QRCODE_CREATE_REQ, ParamsRemark::QRCODE_CREATE_RES);
    }

    //临时的字符串参数值
    public function createQrcodeByQRSTRSCENE($expire_seconds, $scene_str)
    {
        $arr = array(
            "expire_seconds" => $expire_seconds,
            "action_name" => QrcodeActionName::QR_STR_SCENE,
            "action_info" => array("scene" => compact('scene_str')
            )
        );
        $url = $this->WechatApiBaseURL."cgi-bin/qrcode/create?access_token=".$this->access_token;
        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::QRCODE_CREATE_REQ, ParamsRemark::QRCODE_CREATE_RES);
    }

    //永久的整型参数值
    public function createQrcodeByQRLIMITSCENE($scene_id)
    {
        $arr = array(
            "action_name" => QrcodeActionName::QR_LIMIT_SCENE,
            "action_info" => array("scene" => compact('scene_id')
            )
        );
        $url = $this->WechatApiBaseURL."cgi-bin/qrcode/create?access_token=".$this->access_token;
        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::QRCODE_CREATE_REQ, ParamsRemark::QRCODE_CREATE_RES);
    }

    //永久的字符串参数值
    public function createQrcodeByQRLIMITSTRSCENE($scene_str)
    {
        $arr = array(
            "action_name" => QrcodeActionName::QR_LIMIT_STR_SCENE,
            "action_info" => array("scene" => compact('scene_str')
            )
        );
        $url = $this->WechatApiBaseURL."cgi-bin/qrcode/create?access_token=".$this->access_token;
        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::QRCODE_CREATE_REQ, ParamsRemark::QRCODE_CREATE_RES);
    }

    // endregion

    //通过ticket换取二维码
    //提醒：TICKET记得进行UrlEncode
    //获取二维码ticket后，开发者可用ticket换取二维码图片。请注意，本接口无须登录态即可调用。
    //ticket正确情况下，http 返回码是200，是一张图片，可以直接展示或者下载。
    public function showQrcode($ticket)
    {
        $url = $this->WechatMpBaseURL."cgi-bin/showqrcode?ticket=".urlencode($ticket);
        return $url;
        //return $this->httpRespToArray($this->curlGet($url));
    }

}