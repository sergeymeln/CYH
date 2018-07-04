<?php
namespace CYH\Helpers\Data\Traits;

trait DateOperator
{
    public static function GetYearsRange($start, $end)
    {
        $years = [];
        for ($i = $start; $i < $end + 1; $i++)
        {
            $years[] = $i;
        }
        return $years;
    }

    public static function GetMonths()
    {
        $months = [];
        for($i = 1; $i < 13; $i++)
        {
            $months[] = str_pad($i, 2, '0', STR_PAD_LEFT);
        }
        return $months;
    }
}