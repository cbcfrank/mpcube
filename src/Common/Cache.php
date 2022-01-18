<?php

namespace Mpcube\Common;

use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\Common\Cache\MemcacheCache;
use Doctrine\Common\Cache\RedisCache;

trait Cache
{
    protected $cache_driver_current = self::CACHE_DRIVER_FILESYSTEM;
    protected $cache_driver_list = array(self::CACHE_DRIVER_FILESYSTEM, self::CACHE_DRIVER_MEMECACHE, self::CACHE_DRIVER_REDIS);

    private $_file_path = '';
    private $_redis_conn = null;
    private $_memecache_conn = null;

    private $_cache = null;

    public function setCacheDriver($driver='Filesystem')
    {
        if (in_array($driver, $this->cache_driver_list)) {
            $this->cache_driver_current = $driver;
            return $this;
        }

        return false;
    }

    public function getCacheDriver()
    {
        return $this->cache_driver_current;
    }

//    public function setFilePath($rel_path='cache/wechat')
//    {
//        if ($this->getCacheDriver()==self::CACHE_DRIVER_FILESYSTEM) {
//
//            $this->_file_path = Runtime::getInstance()->dir.$rel_path;
//            $this->_cache = new FilesystemCache($this->_file_path);
//
//            return $this;
//        }
//
//        return false;
//    }

    public function setFilePath($rel_path='')
    {
        if ($this->getCacheDriver()==self::CACHE_DRIVER_FILESYSTEM) {

            if (empty($rel_path)) {
                $this->_file_path = Runtime::getInstance()->dir.'cache/wechat';
            } else {
                $this->_file_path = $rel_path;
            }
            $this->_cache = new FilesystemCache($this->_file_path);

            return $this;
        }

        return false;
    }

    //直接导入redis实例
    public function setRedis(object $redis)
    {
        if ($this->getCacheDriver()==self::CACHE_DRIVER_REDIS) {

            $this->_cache = new RedisCache();
            $this->_cache->setRedis($redis);

            return $this;
        }
        return false;
    }

    //使用新建redis连接的方式
    public function setRedisConn($host='', $port='', $password='', $timeout=0.0)
    {
        if ($this->getCacheDriver()==self::CACHE_DRIVER_REDIS) {

            $redis = new \Redis();
            $redis->connect($host, $port, $timeout);
            if (!empty($password)) {
                $redis->auth($password);
            }
            $this->_cache = new RedisCache();
            $this->_cache->setRedis($redis);

            return $this;
        }

        return false;
    }

    public function setMemecacheConn($host='', $port='11211')
    {
        if ($this->getCacheDriver()==self::CACHE_DRIVER_MEMECACHE) {

            $memcache = new \Memcache();
            $memcache->connect($host, $port);

            $this->_cache = new MemcacheCache();
            $this->_cache->setMemcache($memcache);

            return $this;
        }

        return false;
    }
}