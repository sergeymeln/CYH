<?php


namespace CYH\SimpleGroupPortal\Controllers\SimpleGp;


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

class GenericSimpleGpController extends GenericController
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

        //Services Init
        $encryptSettings = new AESSettings();
        $this->authService = new AuthenticationService($encryptSettings);
        $this->groupService = new GroupsService();
        $this->topOffersService = new TopOffersService();
        $this->custService = new CustomerService();
        $this->prodService = new ProductsService();
    }

    protected function SetUrlPrefix($prefix)
    {
        $this->urlPrefix = $prefix;

        return $this;
    }
}