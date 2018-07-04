<?php
/**
 * Created by PhpStorm.
 * User: npyat
 * Date: 12/6/2017
 * Time: 5:54 PM
 */

namespace CYH\Helpers\Data;


use CYH\Helpers\Data\Traits\DateOperator;

class DateDataProvider
{
    public static function GetYearsRange($start, $end)
    {
        return DateOperator::GetYearsRange($start, $end);
    }

    public static function GetMonths()
    {
        return DateOperator::GetMonths();
    }

    public static function GetDays()
    {
        $days = [];
        for ($i = 1; $i < 32; $i++)
        {
            $days[] = str_pad($i, 2, '0', STR_PAD_LEFT);
        }

        return $days;
    }

}