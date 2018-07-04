<?php
/* @var $hero \CYH\ViewModels\UI\HeroItem */
/* @var $header \CYH\ViewModels\UI\HeaderSectionItem */
/* @var $list \CYH\ViewModels\UI\SimpleListItem */
/* @var $disclaimer \CYH\ViewModels\UI\DisclaimerItem */
?>

    <div class="one-brand">
        <?php do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderHero', $hero); ?>

        <section class="breadcrumb-holder">
            <?php do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderBreadcrumbs'); ?>
        </section>

        <section class="one-brand-header">
            <?php do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderHeaderSection', $header); ?>
        </section>

        <?php do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderSimpleList', $list); ?>

        <?php do_action('\CYH\Controllers\ConnectYourHome\UIComponentsController::RenderDisclaimerFooter', $disclaimer); ?>

    </div>
