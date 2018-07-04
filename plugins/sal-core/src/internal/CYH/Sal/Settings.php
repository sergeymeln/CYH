<?php


namespace CYH\Sal;


use CYH\Plugins\SalCore;

class Settings
{
    private static $_settings = [];

    private static $_salSettings = null;

    public static function GetSalSettings(): array
    {
        if (is_null(self::$_salSettings))
        {
            self::$_salSettings = SalCore::GetPluginSettings()['Sal.Settings'];
        }

        return self::$_salSettings;
    }

    /*
     *  PortalId = 1 for SAL Management portal,
     *  PortalId = 2 for RG Customer portal,
     *  PortalId = 3 for RG Admin portal,
     *  PortalId = 4 for RG Group portal,
     *  PortalId = 5 for Group Website.
     */
    public static function SetPortalType($portalId)
    {
        self::$_settings['PortalId'] = $portalId;
    }

    public static function GetPortalType()
    {
        return self::$_settings['PortalId'];
    }
}