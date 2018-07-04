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

class HomeController extends GenericController
{
    protected $toService = null;

    protected $productsService = null;

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
 		$this->productsService = new ProductsService();    }

    public function RenderHome()
    {
        $spId = GeneralOptions::GetSettings()['spp_id'];
        $spInfo = $this->spService->GetServiceProvider($spId, CacheSettingsProvider::GetCacheDisabledSettings());

        // 1 stands for Tv category
     	$productList = $this->productsService->GetSpProductsByCos($spId, 1, CacheSettingsProvider::GetCacheDisabledSettings());
        $this->View('home/home', [
            'spInfo' => $spInfo,
			 'products' => $productList
        ]);
    }

    public function RenderHeader($spInfo)
    {
        $this->View('home/home-header', [
            'spInfo' => $spInfo,
        ]);
    }

    public function RenderBottomInfo($spInfo)
    {
        $this->View('home/bottom-info', [
            'spInfo' => $spInfo,
        ]);
    }

}