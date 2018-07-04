<?php
/**
 * Template Name: Results
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */
?>

<?php
get_header();

try{
    do_action('\CYH\Controllers\ConnectYourHome\ServiceProviderController::RenderAddressSearch');
}
catch (Exception $ex)
{
    $settings = \CYH\WpOptionsHandlers\Pages\GeneralOptions::GetSettings();
    wp_redirect($settings['general_error_page']);
}

get_footer();

