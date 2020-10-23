<?php

namespace Mpcube\Wepay;

/**
 * 不同trade_type决定了调起支付的方式，请根据支付产品正确上传
 */
class TradeType
{
    /** JSAPI支付（或小程序支付） */
    const JSAPI = 'JSAPI';

    /** Native支付 */
    const NATIVE = 'NATIVE';

    /** app支付 */
    const APP = 'APP';

    /** H5支付 */
    const MWEB = 'MWEB';

    /** 付款码支付，付款码支付有单独的支付接口，所以接口不需要上传，该字段在对账单中会出现 */
    const MICROPAY = 'MICROPAY';
}