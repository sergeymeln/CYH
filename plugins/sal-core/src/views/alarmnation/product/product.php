<?php /* @var $spInfo \CYH\Models\ServiceProvider */ ?>
<?php
do_action('\\' . \CYH\Controllers\Alarmnation\UIComponentsController::class . "::RenderMenu",$spInfo);
$formattedPhone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($spInfo->Phone->Number);
?>
<!-- Header -->
<section class="hero">
    <div class="row">
        <div class="col-md-12">
            <div class="masthead">
                <?php $hero_image = get_field('brand_hero');?>
                <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt'] ?>" />
            </div>
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
</section>

<div class="col-md-12">
    <div class="ticker">
    </div>
</div>

<section class="why-partner">
    <?php the_content(); ?>
</section>

<section>
    <div class="container pricing-wrap">
        <div class="row">
            <?php $rowCounter = 1;
                foreach ($products as $product):
                    /* @var $product \CYH\Models\Product */
                    ?>
                    <div class="col-md-3">
                        <div class="pricing-table">
                            <h3 class="plan-title"><strong><?php echo $product->Name; ?> </strong></h3>
                            <?php if(!empty($product->Price)) { ?>
                            <div class="plan-price">
                                <span class="alarmnation-price"><?php echo $product->PriceDescriptionBegin; ?></span><br><h6 style="text-align: center"> $<?php echo $product->Price; ?></h6><span class="alarmnation-price"><?php echo $product->PriceDescriptionEnd;?></span><br>
                                <br>
                            </div>
                            <?php } ?>
                        </div>

                            <?php do_action('\\' . \CYH\Controllers\Common\CommonUIComponents::class . '::RenderDescription', \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($product->Description), 'common', 'alarmnation');  ?>

                        <?php
                             ++$rowCounter;
                             if ($rowCounter >4){
                                 $rowCounter = 1;
                        ?>
                    </div><div class="row">
                    <?php } ?>
                    </div>
                <?php endforeach;  ?>
        </div>
    </div>
</section>

<!-- Help Protect your family Section -->
<?php do_action('\\' . \CYH\Controllers\Alarmnation\UIComponentsController::class . "::RenderHelpProtectYouFamily",$spInfo); ?>
<!-- End Help Protect your family Section-->

<!-- Legal Section-->
<?php do_action('\\' . \CYH\Controllers\Alarmnation\UIComponentsController::class . "::RenderLegal",$spInfo); ?>
<!--  End Legal Section-->

