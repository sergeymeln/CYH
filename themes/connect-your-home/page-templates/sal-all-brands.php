<?php
/**
 * Template Name: SAL All Brands
 *
 * @package WordPress
 * @subpackage cyh
 *
 */

get_header();
try{
    if (empty(get_field('cyh_brand_id')) && empty(get_field('cyh_sp_category_id'))) {
        do_action('\CYH\Controllers\ConnectYourHome\ServiceProviderController::RenderAllServiceProviders');
    }
}
catch (Exception $ex)
{
    $settings = \CYH\WpOptionsHandlers\Pages\GeneralOptions::GetSettings();
    wp_redirect($settings['general_error_page']);
}


get_footer();