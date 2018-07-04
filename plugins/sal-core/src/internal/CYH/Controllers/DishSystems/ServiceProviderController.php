<?php


namespace CYH\Controllers\DishSystems;


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

class ServiceProviderController extends GenericController
{
    protected $productsService = null;
    protected $toService = null;

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
        $this->productsService = new ProductsService();
        $this->toService = new TopOffersService();
    }

    public function RenderHome()
    {
        $spId = GeneralOptions::GetSettings()['spp_id'];
        $toFilter = new TopOfferFilter();
        $topOffers = $this->toService->GetTopOffersByProvider($toFilter, $spId, CacheSettingsProvider::GetCacheDisabledSettings());

        $productFilter = new ProductFilter();
        $productList = $this->productsService->GetSpProducts($productFilter, $spId, CacheSettingsProvider::GetAdminCachingSettings());

        $this->View('service-provider/home', [
            'topOffers' => $topOffers,
            'products' => $productList
        ]);
    }

    public function RenderHomeHero(TopOffer $topOffers)
    {
        $this->View('service-provider/home-hero', [
            'topOffers' => $topOffers,
        ]);
    }

    public function RenderHomeProducts(array $products)
    {
        $this->View('service-provider/home-products', [
            'products' => $products,
        ]);
    }
}