<?php


namespace CYH\Controllers\DishSystems;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\ViewModels\CYH\ResultsHeaderSection;
use CYH\WpOptionsHandlers\Pages\SingleProvider\GeneralOptions;
use CYH\Models\Filters\TopOfferFilter;
use CYH\Sal\Services\TopOffersService;





class UIComponentsController extends GenericController
{
    protected $toService = null;

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
        $this->toService = new TopOffersService();

    }

    public function RenderAddressSearchResultsHeaderSection(ResultsHeaderSection $header)
    {
        $this->View('ui-components/address-search-header', ['header' => $header]);
    }

    public function RenderHeader()
    {
        $spInfo = $this->spService->GetServiceProvider(GeneralOptions::GetSettings()['spp_id'], CacheSettingsProvider::GetAdminCachingSettings());


        $this->View('ui-components/header', ['sp' => $spInfo]);
    }

    public function RenderSidebar()
    {
        $this->View('ui-components/sidebar', []);
    }

    public function RenderModalForm(array $customFormContent = [])
    {
        $this->View('ui-components/modal-form', ['customFormContent' => $customFormContent]);
    }

    public function RenderHeroImage(){

        $spId = GeneralOptions::GetSettings()['spp_id'];
        $toFilter = new TopOfferFilter();
        $topOffers = $this->toService->GetTopOffersByProvider($toFilter, $spId, CacheSettingsProvider::GetCacheDisabledSettings());

        $this->View('ui-components/home-image', [
            'topOffers' => $topOffers,
        ]);

    }

}