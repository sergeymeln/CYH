<?php /* @var $spCatInfo \CYH\Models\ServiceProvider  */ ?>
<?php do_action('\\' . \CYH\Controllers\OrderSpectrum\ProductController::class . "::RenderHeader",$spInfo); ?>
<?php do_action('\\' . \CYH\Controllers\OrderSpectrum\UIComponentsController::class . "::RenderHeroImage",$spInfo);?>


<?php do_action('\\' . \CYH\Controllers\OrderSpectrum\UIComponentsController::class . "::RenderBreadcrumbs");?>

<section class="services">
    <div class="row">
        <div class="col-md-12">
            <div class="ticker">
                <?php the_field('homepage_marquee'); ?>
            </div>
        </div>
    </div>
    <div class="row service-head">
        <div class="col-md-12">
            <h2 class="home-align">
                <?php  echo $spCat[0]->Name; ?>
            </h2>
            <div class="col-md-10 col-md-offset-1">
                <p>
                    <?php echo $spCat[0]->Tagline; ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Product Section-->
<section>
<?php do_action('\\' . \CYH\Controllers\OrderSpectrum\UIComponentsController::class . "::RenderProductsCards",$products);?>

</section>
<div class="clearfix"></div>
<!-- End Product Section-->


<section class="why-partner">
    <div class="row">
        <div class="col-md-12">
            <h2 class="home">
                <?php echo $spCat[0]->Name ." Features"; ?>
            </h2>
            <?php do_action('\\' . \CYH\Controllers\Common\CommonUIComponents::class . '::RenderDescription', \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($spCat[0]->Description), 'common', 'orderspectrum');  ?>
        </div>
    </div>

</section>


<div class="col-md-12">
    <p><small class="disclaimer"><?php the_field('disclaimer_on_page_copy') ?></small></p>
    <section class='disclaimer'>
        <button type="button" class="btn btn-info btn-md pull-right" id="myBtn">
            Terms & Conditions
        </button>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            Terms & Conditions
                        </h4>
                    </div>
                    <div class="modal-body">
                        <!-- All Modal content go from here-->
                        <p class='disclaimerHolder'>
                           <?php echo $spCat[0]->Legal; ?>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

