<?php
/**
 * Template Name: EDP - Responsive
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */

?>

<?php get_header('edp-responsive'); ?>
  <!-- This is the page specific wrapping class -->
<div class="all-results">
<section class="hero">
    <div class="bottom-border" >
        <div class="col-md-12 brand-intro hero-holder">
        <div class="masthead">
         <?php $hero_image = get_field('edp_hero_image'); ?>
              <img src="<?php echo $hero_image;?>" class="deal-img" alt="<?php the_sub_field('edp_brand_deal_alt_tag'); ?>">
            </div>
            <!-- /.masthead -->
        </div>
        <!-- /.col-md-12 -->
    <!-- <div class="col-md-4 brand-intro">
        <div class="masthead">
                <div class="banner-msg">
                    <h2><?php the_field('brand_heading');?></h2>
                    <?php
                    // check if the repeater field has rows of data
                    if( have_rows('edp_feature_list') ):
                        // loop through the rows of data
                        while ( have_rows('edp_feature_list') ) : the_row();
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
                </div> 
        </div>            
    </div>          -->
    </div>
    <!-- /.row -->
</section>
<section class="all-brands-header">

    <div class="row service-head">
        <div class="col-md-12">
            <h1><?php the_field('page_heading'); ?></h1>
            <p><?php the_field('page_heading_strapline'); ?></p>
            
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
</section>
<!-- /.all-brands-header -->
    <div class="row">
      <div class="col-xs-12">
        <div class="brand-grid clearfix">
          <div class="brand-cta-row row">
            <?php
              $iconCounter = 0;
              if( have_rows('edp_brand_deals') ):
            ?>
            <?php
            $brand_count = count(get_field('edp_brand_deals'));
              while ( have_rows('edp_brand_deals') ) : the_row();?>
                <a href="tel:<?php echo the_sub_field('edp_brand_deal_phone');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - EDP Responsive - Brand Deal CTA');">



                  <?php 
                  $count = $brand_count - $iconCounter;
                  if($count > 2 || $brand_count % 3 == 1 || $brand_count % 3 == 0) {
                    if($count == 1 && $brand_count % 3 !== 0){
                      echo '<div class="brand-cta col-md-12">';
                    }
                    elseif($count !== 1 || $brand_count % 3 == 0){
                      echo '<div class="brand-cta col-md-4" >';
                    }
                    $iconCounter++;
                  }
                  elseif($count == 2){
                    echo '<div class="brand-cta col-md-6">';
                  }?>



                    <div class="inner">
                      <img src="<?php echo the_sub_field('edp_brand_deal_image_upload');?>" class="deal-img" alt="<?php the_sub_field('edp_brand_deal_alt_tag'); ?>">
                      <p>
                        <?php echo the_sub_field('edp_brand_deal');?>
                      </p>
                      <h5>
                        <a href="tel:<?php echo the_sub_field('edp_brand_deal_phone');?>"   class="btn btn-lg btn-success phone-number" onClick="ga('send', 'event', 'Call', 'ClicktoCall - EDP Responsive - Brand Deal CTA');">
                        <i class="glyphicon glyphicon-earphone"></i> 
                         <?php echo the_sub_field('edp_brand_deal_phone');?></a>
                      </h5>
                    </div>
                  </div>
                </a>
            <?php 
              // $iconCounter++;
              if($iconCounter == 3) { ?>
          </div>
          <div class="brand-cta-row">
            <?php }
              endwhile;
              else :
              endif;
            ?>
          </div>
<!--             <img src="<?php echo get_template_directory_uri(); ?>/images/grid-badge.png" width="117" height="81" alt="Call for complete details" class="grid-badge"> -->
        </div>
      </div>

<section class="all-brand-grid">

