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

}
