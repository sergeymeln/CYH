<?php
/**
 * Template Name: HOMES DOT COM LANDER
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */
?>

<?php get_header('homes-new'); ?>
    <section class="hero">
        <div class="row">
            <div class="col-md-12">
                <div class="masthead">
                    <?php $hero_image = get_field('homepage_hero');?>
                    <a href="<?php get_field('hero_link'); ?>">
                        <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt'] ?>" />
                    </a>

                </div>
            </div>
        </div>
    </section>
    <section class="above-fold-features visible-lg visible-md">
        <?php
            if( have_rows('subhead_offers') ):
                while ( have_rows('subhead_offers') ) : the_row();
                   $sub_field_image = get_sub_field('offer_image');?>
                    <div class="col-xs-3 abv-fold-feature-cell">
                        <a href="<?php echo the_sub_field('offer_link'); ?>">
                                <h4 class="offer-module" style="font-size: 14px; padding: 0px; padding-top: 10px;">
                                    <?php the_sub_field('offer_title'); ?>
                                </h4> 
                            <div class="col-xs-7">
                                <div class="image-holder-fold">
                                    <img src="<?php echo $sub_field_image["url"];?>">
                                </div>
                            </div> 
                            <div class="col-xs-5" style="padding: 0px;">
                                <p style="font-size: 10px; color: #333; padding: 0px; padding-top: 10px;">
                                    <?php the_sub_field('offer_subtitle'); ?>
                                </p> 
                            </div>  
                        </a>       
                </div>         


                    <?php
                endwhile;
            else :
            endif;
            ?>    
    </section>
    <div class="clearfix"></div>
    <br/>
    <section class="deals-holder">
        <!-- <h2 class="text-center">Choose Your Perfect DISH Network Package</h2> -->
        <?php
        if( have_rows('deals') ):
            while ( have_rows('deals') ) : the_row();
                   $channel_logos = get_sub_field('channel_logos');
                ?>
                <a href="<?php echo the_sub_field('learn_more_link'); ?>">
                    <div class="col-md-3 col-sm-6 deal-module-spacer">
                        <div class="deal-module">
                            <h2 class="deal-title">
                                <?php echo the_sub_field('deal_title'); ?>
                            </h2>
                            <div class="sub-title">
                                <strong class="price">
                                    <span style="font-size: 60px; position: absolute;left: -36px;top: 20px;">$</span>
                                    <?php echo the_sub_field('deal_price'); ?><span class="tens">99</span><span class="month">mo</span></strong>
                            <br/>
                            <p>
                                <hr style="border-color: darkgray"/>
                                    <h4>
                                        <?php echo the_sub_field('channel_count'); ?>
                                    </h4>
                            </p>
                            <div class="write-up-container">
                                <p class="write-up">
                                    <?php echo the_sub_field('deal_writeup'); ?>
                                </p>
                            </div>
                            <div style="min-height: 190px;">
                                <hr style="border-color: darkgray"/>
                                <p>
                                    <img src="<?php echo $channel_logos['url']; ?>" alt="<?php echo $channel_logos['alt'] ?>" />
                                </p>
                            </div>
                            <br/>
                                <a class="learn-more-button" href="<?php echo the_sub_field('learn_more_link'); ?>">Call Now To Order</a>
                            </div>
                        </div>
                    </div>
                </a>
                <?php
            endwhile;
        else :
        endif;
        ?>    
        <div class="clearfix"></div>
        
    </section>  
    <section class="phone">
        <div class="row text-center">
            <div class="text-center footer-cta">
            <span class="phone-label">Call Now To Order:</span>
                <?php
                if(get_field('affiliate_phone')){ ?>
                    <a href="tel:<?php echo get_field('affiliate_phone');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Home - Foot');" class="phone-number btn btn-success phone-button btn-custom" style="margin-bottom: 15px;">
                    <?php
                        echo get_field('affiliate_phone');
                }?>
                    </a>        
            </div>
        </div>
    </section>
    <section class="subhero">
        <div class="row">
            <div class="col-md-12">
                <div class="masthead">
<a href="//www.jdoqocy.com/6p70dlurlt8HAHGAFB8ABFHEA9G" target="_top" onmouseover="window.status='http://www.sling.com';return true;" onmouseout="window.status=' ';return true;">
<img src="//www.lduhtrp.net/k9122jy1qwuFOHONHMIFHIMOLHGN" alt="" border="0"/></a>
                </div>
            </div>
        </div>
    </section>  
<?php include 'modal-form.php' ?>
<div class="col-md-12">
    <?php get_footer('homes-dot-com'); ?>
</div>
