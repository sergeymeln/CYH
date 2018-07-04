<?php

namespace CYH\Controllers\Alarmnation;

use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Models\Product;
use CYH\Models\ServiceProvider;
use CYH\ViewModels\CYH\ResultsHeaderSection;
use CYH\Controllers\OrderSpectrum\HomeController;
use CYH\Controllers\OrderSpectrum\SearchController;
use CYH\WpOptionsHandlers\Pages\SingleProvider\GeneralOptions;
use CYH\Sal\Services\CacheSettingsProvider;

class UIComponentsController extends GenericController
{

    protected $productsService = null;

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
    }

    public function RenderPage()
    {
        $spId = GeneralOptions::GetSettings()['spp_id'];
        $spInfo = $this->spService->GetServiceProvider($spId, CacheSettingsProvider::GetCacheDisabledSettings());

        $this->View('ui-components/page', [
            'spInfo' => $spInfo,
        ]);
    }
    public function RenderPageMarketing()
    {
        $spId = GeneralOptions::GetSettings()['spp_id'];
        $spInfo = $this->spService->GetServiceProvider($spId, CacheSettingsProvider::GetCacheDisabledSettings());

        $this->View('ui-components/page-marketing', [
            'spInfo' => $spInfo,
        ]);
    }

    public function RenderMenu(ServiceProvider $spInfo)
    {
        $this->View('ui-components/render-menu', ['spInfo' => $spInfo]);
    }

    public function RenderHelpProtectYouFamily(ServiceProvider $spInfo)
    {
        $this->View('ui-components/help-protect-your-family', ['spInfo' => $spInfo]);
    }

    public function RenderLegal(ServiceProvider $spInfo)
    {
        $this->View('ui-components/legal-section', ['spInfo' => $spInfo]);
    }

}