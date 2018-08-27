<?php


namespace CYH\Sal\Repositories\Cache;


use CYH\Sal\Repositories\Cache\StashLib\CacheProvider;
use CYH\Sal\Repositories\Cache\StashLib\StashCacheTypes;

class CacheFactory
{
    /**
     * @var $cacheType int
     * @return ICacheProviderCore
     */
    public static function GetCacheProvider($cacheType)
    {
        $cacheProvider = null;
        switch ($cacheType)
        {
            case CacheTypes::WP_TRANSIENTS:
                $cacheProvider = new WpTransientCacheProvider();
                break;
            case CacheTypes::WP_FILE_SYSTEM:
                $cacheProvider = new CacheProvider(StashCacheTypes::FILE_SYSTEM);
                break;
            case CacheTypes::WP_MEMCACHED:
                $cacheProvider = new CacheProvider(StashCacheTypes::MEMCACHED);
                break;
        }

        return $cacheProvider;
    }
}