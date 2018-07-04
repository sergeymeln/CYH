<?php


namespace CYH\SimpleGroupPortal\Controllers\SimpleGp;


use CYH\Context\Base\ControllerContext;
use CYH\Helpers\ContentDeserializeHelper;
use CYH\Helpers\CookieStorageHelper;
use CYH\Helpers\FlashMessageHelper;
use CYH\Helpers\FormatHelper;
use CYH\Helpers\HtmlHelper;
use CYH\Helpers\LinkHelper;
use CYH\Models\Address;
use CYH\Models\Core\ResultCodes;
use CYH\Models\Filters\ProductFilter;
use CYH\Models\Filters\TopOfferFilter;
use CYH\Models\Html\MetaTags;
use CYH\Models\RG\Login;
use CYH\Models\RG\Registration;
use CYH\Models\SitesConst;
use CYH\Models\TopOffer;
use CYH\Models\UrlTarget;
use CYH\RG\Settings;
use CYH\Sal\Exceptions\AuthenticationSalException;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\SimpleGroupPortal\WpOptionsHandlers\Pages\GeneralOptions;
use CYH\ViewModels\Alert;
use CYH\ViewModels\CYH\AddressSearchResults;
use CYH\ViewModels\CYH\ResultsHeaderSection;
use CYH\ViewModels\CYH\ResultsTableListItem;
use CYH\ViewModels\UI\Button;
use CYH\ViewModels\UI\TableHeaderItem;

