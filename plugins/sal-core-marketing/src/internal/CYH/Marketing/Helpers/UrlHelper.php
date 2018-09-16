<?php


namespace CYH\Marketing\Helpers;

use CYH\Marketing\Services\MarketingService;
use CYH\Marketing\ViewModels\UI\CityItem;

class UrlHelper
{

    public function __construct()
    {
    }

    /**
     * @param $city CityItem|array
     * @param $customParams array
     * @return string
     */
    public static function getCityUrl($city, $customParams = [])
    {
        if ($city instanceof CityItem) {
            $url = site_url() . '/internet/' . strtolower($city->StateCode) . '/' . strtolower($city->Name) .'/';
        } else {
            $url = site_url() . '/internet/' . strtolower($city['state_code']) . '/' . strtolower($city['city_name']) .'/';
        }
        if (!empty($customParams))
        {
            $url .= '?' . http_build_query($customParams);
        }

        return $url;
    }


}