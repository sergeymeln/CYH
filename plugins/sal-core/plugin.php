<?php

/*
Plugin Name: SAL Core
Description: Controls data retrieving from SAL and components rendering
Version: 1.2
Author: Mykola Piatkovskyi
*/

if (!defined('WPINC')) {
    die;
}

require_once(__DIR__ . '/src/vendor/autoload.php');
register_activation_hook(__FILE__, array("CYH\\Plugins\\SalCore", "Install"));
register_deactivation_hook(__FILE__, array("CYH\\Plugins\\SalCore", "Uninstall"));

//Encryption-specific logic
define('RG_LOGIN_IV', 'BFEEF8AB42FC449C9002BC5F7F0A0C6E');
define('RG_LOGIN_KEY', 'DD973EF0AACA4244B98403918360D53D');
define('DEFAULT_AES_ENCRYPTION_BIT', 128);
define('RG_AUTH_NAME', 'rg_login');

$context = \CYH\Context\ContextProvider::GetContext(\CYH\Plugins\SalCore::class);


$commonClasses = [
    '\\' . \CYH\Controllers\Notifications\AlertController::class,
    '\\' . \CYH\Controllers\Common\CommonUIComponents::class,
    '\\' . \CYH\Controllers\Common\FormRenderController::class,
    '\\' . \CYH\Controllers\Common\ScriptRenderController::class,
];
$groupPortalClasses = [
    '\\' . \CYH\Controllers\GroupPortal\AuthenticationController::class,
    '\\' . \CYH\Controllers\GroupPortal\GroupPortalController::class,
    '\\' . \CYH\Controllers\GroupPortal\UIComponentsController::class,
];
$classesWithActions = [
    \CYH\Models\SitesConst::CONNECT_YOUR_HOME => array_merge($commonClasses, $groupPortalClasses, [
        '\\' . \CYH\Controllers\ConnectYourHome\ServiceProviderController::class,
        '\\' . \CYH\Controllers\ConnectYourHome\UIComponentsController::class,
        '\\' . \CYH\Controllers\ConnectYourHome\ErrorController::class,
        '\\' . \CYH\Controllers\ConnectYourHome\MaintenancePagesController::class,
        '\\' . \CYH\Controllers\ConnectYourHome\PageController::class,
    ]),
    \CYH\Models\SitesConst::CONNECT_YOUR_BENEFITS => array_merge($commonClasses, $groupPortalClasses),
    \CYH\Models\SitesConst::DISH_SYSTEMS => array_merge($commonClasses, [
        '\\' . \CYH\Controllers\DishSystems\SearchController::class,
        '\\' . \CYH\Controllers\DishSystems\UIComponentsController::class,
        '\\' . \CYH\Controllers\DishSystems\ServiceProviderController::class,
        '\\' . \CYH\Controllers\DishSystems\ProductController::class
    ]),
    \CYH\Models\SitesConst::ORDER_SPECTRUM => array_merge($commonClasses, [
        '\\' . \CYH\Controllers\OrderSpectrum\SearchController::class,
        '\\' . \CYH\Controllers\OrderSpectrum\HomeController::class,
        '\\' . \CYH\Controllers\OrderSpectrum\ProductController::class,
        '\\' . \CYH\Controllers\OrderSpectrum\HomeSecurityController::class,
        '\\' . \CYH\Controllers\OrderSpectrum\UIComponentsController::class
    ]),
    \CYH\Models\SitesConst::ALARMNATION => array_merge($commonClasses, [
        '\\' . \CYH\Controllers\Alarmnation\HomeController::class,
        '\\' . \CYH\Controllers\Alarmnation\UIComponentsController::class,
        '\\' . \CYH\Controllers\Alarmnation\ProductController::class,
    ]),
    \CYH\Models\SitesConst::SATELLITEINTERNETPROS => array_merge($commonClasses, [
        '\\' . \CYH\Controllers\Satelliteinternetpros\ProductController::class,
    ]),
    \CYH\Models\SitesConst::CABLE_COUNTRY => array_merge($commonClasses, [
        '\\' . \CYH\Controllers\CableCountry\SearchController::class,
    ]),
    \CYH\Models\SitesConst::CONNECT_YOUR_CONDO => array_merge($commonClasses, [
        '\\' . \CYH\Controllers\ConnectYourCondo\SearchController::class,
        '\\' . \CYH\Controllers\ConnectYourCondo\UIComponentsController::class
    ]),
    \CYH\Models\SitesConst::CONNECT_YOUR_APARTMENT => array_merge($commonClasses, [
        '\\' . \CYH\Controllers\ConnectYourApartment\SearchController::class,
        '\\' . \CYH\Controllers\ConnectYourApartment\UIComponentsController::class
    ]),
    \CYH\Models\SitesConst::CONNECT_YOUR_MOVE => array_merge($commonClasses, [
        '\\' . \CYH\Controllers\ConnectYourMove\UIComponentsController::class
    ]),    \CYH\Models\SitesConst::CONNECT_YOUR_CREDIT => array_merge($commonClasses, [
        '\\' . \CYH\Controllers\ConnectYourCredit\EnrollController::class,
    ]),
];

