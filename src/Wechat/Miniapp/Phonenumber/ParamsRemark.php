<?php
namespace Mpcube\Wechat\Miniapp\Phonenumber;

class ParamsRemark
{
    const PHONENUMBER_GETPHONENUMBER_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证'),
        'code' => array('required'=>'是', 'memo'=>'手机号获取凭证）'),
    );

    const PHONENUMBER_GETPHONENUMBER_RES = array(
        'phone_info' => array(
            'phoneNumber' => '用户绑定的手机号（国外手机号会有区号）',
            'purePhoneNumber' => '没有区号的手机号',
            'countryCode' => '区号',
            'watermark'=>array(
                'appid' => '小程序appid',
                'timestamp' => '用户获取手机号操作的时间戳',
            ),
        ),
    );

}
