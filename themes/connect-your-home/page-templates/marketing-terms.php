<?php
/**
 * Template Name: SAL City Marketing Terms And Conditions
 *
 * @package WordPress
 * @subpackage cyh
 *
 */

get_header('sal');

try{
    do_action('\\' . CYH\Marketing\Controllers\ConnectYourHome\TermsAndConditionsController::class . '::RenderTerms');
}
catch (Exception $ex)
{
    $settings = \CYH\WpOptionsHandlers\Pages\GeneralOptions::GetSettings();
    wp_redirect($settings['general_error_page']);
}
get_footer('sal');
