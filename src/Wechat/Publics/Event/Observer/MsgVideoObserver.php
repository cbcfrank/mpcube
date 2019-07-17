<?php
namespace Minicub\Wechat\Publics\Event\Observer;

use Minicub\Wechat\Publics\Event\Observer;
use Minicub\Wechat\Publics\Event\MessageType;
use Minicub\Wechat\Publics\Event\ParamsRemark;
use Minicub\Wechat\Publics\Singleton;

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