\CYH\Plugins\SalCore::RegisterViewDirectories(new \CYH\Models\Core\ViewDirRegistryEntry(\CYH\Plugins\SalCore::class, __DIR__ . '/src/views/'));
\CYH\Plugins\SalCore::RegisterControllerActions(isset($classesWithActions[$context->SiteType]) ? $classesWithActions[$context->SiteType] : [], $context);

//SAL Core Menu initialization
$salAdminMenuSettings = [new \CYH\WpOptionsHandlers\Pages\GeneralOptions()];
switch ($context->SiteType)
{
    case \CYH\Models\SitesConst::CONNECT_YOUR_HOME:
        $salAdminMenuSettings = array_merge($salAdminMenuSettings,
            [
                new \CYH\WpOptionsHandlers\Pages\CachingOptions(),
                new \CYH\WpOptionsHandlers\Pages\SpSuppressionOptions(),
                new \CYH\WpOptionsHandlers\Pages\SpCatSuppressionOptions()
            ]);
        break;
    case \CYH\Models\SitesConst::CONNECT_YOUR_BENEFITS:
        $salAdminMenuSettings = array_merge($salAdminMenuSettings,
            [
                new \CYH\WpOptionsHandlers\Pages\SpSuppressionOptions(),
            ]);
        break;
}
if (count($salAdminMenuSettings) > 0)
{
    (new \CYH\WpOptionsHandlers\Menu\SalCoreSettings($salAdminMenuSettings))->EnableMenu();
}

//Ocenture Menu Initialization
$ocentureAdminMenuSettings = [];
switch ($context->SiteType)
{
    case \CYH\Models\SitesConst::CONNECT_YOUR_HOME:
    case \CYH\Models\SitesConst::CONNECT_YOUR_CREDIT:
    case \CYH\Models\SitesConst::CONNECT_YOUR_TECH_SUPPORT:

        $ocentureAdminMenuSettings = array_merge($ocentureAdminMenuSettings, [
            new CYH\WpOptionsHandlers\Pages\Ocenture\GeneralOptions()
        ]);
        break;
}

if (count($ocentureAdminMenuSettings) > 0)
{
    (new \CYH\WpOptionsHandlers\Menu\OcentureSettings($ocentureAdminMenuSettings))->EnableMenu();
}

//Group Portal Menu initialization
$groupPortalAdminMenuSettings = [];
switch ($context->SiteType)
{
    case \CYH\Models\SitesConst::CONNECT_YOUR_HOME:
    case \CYH\Models\SitesConst::CONNECT_YOUR_BENEFITS:
    $groupPortalAdminMenuSettings = array_merge($groupPortalAdminMenuSettings,
            [
                new \CYH\WpOptionsHandlers\Pages\GroupPortal\GeneralOptions(),
            ]);
        break;
}
if (count($groupPortalAdminMenuSettings) > 0)
{
    (new \CYH\WpOptionsHandlers\Menu\GroupPortalSettings($groupPortalAdminMenuSettings))->EnableMenu();
}

//Single Provider Portal Menu initialization
$singleProviderPortalAdminMenuSettings = [];
switch ($context->SiteType)
{
    case \CYH\Models\SitesConst::ORDER_SPECTRUM:
    case \CYH\Models\SitesConst::DISH_SYSTEMS:
    case \CYH\Models\SitesConst::ALARMNATION:
    case \CYH\Models\SitesConst::SATELLITEINTERNETPROS:
        $singleProviderPortalAdminMenuSettings = array_merge($singleProviderPortalAdminMenuSettings,
            [
                new \CYH\WpOptionsHandlers\Pages\SingleProvider\GeneralOptions(),
            ]);
        break;
}
if (count($singleProviderPortalAdminMenuSettings) > 0)
{
    (new \CYH\WpOptionsHandlers\Menu\SingleProviderSettings($singleProviderPortalAdminMenuSettings))->EnableMenu();
}