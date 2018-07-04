<?php
/*
*
* Template Name: EDP - Register
*
*/
?>

<?php get_header('edp-dynamic');

try {
    do_action('\\' . \CYH\Controllers\GroupPortal\AuthenticationController::class . '::RenderRegistration');
} catch (Exception $ex) {
    wp_redirect('/');
    exit;
}

wp_footer();
//Initializing additional required scripts
wp_enqueue_script('jquery-mask');
wp_enqueue_script('jquery-validator');
wp_enqueue_script('gp-loadingoverlay');
wp_enqueue_script('gp-helper-classes');
wp_enqueue_script('gp-helper-methods');
get_footer('group-portal');
?>