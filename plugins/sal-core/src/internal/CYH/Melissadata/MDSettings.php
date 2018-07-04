<?php


namespace CYH\Melissadata;


use CYH\Plugins\SalCore;

class MDSettings
{
    /**
     * @return array
     */
    public static function GetSettings()
    {
        return SalCore::GetPluginSettings()['Melissadata.Settings'];
    }
}