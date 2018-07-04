
<?php
    session_start();
    //Retrieve form post data
    if($_REQUEST['suite']){
        $street = $_REQUEST['street'] . ' ' . $_REQUEST['route'] . ' ' . $_REQUEST['suite'];
    } else {
        $street = $_REQUEST['street'] . ' ' . $_REQUEST['route'];
    }

    $city = $_REQUEST['locality'];
    $state = $_REQUEST['administrative_area_level_1'];
    $zip = $_REQUEST['zip'];
    $encode = 0;
    $GroupId = $_REQUEST['groupId'];
    $Name = $_REQUEST['partnerName'];
    $Logo = $_REQUEST['partnerLogo'];
    $Email = $_REQUEST['email'];
    $firstName = $_REQUEST['fname'];
    $lastName = $_REQUEST['lname'];
    $phone = $_REQUEST['phone'];

    // include './library/Auth.php';

    if (empty($_SESSION['userId'])) {
        $curl2 = curl_init();
        $data = json_encode(array('Email' => $Email, 'Zip' => $zip, 'GroupId' => $GroupId, 'PhoneNumber' => $phone, 'FirstName' => $firstName, 'LastName' => $lastName), JSON_FORCE_OBJECT);
        curl_setopt($curl2, CURLOPT_HTTPHEADER, array('Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJVc2VySWQiOiJjZWU4MmMwNC00YTA0LTQwMmYtOTY4Ni00NzllMjg5OGRhY2MiLCJDbGllbnREb21haW5FbmNvZGVkIjoieEtiWjBqL0dobzZnLzd2d1YvdWsxNlNodG5WeVRzTHFVL05mVVBheHNxVT0iLCJUb2tlblR5cGUiOiJjbGllbnRfYWNjZXNzX3Rva2VuIn0.F_VB3rjXOGB67CxASPhVGMKlBnMfQ6dsNx0fbZLKcI8', 'Content-Type: application/json', 'Content-Length: ' . strlen($data)));
        curl_setopt($curl2, CURLOPT_URL, "https://api.servicearealookup.com/api/customer/byemail");

        // curl_setopt($curl2, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data)));
        curl_setopt($curl2, CURLOPT_POSTFIELDS, $data);                                                              
        curl_setopt($curl2, CURLOPT_CUSTOMREQUEST, "POST");  
        curl_setopt($curl2, CURLOPT_REFERER, 'https://www.connectyourhome.com');
        // curl_setopt($curl2, CURLOPT_REFERER, 'http://localhost:8888');
        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl2, CURLOPT_POST, 1);   

        if(! $resp2 = curl_exec($curl2)) {
            if($resp2 == "") {
                print "The call to SAL returned nothing. (blank page)";
                echo "<br/>";
                print curl_error($curl2);
                exit();
            }
            print "An error occurred: " . curl_error($curl2);
            curl_close($curl2);
            exit();
        }
        curl_close($curl2);

        $rebate_gift_user_creation = json_decode($resp2, true);

        if (isset($rebate_gift_user_creation['UserId'])) {
            $userId = $rebate_gift_user_creation['UserId'];
        } else {
            $userId = null;
        }

        $_SESSION['userId'] = $userId;
    }

    $userId = $_SESSION['userId'];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJVc2VySWQiOiJjZWU4MmMwNC00YTA0LTQwMmYtOTY4Ni00NzllMjg5OGRhY2MiLCJDbGllbnREb21haW5FbmNvZGVkIjoieEtiWjBqL0dobzZnLzd2d1YvdWsxNlNodG5WeVRzTHFVL05mVVBheHNxVT0iLCJUb2tlblR5cGUiOiJjbGllbnRfYWNjZXNzX3Rva2VuIn0.F_VB3rjXOGB67CxASPhVGMKlBnMfQ6dsNx0fbZLKcI8'));
    // curl_setopt($curl, CURLOPT_URL, "https://api.servicearealookup.com/api/provider/topoffer/search?Zip=".$zip."&GroupId=".$GroupId."&UserId=11");
    curl_setopt($curl, CURLOPT_URL, "https://api.servicearealookup.com/api/provider/topoffer/search?Zip=".$zip."&GroupId=".$GroupId."&UserId=" . $userId);
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
    $top_offers = json_decode($resp, true);

    include './library/GetBrowser.php';

    // melissa data url
    $melissa_url = "https://personator.melissadata.net/v3/WEB/ContactVerify/doContactVerify?t=Sample&id=113933534&act=Check,Append&cols=FullName,CompanyName&opt=CentricHint:Auto;AdvancedAddressCorrection:No&first=&last=&full=&comp=&a1=" . urlencode($street) . "&a2=%20&city=". $city ."&state=" . $state . "&postal=" . $zip . "&ctry=%20&lastlines=&ff=&email=&phone=&reserved=&format=JSON";

    // get user browser info
    $ua = getBrowser();
    $yourbrowser = $ua['name'] . " " . $ua['version'];
    $machine = $ua['platform'];
    $ref = @$_SERVER[HTTP_REFERER];

    // get melissa data results
    $melissa = file_get_contents($melissa_url);
    $mel_res_company = json_decode($melissa, true)["Records"][0]["CompanyName"];
    $mel_res_full_name = json_decode($melissa, true)["Records"][0]["NameFull"];

    // figure if searched address is a business or residence
    if($mel_res_full_name != ""){
        $fullName = $mel_res_full_name;
    } else if($mel_res_company != ""){
        $fullName = $mel_res_company;
    }
    $resultcount = sizeof($resp);

    include './library/ResultsDBInsert.php';

