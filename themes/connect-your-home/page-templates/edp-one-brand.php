<?php
    /**
     * Template Name: EDP - One Brand
     *
     * 
     */
    $counter = 0;
    $linkCounter = 0;
    $encode = 0;
    $GroupId = $_GET['groupId'];
    $ProviderId = $_GET['providerId'];

    session_start();

    $userId = (isset($_SESSION['userId'])) ? $_SESSION['userId'] : null;

    $Zipcode = $_GET['zipcode'];
    $PhoneNumber = $_GET['phoneNumber'];

    // include './library/Auth.php';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJVc2VySWQiOiJjZWU4MmMwNC00YTA0LTQwMmYtOTY4Ni00NzllMjg5OGRhY2MiLCJDbGllbnREb21haW5FbmNvZGVkIjoieEtiWjBqL0dobzZnLzd2d1YvdWsxNlNodG5WeVRzTHFVL05mVVBheHNxVT0iLCJUb2tlblR5cGUiOiJjbGllbnRfYWNjZXNzX3Rva2VuIn0.F_VB3rjXOGB67CxASPhVGMKlBnMfQ6dsNx0fbZLKcI8'));
    curl_setopt($curl, CURLOPT_URL, "https://api.servicearealookup.com/api/provider/".$ProviderId."/category/product/search?Zip=".$Zipcode."&BestOffersOnly=true&GroupId=".$GroupId."&UserId=" . $userId);
    curl_setopt($curl, CURLOPT_REFERER, 'https://www.connectyourhome.com');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    if(! $resp = curl_exec($curl)) {
        if($resp == "") {
            print "The call to SAL returned nothing. (blank page)";
            echo "<br/>";
            print curl_error($curl);
            exit();
        }
        print "An error occurred: " . curl_error($curl);
        curl_close($curl);
        exit();
    }

    curl_close($curl);   
    $provider_plans = json_decode($resp, true); 


    $curl = curl_init();
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJVc2VySWQiOiJjZWU4MmMwNC00YTA0LTQwMmYtOTY4Ni00NzllMjg5OGRhY2MiLCJDbGllbnREb21haW5FbmNvZGVkIjoieEtiWjBqL0dobzZnLzd2d1YvdWsxNlNodG5WeVRzTHFVL05mVVBheHNxVT0iLCJUb2tlblR5cGUiOiJjbGllbnRfYWNjZXNzX3Rva2VuIn0.F_VB3rjXOGB67CxASPhVGMKlBnMfQ6dsNx0fbZLKcI8'));
    curl_setopt($curl, CURLOPT_URL, "https://api.servicearealookup.com/api/provider/".$ProviderId."/topoffer/search?Zip=".$Zipcode."&BestOffersOnly=true&GroupId=".$GroupId."&UserId=" . $userId);
    curl_setopt($curl, CURLOPT_REFERER, 'https://www.connectyourhome.com');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    if(! $resp = curl_exec($curl)) {
        if($resp == "") {
            print "The call to SAL returned nothing. (blank page)";
            echo "<br/>";
            print curl_error($curl);
            exit();
        }
        print "An error occurred: " . curl_error($curl);
        curl_close($curl);
        exit();
    }
    curl_close($curl);
    $provider_top_offer = json_decode($resp, true); 

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJVc2VySWQiOiJjZWU4MmMwNC00YTA0LTQwMmYtOTY4Ni00NzllMjg5OGRhY2MiLCJDbGllbnREb21haW5FbmNvZGVkIjoieEtiWjBqL0dobzZnLzd2d1YvdWsxNlNodG5WeVRzTHFVL05mVVBheHNxVT0iLCJUb2tlblR5cGUiOiJjbGllbnRfYWNjZXNzX3Rva2VuIn0.F_VB3rjXOGB67CxASPhVGMKlBnMfQ6dsNx0fbZLKcI8'));
    curl_setopt($curl, CURLOPT_URL, "https://api.servicearealookup.com/api/group/".$GroupId);
    curl_setopt($curl, CURLOPT_REFERER, 'https://www.connectyourhome.com');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    if(! $resp = curl_exec($curl)) {
        if($resp == "") {
            print "The call to SAL returned nothing. (blank page)";
            echo "<br/>";
            print curl_error($curl);
            exit();
        }
        print "An error occurred: " . curl_error($curl);
        curl_close($curl);
        exit();
    }
    curl_close($curl);
    $group_data = json_decode($resp, true);

    $Name = $group_data['Name'];
    $Tagline = $group_data['Tagline'];
    $Description = $group_data['Description'];
    $Logo = $group_data['Logo'];
    $HeroImage = get_field('hero_image')['url'];

