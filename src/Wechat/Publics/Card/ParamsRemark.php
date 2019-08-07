<?php
namespace Mpcube\Wechat\Publics\Card;

class ParamsRemark
{
    const CARD_PAYCELL_SET_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭证'),
        'card_id' => array('required'=>'是', 'memo'=>'卡券ID'),
        'is_open' => array('required'=>'是', 'memo'=>'是否开启买单功能，填true/false'),
    );

    const CARD_SELFCONSUMECELL_SET_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭证'),
        'card_id' => array('required'=>'是', 'memo'=>'卡券ID'),
        'is_open' => array('required'=>'是', 'memo'=>'是否开启自助核销功能，填true/false，默认为false'),
        'need_verify_cod' => array('required'=>'是', 'memo'=>'用户核销时是否需要输入验证码， 填true/false， 默认为false'),
        'need_remark_amount' => array('required'=>'是', 'memo'=>'用户核销时是否需要备注核销金额， 填true/false， 默认为false'),
    );
}