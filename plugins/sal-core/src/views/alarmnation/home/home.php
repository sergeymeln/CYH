<?php /* @var $spInfo \CYH\Models\ServiceProvider */ ?>
<?php
do_action('\\' . \CYH\Controllers\Alarmnation\UIComponentsController::class . "::RenderMenu",$spInfo);
$formattedPhone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($spInfo->Phone->Number);
?>

<?php do_action('\\' . \CYH\Controllers\Alarmnation\HomeController::class . "::RenderHeroImage",$spInfo); ?>

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
            <h1>
                <?php the_field('homepage_heading'); ?>
            </h1>
            <div class="col-md-10 col-md-offset-1">
                <p>
                    <?php the_field('homepage_heading_strapline'); ?>
                </p>
            </div>
        </div>
    </div>
    <hr/>
</section>
<section class="why-partner">
    <div class="row">
        <?php $image1 = get_field('homepage_image_1');?>
        <div class="col-md-6 col-sm-6">
            <img class="homepage-image1" src="<?php echo $image1['url']; ?>">
        </div>
        <div class="col-md-6 col-sm-6 homepage-content">
            <?php if (have_posts()) : while (have_posts()) : the_post();?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
    <hr/>
</section>