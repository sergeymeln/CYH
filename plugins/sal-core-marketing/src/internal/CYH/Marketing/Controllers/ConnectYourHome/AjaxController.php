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
    /**@var $prodService ProductsService*/
    protected $prodService = null;
    /**@var $marketingService MarketingService*/
    protected $marketingService = null;
    const INTERNET_AND_BUNDLES_CATEGORIES = [4,5,7];
    const INTERNET_CATEGORIES = [4,5];
    const INTERNET_TV_CATEGORIES = [7];
    const COOKIE_ZIP_NAME = 'cyh_city_zip';

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
        $this->prodService = new ProductsService();
        $this->marketingService = new MarketingService();
    }

    public function GetInternetPackageData()
    {
        $productFilter = new ProductFilter();
        $productFilter->Zip = $_REQUEST['zip'];

        $cityDataVm = $this->marketingService->getCityProductsVm($productFilter, $_REQUEST['cityId']);

        $this->View('common/json', [
            'jsonData' => $cityDataVm
        ]);
    }

    public function GetCityByZip()
    {
        if (array_key_exists('zip_code', $_POST)) {
            $data = ['result' => 'success', 'link' => $this->marketingService->getCityUrlByZip($_POST['zip_code'])];
        }
        else
        {
            $data = ['result' => 'failure', 'link' => ''];
        }

        echo wp_json_encode($data);
        wp_die();
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