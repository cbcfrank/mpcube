<?php
namespace Minicub\Wechat\Publics\Event\Observer;

use Minicub\Wechat\Publics\Event\Observer;
use Minicub\Wechat\Publics\Event\MessageType;
use Minicub\Wechat\Publics\Event\ParamsRemark;
use Minicub\Wechat\Publics\Singleton;

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