<?php


namespace CYH\Sal\Repositories\Cache;


class WpTransientCacheProvider implements ICacheProviderCore
{
    function GetCachedData($key)
    {
        return get_transient($key);
    }

    function StoreInCache($key, $data, $lifetime)
    {
        set_transient($key, $data, $lifetime);
    }

    function ExistsInCache($key)
    {
        throw new \Exception("Method not implemented yet");
    }

    function GetCacheKey($className, $funcName, array $data = [])
    {
        $cacheKey = $className . $funcName;
        if (!empty($data))
        {
            foreach ($data as $value)
            {
                $cacheKey .= serialize($value);
            }
        }
        return md5($cacheKey);
    }
}