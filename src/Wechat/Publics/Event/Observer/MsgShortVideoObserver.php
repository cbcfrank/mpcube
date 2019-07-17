<?php
namespace Minicub\Wechat\Publics\Event\Observer;

use Minicub\Wechat\Publics\Event\Observer;
use Minicub\Wechat\Publics\Event\MessageType;
use Minicub\Wechat\Publics\Event\ParamsRemark;
use Minicub\Wechat\Publics\Singleton;

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