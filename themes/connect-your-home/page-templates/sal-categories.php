<?php
/**
 * Template Name: SAL Category Service Providers
 *
 * @package WordPress
 * @subpackage cyh
 *
 */

get_header();
try{
    if (!empty(get_field('cyh_category_id'))) {
        do_action('\CYH\Controllers\ConnectYourHome\ServiceProviderController::RenderCategoryServiceProviders');
    }
}
catch (Exception $ex)
{
    $settings = \CYH\WpOptionsHandlers\Pages\GeneralOptions::GetSettings();
    wp_redirect($settings['general_error_page']);
}

get_footer();