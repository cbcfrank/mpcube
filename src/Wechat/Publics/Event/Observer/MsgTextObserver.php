<?php
namespace Minicub\Wechat\Publics\Event\Observer;

use Minicub\Wechat\Publics\Event\Observer;
use Minicub\Wechat\Publics\Event\MessageType;
use Minicub\Wechat\Publics\Event\ParamsRemark;
use Minicub\Wechat\Publics\Singleton;

class MsgTextObserver implements Observer
{
    use Singleton, MsgObserverCallback;

    private $_callback = 'msgTextCallback';

    public function update(array $msg)
    {
        if ($msg['MsgType'] == MessageType::TEXT) {
            $msg['_remark'] = ParamsRemark::MSG_TEXT;
            $this->callback($msg);
        }
    }
}