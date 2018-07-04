<?php


namespace CYH\Helpers;


use CYH\Models\Address;

class FormatHelper
{
    public static function FormatPhoneNumber($str)
    {
        return substr($str, 0, 3) . "-" . substr($str, 3, 3) . "-" . substr($str, 6);
    }

    public static function FormatAddress(Address $addr)
    {
        return $addr->BdNumber . ' ' . $addr->Street . ' ' . $addr->City . ', ' . $addr->State . ' - ' . $addr->Zip;
    }

    public static function IsNotEmptyOrDefault($valueToCheck, $valueToReplaceWith = '')
    {
        if (empty($valueToCheck)) {
            return $valueToReplaceWith;
        } else {
            return $valueToCheck;
        }
    }

    public static function GetFloatNumberPart($num): string
    {
        if (is_null($num)) {
            $num = '0';
        }
        $resArr = explode('.', $num);
        return $resArr[0];
    }

    public static function GetFloatRealNumberPart($num, $power = 2): string
    {
        if (is_null($num)) {
            $num = '0';
        }
        $resArr = explode('.', $num);
        if (count($resArr) > 1) {
            if (strlen($resArr[1]) > $power) {
                $res = substr($resArr[1], 0, $power);
            } else {
                $res = str_pad($resArr[1], $power, '0', STR_PAD_RIGHT);
            }
        } else {
            $res = str_pad('', $power, '0', STR_PAD_RIGHT);
        }

        return $res;
    }

    public static function GetUrlFriendlyString($input)
    {
        $input = str_replace(' ', '-', $input); // Replaces all spaces with hyphens.
        $input = preg_replace('/[^A-Za-z0-9\-]/', '', $input); // Removes special chars.
        $input = strtolower($input);

        return preg_replace('/-+/', '-', $input); // Replaces multiple hyphens with single one.
    }
}