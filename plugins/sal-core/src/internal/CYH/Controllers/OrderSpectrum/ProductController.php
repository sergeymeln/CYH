<?php
namespace CYH\Controllers\OrderSpectrum;

use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Models\Filters\ProductFilter;
use CYH\Models\Filters\TopOfferFilter;
use CYH\Models\ServiceProvider;
use CYH\Models\TopOffer;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Sal\Services\ProductsService;
use CYH\Sal\Services\TopOffersService;
use CYH\WpOptionsHandlers\Pages\SingleProvider\GeneralOptions;
use CYH\Sal\Services\ServiceProviderService;
use CYH\Models\Filters\SPCategoriesFilter;
use CYH\Sal\Services\SpCategoriesService;
use CYH\SimpleGroupPortal\WpOptionsHandlers\Pages;
use CYH\Controllers\OrderSpectrum\UIComponentsController;

class ProductController extends GenericController
{
    protected $toService = null;

    protected $spCategoriesService = null;
    protected $productsService = null;

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
        $this->productsService = new ProductsService();
        $this->spCategoriesService = new SpCategoriesService();
    }

    public function RenderCategory($categoryId)
    {
        $spId = GeneralOptions::GetSettings()['spp_id'];
        $spInfo = $this->spService->GetServiceProvider($spId, CacheSettingsProvider::GetCacheDisabledSettings());

        $productFilter = new ProductFilter();
        $productFilter->GroupId = \CYH\SimpleGroupPortal\WpOptionsHandlers\Pages\GeneralOptions::GetSettings()['general_group_id'];
        $productList = $this->productsService->GetProductsByCos($productFilter, $categoryId, CacheSettingsProvider::GetCacheDisabledSettings());

        $spCatFilter = new SPCategoriesFilter();
        $spCat = $this->spCategoriesService->GetSpCategoryListBySpIdAndCos($spCatFilter , $spId ,$categoryId,CacheSettingsProvider::GetCacheDisabledSettings() );

        $this->View('product/product', [
            'spInfo' => $spInfo,
            'products' => $productList,
            'spCat' => $spCat,
        ]);
    }



    public function RenderHeader(ServiceProvider $spCatInfo)
    {
        $this->View('product/product-header', [
            'spCatInfo' => $spCatInfo,
        ]);
    }

    public function RenderBottomInfo($spCatInfo)
    {
        $this->View('home/bottom-info', [
            'spInfo' => $spCatInfo,
        ]);
    }

}