/**
 * 
 * Template Name: EDP - Results
 * 
 */
?>

<?php get_header('edp-dynamic'); ?>


<style type="text/css">
    
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


</style> 
<div class="container">
 <header class="page-head">
    <div class="row">
        <div class="col-md-6">
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="brand" alt="Connect Your Home&reg;"></a>
            <a href="#"><img src="<?php echo $Logo; ?>" class="brand" alt="Connect Your Home&reg;"></a>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-9 col-md-offset-3 col-sm-7 col-sm-offset-5">


                    <div class="phone">
                            <div itemscope itemtype="http://schema.org/Organization">
                                <span itemprop="telephone">
                            <?php
                            if(get_field('edp_brand_phone')){ ?>
                                <a href="tel:<?php echo get_field('edp_brand_phone', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="phone-number btn btn-success btn-lg">
                                <i class="glyphicon glyphicon-earphone"></i> 
                                <?php echo get_field('edp_brand_phone');

                            }elseif(get_field('phone_number_one_brand')){ ?><a href="tel:<?php echo get_field('phone_number_one_brand');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="phone-number btn btn-success btn-lg">
                            <i class="glyphicon glyphicon-earphone"></i> 
                            <?php echo get_field('phone_number_one_brand');

                            }else{ ?><a href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="phone-number btn btn-success btn-lg">
                            <i class="glyphicon glyphicon-earphone"></i> 
                            <?php echo get_field('home_phone_number', 'option');
                            } ?>
                                </a>    
                            </span>
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> 

<div class="results-page">
<section class="results-header">


<?php if($resultcount == 0) {?>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8 brand-intro hero-holder">
                <div class="masthead">
                    <?php $hero_image = get_field('bundle_hero'); ?>
                    <img src="https://www.connectyourhome.com/wp-content/uploads/2016/04/756x397_internetHero_1.jpg" class="resultsPage" alt="">
                </div>
            </div>
            <div class="col-md-4 brand-intro">
                <div class="masthead">
                    <div class="banner-msg">
                        <h2>Please try again<br/></h2>
                        <form method="post">
                            <?php if (isset($oXML->Error)) { ?>
                                <div class="alert alert-danger searchError">
                                    <?php echo $oXML->Error?>
                                    <br/>
                                    <br/>
                                    Click here to search again.
                                </div>
                            <?php } ?>
                        </form>
                        <div class="row service-cta">
                           <div class="col-md-12 ">
                                <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#get-a-quote">
                                Contact Us Now
                               </button>
                           </div>
                        </div>
                    </div> 
                </div>            
            </div>  
        </div>  
    </div>  
    <?php } ?>        

<?php 
    $top_offers = json_decode($resp, true);
