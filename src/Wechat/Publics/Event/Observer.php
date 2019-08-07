<?php


namespace Mpcube\Wechat\Publics\Event;


interface Observer
{
    public function update(array $msg);

}