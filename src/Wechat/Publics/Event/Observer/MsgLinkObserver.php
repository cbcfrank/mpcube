<?php


namespace Minicub\Wechat\Publics\Event\Observer;


use Minicub\Wechat\Publics\Event\Observer;
use Minicub\Wechat\Publics\Event\MessageType;
use Minicub\Wechat\Publics\Event\ParamsRemark;
use Minicub\Wechat\Publics\Singleton;

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