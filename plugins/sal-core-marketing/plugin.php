<?php

/*
Plugin Name: Connect Your Home City Marketing
Description: Adds City Marketing functionality
Version: 1.0
Author: Mykola Piatkovskyi
*/

if (!defined('WPINC')) {
    die;
}

global $table_prefix;

define('CYH_TABLE_PREFIX', $table_prefix);
define('CYH_MARKETING_FILES_DIR', __DIR__ . '/files');
require_once(__DIR__ . '/src/vendor/autoload.php');
require_once(__DIR__ . '/../sal-core/src/vendor/autoload.php');
$context = \CYH\Context\ContextProvider::GetContext(\CYH\Marketing\Plugins\SalCoreMarketing::class);

$availableClasses = [
    '\\' . \CYH\Marketing\Controllers\ConnectYourHome\MarketingsController::class,
    '\\' . \CYH\Marketing\Controllers\ConnectYourHome\AjaxController::class,
    '\\' . \CYH\Marketing\Controllers\ConnectYourHome\TermsAndConditionsController::class,
];

\CYH\Plugins\SalCore::RegisterViewDirectories(new \CYH\Models\Core\ViewDirRegistryEntry(\CYH\Marketing\Plugins\SalCoreMarketing::class, __DIR__ . '/src/views/', [CYH\Plugins\SalCore::class]));
\CYH\Plugins\SalCore::RegisterControllerActions($availableClasses, $context);

add_action( 'gm_virtual_pages', function( $controller ) {
    //$urlHelper = new \CYH\Marketing\Helpers\WPSQLImporter();
    //$urlHelper->getProdIds();exit;

    $marketingService = new \CYH\Marketing\Services\MarketingService();
    if(preg_match('/\/internet\/[a-z]{1,}\/[a-zA-Z-]{1,}\/{0,1}$/', $_SERVER['REQUEST_URI'])) {
        $urlHelper = new \CYH\Marketing\Helpers\UrlHelper();
        $cityData = $urlHelper->getCityFromUrl();
        if ($cityData !== false) {
            $title = $marketingService->getCityTitle($cityData);
            $controller->addPage( new \GM\VirtualPages\Page( $_SERVER['REQUEST_URI'] ) )
                ->setTitle($title)
                ->setTemplate( 'page-templates/marketing.php' );
            $desc = $marketingService->getCityDescription($cityData);
            add_filter("wpseo_metadesc", function() use ($desc){
                return $desc;
            });
        }

    }

    if(preg_match('/\/offers-terms-and-conditions/', $_SERVER['REQUEST_URI'])) {
        $title = $marketingService->getTermsTitle();
        $controller->addPage( new \GM\VirtualPages\Page( '/offers-terms-and-conditions' ) )
            ->setTitle($title)
            ->setTemplate( 'page-templates/marketing-terms.php' );
        $desc = $marketingService->getTermsDescription();
        add_filter("wpseo_metadesc", function() use ($desc){
            return $desc;
        });
    }

} );

add_action( 'wp_ajax_cyh_find_city', function(){
    do_action(  '\\' . CYH\Marketing\Controllers\ConnectYourHome\AjaxController::class . '::GetCityByZip' );
} );
add_action( 'wp_ajax_nopriv_cyh_find_city', function(){
    do_action(  '\\' . CYH\Marketing\Controllers\ConnectYourHome\AjaxController::class . '::GetCityByZip' );
} );

add_action( 'wp_ajax_cyh_show_brand_data', function(){
    do_action(  '\\' . CYH\Marketing\Controllers\ConnectYourHome\AjaxController::class . '::GetBrandHtml' );
    wp_die();
} );
add_action( 'wp_ajax_nopriv_cyh_show_brand_data', function(){
    do_action(  '\\' . CYH\Marketing\Controllers\ConnectYourHome\AjaxController::class . '::GetBrandHtml' );
    wp_die();
} );

//SEO setup

add_filter( 'wpseo_sitemap_index', \CYH\Marketing\Helpers\SeoMarketingHelper::class . '::AddMarketingSitemap' );

add_action( 'init', \CYH\Marketing\Helpers\SeoMarketingHelper::class . '::InitSitemapActions' );