<?php
namespace Mpcube\Wechat\Miniapp\Wxacode;

class ParamsRemark
{
    const QRCODE_CREATE_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证'),
        'path' => array('required'=>'是', 'memo'=>'扫码进入的小程序页面路径，最大长度 128 字节，不能为空；对于小游戏，可以只传入 query 部分，来实现传参效果，如：传入 "?foo=bar"，即可在 wx.getLaunchOptionsSync 接口中的 query 参数获取到 {foo:"bar"}。'),
        'width' => array('required'=>'否', 'memo'=>'二维码的宽度，单位 px。最小 280px，最大 1280px'),
    );

    const QRCODE_CREATE_RES = array(
        'contentType' => array('memo'=>'如 image/jpeg'),
        'buffer' => array('memo'=>'返回的图片 Buffer'),
    );

}