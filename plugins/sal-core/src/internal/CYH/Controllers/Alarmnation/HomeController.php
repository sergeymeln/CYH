<?php

namespace CYH\Controllers\Alarmnation;

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

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
    }

    public function RenderHome()
    {
        $spId = GeneralOptions::GetSettings()['spp_id'];
        $spInfo = $this->spService->GetServiceProvider($spId, CacheSettingsProvider::GetCacheDisabledSettings());

        $this->View('home/home', [
            'spInfo' => $spInfo,

        ]);
    }

    public function RenderHeroImage($spInfo)
    {
        $this->View('home/home-hero-image', [
            'spInfo' => $spInfo,
        ]);
    }


}