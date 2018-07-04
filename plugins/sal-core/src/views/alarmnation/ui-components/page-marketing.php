<?php /* @var $spInfo \CYH\Models\ServiceProvider */ ?>
<?php
do_action('\\' . \CYH\Controllers\Alarmnation\UIComponentsController::class . "::RenderMenu",$spInfo);
$formattedPhone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($spInfo->Phone->Number);
?>
<section class="hero">
    <div class="row">
        <div class="col-md-12">
            <div class="masthead">
                <?php $hero_image = get_field('marketing_hero');?>
                <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt'] ?>" />
            </div>
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
</section>
<section class="why-partner">
    <div class="row">

        <div class="col-md-12">
            <div class="ticker">
                <?php the_field('homepage_marquee'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <h2 class="home-align">
                <?php echo the_field('main_headline'); ?>
            </h2>
            <?php if (have_posts()) : while (have_posts()) : the_post();?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
    <?php

    $counter = 2;

    // check if the repeater field has rows of data
    if( have_rows('marketing_columns') ):

        // loop through the rows of data
        while ( have_rows('marketing_columns') ) : the_row();

            if($counter % 2 == 0){ ?>
                <div class="row">
                    <div class="col-md-6" style="">
                        <?php $img = get_sub_field('column_picture');?>
                        <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" />
                    </div>
                    <div class="col-md-6 column-text">
                        <?php echo the_sub_field('column_text'); ?>
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <hr/>
                </div>
                <?php $counter++;} else{  ?>
                <div class="row">
                    <div class="col-md-6 pull-right" style="">
                        <?php $img = get_sub_field('column_picture');?>
                        <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" />
                    </div>
                    <div class="col-md-6 column-text">
                        <?php echo the_sub_field('column_text'); ?>
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <hr/>
                </div>
                <?php $counter++;}
        endwhile;

    else :

        // no rows found

    endif;

    ?>
</section>

<!-- Help Protect your family Section -->
<?php do_action('\\' . \CYH\Controllers\Alarmnation\UIComponentsController::class . "::RenderHelpProtectYouFamily",$spInfo); ?>
<!-- End Help Protect your family Section-->

<!-- Legal Section-->
<?php do_action('\\' . \CYH\Controllers\Alarmnation\UIComponentsController::class . "::RenderLegal",$spInfo); ?>
<!--  End Legal Section-->