<?php
namespace Minicub\Wechat\Publics\Event\Observer;

use Minicub\Wechat\Publics\Event\Observer;
use Minicub\Wechat\Publics\Event\MessageType;
use Minicub\Wechat\Publics\Event\ParamsRemark;
use Minicub\Wechat\Publics\Singleton;

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