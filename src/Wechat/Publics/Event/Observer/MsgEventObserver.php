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
            }

            $this->callback($msg);
        }
    }
}