?>
</section>
<!-- /.results-header -->
<?php if (isset($top_offers)){ ?>
<section class="results">
    <div class="row">
        <div class="results-headline text-center">
            <h2>
                Your exclusive <?php echo $Name; ?> deals and discounts
            </h2>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Don't forget to check your email to register for your special gift!</h4>
            </div>
        </div>
    <div class="row top-info">
        <div class="col-md-12">
            <div class="breadcrumbs">
                <?php if (function_exists('qt_custom_breadcrumbs') && $resultcount > 0){ qt_custom_breadcrumbs();
                    echo " for <a class='resultsAddress'>" . $street . ", " . $city . ", " . $state . "  - " . $zip . "</a>";
                    }
                 ?>
            </div>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-12">
            <table class="results-tbl tablesaw-stack" >
                <thead class="hidden-xs">
                    <tr>
                        <th class="provider-th">Provider</th>
                        <th class="features-th">Plans &amp; Features</th>
                        <th class="price-th">Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                foreach ($top_offers as $obj) {
                    $providerlogo = $obj['Provider']['Logo'];
                    $providerGWP = $obj['Provider']['GWP']['DisplayName'];
                    $providerGWPInstructions = $obj['Provider']['GWP']['RequestInstructions'];
                    $providerCTA = $obj['Tagline'];
                    $providerDescription = $obj['Tagline'];
                    $providerID = $obj['Provider']['Id'];


                    $providerSalePrice = $obj['Price'] ? $obj['Price'] : 0;

                    if(strrpos($providerSalePrice, '.') == false){
                        $providerSalePrice .= '.00';
                    }

                    $str = str_replace('"', '', $obj['Description']);
                    $providerFeatures = explode("*", $str);


                    // $providerDisclaimer = $obj['Provider']['Legal'];
                    $providerDisclaimer = $obj['Legal'];

                    $salPhone = $obj['Provider']['Phone']['Number'];
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

                    // }

                    if (isset($providerCTA) || isset($providerDescription) || isset($providerSalePrice) ){
                        echo "<tr>";
                        echo "<td><img src='" . $providerlogo . "' class=\"img-natural\"/><hr/><div class='offer-verbiage'>Exclusive Offer</div>";
                        if(!empty($providerGWP)) {
                             echo "<div class='btn btn-success provider-name'>".$providerGWP."</div><div class='instructions-gwp'><span>x</span>".$providerGWPInstructions."</div></td>";
                        }  
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
                                  <a href=\"/cyb-brand/?groupId=".$GroupId.'&providerId='. $providerID .'&zipcode='.$zip.'&phoneNumber='. $cleaned_phone."\" class=\"btn btn-outline\"><span class=\"glyphicon glyphicon-search\" aria-hidden=\"true\"></span> More Info</a><br />
                                  ";

                        if (isset($providerDisclaimer)) {
                            echo '<a href="#" class="disclaimer">View Disclaimer</a>';
                        }

                        echo "</td></tr>";
                        echo '<tr class="disclaimer-row">';
                            echo '<td colspan="3">';
                                if (isset($providerDisclaimer)){

                                    echo $providerDisclaimer;
                                }
                            echo '</td>';
                        echo '</tr>';

                    }
                }

                ?>
                </tbody>
            </table>
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
</section>
<?php } ?>
<!-- /.results-header -->
</div> <!-- /results-page -->
<style>
    .results-tbl tbody > tr.disclaimer-row{
        display:none;
    }
</style>
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
Connect Your Home, LLC provides cable, satellite, broadband and security solutions for home office or business. Call for complete details on all offers. Pricing and promotion are subject to change. All logos, trademarks, programming providers and brand names depicted on this site are the exclusive property of their respective companies and not ConnectYourHome.com.                    
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

    <script type="text/javascript">
            
        function mySubmitFunction(e){
            console.log('submissions!');
            console.log(e);
            // jQuery('#edp-form').submit(function(e){
            //     e.preventDefault();
            // });
            // return false;
        }   

            // jQuery('.closeModal').click(function(){
            //     jQuery('#edp-form-modal').modal('hide');
            // })


            // jQuery('#edp-form-modal').modal('show');
    </script>


<?php 
   echo "<script>";
   echo "document.addEventListener('DOMContentLoaded', function() {";
   echo "console.log('footer script rendered!');";
   // echo "jQuery('#edp-form-modal').modal('show');";
   echo "console.log('".$yourbrowser."');";
   echo "});";
   echo "</script>";
  ?>
  <?php wp_footer(); ?>
  </body>
  </html>