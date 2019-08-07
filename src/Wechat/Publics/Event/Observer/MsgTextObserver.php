<?php
namespace Mpcube\Wechat\Publics\Event\Observer;

use Mpcube\Wechat\Publics\Event\Observer;
use Mpcube\Wechat\Publics\Event\MessageType;
use Mpcube\Wechat\Publics\Event\ParamsRemark;
use Mpcube\Wechat\Publics\Singleton;

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