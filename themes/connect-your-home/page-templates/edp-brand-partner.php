<?php
/**
 * Template Name: EDP Brand - Partner
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */
?>


<?php  get_header('edp-brand-partner'); ?>



    <section class="hero">
        <div class="row">
            <div class="col-md-12">
                <div class="masthead">
                    <?php $hero_image = get_field('yp_hero');?>
                    <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt'] ?>" />
                </div>
            </div>
        </div>
    </section>
<div class="col-md-10 col-md-offset-1">
            <?php
            $count_module = 0;
            if( have_rows('features') ):
                while ( have_rows('features') ) : the_row();
                   $sub_field_image = get_sub_field('feature_image');?>

                <section class="features">
                    <div class="col-md-4 <?php if($count_module % 2 == 0){ echo 'pull-left';} else { echo 'pull-right';}?>">
                    
                            <img class="feature-image" src="<?php echo $sub_field_image["url"];?>">
                    </div>
                    <div class="col-md-8 <?php if($count_module % 2 == 0){ echo 'pull-right';} else { echo 'pull-left';}?>">
                            <h3 class="feature-module">
                                <?php the_sub_field('feature_title'); ?>
                            </h3>
                            <h4 class="sub-feature-module">
                                <?php the_sub_field('feature_subtitle'); ?>
                            </h4>
                            <p>
                                <?php the_sub_field('feature_more_info'); ?>
                            </p>
                    </div>
                </section>
                    <?php
                        echo "<div class='clearfix'></div><hr/>";
                    $count_module++;
                    if($count_module % 2 == 0){
                        echo "<div class='clearfix'></div>";
                    }
                endwhile;
            else :
            endif;?>

        <section class="offers">
            <div class="row">
            <?php
            if(have_rows('offers')):
                while (have_rows('offers')) : the_row();
                    $price = get_sub_field('offer_price');
                    $price_pieces = explode(".", $price);
                    $dollars = $price_pieces[0];
                    if(count($price_pieces) > 1){
                        $dollars = $price_pieces[0];
                        $cents = '.'.$price_pieces[1];
                    } else {
                        $cents = ".99";
                    }
                ?>

                <div class="col-md-4">
                    <h2>
                        <?php the_sub_field('offer_headline'); ?>
                        <br/>
                        <small>
                            <?php the_sub_field('offer_subheadline'); ?>
                        </small>
                    </h2>
                    <div class="offer-description col-md-8">
                        <?php the_sub_field('offer_description'); ?> 
                    </div>
                    <div class="offer-price col-md-4">
                            <div class="price-box">
                                <p>
                                    <strong class="price"><?php echo $dollars; ?>
                                        <span class="tens"><?php echo $cents; ?></span>
                                        <span class="month">mo</span>
                                    </strong>
                                </p>

                                
                            </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php
                endwhile;
            else :
            endif;?>
            </div>
        </section>
            <hr/>
        <section class="phone">
            <div class="row">
                    <h2 class="phone-number text-center">   
                    <?php
                if(get_field('edp_brand_phone')){ ?>
                    <a href="tel:<?php echo get_field('edp_brand_phone');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Brand Partner Package');" class="phone-number edp-number">
                    <?php
                        echo get_field('edp_brand_phone');
                }elseif(get_field('phone_number_one_brand')){ ?><a href="tel:<?php echo get_field('phone_number_one_brand');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Brand Partner Package');" class="phone-number edp-number">
                <?php
                        echo get_field('phone_number_one_brand');
                }else{ ?><a href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Brand Partner Package');" class="phone-number edp-number">
                <?php
                        echo get_field('home_phone_number', 'option');
                } ?>
                    </a>
                    </h2>
                <hr/>
            </div>
        </section>
        <section class="disclaimer">
            <div class="row">
                <div class="disclaimer-holder">
                    <?php the_field('disclaimer'); ?>
                </div>
            </div>
        </section>
</div>

<?php include 'modal-form.php' ?>
<div class="col-md-12">
    <?php get_footer('edp-brand-partner'); ?>
</div>
