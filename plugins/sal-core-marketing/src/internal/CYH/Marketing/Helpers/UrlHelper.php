<?php


namespace CYH\Marketing\Helpers;

use CYH\Marketing\Services\MarketingService;
use CYH\Marketing\ViewModels\UI\CityItem;

class UrlHelper
{
    /**@var $marketingService MarketingService*/
    protected $marketingService = null;

    public function __construct()
    {
        $this->marketingService = new MarketingService();
    }

    /**
     * @return array|bool
     */
    public function getCityFromUrl()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        $parts = explode('/', $url['path']);

        return $this->marketingService->getCityFromUrl($parts);
    }

    /**
     * @param $city CityItem|array
     * @return string
     */
    public function getCityUrl($city)
    {
        if ($city instanceof CityItem) {
            $url = site_url() . '/internet/' . strtolower($city->StateCode) . '/' . strtolower($city->Name) .'/';
        } else {
            $url = site_url() . '/internet/' . strtolower($city['state_code']) . '/' . strtolower($city['city_name']) .'/';
        }

        return $url;
    }


}