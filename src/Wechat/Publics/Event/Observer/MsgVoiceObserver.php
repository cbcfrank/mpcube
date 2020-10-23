<?php
namespace Mpcube\Wechat\Publics\Event\Observer;

use Mpcube\Wechat\Publics\Event\Observer;
use Mpcube\Wechat\Publics\Event\MessageType;
use Mpcube\Wechat\Publics\Event\ParamsRemark;
//use Mpcube\Wechat\Publics\Singleton;
use Mpcube\Common\Singleton;

class MsgVoiceObserver implements Observer
{
    use Singleton, MsgObserverCallback;

    private $_callback = 'msgVoiceCallback';

    public function update(array $msg)
    {
        if ($msg['MsgType'] == MessageType::VOICE){
            $msg['_remark'] = ParamsRemark::MSG_VOICE;
            $this->callback($msg);
        }
    }
}