<?php
    // counter to open and close rows
    $i = 1;
    echo ' <div class="row no-gutter"><div class="row-height">';

     if(get_field('brand_details')): ?>
   
    

    <?php while(has_sub_field('brand_details')): ?>

      <div class="col-sm-4 brand-module col-sm-height">
        <a href="<?php the_sub_field('view_details'); ?>">
          <div class="inside inside-full-height">
            <?php $brandlogo = get_sub_field('brand_logo'); ?>
              <img class="img-natural" src="<?php echo $brandlogo['url']; ?>" alt="<?php echo $brandlogo['alt'] ?>">
              <h3><?php the_sub_field('brand_title'); ?></h3>
              <p><?php the_sub_field('brand_copy'); ?></p>
              <p>Click to view <a href="<?php the_sub_field('view_packages'); ?>"><?php the_sub_field('brand_title'); ?></a> packages.</p>
              <a href="<?php the_sub_field('view_details'); ?>" class="btn btn-orange">View Details</a>
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
        <div class="steps steps-bg steps-hide">
            <h3>
              Why Choose
                <br> 
              Connect Your Home&reg;?
            </h3>
            <p class="step-1">
              You’ve got options - 
                <br>
              don’t get locked-in to an 
                <br> 
              overpriced bundle!</p>
            <p class="step-2">
              Mix-and-match providers to
                <br> 
              get the lowest price bundles
                <br>
              available anywhere!
            </p>
        </div>
        <div class="step-holder">
        <div class="steps-stacked steps">
        <div class="step-banner1 col-md-4">
          <img src="<?php echo get_template_directory_uri(); ?>/images/step_banner/step-bg-question-mark.jpg">
          <div class="stack-steps">
            <h3>
              Why Choose
                <br> 
              Connect Your Home&reg;?
            </h3>   
          </div>         
        </div>
        <div class="step-banner2 col-md-4">
          <img src='<?php echo get_template_directory_uri(); ?>/images/step_banner/step-bg-step-1.jpg'>
          <div class="stack-steps">
          <p>
              You’ve got options - 
                <br>
              don’t get locked-in to an 
                <br> 
              overpriced bundle!            
          </p>
          </div>
        </div>
        <div class="step-banner3 col-md-4">
          <img src='<?php echo get_template_directory_uri(); ?>/images/step_banner/step-bg-step-2.jpg'>
          <div class="stack-steps">
          <p>
              Mix-and-match providers to
                <br> 
              get the lowest price bundles
                <br>
              available anywhere!
          </p>
          </div>
        </div>
        </div>
        </div>
</div>
<!-- /.all-results -->  
<?php include 'modal-form-onebrand.php' ?>

      <footer>
      <div class="row">
        
            <div class="seal">
                <a href="http://www.bbb.org/denver/business-reviews/cable-tv-internet-and-telephone-installation-service/connect-your-home-llc-in-denver-co-90165080/#bbbonlineclick" target="_blank" rel="nofollow"><img src="https://seal-denver.bbb.org/seals/blue-seal-293-61-bbb-90165080.png" style="border: 0; max-width: 200px;" alt="Connect Your Home, LLC BBB Business Review" /></a>

                <table width="135" border="0" cellpadding="2" cellspacing="0" title="Click to Verify - This site chose Symantec SSL for secure e-commerce and confidential communications." id="symantec-seal">
                <tr>
                <td width="135" align="center" valign="top"><script type="text/javascript" src="https://seal.websecurity.norton.com/getseal?host_name=www.connectyourhome.com&amp;size=L&amp;use_flash=NO&amp;use_transparent=YES&amp;lang=en"></script><br />
                <a href="http://www.symantec.com/ssl-certificates" target="_blank"  style="color:#000000; text-decoration:none; font:bold 7px verdana,sans-serif; letter-spacing:.5px; text-align:center; margin:0px; padding:0px;">ABOUT SSL CERTIFICATES</a></td>
                </tr>
                </table>  
                <div class="col-md-12"><p>&copy; Copyright <?php echo date( 'Y' )?> <a href="#">Connect Your Home&reg;</a></p></div>
              
            </div>


        
      </div>
      
          <div class="legal">
              <p class="copyright"><?php the_field('edp_disclaimer'); ?></p>
              <p class="fine"><?php the_field('edp_fine_print'); ?></p>
          </div>         
      </footer>