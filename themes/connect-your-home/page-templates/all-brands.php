<?php
/**
 * Template Name: All Brands
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */

?>




<?php get_header(); ?>
  <!-- This is the page specific wrapping class -->
<div class="all-results">
<section class="hero">
    <div class="bottom-border" >
        <div class="col-md-8 brand-intro hero-holder">
        <div class="masthead">
         <?php $hero_image = get_field('all_brand_hero'); ?>
                   
                    <img src="<?php echo $hero_image['url']; ?>"  alt="" />
            </div>
            <!-- /.masthead -->
        </div>
        <!-- /.col-md-12 -->
    <div class="col-md-4 brand-intro">
        <div class="masthead">
                <div class="banner-msg">
                  <h3><?php echo $success ?></h3>
                    <h2><?php the_field('brand_heading');?></h2>
                    <p><?php the_field('brand_copy');?></p>

                    <?php the_field('feature_list');?>
                         <div class="row service-cta">
                            <div class="col-md-12 ">
                        <div class="banner-msg">
                            <?php the_field('hero_banner_msg'); ?>
                        </div>       

                <?php
                if(get_field('edp_brand_phone')){ ?>
                    <a href="tel:<?php echo get_field('edp_brand_phone', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - All Brands - Header CTA');" class="phone-number btn btn-success btn-lg"><i class="glyphicon glyphicon-earphone"></i> 
                    <?php
                        echo get_field('edp_brand_phone');
                }elseif(get_field('phone_number_one_brand')){ ?><a href="tel:<?php echo get_field('phone_number_one_brand');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - All Brands - Header CTA');" class="phone-number btn btn-success btn-lg"><i class="glyphicon glyphicon-earphone"></i> 
                <?php
                        echo get_field('phone_number_one_brand');
                }else{ ?><a href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - All Brands - Header CTA');" class="phone-number btn btn-success btn-lg"><i class="glyphicon glyphicon-earphone"></i> 
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
    <!-- /.row -->
</section>
<section class="all-brands-header">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs">
               <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
            </div>
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->

    <div class="row service-head">
        <div class="col-md-12">
	    <div class="brands-heading"><?php the_field('page_heading'); ?></div>
            <p><?php the_field('page_heading_strapline'); ?></p>
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
</section>
<!-- /.all-brands-header -->


<section class="all-brand-grid">

<?php
    // counter to open and close rows
    $i = 1;
    echo ' <div class="row no-gutter"><div class="row-height">';

     if(get_field('brand_details')): ?>
   
    

    <?php while(has_sub_field('brand_details')): ?>

      <div class="col-sm-4 brand-module col-sm-height">
        <a href="<?php the_sub_field('view_details'); ?>"></a>
          <div class="inside inside-full-height">
            <?php $brandlogo = get_sub_field('brand_logo'); ?>
              <img class="img-natural" src="<?php echo $brandlogo['url']; ?>" alt="<?php echo $brandlogo['alt'] ?>">
              <h3><?php the_sub_field('brand_title'); ?></h3>
              <ul class="text-left features-list">

              <?php

              // check if the repeater field has rows of data
              if( have_rows('brand_features') ):

                // loop through the rows of data
                  while ( have_rows('brand_features') ) : the_row();

                      
                      
                  ?>


              <li><?php echo the_sub_field('feature_title'); ?> // <?php echo the_sub_field('feature_body'); ?></li>
                      <?php 
                  endwhile;

              else :

                  // no rows found

              endif;

              ?>

              </ul>
              <p><?php the_sub_field('brand_copy'); ?></p>
	                    <div class="brand-inner">
                  <div class="brand-details clearfix">
                      <?php $num_details = get_sub_field('numerical_details'); 
                        foreach ($num_details as $detail) { ?>
                         
                        <div class="brand-detail-item clearfix">
                          <div class="pull-left"><?php echo $detail['title']?></div>
                          <div class="pull-right"><?php echo $detail['value']?></div>
                        </div> 

                        <?php } ?>

                  </div>                  
              </div>
              <div class="brand-links">
		   <?php $btn_color = get_field('color_of_the_button'); ?>
                   <a href="<?php the_sub_field('view_details'); ?>" class="brands-btn btn btn-plans btn-lg" style="color: #fff; background-color: <?php if(!empty($btn_color)) echo $btn_color; else echo '#ff9933'?>">View Plans</a>
              </div>
          </div>
        </a>
      </div>

         <?php  // After every three entries close and open a row
          if($i % 3 == 0) {echo '</div></div><div class="row no-gutter"><div class="row-height">';} ?>

         

    <?php 
     $i++;
    endwhile; ?>



<?php endif;
echo ' </div></div>';

 ?>

 
</section>
<!-- /.all-brand-grid -->
      
</div>
<!-- /.all-results -->  
<?php include 'modal-form-onebrand.php' ?>

<?php get_footer(); ?>
<style>
.btn-plans {
    background-color: #ff5a33;
    text-transform: uppercase;
    border-radius: 5px !important;
    padding: 15px 30px;
    font-size: 16px;
    line-height: 1;
}
.all-brand-grid .brand-module .btn {
    position: static;
    display: block;
    /*max-width: 290px;*/
    width: 100%;
    margin: auto;
    transform: inherit;
}
.full-review-link {
    color: #ff5a33 !important;
    font-size: 12px;
    padding: 10px;
    display: inline-block;
    text-decoration: underline;
}
.brand-inner {
    padding: 0 20px;
}
.brand-details {	
    padding: 15px 0 20px;
}
.brand-detail-item {
    position: relative;
    width: 100%;
    float: left;
}
.brand-detail-item:after {
    position: absolute;
    content: "";
    top: 10px;
    left: 0;
    width: 100%;
    border-top: 2px dotted #000;
}
.brand-detail-item:before {
    position: absolute;
    content: "";
    bottom: 10px;
    left: 0;
    width: 100%;
    border-top: 2px dotted #000;
}
.brand-detail-item div {
    background-color: #fff;
    z-index: 1;
    position: relative;
}
.brand-detail-item .pull-left {
    padding-right: 5px;
    color: #939393;
}
.brand-detail-item .pull-right {
    padding-left: 5px;
}
.all-brand-grid > .row:nth-child(odd) > .row-height > .brand-module:nth-child(even) .brand-detail-item div,
.all-brand-grid > .row:nth-child(even) > .row-height > .brand-module:nth-child(odd) .brand-detail-item div {
    background-color: #f6f6f6;
}
.all-brand-grid .brand-module {
    padding-bottom: 100px !important;	
}
.brand-links {
    position: absolute;
    margin: auto 35px;
    left: 0;
    right: 0;
    bottom: 30px;
}
.row-height {
    text-align: center;
}

.brands-heading {
    font-size: 44px;
    text-align: center;
    font-family: gotham_boldregular;
}
h1.light-grey {
    color: #cccccc;
    display: inline-block;
}
span.light-grey {
    color: #cccccc;
    display: inline-block;
    padding: 0 10px;
}


@media (min-width: 768px) {
    .col-sm-height {
        display: inline-block;
    }
}
</style>