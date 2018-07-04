<?php
/**
 * Template Name: YP
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */
?>


<?php  get_header('yp'); ?>



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
<div class="col-md-12">
    <?php if( get_field('turn_off_features') != 0 ) { ?>
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
        </div>
    <?php } ?>
    <hr/>
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
                                <div class="price">
                                 <span class="beginning">
                                     <?php the_sub_field('offer_pretext'); ?>
                                 </span>
                                    <?php if($dollars){ ?>
                                        <div class="dollars">
                                            <?php echo $dollars; ?>
                                        </div>
                                        <span class="tens">
                                            <?php echo $cents; ?>
                                        </span>
                                        <span class="month">mo</span>
                                         <span class="duration">
                                             <?php the_sub_field('offer_duration'); ?>
                                         </span>
                                    <?php } ?>
                                    <div class="clearfix"></div>
                                </div>
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

                    <h3 class="phone-number text-center">
                         Call us now to order:
                         <br/>

                    <a href="tel:<?php echo get_field('brand_phone_number');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - YP');" class="phone-number btn btn-success btn-lg inline" id="ypFooterButton">
                    <i class="glyphicon glyphicon-earphone"></i> 
                <?php
                        echo get_field('brand_phone_number');
                 ?>
                    </a>  
                    </h3>
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
    <?php get_footer('yp'); ?>
</div>
