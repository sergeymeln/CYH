<?php


namespace CYH\Marketing\Helpers;

class ProductDataHelper
{
    const OVERLOAD_MBPS_TO_GBPS_MULTIPLIER = 0.001;
    const OVERLOAD_MBPS_NUMBER = 1024;

    public function __construct()
    {

    }

    public static function getSpeedData($productSpeed)
    {
        if($productSpeed) {
            if($productSpeed < self::OVERLOAD_MBPS_NUMBER) {
                $speed = round($productSpeed,2);
                $speedUnits = 'Mbps';
            } else {
                $speed = round($productSpeed * self::OVERLOAD_MBPS_TO_GBPS_MULTIPLIER,2);
                $speedUnits = 'Gbps';
            }
        } else {
            $speed = '-';
            $speedUnits = '';
        }

        return ['speed'=>$speed, 'speedUnits' => $speedUnits];
    }
}