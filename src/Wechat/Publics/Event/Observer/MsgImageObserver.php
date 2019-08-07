<?php
namespace Mpcube\Wechat\Publics\Event\Observer;

use Mpcube\Wechat\Publics\Event\Observer;
use Mpcube\Wechat\Publics\Event\MessageType;
use Mpcube\Wechat\Publics\Event\ParamsRemark;
use Mpcube\Wechat\Publics\Singleton;

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