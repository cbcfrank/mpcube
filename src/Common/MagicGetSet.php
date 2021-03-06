<?php

namespace Mpcube\Common;

trait MagicGetSet
{
    public function __get($name)
    {
        if(property_exists($this, $name)) {
            return $this->$name;
        }

        return null;
    }

    public function __set($name, $value)
    {
        if(property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    public function __isset($name)
    {
        if(property_exists($this, $name)) {
            return true;
        }

        return false;
    }

}