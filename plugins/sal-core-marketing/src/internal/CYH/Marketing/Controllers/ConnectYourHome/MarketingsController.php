<?php

namespace CYH\Marketing\Controllers\ConnectYourHome;

use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Helpers\ContentDeserializeHelper;
use CYH\Helpers\FormatHelper;
use CYH\Helpers\HtmlHelper;
use CYH\Models\Filters\ProductFilter;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Sal\Services\ProductsService;
use CYH\Marketing\Helpers\UrlHelper;
use CYH\Marketing\Services\MarketingService;
use CYH\Marketing\Services\StatisticsService;
use CYH\Marketing\Types\StatisticsEventType;
use CYH\Marketing\WpOptionsHandlers\Pages\GeneralOptions;
use CYH\Marketing\Services\SpeedCalculationService;

class MarketingsController extends GenericController
{
    /**@var $prodService ProductsService*/
    protected $prodService = null;
    /**@var $marketingService MarketingService*/
    protected $marketingService = null;
    /**@var $speedCalculationService SpeedCalculationService*/
    protected $speedCalculationService = null;
    const INTERNET_CATEGORIES = [4,5];
    const INTERNET_TV_CATEGORIES = [7];

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
        $this->prodService = new ProductsService();
        $this->marketingService = new MarketingService();
        $this->speedCalculationService = new SpeedCalculationService();
    }

    public function RenderMarketing($collectStats=false)
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        $parts = explode('/', $url['path']);
        $urlCityData = $this->marketingService->getCityFromUrl($parts);
        if (isset($_REQUEST['zip']) && !in_array($_REQUEST['zip'], $urlCityData['zip_list'])) {
            wp_redirect($this->marketingService->getCityUrlByZip($_REQUEST['zip']));
            exit;
        }
        $city = $this->marketingService->GetCityInfoByUrlParams($urlCityData);

        if (isset($_REQUEST['zip'])) {
            $city->Zip = $_REQUEST['zip'];
        }  elseif($bestZip = $this->marketingService->getBestZip($city->Id)) {
            $city->Zip = $bestZip;
        }

        $showMap = GeneralOptions::GetSettings()['internet_city_show_map'];


//        $preparedData = [];
//        $productFilter = new ProductFilter();
//
//        if (isset($_REQUEST['zip'])) {
//            $city->Zip = $_REQUEST['zip'];
//        }  elseif($bestZip = $this->marketingService->getBestZip($city)) {
//            $city->Zip = $bestZip;
//        }
//
//        $productFilter->Zip = $city->Zip;
//        if ($collectStats) {
//            $statService = StatisticsService::getInstance();
//            $statService->setCity($city);
//            $statService->addObject(StatisticsEventType::SAL_REQUEST_START, microtime(true));
//        }
//        $productList = $this->prodService->GetAllProducts($productFilter, CacheSettingsProvider::GetCacheEnabledSettingsWithLifespan(86400));
//        if ($collectStats) {
//            $statService->addObject(StatisticsEventType::SAL_REQUEST_END, microtime(true));
//        }
//        if(count($productList) == 0) {
//            return false;
//        }
//
//        $preparedData['productList'] = $this->filterProducts($productList);
//        $preparedData['providers'] = $this->getProvidersFromProducts($preparedData['productList']);
//        $preparedData['productListSorted'] = $this->sortProducts($preparedData['productList']);
//        $preparedData['productListSortedAll'] = $this->sortAllProducts($preparedData['productList']);
//
//        $preparedData['topProvidersData'] = $this->marketingService->getTopProvidersDataFromProducts($preparedData['productList']);
//
//        $city->Bullets = $this->marketingService->getBulletsData($preparedData['productList'], $city);
//        if ($collectStats) {
//            $statService->addObject(StatisticsEventType::DATA_PREPARE_COMPLETE, microtime(true));
//        }
        $this->View('marketing/marketing-page', [
            'city' => $city,
            'showMap' => $showMap,
            'constants' => [
                'internetCats' => self::INTERNET_CATEGORIES,
                'internetAndTvCats' => self::INTERNET_TV_CATEGORIES
            ]
        ]);
    }

    public function RenderMarketingInteractive()
    {
        $calculationItem = $this->speedCalculationService->getSpeedCalculatorItem();

        $this->View('marketing/interactive', [
            'calculationItem' => $calculationItem
        ]);
    }


}