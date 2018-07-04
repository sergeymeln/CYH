<?php
/*
 *
 * Template Name: EDP - My Account
 *
 */

?>

<?php get_header('edp-dynamic');

try {
    do_action('\\' . \CYH\Controllers\GroupPortal\GroupPortalController::class . '::RenderHome');
} catch (\CYH\Sal\Exceptions\AuthenticationSalException $ex) {
    \CYH\Helpers\FlashMessageHelper::SetMessage("session-expired", "The session has expired");
    wp_redirect(\CYH\Helpers\LinkHelper::AppendQueryParams( \CYH\WpOptionsHandlers\Pages\GroupPortal\GeneralOptions::GetSettings()['gp_folder'], [
        'groupId' => \CYH\Context\ContextProvider::GetContext()->Request['groupId'],
        'salAction' => 'session-expired'
    ]));
    exit;
} catch (Exception $ex) {
    wp_redirect('/');
    exit;
}

wp_footer();
//Initializing additional required scripts
wp_enqueue_script('gp-helper-classes');
wp_enqueue_script('gp-helper-methods');
get_footer('group-portal');
?>
