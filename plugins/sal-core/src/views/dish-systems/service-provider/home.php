<?php
do_action('\\' . \CYH\Controllers\DishSystems\ServiceProviderController::class . "::RenderHomeHero", $topOffers);
?>
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
<?php
do_action('\\' . CYH\Controllers\DishSystems\ServiceProviderController::class . "::RenderHomeProducts", $products)
?>

<section class="offers">
    <h2 class="text-center">Choose Your Perfect DISH Network Package</h2>

    <?php
    $count_module = 0;
    if( have_rows('offers') ):
        while ( have_rows('offers') ) : the_row();
            $sub_field_image = get_sub_field('offer_image');?>
            <div class="offers-holder">
                <div class="<?php if($count_module % 2 == 0){ echo 'col-md-4';} else { echo 'col-md-8';}?>">
                    <?php if($count_module % 2 == 0){?>
                        <div class="img-holder">
                            <a href="<?php echo the_sub_field('offer_link'); ?>">
                                <img src="<?php echo $sub_field_image["url"];?>">
                            </a>
                        </div>
                        <?php
                    } else { ?>
                        <h3 class="offer-module">
                            <?php the_sub_field('offer_title'); ?>
                        </h3>
                        <div class="col-md-10 col-md-offset-1">
                            <h4 class="sub-offer-module">
                                <?php the_sub_field('offer_subtitle'); ?>
                            </h4>
                            <p>
                                <?php the_sub_field('offer_more_info'); ?>
                            </p>
                            <a href="<?php echo the_sub_field('offer_link') ?>" class="btn btn-danger btn-custom" role="button"><?php the_sub_field('offer_link_text') ?></a>
                        </div>
                    <?php } ?>
                </div>

                <div class="<?php if($count_module % 2 == 0){ echo 'col-md-8';} else { echo 'col-md-4';}?>">
                    <?php if($count_module % 2 !== 0){?>
                        <div class="img-holder">
                            <a href="<?php echo the_sub_field('offer_link'); ?>">
                                <img src="<?php echo $sub_field_image["url"];?>">
                            </a>
                        </div>
                        <?php
                    } else { ?>

                        <h3 class="offer-module">
                            <?php the_sub_field('offer_title'); ?>
                        </h3>
                        <div class="col-md-10 col-md-offset-1">
                            <h4 class="sub-offer-module">
                                <?php the_sub_field('offer_subtitle'); ?>
                            </h4>
                            <p>
                                <?php the_sub_field('offer_more_info'); ?>
                            </p>
                            <a href="<?php echo the_sub_field('offer_link') ?>" class="btn btn-danger btn-custom" role="button"><?php the_sub_field('offer_link_text') ?></a>
                        </div>
                    <?php } ?>


                </div>
            </div>
            <?php
            echo "<div class='clearfix'></div>";
            $count_module++;
            if($count_module % 2 == 0){
                echo "<div class='clearfix'></div>";
            }
        endwhile;
    else :
    endif;
    ?>
</section>
<section class="phone">
    <div class="row text-center">
        <div class="phone text-center footer-cta">
            <span class="phone-label">Order Now:</span>
            <?php
            $phone = '';
            if (!empty($sp->Phone)) {
                $phone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($sp->Phone->Number);
            } elseif (get_field('cyb_phone_number', 'option')) {
                $phone = get_field('cyb_phone_number', 'option');
            } elseif (get_field('phone_number_one_brand')) {
                $phone = get_field('phone_number_one_brand');
            } else {
                $phone = get_field('home_phone_number', 'option');
            }
            ?>
            <a href="tel:<?php echo $phone; ?>"
               onClick="ga('send', 'event', 'Call', 'ClicktoCall - Home - Foot');"
               class="phone-number btn phone-button">
                <?php
                echo $phone;
                ?>
            </a>
        </div>
    </div>
</section>