?>


<?php get_header('edp-dynamic'); ?>
<style type="text/css">
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

            .steps {
              display: block;
              background: url('http://localhost:8888/wp-content/themes/connect-your-home/images/step-bg.png') no-repeat center center;
              background-size: 100%;
              margin-top: 42px;
              position: relative;
              height: 118px;
            }

            .steps .step-1 {
              position: absolute;
              right: 50px;
              top: 25px;
            }

            .steps .step-2 {
              position: absolute;
              right: 450px;
              top: 25px;
            }

            .steps h3 {
              font-family: gotham_boldregular;
              color: #6CB33F;
              position: relative;
              width: 293px;
              text-align: center;
              font-size: 22px;
              line-height: 22px;
              top: 35px;
            }           
        }

        .steps {
          display: block;
          background: url('<?php echo get_template_directory_uri(); ?>/images/step-bg.png') no-repeat center center;
          background-size: 100%;
          margin-top: 42px;
          position: relative;
          height: 118px;
        }

        .steps .step-1 {
          position: absolute;
          right: 50px;
          top: 25px;
        }

        .steps .step-2 {
          position: absolute;
          right: 449px;
          top: 25px;
        }

        .steps h3 {
          font-family: gotham_boldregular;
          color: #6CB33F;
          position: relative;
          width: 293px;
          text-align: center;
          font-size: 22px;
          line-height: 22px;
          top: 35px;
        }

        .brand-grid .grid-badge {
            position: absolute;
            right: 0px;
            top: 82px;
            left: 593px;
            width: inherit;
            height: 81px;
        }

        .steps p{
            font-size: 14px;
          line-height: 1.42857143;
        }
        .step-holder {
          display: none;
        }

        footer {
          background: #e9e9e9;
          text-align: center;
          padding: 20px 0 0;
          margin-top: 45px;
        }

        footer .copyright {
          font-size: 10px;
        }

        footer .fine {
          font-size: 8px;
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

        .phone .phone-number.edp-number{
              font-size: 30px;
        }

        header img{
            max-width: 250px;  
        }

        }    
</style>





<div class="container">
        <header class="page-head">
            <div class="row">
                <div class="col-md-6">
                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="brand" alt="Connect Your Home&reg;"></a>
                    <a href="#"><img src="<?php echo $Logo; ?>" class="brand" alt="Connect Your Home&reg;"></a>
                </div>
                <div class="col-md-6">
                    <div class="row" cf>
                        <div class="col-md-9 col-md-offset-3 col-sm-7 col-sm-offset-5">
                            <div class="phone">
                                <span class="phone-label">Order Now:</span>
                                    <div itemscope itemtype="http://schema.org/Organization">
                                        <span itemprop="telephone">
                                    <?php?>
                                        <a href="tel:<?php echo $cleaned_phone; ?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="phone-number btn btn-success btn-lg">
                                        <i class="glyphicon glyphicon-earphone"></i> <?php echo $PhoneNumber; ?>
                                        </a>    
                                    </span>
                                </div>            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    <section class="hero">
        <div class="row">
            <div class="col-md-12">
                <div class="masthead">


<?php

$repeater_counter = 0;
$img_found = false;
// $arr_count = count(get_field('hero_repeater'));
// print_r($arr_count);
// echo gettype($arr_count);
// echo gettype($repeater_counter);


echo "\n";

// check if the repeater field has rows of data
if( have_rows('hero_repeater') ):

    // loop through the rows of data
    while ( have_rows('hero_repeater') ) : the_row();
                       
        // print_r(the_row());
        // $repeater_counter += 1;
             
            $providerHero = get_sub_field('brand_id');
            // echo "\nProviderId: ";
            // echo $ProviderId;
            // echo "\nProviderHero: ";
            // echo $providerHero;
            // echo "\nrepeater_counter: ";
            // echo $repeater_counter;

        if ($providerHero == $ProviderId){
            $img_found = true;
            $HeroImageBrand = get_sub_field('hero_brand_image');
            ?>
                <img src="<?php echo $HeroImageBrand; ?>" />

            <?php
        } 
        // else if($repeater_counter == 3) && !$img_found) {
        //         echo "this is sup!";
        //     ?>
        <!-- <img src="<?php echo $HeroImage; ?>" /> -->
            <?php 
        // } else {

        //     echo "nothing fit the if statements";

        // }
            // echo "\ncount";
            // $count = count(the_row());



    endwhile;