class GroupPortalController extends GenericSimpleGpController
{
    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);

        $this->AddViewData('urlPrefix', $this->urlPrefix);
    }

    /**
     *
     * HomeConnectionGuru
     */
    public function RenderOffersSearch()
    {
        $this->groupInfo = $this->groupService->GetGroupInfo(GeneralOptions::GetSettings()['general_group_id'], CacheSettingsProvider::GetCacheDisabledSettings());

        $this->InitializeMetaTags(new MetaTags(sprintf('%s Results', $this->groupInfo->Name)));

        $topOfferFilter = new TopOfferFilter();
        $topOfferFilter->GroupId = $this->groupInfo->Id;

        $showLoginForm = !$this->context->IsAuthenticated();

        if (!$this->context->IsAuthenticated()) {
            if (isset($this->context->Request['salAction']) && $this->context->Request['salAction'] == 'guest-login') {
                //try registering
                $regInfo = new Registration();
                $regInfo->Email = $this->context->Request['Email'];
                $regInfo->GroupId = (int)GeneralOptions::GetSettings()['general_group_id'];
                $regInfo->Zip = $this->context->Request['Zip'];
                $regInfo->CreateAccountExplicitly = false;
                $this->custService->RegisterRGAccount($regInfo, $this->groupInfo->Id);

                //try logging in, it doesn't matter if registration was successful
                //if it is not, we still might be able to log customer in as a returning one
                $loginInfo = Login::CreateFromObject($regInfo);
                $res = $this->custService->LoginRGAccount($loginInfo, $this->groupInfo->Id);

                if ($res->Status == ResultCodes::SUCCESS) {
                    $ticket = $this->authService->CreateAuthTicket($res->Data, $this->groupInfo->Id);
                    CookieStorageHelper::CreateCookie(RG_AUTH_NAME, $ticket, time() + Settings::GetCybSettings()['Auth.CookieLifespan']);
                    $profile = $this->CheckAuthentication($res->Data->AccessToken, $this->groupInfo->Id);
                    $topOfferFilter->Zip = $profile->Zip;
                    $topOfferFilter->UserId = $profile->Id;
                    $this->AddViewData('crossPortalToken', $res->Data->CrossPortalToken);
                    $showLoginForm = false;
                } else {
                    //direct customer to reset his password
                    $this->AddViewData('alert', new Alert(
                        ResultCodes::WARNING,
                        'It seems like you have already viewed the offers. Please <a href="' . \CYH\Navigation\RebateGiftUrl::GetLoginLink($this->groupInfo) . '" target="_blank">follow this link</a> to log in and view your deals'));
                }
            }
        } else {
            try{
                $profile = $this->CheckAuthentication($this->context->Principal->AccessToken, $this->groupInfo->Id);
            }
            catch (AuthenticationSalException $ex)
            {
                if (!empty(CookieStorageHelper::GetCookie(RG_AUTH_NAME))) {
                    CookieStorageHelper::DeleteCookie(RG_AUTH_NAME);
                }
                //if we can't get a profile info then user was logged off
                FlashMessageHelper::SetMessage("session-expired", "The session has expired");

                $this->Redirect(LinkHelper::AppendQueryParams('/', [
                    'salAction' => 'session-expired'
                ]));
            }
            if (!is_null($profile)) {
                $topOfferFilter->Zip = $profile->Zip;
                $topOfferFilter->UserId = $profile->Id;
                $this->AddViewData('crossPortalToken', $this->context->Principal->CrossPortalToken);
            }
        }

        $topOffers = $this->topOffersService->GetTopOffers($topOfferFilter, CacheSettingsProvider::GetCacheDisabledSettings());

        $this->View('simple-gp/portal/offers-search', [
            'topOffers' => $topOffers,
            'groupInfo' => $this->groupInfo,
            'showLogin' => $showLoginForm,
            'generalAccentClass' => 'hcg-accent',
            'buttonAccentClass' => 'btn-hcg',
        ]);
    }

    public function RenderProductsSearch()
    {
        $this->groupInfo = $this->groupService->GetGroupInfo(GeneralOptions::GetSettings()['general_group_id'], CacheSettingsProvider::GetCacheDisabledSettings());

        $this->InitializeMetaTags(new MetaTags(sprintf('%s Results', $this->groupInfo->Name)));

        $productsFilter = new ProductFilter();
        $productsFilter->GroupId = $this->groupInfo->Id;

        if (isset($this->context->Request['Zip'])) {
            $productsFilter->Zip = $this->context->Request['Zip'];
        }

        $products = $this->prodService->GetAllProducts($productsFilter, CacheSettingsProvider::GetCacheDisabledSettings());

        $this->View('simple-gp/portal/products-search', [
            'products' => $products,
            'groupInfo' => $this->groupInfo,
            'zip' => !empty($this->context->Request['Zip']) ? $this->context->Request['Zip'] : '',
        ]);
    }

    public function RenderOffersSearchGeneric($siteType)
    {
        switch ($siteType) {
            case SitesConst::ORDER_CABLE:
                $this->AddViewData('title', 'Order Cable: Special Gift Portal');
                $this->AddViewData('welcomeText', 'You\'ve found a gift! Call this dedicated number to  order any combination of services and get your reward:');
                $phone = '8889252498';
                $spSortOrder = [41, 57, 162, 108, 123, 25, 7, 82, 67, 142];
                break;
            case SitesConst::ORDER_HOME_SECURITY:
                $this->AddViewData('title', 'Order Home Security: Special Gift Portal');
                $this->AddViewData('welcomeText', 'You\'ve found a gift! Call this dedicated number to order  your home security plan, combine it with other utilities and  get your reward:');
                $phone = '8883409629';
                $spSortOrder = [1, 119, 67, 123];
                break;
        }

        $topOfferFilter = new TopOfferFilter();
        $topOfferFilter->GroupId = $this->groupInfo->Id;
        if (isset($this->context->Request['addrStore']) && isset($this->context->Cookies[$this->context->Request['addrStore']])) {
            $addressInfo = json_decode($this->context->Cookies[$this->context->Request['addrStore']]);
            $topOfferFilter->Zip = $addressInfo->Zip;
            $this->AddViewData('address', $this->GetAddressFromRequest($addressInfo));

            //searhing only if we have the address data
            $topOffersUnsorted = $this->topOffersService->GetTopOffers($topOfferFilter, CacheSettingsProvider::GetCacheDisabledSettings());
        }
        else
        {
            $topOffersUnsorted = [];
        }

        //"sorting" array
        //gettting list of items sorted by provider
        $topOffers = [];
        foreach ($spSortOrder as $sp) {
            foreach ($topOffersUnsorted as $to) {
                /* @var $to TopOffer */
                if ($to->Provider->Id == $sp) {
                    $topOffers[] = $to;
                    break;
                }
            }
        }
        //getting list of unsorted items (sp id is not in the list of sorted ones)
        $unsortedTo = [];
        foreach ($topOffersUnsorted as $to)
        {
            /* @var $to TopOffer */
            if (in_array($to->Provider->Id, $spSortOrder) == false)
            {
                $unsortedTo[] = $to;
            }
        }

        $topOffers = array_merge($topOffers, $unsortedTo);

        $addressSearchResults = new AddressSearchResults();
        $addressSearchResults->DefaultHeroImage = 'https://www.connectyourhome.com/wp-content/uploads/2016/04/756x397_internetHero_1.jpg';
        $addressSearchResults->TableHeaders = [
            new TableHeaderItem('Provider', 'provider-th'),
            new TableHeaderItem('Plans & Features', 'features-th'),
            new TableHeaderItem('Price', 'price-th'),
        ];

        //map spList to ui-component viewmodel
        foreach ($topOffers as $to) {
            /* @var $to TopOffer */
            $item = new ResultsTableListItem();
            $item->ProviderId = $to->Provider->Id;
            $item->Logo = $to->Provider->Logo;
            $item->Title = $to->Tagline;
            $item->Features = ContentDeserializeHelper::GetDescriptionFromTags($to->Description);
            $item->Price = $to->Price;
            $item->PriceDescriptionStart = $to->PriceDescriptionBegin;
            $item->PriceDescriptionEnd = $to->PriceDescriptionEnd;
            $item->Disclaimer = $to->Provider->Legal;

            $item->OrderButton = new Button(
                '<i class="glyphicon glyphicon-earphone"></i> ' . FormatHelper::FormatPhoneNumber($phone), //replace with $to->Phone->Number to respect SAL value
                HtmlHelper::GetPhoneHref(FormatHelper::FormatPhoneNumber($phone)), //replace with $to->Phone->Number to respect SAL value
                'phone-number btn btn-success btn-lg'
            );

            if (isset($to->NavigationLink) && !empty($to->NavigationLink->LinkUrl)) {
                $item->MoreInfoButton = new Button(
                    '<span class="glyphicon glyphicon-search" aria-hidden="true"></span> ' . (!empty($to->NavigationLink->LinkText) ? $to->NavigationLink->LinkText : 'More Info'),
                    $to->NavigationLink->LinkUrl,
                    'btn btn-outline',
                    HtmlHelper::MapTargetField(UrlTarget::NEW_TAB) //to respect SAL link target replace to: $to->NavigationLink->LinkTarget
                );
            }

            if (!empty($item->Disclaimer)) {
                $item->ViewDisclaimerButton = new Button(
                    'View Disclaimer',
                    '#',
                    'disclaimer'
                );
            }

            $addressSearchResults->TableItems[] = $item;
        }


        $this->View('simple-gp/portal/offers-search-generic', [
            'phone' => $phone,
            'addressSearch' => $addressSearchResults
        ]);
    }

    protected function GetAddressFromRequest($addressInfo): Address
    {
        $address = Address::CreateFromObject($addressInfo);
        return $address;
    }
}