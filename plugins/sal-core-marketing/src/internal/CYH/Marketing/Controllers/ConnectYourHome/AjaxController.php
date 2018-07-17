<?php

namespace CYH\Marketing\Controllers\ConnectYourHome;

use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Sal\Services\ProductsService;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Models\Filters\ProductFilter;
use CYH\Marketing\Services\MarketingService;


class AjaxController extends GenericController
{
    protected $prodService = null;
    protected $marketingService = null;
    const INTERNET_AND_BUNDLES_CATEGORIES = [4,5,7];
    const INTERNET_CATEGORIES = [4,5];

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
        $this->prodService = new ProductsService();
        $this->marketingService = new MarketingService();
    }

    public function GetBrandHtml()
    {
        $brandId = (int)$_POST['brand_id'];
        $zip = $_POST['zip'];

        $productFilter = new ProductFilter();
        $productFilter->Zip = $zip;
        $productList = $this->prodService->GetAllProducts($productFilter, CacheSettingsProvider::GetCacheDisabledSettings());
        $productList = $this->filterProducts($productList);
        $productList = $this->sortProducts($productList);

        if(count($productList) == 0) {
            return false;
        }

        $this->View('marketing/one-brand', [
            'products' => $productList,
            'brandId' => $brandId,
            'catIds' => self::INTERNET_CATEGORIES
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
            return $element->ServiceProviderCategory->Provider->Rank;
        }, $products), SORT_ASC, SORT_NUMERIC, array_map(function($element) {
            return $element->Price;
        }, $products), SORT_ASC, $products);

        return $products;
    }

    public function GetCityByZip()
    {
        if (array_key_exists('zip_code', $_POST)) {
            $result = $this->marketingService->getCityByZip($_POST['zip_code']);
            if(is_array($result) && count($result)> 0) {
                $data = ['result' => 'success', 'link' => '/internet/'.strtolower($result['state_code']).'/'.$result['city_name']];
            } else {
                $data = ['result' => 'failure', 'link' => ''];
            }

            echo wp_json_encode($data);
            wp_die();
        }
    }
}