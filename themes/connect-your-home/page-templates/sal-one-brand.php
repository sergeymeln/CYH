<?php
/**
 * Template Name: SAL One Brand
 *
 * @package WordPress
 * @subpackage cyh
 *
 */

get_header();
try{
    if (!empty(get_field('cyh_brand_id')) && !empty(get_field('cyh_sp_category_id'))) {
        do_action('\CYH\Controllers\ConnectYourHome\ServiceProviderController::RenderServiceProviderCatProducts');
    }
    if (!empty(get_field('cyh_brand_id')) && empty(get_field('cyh_sp_category_id'))) {
        do_action('\CYH\Controllers\ConnectYourHome\ServiceProviderController::RenderServiceProviderCategories');
    }
}
catch (Exception $ex)
{
    $settings = \CYH\WpOptionsHandlers\Pages\GeneralOptions::GetSettings();
    wp_redirect($settings['general_error_page']);
}

get_footer();