<?php


namespace CYH\Helpers;


class DateHelper
{
    public static function GetYearFull(\DateTime $date)
    {
        return $date->format('Y');
    }

    public static function GetMonthZeroPadded(\DateTime $date)
    {
        return $date->format('m');
    }

    public static function GetDayZeroPadded(\DateTime $date)
    {
        return $date->format('d');
    }
}