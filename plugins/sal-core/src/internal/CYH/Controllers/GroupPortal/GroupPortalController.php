<?php


namespace CYH\Controllers\GroupPortal;


use CYH\Context\Base\ControllerContext;
use CYH\Helpers\AddressHelper;
use CYH\Helpers\CookieStorageHelper;
use CYH\Helpers\FlashMessageHelper;
use CYH\Models\Address;
use CYH\Models\Core\Result;
use CYH\Models\Core\ResultCodes;
use CYH\Models\Filters\ProductFilter;
use CYH\Models\Filters\TopOfferFilter;
use CYH\Models\GroupPortal\Destinations;
use CYH\Models\Html\MetaTags;
use CYH\Models\SitesConst;
use CYH\RG\Settings;
use CYH\Sal\Services\CacheSettingsProvider;

class GroupPortalController extends GenericGroupPortalController
{
    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);

        $this->AddViewData('urlPrefix', $this->urlPrefix);
    }

    public function RenderGroupLanding()
    {
        $this->EnforceGroupInit();

        if (isset($this->context->Request['salAction'])) {
            switch ($this->context->Request['salAction']) {
                case 'rg-login':
                    $res = $this->custService->GetTokenByCrossPortalToken($this->context->Request['cpt'], $this->groupInfo->Id);
                    break;
                case 'logout':
                    if (!empty(CookieStorageHelper::GetCookie(RG_AUTH_NAME))) {
                        $this->custService->LogoutRGAccount($this->context->Principal->AccessToken, $this->groupInfo->Id);
                        CookieStorageHelper::DeleteCookie(RG_AUTH_NAME);
                    }
                    break;
                case 'session-expired':
                    $message = FlashMessageHelper::GetMessage('session-expired');
                    if (!is_null($message)) {
                        $res = new Result();
                        $res->Status = ResultCodes::WARNING;
                        $res->Data = $message;
                    }
                    break;
                default:
                    $this->Redirect($this->urlPrefix . "?groupId=" . $this->context->Request['groupId']);
                    break;
            }

            if (in_array($this->context->Request['salAction'], ['rg-login'])) {
                if ($res->Status == ResultCodes::SUCCESS) {
                    $ticket = $this->authService->CreateAuthTicket($res->Data, $this->groupInfo->Id);
                    CookieStorageHelper::CreateCookie(RG_AUTH_NAME, $ticket, time() + Settings::GetCybSettings()['Auth.CookieLifespan']);

                    if (isset ($this->context->Request['dest'])) {
                        //these are redirects for the Rebate Gift Account

                        $this->Redirect($this->ResolveRgRedirectDestination((int)$this->context->Request['dest']) . '&' . http_build_query([
                                'groupId' => $this->context->Request['groupId']
                            ]));
                    }
                    $this->Redirect($this->urlPrefix . 'home');
                }
            }

        }

        $this->View('portal/landing', [
            'message' => $res
        ], $this->domain);
    }

    public function RenderHome()
    {
        $this->EnforceGroupInit();
        $this->InitializeMetaTags(new MetaTags(sprintf('Home | %s | CYB', $this->groupInfo->Name)));
        if (!$this->context->IsAuthenticated()) {
            $this->Redirect("/");
        }
        $profile = $this->CheckAuthentication($this->context->Principal->AccessToken, $this->context->Principal->GroupId, $this->urlPrefix);

        $deals = $this->prodService->GetCheapestProductByCategory($this->groupInfo->Id, CacheSettingsProvider::GetCacheDisabledSettings());

        $topOfferFilter = new TopOfferFilter();
        $topOfferFilter->GroupId = $this->context->Principal->GroupId;
        $topOfferFilter->UserId = $profile->Id;
        $topOfferFilter->Zip = $profile->Zip;

        $this->View('portal/home', [
            'deals' => $deals,
            'topOfferFilter' => $topOfferFilter,
            'addressSearchUrl' => $this->ResolveRgRedirectDestination(Destinations::SEARCH_PAGE)
        ], $this->domain);
    }

    public function RenderOffersSearch()
    {
        $this->EnforceGroupInit();
        $this->InitializeMetaTags(new MetaTags(sprintf('%s Results | Connect Your Benefits', $this->groupInfo->Name)));
        if (!$this->context->IsAuthenticated()) {
            $this->Redirect("/");
        }
        $profile = $this->CheckAuthentication($this->context->Principal->AccessToken, $this->context->Principal->GroupId, $this->urlPrefix);

        $topOfferFilter = new TopOfferFilter();
        $topOfferFilter->GroupId = $this->context->Principal->GroupId;

        switch ($this->context->Request['search']) {
            case '0':
                //getting top offer address info from the profile cookie
                $topOfferFilter->Zip = $profile->Zip;
                $topOfferFilter->UserId = $profile->Id;

                $addrText = $profile->Zip;
                $address = AddressHelper::GetAddressFromString($profile->Address);
                break;
            case '1':
                //here we need an additional call to str_replace because we used the JSON.stringify to create cookie contents
                $addrArrayData = json_decode(str_replace("\\\"", "\"", CookieStorageHelper::GetCookie($this->context->Request['addrStore'])), true);
                $address = Address::CreateFromArray($addrArrayData);
                $addrText = $address->Zip;
                $topOfferFilter->Zip = $address->Zip;
                $topOfferFilter->UserId = $profile->Id;
                break;
            default:
                throw new InvalidArgumentException('Required parameter is missing');
        }

        $topOffers = $this->topOffersService->GetTopOffers($topOfferFilter, CacheSettingsProvider::GetCacheDisabledSettings());

        $this->View('portal/offers-search', [
            'topOffers' => $topOffers,
            'addrText' => $addrText,
            'providerBaseUrl' => $this->ResolveRgRedirectDestination(Destinations::PROVIDER_PAGE)
        ], $this->domain);
    }

    public function RenderProviderDeals()
    {
        $this->EnforceGroupInit();
        if (!$this->context->IsAuthenticated()) {
            $this->Redirect("/");
        }
        $profile = $this->CheckAuthentication($this->context->Principal->AccessToken, $this->context->Principal->GroupId, $this->urlPrefix);

        $providerId = $this->context->Get['providerId'];
        $zipcode = $this->context->Get['zipcode'];

        $productFilter = new ProductFilter();
        $productFilter->Zip = $zipcode;
        $productFilter->GroupId = $this->groupInfo->Id;
        $productFilter->UserId = $profile->Id;
        $productFilter->BestOffersOnly = 'true';
        $products = $this->prodService->GetSpProducts($productFilter, $providerId, CacheSettingsProvider::GetCacheDisabledSettings());

        $topOfferFilter = new TopOfferFilter();
        $topOfferFilter->UserId = $profile->Id;
        $topOfferFilter->GroupId = $this->groupInfo->Id;
        $topOfferFilter->Zip = $zipcode;
        $topOfferFilter->BestOffersOnly = 'true';
        $topOffer = $this->topOffersService->GetTopOffersByProvider($topOfferFilter, $providerId, CacheSettingsProvider::GetCacheDisabledSettings());

        $this->InitializeMetaTags(new MetaTags(sprintf('Exclusive %s Offers! | %s | CYB', $topOffer->Provider->Name, $this->groupInfo->Name)));

        $this->View('portal/provider-deals', [
            'topOffer' => $topOffer,
            'products' => $products
        ], $this->domain);
    }
}