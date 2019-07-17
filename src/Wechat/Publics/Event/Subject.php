<?php
namespace Minicub\Wechat\Publics\Event;

class Subject
{
    protected $_observers = array();

    public function attach(Observer $observer)
    {
        $this->_observers[] = $observer;

        return $this;
    }

    public function detach(Observer $observer)
    {
        foreach ($this->_observers as $k => $v) {
            if ($v == $observer) {
                unset($this->_observers[$k]);
            }
        }

        return $this;
    }

    public function notifyAllObservers(array $msg)
    {
        foreach ($this->_observers as $observer) {
            $observer->update($msg);
        }
    }

}