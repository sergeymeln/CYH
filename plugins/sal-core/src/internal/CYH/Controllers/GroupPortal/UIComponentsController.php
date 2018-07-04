<?php


namespace CYH\Controllers\GroupPortal;


use CYH\Context\Base\ControllerContext;
use CYH\Helpers\ContentDeserializeHelper;
use CYH\Models\Filters\ServiceProviderFilter;
use CYH\Models\Filters\TopOfferFilter;
use CYH\Models\GroupPortal\Destinations;
use CYH\Models\Groups\GroupInfo;
use CYH\Navigation\RebateGiftUrl;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\ViewModels\GroupPortal\TopNavMenu;

class UIComponentsController extends GenericGroupPortalController
{
    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);

        $this->AddViewData('urlPrefix', $this->urlPrefix);
    }

    public function RenderRegistraterCallBlock(GroupInfo $model)
    {
        $this->View('ui-components/register-call-block', [
            'groupInfo' => $model
        ], $this->domain);
    }

    public function RenderTopOffersBlock(TopOfferFilter $topOfferFilter)
    {
        $topOffers = $this->topOffersService->GetTopOffers($topOfferFilter, CacheSettingsProvider::GetCacheDisabledSettings());

        foreach ($topOffers as $key => $topOffer) {
            $topOffers[$key]->DescriptionParsed = ContentDeserializeHelper::GetDescriptionFromTags($topOffer->Description);
        }

        $this->View('ui-components/top-offers', [
            'topOffers' => $topOffers
        ], $this->domain);
    }

    public function RenderGroupServiceProviders(GroupInfo $groupInfo)
    {
        $groupSpFilter = new ServiceProviderFilter();
        $groupSpFilter->GroupId = $groupInfo->Id;
        $groupServiceProviders = $this->spService->GetServiceProviderListSup($groupSpFilter, CacheSettingsProvider::GetCacheDisabledSettings());

        $this->View('ui-components/group-service-providers', [
            'groupServiceProviders' => $groupServiceProviders,
            'groupInfo' => $groupInfo
        ], $this->domain);
    }

    public function RenderTopMenu(TopNavMenu $model)
    {
        $url = RebateGiftUrl::GetMyAccountLink($model->GroupInfo);
        $myAccUrl = RebateGiftUrl::AppendCPTData($url, $model->Cpt);

        $this->View('ui-components/menu/top-nav', [
            'myAccUrl' => $myAccUrl,
            'topNavMenu' => $model,
            'addressSearchBaseUrl' => $this->ResolveRgRedirectDestination(Destinations::SEARCH_PAGE_ADDRESS_SELECTED)
        ], $this->domain);
    }
}