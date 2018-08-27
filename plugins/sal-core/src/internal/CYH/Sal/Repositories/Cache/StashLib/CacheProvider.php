<?php


namespace CYH\Sal\Repositories\Cache\StashLib;


use CYH\Sal\Repositories\Cache\ICacheProviderCore;

class CacheProvider implements ICacheProviderCore
{
    private $pool;

    public function __construct($type)
    {
        switch ($type) {
            case StashCacheTypes::MEMCACHED:
                $this->pool = CachePoolProvider::GetMemcachedInstance();
                break;
            case StashCacheTypes::FILE_SYSTEM:
            default:
                $this->pool = CachePoolProvider::GetFileSystemInstance();
                break;
        }
    }

    function GetCachedData($key)
    {
        $item = $this->pool->getItem($key);
        $data = $item->get();
        if (!$item->isMiss()) {
            return $data;
        } else {
            return false;
        }
    }

    function StoreInCache($key, $data, $lifetime)
    {
        $item = $this->pool->getItem($key);
        $item->set($data);
        $item->expiresAfter($lifetime);
        $this->pool->save($item);
    }

    function ExistsInCache($key)
    {
        throw new \Exception("Method not implemented yet");
    }

    function GetCacheKey($className, $funcName, array $data = [])
    {
        $cacheKey = $className . $funcName;
        if (!empty($data)) {
            foreach ($data as $value) {
                $cacheKey .= serialize($value);
            }
        }
        return md5($cacheKey);
    }
}