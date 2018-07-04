<?php
/*
 *
 * Template Name: EDP - Guest Login
 *
 */
?>

<?php get_header('edp-dynamic');

try {
    do_action('\\' . \CYH\Controllers\GroupPortal\AuthenticationController::class . '::RenderGuestLogin');
} catch (Exception $ex) {
    wp_redirect('/');
    exit;
}

wp_footer();
//Initializing additional required scripts
wp_enqueue_script('jquery-mask');
wp_enqueue_script('jquery-validator');
wp_enqueue_script('gp-loadingoverlay');
wp_enqueue_script('gp-helper-methods');
get_footer('group-portal');
?>