<?php

namespace Mpcube\Common;

interface IErrcode
{
    //解析错误编码
    public function parseErrcodeByArray(array $resp);

    //解析string类型错误编码
    public function parseErrcodeByString($respstr);
}