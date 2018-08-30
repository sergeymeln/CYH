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

class MarketingsController extends GenericController
{
    /**@var $prodService ProductsService*/
    protected $prodService = null;
    /**@var $marketingService MarketingService*/
    protected $marketingService = null;
    /**@var $urlHelper UrlHelper*/
    protected $urlHelper = null;
    const INTERNET_AND_BUNDLES_CATEGORIES = [4,5,7];
    const INTERNET_CATEGORIES = [4,5];
    const INTERNET_TV_CATEGORIES = [7];
    const COOKIE_ZIP_NAME = 'cyh_city_zip';
    const COOKIE_APPLY_ZIP_NAME = 'cyh_apply_city_zip';

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
        $this->prodService = new ProductsService();
        $this->urlHelper = new UrlHelper();
        $this->marketingService = new MarketingService();
    }

    public function RenderMarketing($collectStats=false)
    {
        $data = $this->urlHelper->getCityFromUrl();
        $city = $this->marketingService->GetCitiesData($data);

        $preparedData = [];

        $productFilter = new ProductFilter();

        if (isset($_COOKIE[self::COOKIE_ZIP_NAME]) && !isset($_COOKIE[self::COOKIE_APPLY_ZIP_NAME])) {
            $city->Zip = $_COOKIE[self::COOKIE_ZIP_NAME];
        }

        $productFilter->Zip = $city->Zip;
        if ($collectStats) {
            $statService = StatisticsService::getInstance();
            $statService->setCity($city);
            $statService->addObject(StatisticsEventType::SAL_REQUEST_START, microtime(true));
        }
        $productList = $this->prodService->GetAllProducts($productFilter, CacheSettingsProvider::GetCacheEnabledSettingsWithLifespan(86400));
        if ($collectStats) {
            $statService->addObject(StatisticsEventType::SAL_REQUEST_END, microtime(true));
        }
        if(count($productList) ==0) {
            return false;
        }

        unset($_COOKIE[self::COOKIE_ZIP_NAME]);
        setcookie(self::COOKIE_ZIP_NAME, '', time() - 3600, '/');
        unset($_COOKIE[self::COOKIE_APPLY_ZIP_NAME]);
        setcookie(self::COOKIE_APPLY_ZIP_NAME, '', time() - 3600, '/');

        $preparedData['productList'] = $this->filterProducts($productList);
        $preparedData['providers'] = $this->getProvidersFromProducts($preparedData['productList']);
        $preparedData['productListSorted'] = $this->sortProducts($preparedData['productList']);
        $preparedData['productListSortedAll'] = $this->sortAllProducts($preparedData['productList']);

        $preparedData['topProvidersData'] = $this->marketingService->getTopProvidersDataFromProducts($preparedData['productList']);

        $city->Bullets = $this->marketingService->getBulletsData($preparedData['productList'], $city);
        if ($collectStats) {
            $statService->addObject(StatisticsEventType::DATA_PREPARE_COMPLETE, microtime(true));
        }
        $this->View('marketing/marketing-page', [
            'city' => $city,
            'cityData' => $preparedData,
            'urlHelper' => $this->urlHelper,
            'constants' => [
                'internetCats' => self::INTERNET_CATEGORIES,
                'internetAndTvCats' => self::INTERNET_TV_CATEGORIES
            ]
        ]);
    }

    /**
     * @param $allProducts
     * @return array
     */
    private function filterProducts($allProducts)
    {
        $filteredProducts = [];
        if (count($allProducts) > 0) {
            foreach ($allProducts as $product) {
                if(in_array($product->ServiceProviderCategory->Category->Id, self::INTERNET_AND_BUNDLES_CATEGORIES)) {
                    $filteredProducts[] = $product;
                }
            }
        }

        return $filteredProducts;
    }

    /**
     * @param $products
     * @return array
     */
    private function getProvidersFromProducts($products)
    {
        $uniqueProviderIds = [];
        $providers = [];
        foreach ($products as $product) {
            if(!in_array($product->ServiceProviderCategory->Provider->Id, $uniqueProviderIds)) {
                if(in_array($product->ServiceProviderCategory->Category->Id, self::INTERNET_CATEGORIES)){
                    $product->ServiceProviderCategory->Provider->HideTab = 'allBrandsTab2';
                } else {
                    $product->ServiceProviderCategory->Provider->HideTab = 'allBrandsTab1';
                }
                $providers[] = $product->ServiceProviderCategory->Provider;
                array_push($uniqueProviderIds, $product->ServiceProviderCategory->Provider->Id);
            }
        }

        return $providers;
    }

    /**
     * @param $products
     * @return mixed
     */
    private function sortProducts($products)
    {
        usort($products, function($firstItem, $secondItem){
            if($firstItem->ServiceProviderCategory->Provider->Rank == $secondItem->ServiceProviderCategory->Provider->Rank) {
                return strcmp($firstItem->ServiceProviderCategory->Provider->Name, $secondItem->ServiceProviderCategory->Provider->Name);
            }
        });

        array_multisort(array_map(function($element) {
            return $element->ServiceProviderCategory->Provider->Rank;
        }, $products), SORT_ASC, SORT_NUMERIC, array_map(function($element) {
            return $element->Price;
        }, $products), SORT_ASC, $products);

        return $products;
    }

    /**
     * @param $products
     * @return mixed
     */
    private function sortAllProducts($products)
    {
        array_multisort(array_map(function($element) {
            return $element->ServiceProviderCategory->Provider->Name;
        }, $products), SORT_ASC, array_map(function($element) {
            return $element->Price;
        }, $products), SORT_NUMERIC, $products);

        return $products;
    }
}