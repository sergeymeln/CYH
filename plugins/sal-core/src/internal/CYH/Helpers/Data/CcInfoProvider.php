<?php
namespace CYH\Helpers\Data;


use CYH\Helpers\Data\Traits\DateOperator;

class CcInfoProvider
{
    use DateOperator;

    public static function GetExpirationYears($yearsAhead = 10)
    {
        $date = new \DateTime();
        $year = $date->format('Y');
        $years = self::GetYearsRange($year, $year + $yearsAhead);
        return $years;
    }

    public static function GetExpirationMonths()
    {
        return self::GetMonths();
    }
}