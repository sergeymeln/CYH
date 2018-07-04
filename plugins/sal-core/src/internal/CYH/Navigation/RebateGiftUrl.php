<?php


namespace CYH\Navigation;


use CYH\Models\Groups\GroupInfo;
use CYH\Sal\Settings;

class RebateGiftUrl
{
    public static function GetMyAccountLink(GroupInfo $groupInfo): string
    {
        $settings = Settings::GetSalSettings();
        return $groupInfo->CustomerPortalUrl . $settings['Url.RG.MyAccount'];
    }

    public static function GetRedeemGiftLink(GroupInfo $groupInfo): string
    {
        $settings = Settings::GetSalSettings();
        return $groupInfo->CustomerPortalUrl . $settings['Url.RG.RedeemGift'];
    }

    public static function AppendCPTData(string $originalUrl, string $cpt): string
    {
        return $originalUrl . (self::HasTrailingSlash($originalUrl) ? '' : '/') . urlencode($cpt);
    }

    public static function GetLoginLink(GroupInfo $groupInfo): string
    {
        $settings = Settings::GetSalSettings();
        return $groupInfo->CustomerPortalUrl . $settings['Url.RG.Partial.Login'];
    }

    public static function GetResetPasswordLink(GroupInfo $groupInfo): string
    {
        $settings = Settings::GetSalSettings();
        return $groupInfo->CustomerPortalUrl . $settings['Url.RG.Partial.ResetPassword'];
    }

    private static function HasTrailingSlash($str):bool
    {
        return (substr($str, strlen($str) - 1, 1) == '/');
    }
}