<?php
namespace CYH\Controllers\OrderSpectrum;

use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Models\Filters\ProductFilter;
use CYH\Models\ServiceProvider;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Sal\Services\ProductsService;
use CYH\WpOptionsHandlers\Pages\SingleProvider\GeneralOptions;
use CYH\Models\Filters\SPCategoriesFilter;
use CYH\Sal\Services\SpCategoriesService;


class HomeSecurityController extends GenericController
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

    public function RenderHomeSecurity($categoryId)
    {

        $spId = GeneralOptions::GetSettings()['spp_id'];
        $spInfo = $this->spService->GetServiceProviderByCos($spId, CacheSettingsProvider::GetCacheDisabledSettings());

        $filter = new ProductFilter();
        $filter->GroupId = \CYH\SimpleGroupPortal\WpOptionsHandlers\Pages\GeneralOptions::GetSettings()['general_group_id'];
        $productList = $this->productsService->GetProductsByCos($filter, $categoryId, CacheSettingsProvider::GetCacheDisabledSettings());


        $this->View('home-security/home-security', [
            'spInfo' => $spInfo,
            'products' => $productList,
        ]);
    }

    public function RenderHeader(ServiceProvider $spInfo)
    {
        $this->View('home-security/home-security-header', [
            'spInfo' => $spInfo,
        ]);
    }

}


