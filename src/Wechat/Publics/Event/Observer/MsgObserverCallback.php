<?php
namespace Mpcube\Wechat\Publics\Event\Observer;

trait MsgObserverCallback
{
    public function setCallback($callback)
    {
        $this->_callback = $callback;
        return $this;
    }

    private function callback(array $msg)
    {
        //需要实例化类，然后回调对象方法
        if (is_array($this->_callback)) {

            list($className, $methodName) = $this->_callback;

            if (class_exists($className)) {

                $obj = new $className();

                if (method_exists($obj, $methodName)) {
                    call_user_func_array(array($obj, $methodName), array($msg));
                }
            }
        }

        //静态类方法或者函数回调处理
        if (is_string($this->_callback)) {

            //类静态方法回调
            if (strpos($this->_callback, '::')>0) {

                list($className, $methodName) = explode('::', $this->_callback);

                if (class_exists($className)) {
                    try {
                        $method = new \ReflectionMethod($className, $methodName);
                        if ($method->isStatic()) {
                            call_user_func_array(array($className, $methodName), array($msg));
                        }
                    } catch (\Exception $e) {

                    }
                }
            } else {
                //仅仅只是函数回调
                if (function_exists($this->_callback)) {
                    call_user_func_array($this->_callback, array($msg));
                }
            }
        }
    }
}