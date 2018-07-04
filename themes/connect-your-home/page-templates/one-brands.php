<?php
    /**
     * Template Name: One Brand
     *
     * @package WordPress
     * @subpackage cyh
      * 
     */
    $counter = 0;
    $linkCounter = 0;

    // require_once './library/Campaign.php';

    // $brand  = get_field('brand');
    // $type   = get_field('promotion_type');
     $group  = get_field('promotion_group_1');

    // $campaigns = Campaign::getCampaigns($brand, $group, $type);
    // $provider  = Campaign::getProvider($brand);
    // $promotionType = Campaign::getPromotionType($type);

     $field = get_field_object('promotion_group_1');
     $value = get_field('brand');
     $label = $field['choices'][ $group ];

     // $icon = get_field('icon_select_image');
     // echo "<pre>";
     // print_r($icon['url']);
     // echo "</pre>";
?>


<?php get_header(); ?>
 

<div class="one-brand">
    <div class="bottom-border">
        <div class="col-md-8 brand-intro hero-holder">
            <div class="masthead">
                <?php $hero_image = get_field('bundle_hero'); ?>
                <img src="<?php echo $hero_image['url']; ?>" alt="">
            </div>
        </div>
        <div class="col-md-4 brand-intro">
            <div class="masthead">
                <div class="banner-msg">
                    <h2><?php the_field('brand_heading');?></h2>
                    <?php
                    // check if the repeater field has rows of data
                    if( have_rows('one_brand_feature_list') ):
                        // loop through the rows of data
                        while ( have_rows('one_brand_feature_list') ) : the_row();
                    ?>
                    <ul>
                        <li>
                    <?php
                            // display a sub field value
                            the_sub_field('feature'); ?>
                        </li>
                    </ul>
                    <?php
                        endwhile;

                    else :
                        // no rows found
                    endif;

                    ?>                    
                    <p>
                        <?php the_field('brand_copy');?>
                    </p>
                    <div class="row service-cta">
                       <div class="col-md-12 ">
                            <?php
                            if(get_field('edp_brand_phone')){ ?>
                                <a href="tel:<?php echo get_field('edp_brand_phone', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - One Brand - Header CTA');" class="phone-number btn btn-success btn-lg"><i class="glyphicon glyphicon-earphone"></i> 
                                <?php
                                    echo get_field('edp_brand_phone');
                            }elseif(get_field('phone_number_one_brand')){ ?><a href="tel:<?php echo get_field('phone_number_one_brand');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - One Brand - Header CTA');" class="phone-number btn btn-success btn-lg"><i class="glyphicon glyphicon-earphone"></i> 
                            <?php
                                    echo get_field('phone_number_one_brand');
                            }else{ ?><a href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - One Brand - Header CTA');" class="phone-number btn btn-success btn-lg"><i class="glyphicon glyphicon-earphone"></i> 
                            <?php
                                    echo get_field('home_phone_number', 'option');
                            } ?>
                                </a>                           
                       </div>
                    </div>
                </div> 
            </div>            
        </div>    
    </div>  

    <section class="breadcrumb-holder">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
                </div>
            </div>
            <!-- /.col-md-12 -->
        </div>
    </section>

    <section class="one-brand-header">
        <div class="row service-head">
            <div class="col-md-12">
                <h1>
                    <span class="light-grey">
                        <?php echo $label; ?> ::
                    </span> 
                    <?php the_field('brand_title');?>
                </h1>
                <ul class="package-nav">
                    <?php
                    // check if the repeater field has rows of data
                    if( have_rows('packages') ):
                        // loop through the rows of data
                        while ( have_rows('packages') ) : the_row();?>
                            <li>
                                <a href="#package_<?php echo $linkCounter ?>">
                                    <?php the_sub_field('campaign_name'); ?>
                                </a>
                            </li>
                        <?php
                            $linkCounter++;
                        endwhile;
                    else :
                    endif;?>         
                </ul>                
                <p class="tagline">
                    <?php the_field('tag_line');?>
                </p>
                <?php if( get_field('brand_description') ): ?>
                    <!-- <span class="brandDesc"> -->
                    <span class="">
                        <?php the_field('brand_description');?>
                    </span>
                <?php endif; ?>            

                <?php if( get_field('brand_description_cta_text') ): ?>
                    <!-- <span class="brandDesc"> -->
                    <p class="cta-button-holder">
                        
                    <a  style="line-height: 75px; background-color: #f93; border: none; padding: 15px; color: white; margin-top: 30px;" class="cta-button" target="_blank" onClick="<?php echo get_field('brand_description_cta_analytics_code');?>" href="<?php echo get_field('brand_description_cta_link');?>"><?php the_field('brand_description_cta_text');?></a>                        
                    </p>
                <?php endif; ?>            

            </div>
        </div>
    </section>

    <!-- /.brand-intro -->
    <section class="packages">
        <?php
        // check if the repeater field has rows of data
        if( have_rows('packages') ):

        // loop through the rows of data
        while ( have_rows('packages') ) : the_row();

            if ($counter == 2) {
                include 'search-interstitial.php';
            }

            if (($counter+1) %2 != 0) { 
                $package_icon = get_sub_field_object('icon_select');
                $package_icon_value = get_sub_field('icon_select');
                $icon_selector = $package_icon['choices'][ $package_icon_value ];
                $icon_image = get_sub_field('icon_select_image');
                $count = get_sub_field('campaign_count');

                ?>
            <div class="package-module"  id="package_<?php echo $counter ?>">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <h3>
                                <?php the_sub_field('campaign_name'); ?>
                            </h3>
                            <p>
                                <?php the_sub_field('campaign_description'); ?>
                            </p>
                            <ul class="plus-list">
                                <?php if( have_rows('campaign_features') ): ?>
                                    <ul>
                                        <?php 
                                        // loop through rows (sub repeater)
                                        while( have_rows('campaign_features') ): the_row();?>
                                            <li <?php if( get_sub_field('features') ){ echo 'class="features"'; } ?>>
                                                <?php the_sub_field('feature'); ?>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif;?>
                            </ul>
                            <?php if ($icon_selector == 'TV' && !empty(get_field('channel_list_link'))) { ?>
                                <a  target="_blank" href=<?php echo the_field('channel_list_link') ?>>View All Channels
                            </a>
                            <?php } ?>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <?php if (!empty($count)) { ?>
                                <div class="channel-count">
                                    <span class="count">
                                        <?php the_sub_field('campaign_count'); ?>
                                        <span class="count-strap">
                                            <?php the_sub_field('count_type'); ?>
                                        </span>
                                    </span>
                                </div>
                            <?php } else {
                              if(!empty($icon_image)) {
                                    echo '<img class="icon-brand" src="'.$icon_image.'" alt=""/>';
                                }  
                            }
                            ?>

                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            
                        </div>
                        <!-- /.col-md-4 -->
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-0">
                            <div class="price">
                                <?php if( get_sub_field('campaign_price')) { ?>
                                    <p>Starting at</p>
                                    <span class="price-value">$<?php the_sub_field('campaign_price'); ?>
                                    </span>
                                    <br />
                                    <span class="price-strap">
                                        a month                                 
                                        <?php
                                            $camp_dur = get_sub_field('campaign_duration');
                                            if($camp_dur){
                                                $str = ' for ' . $camp_dur;
                                                echo $str;
                                            }
                                        ?>
                                    </span>

                                <?php } else {?>
                                    <span class="price-value">
                                        <?php echo get_sub_field('alternative_text_top'); ?>
                                    </span>
                                    <br />
                                    <span class="price-strap"></span>
                                        <p class="green-upper">
                                        <?php echo get_sub_field('alternative_text_bottom'); ?>
                                        </p>
                                <?php } ?>
                                <?php if( get_sub_field('campaign_button_link')) { ?>
                                    <a href=<?php echo get_sub_field('campaign_button_link'); ?> class="btn btn-orange" target="_blank">
                                        <?php echo get_sub_field('campaign_button_text') ?>
                                    </a>                                     
                                <?php } else {?>                           

                <?php
                if(get_field('edp_brand_phone')){ ?>
                    <a href="tel:<?php echo get_field('edp_brand_phone', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Bundles - CTA Banner');" class="phone-number btn btn-success btn-lg"><i class="glyphicon glyphicon-earphone"></i> 
                    <?php
                        echo get_field('edp_brand_phone');
                }elseif(get_field('phone_number_one_brand')){ ?><a href="tel:<?php echo get_field('phone_number_one_brand');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Bundles - CTA Banner');" class="phone-number btn btn-success btn-lg"><i class="glyphicon glyphicon-earphone"></i> 
                <?php
                        echo get_field('phone_number_one_brand');
                }else{ ?><a href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Bundles - CTA Banner');" class="phone-number btn btn-success btn-lg"><i class="glyphicon glyphicon-earphone"></i> 
                <?php
                        echo get_field('home_phone_number', 'option');
                } ?>
                    </a> 


<!--                                     <a href="#" class="btn btn-orange" class="btn btn-orange" data-toggle="modal" data-target="#get-a-quote">
                                        <?php echo get_sub_field('campaign_button_text') ?>
                                    </a> -->
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }else{ 
            $package_icon = get_sub_field_object('icon_select');
            $package_icon_value = get_sub_field('icon_select');
            $icon_selector = $package_icon['choices'][ $package_icon_value ];
            $icon_image = get_sub_field('icon_select_image');
            $count = get_sub_field('campaign_count');
            ?>

            <div class="package-module grey-bg" id="package_<?php echo $counter ?>">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <?php if (!empty($count)) { ?>
                                <div class="channel-count">
                                    <span class="count">
                                        <?php the_sub_field('campaign_count'); ?>
                                        <span class="count-strap">
                                            <?php the_sub_field('count_type'); ?>
                                        </span>
                                    </span>
                                </div>
                            <?php } else {
                              if(!empty($icon_image)) {
                                    echo '<img class="icon-brand" src="'.$icon_image.'" alt=""/>';
                                }  
                            }
                            ?>
                        </div>
                        <!-- /.col-md-4 -->
                        <div class="col-md-8 col-sm-6">
                            <h3>
                                <?php the_sub_field('campaign_name'); ?>
                            </h3>
                            <p>
                                <?php the_sub_field('campaign_description'); ?>
                            </p>
                        </div>
                        <!-- /.col-md-8 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <ul class="plus-list">
                                <?php 
                                if( have_rows('campaign_features') ): ?>
                                    <ul>
                                        <?php 
                                        while( have_rows('campaign_features') ): the_row();?>
                                            <li>
                                                <?php the_sub_field('feature'); ?>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif;?>
                            </ul>
                            <?php if ($icon_selector == 'TV' && !empty(get_field('channel_list_link'))) { ?>
                                <a  target="_blank" href=<?php echo the_field('channel_list_link') ?> >
                                    View All Channels
                                </a>
                            <?php } ?>
                        </div>
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-0">
                            <div class="price">
                                <?php if( get_sub_field('campaign_price')) { ?>
                                    <p>
                                        Starting at
                                    </p>
                                    <span class="price-value">
                                        $<?php the_sub_field('campaign_price'); ?>
                                    </span>
                                    <br />
                                    <span class="price-strap">
                                        a month                                 
                                        <?php
                                            $camp_dur = get_sub_field('campaign_duration');
                                        if($camp_dur){
                                            $str = ' for ' . $camp_dur;
                                            echo $str;
                                        }
                                        ?>
                                    </span>
                                <?php } else {?>
                                    <span class="price-value">
                                        <?php echo get_sub_field('alternative_text_top'); ?>
                                    </span>
                                    <br />
                                    <span class="price-strap"></span>
                                        <p class="green-upper">
                                        <?php echo get_sub_field('alternative_text_bottom'); ?>
                                        </p>
                                <?php } ?>
                                <?php if( get_sub_field('campaign_button_link')) { ?>
                                    <a href=<?php echo get_sub_field('campaign_button_link'); ?> class="btn btn-orange" target="_blank">
                                        <?php echo get_sub_field('campaign_button_text') ?>
                                    </a>                                     
                                <?php } else {?>                           

                <?php
                if(get_field('edp_brand_phone')){ ?>
                    <a href="tel:<?php echo get_field('edp_brand_phone', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Bundles - CTA Banner');" class="phone-number btn btn-success btn-lg"><i class="glyphicon glyphicon-earphone"></i> 
                    <?php
                        echo get_field('edp_brand_phone');
                }elseif(get_field('phone_number_one_brand')){ ?><a href="tel:<?php echo get_field('phone_number_one_brand');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Bundles - CTA Banner');" class="phone-number btn btn-success btn-lg"><i class="glyphicon glyphicon-earphone"></i> 
                <?php
                        echo get_field('phone_number_one_brand');
                }else{ ?><a href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Bundles - CTA Banner');" class="phone-number btn btn-success btn-lg"><i class="glyphicon glyphicon-earphone"></i> 
                <?php
                        echo get_field('home_phone_number', 'option');
                } ?>
                    </a> 


<!--                                     <a href="#" class="btn btn-orange" class="btn btn-orange" data-toggle="modal" data-target="#get-a-quote">
                                        <?php echo get_sub_field('campaign_button_text') ?>
                                    </a> -->
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.col-md-4 col-md-offset-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.inner -->
            </div>
        <?php } 
                $counter++;
                endwhile;
                else :
                endif;
            ?>
    </section>
    <!-- /.package -->
    <section class='disclaimer'>
        <p class='disclaimerOnPageHolder'>
        <small style="padding-left: 20px;padding-right: 20px;display: inline-block;font-size: 11px;">
            <?php the_field('disclaimer_on_page_copy');?>
        </small>
        </p>  
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
                        <p class='disclaimerHolder'>
                            <?php echo the_field('disclaimer_copy');?>        
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

<style type="text/css">
    .packages > .package-module .icon-brand {
      text-align: center;
      position: relative;
      width: 100%;
      min-height: 178px;
      margin-bottom: 10px;
    }
</style>

<?php the_field('ringpool_script');?>


<!-- /.one-brand -->
<?php include 'modal-form-onebrand.php' ?>
<?php get_footer(); ?>