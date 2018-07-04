<?php do_action('\\' . \CYH\Controllers\OrderSpectrum\HomeSecurityController::class . "::RenderHeader",$spInfo); ?>
<?php do_action('\\' . \CYH\Controllers\OrderSpectrum\UIComponentsController::class . "::RenderBreadcrumbs");?>


<!-- Product Section-->
<section>

    <?php do_action('\\' . \CYH\Controllers\OrderSpectrum\UIComponentsController::class . "::RenderProductsCards",$products);?>

</section>
<div class="clearfix"></div>
<!-- End Product Section-->

<section class="why-partner">
    <div class="row">
        <div class="col-md-12">
            <?php do_action('\\' . \CYH\Controllers\Common\CommonUIComponents::class . '::RenderDescription', \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($spCat[0]->Description), 'common', 'common');  ?>

        </div>
    </div>
</section>

