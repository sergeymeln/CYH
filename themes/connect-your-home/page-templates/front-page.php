<?php
/**
 * Template Name: Front page
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */

?>


<?php //get_header(); ?>
    <section class="hero">
        <div class="row">
            <div class="col-md-12">
                <div class="masthead">
                    <?php $hero_image = get_field('homepage_hero'); ?>
                    <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt'] ?>" />
                    <div class="masthead-widget">
                        <p>
                            Find Home Services. Find Deals. Right Here.
                        </p>
                        <form style="color: black"  onsubmit="return false;">
                                    <input class="testing input address-100%complete" type="form-control" name="search" id="homeSearch" placeholder="Enter address" >
                                <button class="btn btn-orange search-button">Go!</button>                             
                            <!-- <input class="btn btn-orange" type="submit"> -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </section>

    <?php include('animated-logos.php');?>
    <hr/>

    <section class="how-it-works">
        <div class="row">
            <div class="col-md-12">
                <div class="mast">
                    <h2>
                        <?php the_field('homepage_video_heading'); ?>
                    </h2>
                    <p>
                        <?php the_field('homepage_video_heading_copy'); ?>
                    </p>
                </div>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <div class="row">
            <div class="wrapper">
                <div class="youtube" data-embed="GRmJlOSwFwQ">
                    <div class="play-button"></div>
                </div>
            </div>           
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <ol class="step-list">
                    <div class="col-md-4 text-center">
                        <h2 class="steps-digits">1:</h2>
                        <h4 class="steps-head">
                            <?php the_field('homepage_step_1'); ?>
                        </h4>
                        <p>
                            <?php the_field('homepage_step_1_content'); ?>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                    
                        <h2 class="steps-digits">2:</h2>
                        <h4 class="steps-head">
                            <?php the_field('homepage_step_2'); ?>
                        </h4>
                        <p>
                            <?php the_field('homepage_step_2_content'); ?>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                    
                        <h2 class="steps-digits">3:</h2>
                        <h4 class="steps-head">
                            <?php the_field('homepage_step_3'); ?>
                        </h4>
                        <p>
                            <?php the_field('homepage_step_3_content'); ?>
                        </p>
                    </div>
                </ol>
            </div>
            
        </div>
       
    </section>
    <hr/>
    <!-- <section class="connected">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    Get Your Whole House Connected
                </h2>
                <div class="scraper-left">
                    <h3>
                        More Choices.
                        <br /> 
                        More Savings.
                        <br />
                        Just one Call.
                    </h3>
                    <h4>
                        Connect everything in one call.
                    </h4>
                    <?php $price_image = get_field('tv_packages_price_graphic'); ?>
                    <img class="offer" src="<?php echo $price_image['url']; ?>" alt="<?php echo $price_image['alt'] ?>" />
                </div>
                <div class="scraper-right">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/whole-house.jpg" alt="">
                </div>
            </div>
        </div>
    </section> -->
    <section class="brands">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h2>
                            Top Brands to Serve You
                        </h2>
                    </div>
                </div>
                <div class="row brand-logos">
                    <div class="col-md-12">
                        <?php
                        $iconCounter = 0;
                        // check if the repeater field has rows of data
                        if( have_rows('brand_images') ):
                            ?>
                        <div class="row">
                            <?php
                                // loop through the rows of data
                                while ( have_rows('brand_images') ) : the_row();
                                    ?>
                                    <div class="col-sm-3">
                                        <a href="<?php echo the_sub_field('home_brand_link');?>" target="_blank">
                                            <img src="<?php echo the_sub_field('home_image_upload');?>" alt="<?php echo the_sub_field('brand_alt_tag');?>">
                                        </a>
                                    </div>   
                                    <?php 
                                        $iconCounter++;
                                        if($iconCounter == 4) { ?>
                                            </div><div class="row">
                                            <?php }
                                endwhile;
                                else :
                                endif;
                            ?>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
        <div class="row service-cta">
            <div class="col-md-12">
                <a href="/brands" class="btn btn-success btn-lg" style="width: auto;display: inline-block;">
                    Review Services Now
                </a>
            </div>
        </div>
        
    </section>

    <hr/>    
<section class="interactive-checklist-cta" style="display:inline-block; padding-bottom: 70px;">
    <div class="col-md-6" style="margin-top: 30px;">
        <h2 class="text-center">Interactive Moving Checklist</h2>
        <p>Here at Connect Your Home&reg;, we want to help you with your move. That's why we built an <a href="/interactive-moving-checklist">interactive moving checklist</a> to let you keep track of some of the steps needed for a successful move.</p>
        <hr/>
        <p>This moving application stores your current progress in your browser so you know right where you left off.</p>
        <hr/>
        <p class="text-center">
            <a href="/interactive-moving-checklist" class="btn btn-lg btn-success" style="background-color: #6CB33F; background-image: none; border: none;">Interactive Moving Checklist</a>
        </p>
    </div>
    <div class="col-md-6">
        <p>
            <img src="<?php echo get_template_directory_uri(); ?>/images/interactive-moving-checklist.gif"></p>
    </div>
</section>    

<div class="clearfix"></div>
<div class="col-md-12">
    <?php ..get_footer('home'); ?>
</div>
