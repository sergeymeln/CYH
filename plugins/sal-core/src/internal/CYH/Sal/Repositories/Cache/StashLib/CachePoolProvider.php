<?php


namespace CYH\Sal\Repositories\Cache\StashLib;


use Stash\Driver\FileSystem;
use Stash\Driver\Memcache;
use Stash\Pool;

class CachePoolProvider
{
    private static $fsInstance = null;
    private static $memInstance = null;

    public static function GetFileSystemInstance()
    {
        if (self::$fsInstance == null)
        {
            $driver = new FileSystem(array('path' => WP_CONTENT_DIR . '/cache/stash/'));

            // Inject the driver into a new Pool object.
            self::$fsInstance = new Pool($driver);
        }

        return self::$fsInstance;
    }

    public static function GetMemcachedInstance()
    {
        if (self::$memInstance == null)
        {
            $driver = new Memcache(array('servers' => array('127.0.0.1', '11211')));

            // Inject the driver into a new Pool object.
            self::$memInstance = new Pool($driver);
        }

        return self::$memInstance;
    }
}