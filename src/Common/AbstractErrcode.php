<?php

namespace Mpcube\Common;

use Mpcube\Common\IErrcode;

abstract class AbstractErrcode implements IErrcode
{
    protected $_errcode = array();

    /**
     * 解析错误编码
     * @param array $resp
     * @return array
     */
    public function parseErrcodeByArray(array $resp)
    {
        if (isset($resp['errcode']) && isset($this->_errcode[$resp['errcode']])) {
            $resp['_remark']['errmsg'] = $this->_errcode[$resp['errcode']];
        } elseif (isset($resp['errcode'])) {
            $resp['_remark']['errmsg'] = '未查找到对应错误';
        }

        return $resp;
    }

    /**
     * 解析string类型错误编码
     * @param $respstr
     * @return array|bool
     */
    public function parseErrcodeByString($respstr)
    {
//        var_dump('=================',$respstr, '================');
        $arr = json_decode($respstr, true);

        if(!is_array($arr)) {
            return false;
        }

        return $this->parseErrcodeByArray($arr);
    }

}