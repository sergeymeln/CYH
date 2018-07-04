<!-- This is the page specific wrapping class -->
<div class="all-results">
    <?php do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderHero', $hero); ?>


    <section class="all-brands-header">
        <?php do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderBreadcrumbs'); ?>
        <?php do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderHeaderSection', $header); ?>
    </section>
    <!-- /.all-brands-header -->


    <?php do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderGrid', $list); ?>
    <!-- /.all-brand-grid -->

</div>
<!-- /.all-results -->
<?php do_action('cyh.renderGetAQuoteModalForm', 'ClicktoCall - Modal Form') ?>

