<?php


namespace CYH\Marketing\Helpers;

use CYH\Marketing\Services\MarketingService;

class UrlHelper
{
    protected $marketingService = null;

    public function __construct()
    {
        $this->marketingService = new MarketingService();
    }

    public function getCityFromUrl()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        $parts = explode('/', $url['path']);

        return $this->marketingService->getCityFromUrl($parts);
    }
}