else :

    // no rows found

endif;

if(!$img_found){
    echo "<img src='$HeroImage' />";
}


?>                  
                </div>
            </div>
        </div>
        <div class="row">
            <div class="results-headline text-center">
                <h2>
                    Our Most Popular <?php echo $Name; ?> deals and discounts
                </h2>
            </div>
        </div> 
    </section>
<div class="one-brand">
    <section class="top-offer">
            <table class="results-tbl tablesaw-stack" >
                <thead class="hidden-xs">
                    <tr>
                        <th class="provider-th"></th>
                        <th class="features-th"></th>
                        <th class="price-th"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                    $providerlogo = $provider_top_offer['Provider']['Logo'];
                    $providerCTA = $provider_top_offer['Tagline'];
                    $providerGWP = $provider_top_offer['Provider']['GWP']['DisplayName'];
                    $providerGWPInstructions = $provider_top_offer['Provider']['GWP']['RequestInstructions'];
                    $providerDescription = $provider_top_offer['Tagline'];
                    $providerID = $provider_top_offer['Provider']['Id'];
                    $providerSalePrice = $provider_top_offer['Price'] ? $provider_top_offer['Price'] : 0;
                    if(strrpos($providerSalePrice, '.') == false){
                        $providerSalePrice .= '.00';
                    }

                    $str = str_replace('"', '', $provider_top_offer['Description']);
                    $providerFeatures = explode("*", $str);

                    $providerDisclaimer = $provider_top_offer['Provider']['Legal'];

                    $salPhone = $provider_top_offer['Provider']['Phone']['Number'];
                    $cleaned_phone = '';

                    // if(strlen($salPhone) == 10){
                        $PhoneStr = strval($salPhone);
                        $phone_arr = str_split($PhoneStr,3);
                        $cleaned_phone .= $phone_arr[0];
                        $cleaned_phone .= "-";
                        $cleaned_phone .= $phone_arr[1];
                        $cleaned_phone .= "-";
                        $cleaned_phone .= $phone_arr[2];
                        $cleaned_phone .= $phone_arr[3];


                    if (isset($providerCTA) || isset($providerDescription) || isset($providerSalePrice) ){
                        echo "<tr>";
                        echo "<td>
                                <img src='" . $providerlogo . "' class=\"img-natural\"/>
                                <hr/>
                                <div class='offer-verbiage'>Exclusive Offer</div>";
                            if(!empty($providerGWP)) {
                                 echo "<div class='btn btn-success provider-name'>".$providerGWP."</div><div class='instructions-gwp'><span>x</span>".$providerGWPInstructions."</div></td>";
                            }   
                        echo "</td>";
                        echo "<td class='desc'><h4>" . $providerDescription . "</h4>";
                        echo "<ul class=\"plus-list\">";
                        foreach ($providerFeatures as $feature) {
                            if($feature != ''){
                                echo "<li>" . $feature . "</li>";
                            }
                        }
                        echo "</ul>";

                        echo "</td>";
                        echo "<td><span class=\"price-intro\">Starting at</span><br />
                                  <span class=\"price\">$" . $providerSalePrice . "</span><br />
                                  <a href=\"" . 'tel:' . "$cleaned_phone\" class=\"phone-number btn btn-success btn-lg\"><i class=\"glyphicon glyphicon-earphone\"></i> $cleaned_phone</a>
                                  <br /> 
                                  ";

                        echo "</td></tr>";

                    }

                ?>
                </tbody>
            </table>    
    </section>
    <style type="text/css">
        .instructions-gwp {
            display: none;
        }
        .provider-name {
            max-width: 90%;
        }
        .results-tbl tbody > tr > td {
                position: relative;
        }
        .instructions-gwp span {
            position: absolute;
            right: 5px;
            top: 0px;
            font-size: 24px;
            line-height: 24px;
            cursor: pointer;
        }
        .instructions-gwp {
            /* display: none; */
            border: 1px solid #ccc;
            background: #fff;
            position: absolute;
            z-index: 1;
            /* max-width: 90%; */
            margin-left: 10px;
            bottom: 30px;
            /* display: table; */
            /* height: 50%; */
            left: 0;
            right: 0;
            padding: 25px;
        }
    </style>
    <script type="text/javascript">
        jQuery('.provider-name').on('click',function(){
            jQuery(this).parent().find('.instructions-gwp').show();
        });
        jQuery('.instructions-gwp span').on('click',function(){
            jQuery(this).parent().hide();
        });
    </script>
    <section class="packages">
        <div class="row">
            <div class="results-headline text-center">
                <h3>
                    Call us to compare or order these great deals: 
                    <a href="tel:<?php echo $cleaned_phone; ?>">
                        <?php echo $cleaned_phone; ?>
                    </a>
                </h3>
            </div>
        </div>     
        <?php 
            $counter = 0;
            foreach($provider_plans as $plan){
            ?>  
            <div class="package-module <?php echo $counter % 2 == 1? 'grey-bg': ''; ?>">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-8 col-sm-6 <?php echo $counter % 2 == 1? 'pull-right': 'pull-left'; ?>">
                            <h3>
                                <?php echo $plan['Name']; ?>
                            </h3>
                            <p>
                                <?php echo $plan['Tagline']; ?>
                            </p>
                            <!-- <p>
                                <?php print_r($plan); ?>
                            </p> -->
                            <ul class="plus-list">
                                <?php 
                                $str = str_replace('"', '', $plan['Description']);
                                $planFeatures = explode("*", $str);
                                foreach($planFeatures as $features){ ?>
                                    <li class="features">
                                        <?php echo $features; ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div> 
                        <div class="col-md-4 col-sm-6">
                            <div class="sal-service-logo-holder">
                                <img class="sal-service-logo" src="<?php echo $plan['Logo']; ?>">
                                <span class="count">
                                    <?php the_sub_field('campaign_count'); ?>
                                    <span class="count-strap">
                                        <?php the_sub_field('count_type'); ?>
                                    </span>
                                </span>
                            </div>            
                        </div>              
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                        </div>
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-0">
                            <div class="price">
                                    <p>Starting at</p>
                                    <span class="price-value">$<?php 
                                        $price = $plan['Price'];
                                        if(strrpos($price, '.') == false){
                                            $price .= '.00';
                                        }                                        

                                    echo $price; ?>
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

                                <?php if( get_sub_field('campaign_price')) { ?>
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
                                <a href="tel:<?php echo $PhoneNumber;?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Bundles - CTA Banner');" class="phone-number btn btn-success btn-lg"><i class="glyphicon glyphicon-earphone"></i> <?php echo $PhoneNumber;?></a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
        $counter += 1;
        } ?>
    </section>

    
    <section>
        <div class="row">
            <div class="brand-band">
            <h2>Exclusive <?php echo $Name; ?> Discounts On These Great Brands</h2>
            <?php
            if( have_rows('brand_band') ):
                while ( have_rows('brand_band') ) : the_row();
                    $brand_band_img = get_sub_field('brand_band_image')['url'];
                    ?>
                    <img class="brand-band-img" src="<?php echo $brand_band_img; ?>">
                    <?php
                endwhile;
            else :
            endif;
            ?>              
            </div>
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
                            <?php echo $provider_top_offer['Provider']['Legal']; ?>        
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
<!-- /.one-brand -->
<?php include 'modal-form-onebrand.php' ?>

<div class="clearfix"></div>
<div class="col-md-12">
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
Connect Your Home&reg;, LLC provides cable, satellite, broadband and security solutions for home office or business. Call for complete details on all offers. Pricing and promotion are subject to change. All logos, trademarks, programming providers and brand names depicted on this site are the exclusive property of their respective companies and not ConnectYourHome.com.
                </small>
              <p class="copyright"><?php the_field('edp_disclaimer'); ?></p>
              <p class="fine"><?php the_field('edp_fine_print'); ?></p>
          </div>        
      </footer></div>
<?php 
    include 'modal-form-edp.php' 
?>      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/javascripts/jquery-ui.1.10.3.min.js"></script>    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri(); ?>/javascripts/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/javascripts/fastclick.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/javascripts/jvfloat.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/javascripts/main.js"></script> 
<?php 
   // echo "<script>";
   // echo "document.addEventListener('DOMContentLoaded', function() {";
   // echo "console.log('footer script rendered!');";
   // echo "jQuery('#edp-form-block').modal('show');";
   // echo "console.log('".$yourbrowser."');";
   // echo "});";
   // echo "</script>";
  ?>

