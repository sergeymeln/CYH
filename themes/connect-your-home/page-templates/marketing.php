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
use CYH\Marketing\Types\StatisticsEventType;

$generalOptions = GeneralOptions::GetSettings();
if ($generalOptions['sal_enable_statistic']) {
    $statService = StatisticsService::getInstance();
    $statService->addObject(StatisticsEventType::PAGE_GENERATION_START, microtime(true));
}

get_header('sal');

try{
    do_action('\\' . CYH\Marketing\Controllers\ConnectYourHome\MarketingsController::class . '::RenderMarketing', $generalOptions['sal_enable_statistic']);
}
catch (Exception $ex)
{
    $settings = \CYH\WpOptionsHandlers\Pages\GeneralOptions::GetSettings();
    wp_redirect($settings['general_error_page']);
}
get_footer('sal');

if ($generalOptions['sal_enable_statistic']) {
    $statService->addObject(StatisticsEventType::VIEW_RENDERING_COMPLETE, microtime(true));
    $statService->insertStatistics();
}
