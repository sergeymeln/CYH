<?php
/**
 * Template Name: Homes-com lander
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */
?>
<?php get_header('homes-lander'); ?>
<style type="text/css">
    .ui-corner-all{
        z-index: 10000;
        font-size: 10px;
    }

.youtube {
    background-color: #000;
    margin-bottom: 30px;
    position: relative;
    padding-top: 56.25%;
    overflow: hidden;
    cursor: pointer;
    width: 100%;
}
.youtube img {
    width: 100%;
    top: -16.82%;
    left: 0;
    opacity: 0.7;
}
.youtube .play-button {
    height: 60px;
    background-color: #333;
    box-shadow: 0 0 30px rgba( 0,0,0,0.6 );
    z-index: 1;
    opacity: 0.8;
    border-radius: 6px;
}
.youtube .play-button:before {
    content: "";
    border-style: solid;
    border-width: 15px 0 15px 26.0px;
    border-color: transparent transparent transparent #fff;
}
.youtube img,
.youtube .play-button {
    cursor: pointer;
}
.youtube img,
.youtube iframe,
.youtube .play-button,
.youtube .play-button:before {
    position: absolute;
}
.youtube .play-button,
.youtube .play-button:before {
    top: 50%;
    left: 50%;
    transform: translate3d( -50%, -50%, 0 );
}
.youtube iframe {
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
}

.legal{
    padding: 10px;
}

.phone .phone-number.edp-number{
    color: #fff;
}

.headline{
    text-align: center;
}

.phone-headline{
    color:#ff9933;
}

@media only screen and (max-width: 980px) {
  .steps-hide{
    display: none;
  }  
  .stack-steps{
    position: absolute;
    right: 30px;
    top: 20px;
    z-index: 100;
    text-align: right;
  }
.step-holder {
    display: block;
    width: 350px;
    margin: auto;  
}

.step-banner1{
  position: relative;
}
.step-banner2{
  position: relative;
}
.step-banner3{
  position: relative;
}
.how-it-works{
    margin-top: 190px;
}
}

.alert .headline{
    color: #444444;    
}
</style>
<div class="container">
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
            <div class="col-sm-4"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2017/02/brands-thin1.jpg"></div>
            <div class="col-sm-4"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2017/02/brands-thin2.jpg"></div>
            <div class="col-sm-4"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2017/02/brands-thin3.jpg"></div>
        </div>
        <!-- /.row -->
    </section>
    <section>
        <div class="row">
    <?php

    // check if the repeater field has rows of data
    if( have_rows('deal_images') ):

        // loop through the rows of data
        while ( have_rows('deal_images') ) : the_row();

            ?>
            <div class="col-sm-3">
                <img src="<?php echo the_sub_field('deal_image');?>"/>
            </div>            
            <?php

        endwhile;

    else :

        // no rows found

    endif;

    ?>       
        </div>
    </section>

        

    <section class="services">
        <div class="row">
        <div class="alert alert-warning" role="alert">
            <h4 class="headline">
            <i class="glyphicon glyphicon-earphone"></i>
            Call us to compare or order these great deals:
                <span class="phone-headline">
                    <a style="color: #ff9933;" href="tel:855-548-6890">855-548-6890</a>
                </span>
            </h4>
        </div>
<!--             <h4 class="headline">
            <i class="glyphicon glyphicon-earphone"></i>
            Call us to compare or order these great deals:
                <span class="phone-headline">
                    <a style="color: #ff9933;" href="tel:855-548-6890">855-548-6890</a>
                </span>
            </h4> -->

        </div>
    </section>

<section class="why-choose-cyh">
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
</section>

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
<!--             <div class="col-md-12">
                <ol class="step-list">
                    <div class="col-md-4 text-center">
                        <h2 class="steps-digits">1:</h2>
                        <h4 class="steps-head">
                            <?php the_field('homes_step_1'); ?>
                        </h4>
                        <p>
                            <?php the_field('homes_step_1_content'); ?>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                    
                        <h2 class="steps-digits">2:</h2>
                        <h4 class="steps-head">
                            <?php the_field('homes_step_2'); ?>
                        </h4>
                        <p>
                            <?php the_field('homes_step_2_content'); ?>
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                    
                        <h2 class="steps-digits">3:</h2>
                        <h4 class="steps-head">
                            <?php the_field('homes_step_3'); ?>
                        </h4>
                        <p>
                            <?php the_field('homes_step_3_content'); ?>
                        </p>
                    </div>
                </ol>
            </div> -->
            <h2 style=" text-align: center;">How It Works</h2>
        </div>        
        <div class="row">
            <div class="wrapper">
                <div class="youtube" data-embed="XVA8epXTkbg">
                    <div class="play-button"></div>
                </div>
            </div>           
        </div>
        <!-- /.row -->

       
    </section>

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
                <small>
Connect Your Home, LLC provides cable, satellite, broadband and security solutions for home office or business. Call for complete details on all offers. Pricing and promotion are subject to change. All logos, trademarks, programming providers and brand names depicted on this site are the exclusive property of their respective companies and not ConnectYourHome.com.                    
                </small>
              <p class="copyright"><?php the_field('edp_disclaimer'); ?></p>
              <p class="fine"><?php the_field('edp_fine_print'); ?></p>
          </div>        
      </footer>

 <script type="text/javascript">
        ( function() {

            var youtube = document.querySelectorAll( ".youtube" );
            
            for (var i = 0; i < youtube.length; i++) {
                
                var source = "https://img.youtube.com/vi/"+ youtube[i].dataset.embed +"/sddefault.jpg";
                
                var image = new Image();
                        image.src = source;
                        image.addEventListener( "load", function() {
                            youtube[ i ].appendChild( image );
                        }( i ) );
                
                        youtube[i].addEventListener( "click", function() {

                            var iframe = document.createElement( "iframe" );

                                    iframe.setAttribute( "frameborder", "0" );
                                    iframe.setAttribute( "allowfullscreen", "" );
                                    iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );

                                    this.innerHTML = "";
                                    this.appendChild( iframe );
                        } );    
            };
            
        } )();        
    </script>      
