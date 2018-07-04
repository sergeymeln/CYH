<!-- This is the page specific wrapping class -->
<div class="all-results">
    <?php do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderHero', $hero); ?>


    <section class="all-brands-header">
        <?php do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderBreadcrumbs'); ?>
        <?php do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderHeaderSection', $header); ?>
    </section>
    <!-- /.all-brands-header -->


    <?php
    if (!empty($list)) {
        do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderGrid', $list);
    } else {
        do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderContentNotFound ', \CYH\ViewModels\ContentNotFound::GetModel(\CYH\Models\Core\ResultCodes::ERROR, 'We were unable to load the content. Please try again later and if the issue persists please contact us'));
    }
    ?>

</div>
<!-- /.all-results -->
<?php do_action('cyh.renderGetAQuoteModalForm', 'ClicktoCall - Modal Form') ?>

