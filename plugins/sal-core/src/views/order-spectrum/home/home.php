<?php
do_action('\\' . \CYH\Controllers\OrderSpectrum\HomeController::class . "::RenderHeader",$spInfo);
$formattedPhone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($spInfo->Phone->Number);
?>
    <section class="hero">
        <div class="row">
            <div class="col-md-12">
                <div class="masthead">
                    <?php
                    $hero_image = get_field('homepage_hero');
                    ?>
                    <?php if (isset($spInfo->HeroImage)) {?>

                        <img src="<?php echo $spInfo->HeroImage; ?>" alt="" />

                    <?php } else {?>

                    <img src="<?php echo $hero_image["url"]; ?>" alt="<?php echo $hero_image['alt'] ?>" />

                    <?php } ?>
                   
                </div>
            </div>
        </div>
    </section>
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
    </section>
    <section>

        <?php do_action('\\' . \CYH\Controllers\OrderSpectrum\UIComponentsController::class . "::RenderProductsCards",$products);?>

    </section>
    <section>

        <?php do_action('\\' . \CYH\Controllers\OrderSpectrum\HomeController::class . "::RenderBottomInfo",$spInfo);?>

    </section>

