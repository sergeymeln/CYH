<?php
/**
 * Template Name: SAL City Marketing
 *
 * @package WordPress
 * @subpackage cyh
 *
 */
use CYH\Marketing\Services\StatisticsService;
use CYH\WpOptionsHandlers\Pages\GeneralOptions;
$generalOptions = GeneralOptions::GetSettings();

$collectStats = false;
if (isset($generalOptions['sal_enable_statistic']) && $generalOptions['sal_enable_statistic'] == 'on') {
    $collectStats = true;
    $statService = StatisticsService::getInstance();
    $statService->addObject(1, microtime(true));
}


get_header('sal');

try{
    do_action('\\' . CYH\Marketing\Controllers\ConnectYourHome\MarketingsController::class . '::RenderMarketing', $collectStats);
}
catch (Exception $ex)
{
    $settings = \CYH\WpOptionsHandlers\Pages\GeneralOptions::GetSettings();
    wp_redirect($settings['general_error_page']);
}
get_footer('sal');

if (isset($generalOptions['sal_enable_statistic']) && $generalOptions['sal_enable_statistic'] == 'on') {
    $statService->addObject(5, microtime(true));
    $statService->insertStatistics();
}
