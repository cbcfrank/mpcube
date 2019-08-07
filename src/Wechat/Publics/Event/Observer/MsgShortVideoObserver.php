<?php
namespace Mpcube\Wechat\Publics\Event\Observer;

use Mpcube\Wechat\Publics\Event\Observer;
use Mpcube\Wechat\Publics\Event\MessageType;
use Mpcube\Wechat\Publics\Event\ParamsRemark;
use Mpcube\Wechat\Publics\Singleton;

class MsgShortVideoObserver implements Observer
{
    use Singleton, MsgObserverCallback;

    private $_callback = 'msgShortVideoCallback';

    public function update(array $msg)
    {
        if ($msg['MsgType'] == MessageType::SHORTVIDEO){
            $msg['_remark'] = ParamsRemark::MSG_SHORTVIDEO;
            $this->callback($msg);
        }
    }
}