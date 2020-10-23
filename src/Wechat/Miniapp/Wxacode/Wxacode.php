<?php

namespace Mpcube\Wechat\Miniapp\Wxacode;

use Mpcube\Common\Singleton;
use Mpcube\Common\Common;

class Wxacode
{
    use Common, Singleton;

    //todo
    //获取小程序二维码，适用于需要的码数量较少的业务场景。通过该接口生成的小程序码，永久有效，有数量限制，详见获取二维码。
    public function createQRCode($path, $width=430)
    {
        $url = $this->WechatApiBaseURL."/cgi-bin/wxaapp/createwxaqrcode?access_token={$this->access_token}";
        $arr = compact('path', 'width');
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::QRCODE_CREATE_REQ, ParamsRemark::QRCODE_CREATE_RES);
    }
}