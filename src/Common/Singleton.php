<?php

namespace Mpcube\Common;

trait Singleton
{
    // region 单例

    private static $_instance = null;

    private function __construct()
    {
        if (method_exists($this, '_initialize')) {
            $this->_initialize();
        }
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new static();
        }

        return self::$_instance;
    }
    // endregion

}