<?php

namespace CYH\Marketing\Controllers\ConnectYourHome;

use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Models\Filters\ProductFilter;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Sal\Services\ProductsService;
use CYH\Marketing\Services\MarketingService;

class TermsAndConditionsController extends GenericController
{
    /**@var $prodService ProductsService*/
    protected $prodService = null;
    /**@var $marketingService MarketingService*/
    protected $marketingService = null;
    const INTERNET_AND_BUNDLES_CATEGORIES = [4,5,7];

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
        $this->prodService = new ProductsService();
        $this->marketingService = new MarketingService();
    }

    public function RenderTerms()
    {
        $preparedData = [];

        $productFilter = new ProductFilter();
        $productList = $this->prodService->GetAllProducts($productFilter, CacheSettingsProvider::GetCacheEnabledSettingsWithLifespan(86400));
        if(count($productList) ==0) {
            return false;
        }

        $preparedData['productList'] = $this->filterProducts($productList);
        $preparedData['productListSorted'] = $this->sortProducts($preparedData['productList']);

        $this->View('marketing/marketing-terms-page', [
            'cityData' => $preparedData
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
     * @return mixed
     */
    private function sortProducts($products)
    {
        array_multisort(array_map(function($element) {
            return $element->ServiceProviderCategory->Provider->Name;
        }, $products), SORT_ASC, array_map(function($element) {
            return $element->Price;
        }, $products), SORT_NUMERIC, $products);

        return $products;
    }
}