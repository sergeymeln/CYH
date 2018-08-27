<?php
/**
 * Template Name: Home landing
 *
 * @package WordPress
 * @subpackage cyh
 *
 */
get_header('sal-land');

try{
    do_action('\\' . CYH\Controllers\ConnectYourHome\PageController::class . '::RenderLanding');
}
catch (Exception $ex)
{
    $settings = \CYH\WpOptionsHandlers\Pages\GeneralOptions::GetSettings();
    wp_redirect($settings['general_error_page']);
}
get_footer('sal-land');
