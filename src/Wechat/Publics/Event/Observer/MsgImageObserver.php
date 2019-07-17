<?php
namespace Minicub\Wechat\Publics\Event\Observer;

use Minicub\Wechat\Publics\Event\Observer;
use Minicub\Wechat\Publics\Event\MessageType;
use Minicub\Wechat\Publics\Event\ParamsRemark;
use Minicub\Wechat\Publics\Singleton;

class MsgImageObserver implements Observer
{
    use Singleton, MsgObserverCallback;

    private $_callback = 'msgImageCallback';

    public function update(array $msg)
    {
        if ($msg['MsgType'] == MessageType::IMAGE) {
            $msg['_remark'] = ParamsRemark::MSG_IMAGE;
            $this->callback($msg);
        }
    }
}