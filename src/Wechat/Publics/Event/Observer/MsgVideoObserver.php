<?php
namespace Mpcube\Wechat\Publics\Event\Observer;

use Mpcube\Wechat\Publics\Event\Observer;
use Mpcube\Wechat\Publics\Event\MessageType;
use Mpcube\Wechat\Publics\Event\ParamsRemark;
use Mpcube\Wechat\Publics\Singleton;

class MsgVideoObserver implements Observer
{
    use Singleton, MsgObserverCallback;

    private $_callback = 'msgVideoCallback';

    public function update(array $msg)
    {
        if ($msg['MsgType'] == MessageType::VIDEO){
            $msg['_remark'] = ParamsRemark::MSG_VIDEO;
            $this->callback($msg);
        }
    }
}