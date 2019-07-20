<?php


namespace Minicub\Wechat\Publics\Event\Observer;


use Minicub\Wechat\Publics\Event\EventType;
use Minicub\Wechat\Publics\Event\Observer;
use Minicub\Wechat\Publics\Event\MessageType;
use Minicub\Wechat\Publics\Event\ParamsRemark;
use Minicub\Wechat\Publics\Singleton;

class MsgEventObserver implements Observer
{
    use Singleton, MsgObserverCallback;

    private $_callback = 'msgEventCallback';

    public function update(array $msg)
    {
        if ($msg['MsgType'] == MessageType::EVENT) {

            switch ($msg['Event']) {
                case EventType::LOCATION :
                    $msg['_remark'] = ParamsRemark::EVENT_LOCATION;
                    break;
                case EventType::CLICK :
                    $msg['_remark'] = ParamsRemark::EVENT_MENU_CLICK;
                    break;
                case EventType::SCAN :
                    $msg['_remark'] = ParamsRemark::EVENT_SCAN_NORMAL;
                    break;
                case EventType::SUBSCRIBE :
                    $msg['_remark'] = ParamsRemark::EVENT_SCAN_SUB;
                    break;
                case EventType::TEMPLATESENDJOBFINISH :
                    $msg['_remark'] = ParamsRemark::EVENT_TEMPLATESENDJOBFINISH_SUCCESS;
                    break;
                case EventType::UNSUBSCRIBE :
                    $msg['_remark'] = ParamsRemark::EVENT_SUB_UNSUB;
                    break;
                case EventType::VIEW :
                    $msg['_remark'] = ParamsRemark::EVENT_MENU_VIEW;
                    break;
                case EventType::USER_PAY_FROM_PAY_CELL :
                    $msg['_remark'] = ParamsRemark::EVENT_USER_PAY_FROM_PAY_CELL;
                    break;
                case EventType::CARD_PASS_CHECK :
                    $msg['_remark'] = ParamsRemark::EVENT_CARD_PASS_CHECK;
                    break;
                case EventType::CARD_NOT_PASS_CHECK :
                    $msg['_remark'] = ParamsRemark::EVENT_CARD_NOT_PASS_CHECK;
                    break;
                case EventType::USER_GET_CARD :
                    $msg['_remark'] = ParamsRemark::EVENT_USER_GET_CARD;
                    break;
                case EventType::USER_GIFTING_CARD :
                    $msg['_remark'] = ParamsRemark::EVENT_USER_GIFTING_CARD;
                    break;
                case EventType::USER_DEL_CARD :
                    $msg['_remark'] = ParamsRemark::EVENT_USER_DEL_CARD;
                    break;
                case EventType::USER_CONSUME_CARD :
                    $msg['_remark'] = ParamsRemark::EVENT_USER_CONSUME_CARD;
                    break;
                case EventType::USER_VIEW_CARD :
                    $msg['_remark'] = ParamsRemark::EVENT_USER_VIEW_CARD;
                    break;
                case EventType::USER_ENTER_SESSION_FROM_CARD :
                    $msg['_remark'] = ParamsRemark::EVENT_USER_ENTER_SESSION_FROM_CARD;
                    break;
                case EventType::UPDATE_MEMBER_CARD :
                    $msg['_remark'] = ParamsRemark::EVENT_UPDATE_MEMBER_CARD;
                    break;
                case EventType::CARD_SKU_REMIND :
                    $msg['_remark'] = ParamsRemark::EVENT_CARD_SKU_REMIND;
                    break;
                case EventType::CARD_PAY_ORDER :
                    $msg['_remark'] = ParamsRemark::EVENT_CARD_PAY_ORDER;
                    break;
                case EventType::SUBMIT_MEMBERCARD_USER_INFO :
                    $msg['_remark'] = ParamsRemark::EVENT_SUBMIT_MEMBERCARD_USER_INFO;
                    break;
                case EventType::QUALIFICATION_VERIFY_SUCCESS :
                    $msg['_remark'] = ParamsRemark::EVENT_QUALIFICATION_VERIFY_SUCCESS;
                    break;
                case EventType::QUALIFICATION_VERIFY_FAIL :
                    $msg['_remark'] = ParamsRemark::EVENT_QUALIFICATION_VERIFY_FAIL;
                    break;
                case EventType::NAMING_VERIFY_SUCCESS :
                    $msg['_remark'] = ParamsRemark::EVENT_NAMING_VERIFY_SUCCESS;
                    break;
                case EventType::NAMING_VERIFY_FAIL :
                    $msg['_remark'] = ParamsRemark::EVENT_NAMING_VERIFY_FAIL;
                    break;
                case EventType::ANNUAL_RENEW :
                    $msg['_remark'] = ParamsRemark::EVENT_ANNUAL_RENEW;
                    break;
                case EventType::VERIFY_EXPIRED :
                    $msg['_remark'] = ParamsRemark::EVENT_VERIFY_EXPIRED;
                    break;
            }

            $this->callback($msg);
        }
    }
}