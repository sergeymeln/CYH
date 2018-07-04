<?php


namespace CYH\Controllers\DishSystems;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Models\Filters\ProductFilter;
use CYH\Models\ServiceProvider;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Sal\Services\ProductsService;
use CYH\WpOptionsHandlers\Pages\SingleProvider\GeneralOptions;

class ProductController extends GenericController
{
    protected $productsService = null;

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
        $this->productsService = new ProductsService();
    }

    public function RenderPackages($categoryId)
    {
        $spId = GeneralOptions::GetSettings()['spp_id'];
        //$spInfo = $this->spService->GetServiceProvider($spId, CacheSettingsProvider::GetAdminCachingSettings());

        $productList = $this->productsService->GetSpProductsByCos($spId, $categoryId, CacheSettingsProvider::GetAdminCachingSettings());

        $this->View('products/packages', [
         //   'sp' => $spInfo,
            'products' => $productList
        ]);
    }

    public function RenderProductsTable(array $products)
    {
        $this->View('products/product-info-table', [
            'products' => $products,
        ]);
    }

    public function RenderProductsCards(array $products)
    {
        $this->View('products/product-info-card', [
            'products' => $products,
        ]);
    }
}