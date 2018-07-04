<?php


namespace CYH\Helpers;


class FlashMessageHelper
{
    public static function SetMessage($key, $message)
    {
        CookieStorageHelper::CreateCookie($key, $message);
    }

    public static function GetMessage($key)
    {
        $message = CookieStorageHelper::GetCookie($key);
        CookieStorageHelper::DeleteCookie($key);
        unset ($_COOKIE[$key]);
        return $message;
    }
}