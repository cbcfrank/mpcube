<?php
namespace Mpcube\Wechat\Publics\Utils;

class ParamsRemark
{
    const QRCODE_CREATE_REQ = array(
        'expire_seconds' => array('required'=>'是', 'memo'=>'该二维码有效时间，以秒为单位。 最大不超过2592000（即30天），此字段如果不填，则默认有效期为30秒。'),
        'action_name' => array('required'=>'是', 'memo'=>'二维码类型，QR_SCENE为临时的整型参数值，QR_STR_SCENE为临时的字符串参数值，QR_LIMIT_SCENE为永久的整型参数值，QR_LIMIT_STR_SCENE为永久的字符串参数值'),
        'action_info' => array('required'=>'是', 'memo'=>'二维码详细信息'),
        'scene_id' => array('required'=>'是', 'memo'=>'场景值ID，临时二维码时为32位非0整型，永久二维码时最大值为100000（目前参数只支持1--100000）'),
        'scene_str' => array('required'=>'是', 'memo'=>'场景值ID（字符串形式的ID），字符串类型，长度限制为1到64'),
    );

    const QRCODE_CREATE_RES = array(
        'ticket' => array('memo'=>'获取的二维码ticket，凭借此ticket可以在有效时间内换取二维码。'),
        'expire_seconds' => array('memo'=>'该二维码有效时间，以秒为单位。 最大不超过2592000（即30天）。'),
        'url' => array('memo'=>'二维码图片解析后的地址，开发者可根据该地址自行生成需要的二维码图片'),
    );

    const SHORTURL_URLSHORT_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭证'),
        'action' => array('required'=>'是', 'memo'=>'此处填long2short，代表长链接转短链接'),
        'long_url' => array('required'=>'是', 'memo'=>'需要转换的长链接，支持http://、https://、weixin://wxpay 格式的url'),
    );

    const SHORTURL_URLSHORT_RES = array(
        'errcode' => array('required'=>'是', 'memo'=>'错误码'),
        'errmsg' => array('required'=>'是', 'memo'=>'错误信息'),
        'short_url' => array('required'=>'是', 'memo'=>'短链接'),
    );
}