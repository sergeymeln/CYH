<?php

/*
Plugin Name: SAL Simple Group Portal
Description: Controls Simple Group Portal displaying
Version: 1.0
Author: Mykola Piatkovskyi
*/

if (!defined('WPINC')) {
    die;
}

require_once(__DIR__ . '/src/vendor/autoload.php');

register_activation_hook(__FILE__, [CYH\SimpleGroupPortal\Plugins\SalSimpleGroupPortal::class, "Install"]);
register_deactivation_hook(__FILE__, [CYH\SimpleGroupPortal\Plugins\SalSimpleGroupPortal::class, "Uninstall"]);

define('HCG_VIEWS_PATH', __DIR__ . '/src/views/');

$context = \CYH\Context\ContextProvider::GetContext(\CYH\SimpleGroupPortal\Plugins\SalSimpleGroupPortal::class);

$commonClasses = [
    '\\' . \CYH\Controllers\Notifications\AlertController::class,
    '\\' . \CYH\Controllers\Common\CommonUIComponents::class,
    '\\' . \CYH\Controllers\Common\FormRenderController::class,
    '\\' . \CYH\Controllers\Common\ScriptRenderController::class,
];

$simpleGroupPortalClasses = [
    '\\' . \CYH\SimpleGroupPortal\Controllers\SimpleGp\GroupPortalController::class,
    '\\' . \CYH\SimpleGroupPortal\Controllers\SimpleGp\UIComponentsController::class,
];

$ajaxClasses = [
    '\\' . \CYH\SimpleGroupPortal\Controllers\SimpleGp\GroupPortalAjaxController::class,
];


\CYH\Plugins\SalCore::RegisterViewDirectories(new \CYH\Models\Core\ViewDirRegistryEntry(\CYH\SimpleGroupPortal\Plugins\SalSimpleGroupPortal::class, __DIR__ . '/src/views/', [CYH\Plugins\SalCore::class]));
\CYH\SimpleGroupPortal\Plugins\SalSimpleGroupPortal::RegisterControllerActions(array_merge($commonClasses, $simpleGroupPortalClasses), $context);

//Simple Group Portal Menu initialization
$groupPortalAdminMenuSettings = [new \CYH\SimpleGroupPortal\WpOptionsHandlers\Pages\GeneralOptions()];

if (count($groupPortalAdminMenuSettings) > 0) {
    (new \CYH\SimpleGroupPortal\WpOptionsHandlers\Menu\SimpleGroupPortalSettings($groupPortalAdminMenuSettings))->EnableMenu();
}


