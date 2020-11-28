<?php
/**
 * Created by PhpStorm.
 * User: FRANK
 * Date: 2019/7/11
 * Time: 12:27
 */

namespace Mpcube\Common;

class Runtime
{
    use Singleton, MagicGetSet;

    protected $dir = __DIR__.'/../../runtime/';

}