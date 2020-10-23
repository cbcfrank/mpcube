<?php

namespace Mpcube\Common;

interface ICache
{
    const CACHE_DRIVER_FILESYSTEM = 'Filesystem';
    const CACHE_DRIVER_MEMECACHE = 'Memecache';
    const CACHE_DRIVER_REDIS = 'Redis';

    public function setCacheDriver($driver='Filesystem');
    public function getCacheDriver();
    public function setFilePath($rel_path='');
    public function setRedisConn($host='', $port='', $password='', $timeout=0.0);
    public function setMemecacheConn($host='', $port='11211');
}