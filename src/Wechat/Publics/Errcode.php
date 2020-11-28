<?php

namespace Mpcube\Wechat\Publics;

use Mpcube\Common\AbstractErrcode;
use Mpcube\Common\WechatErrcodeTrait;

class Errcode extends AbstractErrcode
{
    use WechatErrcodeTrait;

    public function __construct()
    {
        $this->_errcode = $this->errorCode;
    }

//    /**
//     * 解析错误编码
//     * @param array $resp
//     * @return array
//     */
//    public static function parseErrcodeByArray(array $resp)
//    {
//        if (isset($resp['errcode']) && isset(self::$_errcode[$resp['errcode']])) {
//            $resp['_remark']['errmsg'] = self::$_errcode[$resp['errcode']];
//        } elseif (isset($resp['errcode'])) {
//            $resp['_remark']['errmsg'] = '未查找到对应错误';
//        }
//
//        return $resp;
//    }
//
//    /**
//     * 解析string类型错误编码
//     * @param $respstr
//     * @return array|bool
//     */
//    public static function parseErrcodeByString($respstr)
//    {
//        $arr = json_decode($respstr, true);
//
//        if(!is_array($arr)) {
//            return false;
//        }
//
//        return self::parseErrcodeByArray($arr);
//    }

}