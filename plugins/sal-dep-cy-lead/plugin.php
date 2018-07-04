<?php

/*
Plugin Name: Connect Your Lead Customizations
Description: Adds CYLeads-specific functionality
Version: 1.0
Author: Mykola Piatkovskyi
*/

if (!defined('WPINC')) {
    die;
}

require_once(__DIR__ . '/src/vendor/autoload.php');
$pluginKey = 'CYL-Customizations'; //TODO: Replace wiht actual class for plugin
$context = \CYH\Context\ContextProvider::GetContext($pluginKey);

$availableClasses = [
    '\\' . \CYH\ConnectYourLeads\Controllers\UIComponentsController::class,
];

\CYH\Plugins\SalCore::RegisterViewDirectories(new \CYH\Models\Core\ViewDirRegistryEntry($pluginKey, __DIR__ . '/src/views/'));
\CYH\Plugins\SalCore::RegisterControllerActions($availableClasses, $context);

$filesDir = __DIR__ . '/files';
add_shortcode( 'negative-keywords', function($atts) use ($filesDir)
{
    $negativeKeywordsFile = $filesDir . '/negative-keywords.csv';
    ob_start();
    do_action('\\' . \CYH\ConnectYourLeads\Controllers\UIComponentsController::class . '::RenderNegativeKeywords', $negativeKeywordsFile);
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
});
