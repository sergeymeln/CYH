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
use CYH\Marketing\Helpers\WPSQLImporter;
use CYH\Marketing\Helpers\UrlHelper;
use CYH\Marketing\Services\MarketingService;

class MarketingsController extends GenericController
{
    protected $prodService = null;
    protected $dataTransformerHelper;
    protected $marketingService = null;
    protected $urlHelper = null;
    const INTERNET_AND_BUNDLES_CATEGORIES = [4,5,7];
    const INTERNET_CATEGORIES = [4,5];
    const INTERNET_TV_CATEGORIES = [7];

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
        $this->prodService = new ProductsService();
        $this->sqlImporter = new WPSQLImporter();
        $this->urlHelper = new UrlHelper();
        $this->marketingService = new MarketingService();
    }

    public function RenderMarketing()
    {
        $data = $this->urlHelper->getCityFromUrl();
        $city = $this->marketingService->GetCitiesData($data);

        $preparedData = [];

        $productFilter = new ProductFilter();
        $productFilter->Zip = $city->Zip;
        $productList = $this->prodService->GetAllProducts($productFilter, CacheSettingsProvider::GetCacheDisabledSettings());
        if(count($productList) ==0) {
            return false;
        }

        $preparedData['productList'] = $this->filterProducts($productList);
        $preparedData['providers'] = $this->getProvidersFromProducts($preparedData['productList']);
        $preparedData['productListSorted'] = $this->sortProducts($preparedData['productList']);

        $preparedData['topProvidersData'] = $this->marketingService->getTopProvidersDataFromProducts($preparedData['productList']);
        //echo '<pre>'; print_r($preparedData['productListSorted']);exit;

        $city->Bullets = $this->marketingService->getBulletsData($preparedData['productList'], $city);
        $this->View('marketing/marketing-page', [
            'city' => $city,
            'cityData' => $preparedData,
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
        array_multisort(array_map(function($element) {
            return $element->ServiceProviderCategory->Provider->Rank;
        }, $products), SORT_ASC, SORT_NUMERIC, array_map(function($element) {
            return $element->Price;
        }, $products), SORT_ASC, $products);

        return $products;
    }
}