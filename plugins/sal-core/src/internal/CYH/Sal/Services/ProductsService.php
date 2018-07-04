<?php


namespace CYH\Sal\Services;


use CYH\Models\Category;
use CYH\Models\CheapestDeals;
use CYH\Models\Core\ResultCodes;
use CYH\Models\Factory\ProductFactory;
use CYH\Models\Filters\CategoryFilter;
use CYH\Models\Filters\ProductFilter;
use CYH\Models\Cache\CacheSettings;
use CYH\Models\Product;
use CYH\Sal\Services\Base\CacheableService;

class ProductsService extends CacheableService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function GetAllProducts(ProductFilter $filter, CacheSettings $cacheSettings): array
    {
        $res = $this->_salConnector->GetAllProductPackages($filter, $cacheSettings);

        if ($res->Status == ResultCodes::SUCCESS && count($res->Data) > 0)
        {
            foreach ($res->Data as $product) {
                $products[] = ProductFactory::CreateProductFromArray($product);
            }
            return $products;
        }
        else
        {
            return [];
        }
    }

    public function GetSpProducts(ProductFilter $filter, $spId, CacheSettings $cacheSettings): array
    {
        $res = $this->_salConnector->GetSpProductsList($filter, $spId, $cacheSettings);

        if ($res->Status == ResultCodes::SUCCESS && count($res->Data) > 0)
        {
            foreach ($res->Data as $product) {
                $products[] = ProductFactory::CreateProductFromArray($product);
            }
            return $products;
        }
        else
        {
            return [];
        }
    }

    public function GetProductsBySpAndSpCategory(ProductFilter $filter, $categoryId, CacheSettings $cacheSettings): array
    {
        $res = $this->_salConnector->GetProductsBySpAndSpCategory($filter, $categoryId, $cacheSettings);

        if ($res->Status == ResultCodes::SUCCESS && count($res->Data) > 0)
        {
            foreach ($res->Data as $product) {
                $products[] = ProductFactory::CreateProductFromArray($product);
            }
            return $products;
        }
        else
        {
            return [];
        }
    }

    public function GetSpProductsByCos($spId, $cosId, CacheSettings $cacheSettings)
    {
        $prodRes = $this->_salConnector->GetProductsBySpAndCatOfService($spId, $cosId, $cacheSettings);
        if ($prodRes->Status == ResultCodes::SUCCESS && count($prodRes->Data) > 0)
        {
            foreach ($prodRes->Data as $productItem)
            {
                $productList[] = ProductFactory::CreateProductFromArray($productItem);
            }
            return !is_null($productList) ? $productList : [];
        }
        else
        {
            return [];
        }
    }

    public function GetProductsByCos(ProductFilter $filter, $cosId, CacheSettings $cacheSettings): array
    {
        $prodRes = $this->_salConnector->GetProductPackagesByCatOfService($filter, $cosId, $cacheSettings);
        if ($prodRes->Status == ResultCodes::SUCCESS && count($prodRes->Data) > 0)
        {
            foreach ($prodRes->Data as $productItem)
            {
                $productList[] = ProductFactory::CreateProductFromArray($productItem);
            }
            return !is_null($productList) ? $productList : [];
        }
        else
        {
            return [];
        }
    }

    public function GetCheapestProductByCategory($groupId, CacheSettings $cacheSettings): CheapestDeals
    {
        $catService = new CategoriesService();
        $filter = new CategoryFilter();
        $categories = $catService->GetCategoriesList($filter, CacheSettingsProvider::GetCacheDisabledSettings());

        $cheapDeals = new CheapestDeals();
        $filter = new ProductFilter();
        $filter->GroupId = $groupId;
        foreach ($categories as $category)
        {
            /* @var $category Category */
            switch ($category->Name)
            {
                case 'Television':
                    $tvProducts = $this->GetProductsByCos($filter, $category->Id, $cacheSettings);
                    $cheapDeals->Tv = $this->GetCheapestItemFromList($tvProducts);
                    break;
                case 'Internet':
                    $inetProducts = $this->GetProductsByCos($filter, $category->Id, $cacheSettings);
                    $cheapDeals->Internet = $this->GetCheapestItemFromList($inetProducts);
                    break;
                case 'Home Phone':
                    $hpProducts = $this->GetProductsByCos($filter, $category->Id, $cacheSettings);
                    $cheapDeals->Phone = $this->GetCheapestItemFromList($hpProducts);
                    break;
                case 'Bundles':
                    $bundleProducts = $this->GetProductsByCos($filter, $category->Id, $cacheSettings);
                    $cheapDeals->Bundles = $this->GetCheapestItemFromList($bundleProducts);
                    break;
                case 'Security':
                    $securityProducts = $this->GetProductsByCos($filter, $category->Id, $cacheSettings);
                    $cheapDeals->Security = $this->GetCheapestItemFromList($securityProducts);
                    break;
            }
        }

        return $cheapDeals;
    }

    //TODO Add nullable return type after migration to PHP 7.1
    private function GetCheapestItemFromList(array $prodList)
    {
        if (count($prodList) == 0)
        {
            return null;
        }
        /* @var $minValue Product*/
        $minValue = $prodList[0];
        foreach ($prodList as $product)
        {
            if (is_null($product->Price) || $product->Price == 0)
            {
                continue;
            }
            /* @var $product Product */
            if ($minValue->Price > $product->Price)
            {
                $minValue = $product;
            }
        }

        return $minValue;
    }

}