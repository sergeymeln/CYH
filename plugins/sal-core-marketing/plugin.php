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
];

\CYH\Plugins\SalCore::RegisterViewDirectories(new \CYH\Models\Core\ViewDirRegistryEntry(\CYH\Marketing\Plugins\SalCoreMarketing::class, __DIR__ . '/src/views/', [CYH\Plugins\SalCore::class]));
\CYH\Plugins\SalCore::RegisterControllerActions($availableClasses, $context);

add_action( 'gm_virtual_pages', function( $controller ) {

    if(preg_match('/\/internet\/[a-z]{1,}\/[a-zA-Z-]{1,}\/{0,1}$/', $_SERVER['REQUEST_URI'])) {
        $urlHelper = new \CYH\Marketing\Helpers\UrlHelper();
        $marketingService = new \CYH\Marketing\Services\MarketingService();
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

} );

add_action( 'wp_ajax_cyh_find_city', 'cyh_find_city' );
add_action( 'wp_ajax_nopriv_cyh_find_city', 'cyh_find_city' );
function cyh_find_city() {
    if (array_key_exists('zip_code', $_POST)) {
        $marketingService = new \CYH\Marketing\Services\MarketingService();
        $result = $marketingService->getCityByZip($_POST['zip_code']);
        if(is_array($result) && count($result)> 0) {
            $data = ['result' => 'success', 'link' => '/internet/'.strtolower($result['state_code']).'/'.$result['city_name']];
        } else {
            $data = ['result' => 'failure', 'link' => ''];
        }

        echo wp_json_encode($data);
        wp_die();
    }
}

add_action( 'wp_ajax_cyh_show_brand_data', 'cyh_show_brand_data' );
add_action( 'wp_ajax_nopriv_cyh_show_brand_data', 'cyh_show_brand_data' );
function cyh_show_brand_data() {
    if (array_key_exists('brand_id', $_POST)) {
        $brandId = (int)$_POST['brand_id'];
        $marketingService = new \CYH\Marketing\Services\MarketingService();
        $result = $marketingService->getBrandHtml($brandId);
        if($result !== false) {
            //$data = ['result' => 'success', 'data' => htmlentities($result, ENT_QUOTES)];
            $data = ['result' => 'success', 'data' => $result];
        } else {
            $data = ['result' => 'failure', 'data' => null];
        }

        echo wp_json_encode($data);
        wp_die();
    }
}