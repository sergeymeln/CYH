<?php
/**
 * Template Name: EDP 
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */

?>

  <?php get_header('edp'); ?>  
  <!-- This is the page specific wrapping class -->
    <div class="row">
      <div class="col-xs-12">
        <div class="masthead">
          <img src="<?php echo get_field('edp_hero_image'); ?>" alt="SAVE TODAY when you call and bundle TV, Internet and Phone. It only takes a quick 5 min. call to&nbsp;switch your services and save hundreds a year!">
        </div>
      </div>
    </div>
    <!-- /row -->


    <div class="row">
      <div class="col-xs-12">
        <div class="brand-grid clearfix">
          <div class="brand-cta-row">
            <?php
              $iconCounter = 0;
              if( have_rows('edp_brand_deals') ):
            ?>
            <?php
              while ( have_rows('edp_brand_deals') ) : the_row();?>
                <a href="tel:<?php echo the_sub_field('edp_brand_deal_phone');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - EDP - Brand CTA Row');">
                  <div class="brand-cta" >
                    <div class="inner">
                      <img src="<?php echo the_sub_field('edp_brand_deal_image_upload');?>" class="deal-img" alt="<?php the_sub_field('edp_brand_deal_alt_tag'); ?>">
                      <p>
                        <?php echo the_sub_field('edp_brand_deal');?>
                      </p>
                      <h5>
                        <a href="tel:<?php echo the_sub_field('edp_brand_deal_phone');?>"  style="color: #ff6600;" onClick="ga('send', 'event', 'Call', 'ClicktoCall - EDP - Brand CTA Row');"><?php echo the_sub_field('edp_brand_deal_phone');?></a>
                      </h5>
                    </div>
                  </div>
                </a>
            <?php 
              $iconCounter++;
              if($iconCounter == 3) { ?>
          </div>
          <div class="brand-cta-row">
            <?php }
              endwhile;
              else :
              endif;
            ?>
          </div>
            <img src="<?php echo get_template_directory_uri(); ?>/images/grid-badge.png" width="117" height="81" alt="Call for complete details" class="grid-badge">
        </div>
      </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="phone-block">
          <span class="phone-lbl">
            Call us to compare or order these great deals:
          </span>
          <span class="phone-no">
            <!-- dynamic phone number via url params -->
                <?php
                if(get_field('edp_brand_phone')){ ?>
                    <a href="tel:<?php echo get_field('edp_brand_phone');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - EDP - Call to Compare');" class="phone-number">
                    <?php
                        echo get_field('edp_brand_phone');
                }elseif(get_field('phone_number_one_brand')){ ?><a href="tel:<?php echo get_field('phone_number_one_brand');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - EDP - Call to Compare');" class="phone-number">
                <?php
                        echo get_field('phone_number_one_brand');
                }else{ ?><a href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - EDP - Call to Compare');" class="phone-number">
                <?php
                        echo get_field('home_phone_number', 'option');
                } ?>
                    </a>
          </span>
        </div>
      </div>
    </div>
  <!-- </div> -->

  <div class="row">
      <div class="col-xs-12">
        <div class="steps">
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
        </div>
      </div>
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
    </div>
  </body>
</html>