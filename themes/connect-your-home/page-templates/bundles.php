<?php
/**
 * Template Name: Bundles
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */

// require_once './library/Campaign.php';

// $brand  = get_field('brand');
// $type   = get_field('promotion_type');
// $group  = get_field('promotion_group');

// $campaigns = Campaign::getCampaigns($brand, $group, $type);
// $provider  = Campaign::getProvider($brand);
// $promotionType = Campaign::getPromotionType($type);

?>

<?php get_header(); ?>

<div class="bundle">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <section class="entry-content">
                <?php the_content(); ?>
            </section>
        </article>
    <?php endwhile; endif; ?>

<section class="bundle-header">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs">
                
            <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
            </div>
        </div>
    </div>

    <div class="row service-head">
        <div class="col-md-12">
            <h1><span class="light-grey"><?php echo $promotionType['Description']?> ::</span> <?php echo $provider['calp_provider_description'] ?></h1>
            <p><?php the_field('sub_title');?></p>
            <ul class="package-nav">

            <?php foreach ($campaigns as $i => $campaign) { ?>
                <li><a href="#package_<?php echo $i ?>"><?php echo $campaign['Name'] ?></a></li>
            <?php } ?>
            </ul>
        </div>
    </div>
</section>
<!-- /.one-brands-header -->
<section class="brand-intro">
    <div class="row">
        <div class="col-md-6 info">

                    <img src="<?php echo $provider['calp_provider_logo']; ?>" class="logo" alt="<?php echo $provider['calp_provider_name'] ?>" />
         
            <h4><?php the_field('brand_logo_strap');?></h4>
            <p class="subhead-strap"><?php the_field('brand_heading');?></p>
            <p><?php the_field('brand_copy');?></p>
            <p class="bold"><?php the_field('list_heading');?></p>
            <?php the_field('feature_list');?>
         </div>
        <!-- /.col-md-6 -->
        <div class="col-md-6">
        <?php $hero_image = get_field('bundle_hero'); ?>
                   
                    <img src="<?php echo $hero_image['url']; ?>"  alt="<?php echo $hero_image['alt'] ?>" />
                     <div class="row service-cta">
                        <div class="col-md-12">
<!--                          <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#get-a-quote">
                         Request A Quote
                        </button> -->
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

                        </div>
                     </div>
        </div>
        <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
</section>
<!-- BACKEND TODO: Needs to populate with bundle info  -->
<!-- /.brand-intro -->
<section class="packages">

    <?php

    $i = 1;

    foreach ($campaigns as $campaign) {

        if ($i == 3) {
            include 'search-interstitial.php';
        }
        $i++;
    ?>

<div class="package-module <?php echo ($i) %2 == 0 ? 'grey-bg' : null ?>" id="package_<?php echo $i ?>">
        <div class="inner">
            <div class="row">
                <?php if (($i) %2 == 0){ ?>

                    <div class="col-md-4 col-sm-6">
                        <div class="bundle-art">
                      <img src="<?php echo get_template_directory_uri()?>/images/bundle-art-triple-3.png" alt="Phone, Internet &amp; television">
                        </div>
                    </div>
                    <!-- /.col-md-4 -->
                    <div class="col-md-8 col-sm-6">
                         <h3><?php echo $campaign['Name'] ?></h3>
                        <p><?php echo $campaign['Description'] ?></p>
                    </div>
                    <!-- /.col-md-8 -->

                <?php }else{ ?>

                    <div class="col-md-8 col-sm-6">
                         <h3><?php echo $campaign['Name'] ?></h3>
                        <p><?php echo $campaign['Description'] ?></p>
                    </div>
                    <!-- /.col-md-8 -->
                    <div class="col-md-4 col-sm-6">
                        <div class="bundle-art">
                      <img src="<?php echo get_template_directory_uri()?>/images/bundle-art-triple-3.png" alt="Phone, Internet &amp; television">
                        </div>
                    </div>
                    <!-- /.col-md-4 -->

                <?php } ?>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <ul class="plus-list">
                        <?php

                        foreach ($campaign['Feature'] as $feature) { ?>
                        <li><?php echo $feature['Description'] ?></li>
                    <?php }
                    ?>
                    </ul>
                    <!-- <a href="#">View Channels</a> -->
                </div>
                <!-- /.col-md-4 -->
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-0">
                    <div class="price">
                       <p>Starting at</p>
                       <span class="price-value">$<?php echo $campaign['SalePrice'] ?></span><br />
                       <span class="price-strap">a month for
                       <?php
                        $years = $campaign['DiscountMonths'] / 12;
                        if ($campaign['DiscountMonths'] % 12 == 0) {
                            if ($years > 1) {
                                echo $years . ' years';
                            } else {
                                echo $years . ' year';
                            }
                        } else {
                            echo $campaign['DiscountMonths'] . ' months';
                        }
                        ?>.</span>
                       <p class="green-upper">Get a Free Quote</p>
                       <a href="#" class="btn btn-orange" data-toggle="modal" data-target="#get-a-quote">Order Dish</a>
                    </div>
                </div>
                <!-- /.col-md-4 col-md-offset-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.inner -->
        </div>

    <?php } ?>


    <!-- /.inner -->

</section>
<!-- /.package -->



</div>
<!-- /.bundle -->
<?php include 'modal-form.php' ?>
<?php get_footer(); ?>