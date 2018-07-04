<?php


namespace CYH\RG;


use CYH\Plugins\SalCore;

class Settings
{
    private static $_cybSettings = null;

    public static function GetCybSettings(): array
    {
        if (is_null(self::$_cybSettings))
        {
            self::$_cybSettings = SalCore::GetPluginSettings()['ConnectYourBenefits.Settings'];
        }

        return self::$_cybSettings;
    }

    /**
     * @deprecated This method is to be removed in future releases
    */
    public static function GetPageUrlFromMapById(int $id): string
    {
        return self::GetCybSettings()['Page.Map'][$id];
    }
}