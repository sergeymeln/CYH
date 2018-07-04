<?php


namespace CYH\Helpers;


class CookieStorageHelper
{
    public static function CreateCookie($name, $value, $expires = 0, $path = '/')
    {
        setcookie($name, $value, $expires, $path);
    }

    public static function DeleteCookie($name, $path = '/')
    {
        //making cookie unavailable to get from superglobals
        unset ($_COOKIE[$name]);
        //make cookie expire at page load
        setcookie($name, '', time() - 86400, $path);
    }

    public static function GetCookie($name)
    {
        return $_COOKIE[$name];
    }
}