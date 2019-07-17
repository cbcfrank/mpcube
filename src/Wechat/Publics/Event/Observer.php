<?php


namespace Minicub\Wechat\Publics\Event;


interface Observer
{
    public function update(array $msg);

}