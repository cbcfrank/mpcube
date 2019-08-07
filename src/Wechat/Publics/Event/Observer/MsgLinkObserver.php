<?php


namespace Mpcube\Wechat\Publics\Event\Observer;


use Mpcube\Wechat\Publics\Event\Observer;
use Mpcube\Wechat\Publics\Event\MessageType;
use Mpcube\Wechat\Publics\Event\ParamsRemark;
use Mpcube\Wechat\Publics\Singleton;

class MsgLinkObserver implements Observer
{
    use Singleton, MsgObserverCallback;

    private $_callback = 'msgLinkCallback';

    public function update(array $msg)
    {
        if ($msg['MsgType'] == MessageType::LINK) {
            $msg['_remark'] = ParamsRemark::MSG_LINK;
            $this->callback($msg);
        }
    }
}