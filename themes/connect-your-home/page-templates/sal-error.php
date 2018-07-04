<?php
/**
 * Template Name: SAL Error
 *
 * @package WordPress
 * @subpackage cyh
 *
 */

?>
<?php
get_header();

do_action('\\' . \CYH\Controllers\ConnectYourHome\ErrorController::class . '::SalError');

get_footer();
?>
