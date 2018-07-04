<?php


namespace CYH\Sal\Repositories\Cache;


interface ICacheProviderCore
{
    /**
     * Should return either cached object or false if nothing has been found in cache
     *
     * @param $key
     * @return object | false
     */
    function GetCachedData($key);
    function StoreInCache($key, $data, $lifetiime);
    function ExistsInCache($key);
    function GetCacheKey($className, $funcName, array $data = []);
}