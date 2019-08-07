<?php
namespace Mpcube\Wechat\Publics\Event\Observer;

use Mpcube\Wechat\Publics\Event\Observer;
use Mpcube\Wechat\Publics\Event\MessageType;
use Mpcube\Wechat\Publics\Event\ParamsRemark;
use Mpcube\Wechat\Publics\Singleton;

class MsgLocationObserver implements Observer
{
    use Singleton, MsgObserverCallback;

    private $_callback = 'msgLocationCallback';

    public function update(array $msg)
    {
        if ($msg['MsgType'] == MessageType::LOCATION){
            $msg['_remark'] = ParamsRemark::MSG_LOCATION;
            $this->callback($msg);
        }
    }
}