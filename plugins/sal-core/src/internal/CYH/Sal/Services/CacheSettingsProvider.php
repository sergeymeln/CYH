<?php


namespace CYH\Sal\Services;


use CYH\Models\Cache\CacheSettings;
use CYH\WpOptionsHandlers\Pages\CachingOptions;

class CacheSettingsProvider
{
    public static function GetAdminCachingSettings(): CacheSettings
    {
        $settings = CachingOptions::GetSettings();
        $cacheSettings = new CacheSettings();
        $cacheSettings->IsEnabled = $settings['sal_cache_enable'];
        $cacheSettings->Lifespan = $settings['sal_cache_lifetime'];

        return $cacheSettings;

    }

    public static function GetCacheEnabledSettings(): CacheSettings
    {
        $cacheSettings = new CacheSettings();
        $cacheSettings->IsEnabled = true;

        return $cacheSettings;
    }

    public static function GetCacheEnabledSettingsWithLifespan($lifespan): CacheSettings
    {
        $cacheSettings = new CacheSettings();
        $cacheSettings->IsEnabled = true;
        $cacheSettings->Lifespan = $lifespan;

        return $cacheSettings;
    }

    public static function GetCacheDisabledSettings(): CacheSettings
    {
        return new CacheSettings();
    }
}