<?php


namespace CYH\Controllers\GroupPortal;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Models\Encryption\AESSettings;
use CYH\Models\GroupPortal\Destinations;
use CYH\Models\Groups\GroupInfo;
use CYH\Models\RG\UserProfile;
use CYH\Models\SalPortalTypes;
use CYH\Models\SitesConst;
use CYH\RG\Services\AuthenticationService;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Sal\Services\CustomerService;
use CYH\Sal\Services\GroupsService;
use CYH\Sal\Services\ProductsService;
use CYH\Sal\Services\TopOffersService;
use CYH\Sal\Settings;
use CYH\WpOptionsHandlers\Pages\GroupPortal\GeneralOptions;

class GenericGroupPortalController extends GenericController
{
    protected $urlPrefix = '/auth/';
    /**
     * @var string
     */
    protected $domain = 'common/group-portal';
    protected $authService = null;
    protected $groupService = null;
    protected $topOffersService = null;
    protected $custService = null;
    protected $prodService = null;

    /* @var $groupInfo GroupInfo */
    protected $groupInfo = null;

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
        Settings::SetPortalType(SalPortalTypes::CYBEN);
        $this->SetUrlPrefix(GeneralOptions::GetSettings()['gp_folder']);

        //Services Init
        $encryptSettings = new AESSettings();
        $this->authService = new AuthenticationService($encryptSettings);
        $this->groupService = new GroupsService();
        $this->topOffersService = new TopOffersService();
        $this->custService = new CustomerService();
        $this->prodService = new ProductsService();
    }

    protected function EnforceGroupInit()
    {
        if (!empty($this->context->Request['groupId'])) {
            $groupId = $this->context->Request['groupId'] ? $this->context->Request['groupId'] : '';
            $this->groupInfo = $this->groupService->GetGroupInfo($groupId, CacheSettingsProvider::GetCacheDisabledSettings());
            //making sure we always have groupInfo in the viewData
            $this->AddViewData('groupInfo', $this->groupInfo);
        } else {
            $this->Redirect("/");
        }
    }

    protected function CheckAuthentication($accessToken, $groupId, $redirectUrl = '/') : UserProfile
    {
        /* @var $profile \CYH\Models\RG\UserProfile */
        $profile = $this->custService->GetUserProfile($accessToken, $groupId, CacheSettingsProvider::GetCacheDisabledSettings());
        if (is_null($profile)) {
            //if we can't get a profile info then user was logged off
            FlashMessageHelper::SetMessage("session-expired", "The session has expired");

            $this->Redirect(LinkHelper::AppendQueryParams($redirectUrl, [
                'groupId' => $this->groupInfo->Id,
                'salAction' => 'session-expired'
            ]));
        }

        return $profile;
    }

    protected function ResolveRgRedirectDestination($destId)
    {
        switch ($destId) {
            case Destinations::SEARCH_PAGE:
                //this is case for RG portal redirects
                if ($this->context->SiteType == SitesConst::CONNECT_YOUR_BENEFITS) {
                    //CYBen requires special treatment as links were set up differently
                    $redirectUrl = '/cyb-results/?search=0';
                } else {
                    $redirectUrl = $this->urlPrefix . 'results?search=0';
                }
                break;
            case Destinations::PROVIDER_PAGE:
                if ($this->context->SiteType == SitesConst::CONNECT_YOUR_BENEFITS) {
                    //CYBen requires special treatment as links were set up differently
                    $redirectUrl = '/cyb-brand/';
                } else {
                    $redirectUrl = $this->urlPrefix . 'brand/';
                }
                break;
            case Destinations::SEARCH_PAGE_ADDRESS_SELECTED:
                //this is case for top offers search on top of page
                if ($this->context->SiteType == SitesConst::CONNECT_YOUR_BENEFITS) {
                    //CYBen requires special treatment as links were set up differently
                    $redirectUrl = '/cyb-results/?search=1';
                } else {
                    $redirectUrl = $this->urlPrefix . 'results?search=1';
                }
                break;
            default:
                throw new \Exception("Unknown redirect");
                break;
        }

        return $redirectUrl;
    }

    protected function SetUrlPrefix($prefix)
    {
        $this->urlPrefix = $prefix;

        return $this;
    }
}