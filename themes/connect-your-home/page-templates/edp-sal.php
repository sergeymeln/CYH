<?php
    $encode = 0;
	$groupId = $_GET['groupId'] ? $_GET['groupId'] : '1000009';

    // include './library/Auth.php';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJVc2VySWQiOiJjZWU4MmMwNC00YTA0LTQwMmYtOTY4Ni00NzllMjg5OGRhY2MiLCJDbGllbnREb21haW5FbmNvZGVkIjoieEtiWjBqL0dobzZnLzd2d1YvdWsxNlNodG5WeVRzTHFVL05mVVBheHNxVT0iLCJUb2tlblR5cGUiOiJjbGllbnRfYWNjZXNzX3Rva2VuIn0.F_VB3rjXOGB67CxASPhVGMKlBnMfQ6dsNx0fbZLKcI8'));
    curl_setopt($curl, CURLOPT_URL, "https://api.servicearealookup.com/api/group/".$groupId);
    curl_setopt($curl, CURLOPT_REFERER, 'https://www.connectyourhome.com');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    if(! $resp = curl_exec($curl)) {
        if($resp == "") {
            print "The call to https://api.servicearealookup.com/api/group/".$groupId." returned nothing. (blank page)";
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
    $HeroImage = $group_data['HeroImage'];
    $HeroImageMain = get_field("hero_image", get_the_ID());

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJVc2VySWQiOiJjZWU4MmMwNC00YTA0LTQwMmYtOTY4Ni00NzllMjg5OGRhY2MiLCJDbGllbnREb21haW5FbmNvZGVkIjoieEtiWjBqL0dobzZnLzd2d1YvdWsxNlNodG5WeVRzTHFVL05mVVBheHNxVT0iLCJUb2tlblR5cGUiOiJjbGllbnRfYWNjZXNzX3Rva2VuIn0.F_VB3rjXOGB67CxASPhVGMKlBnMfQ6dsNx0fbZLKcI8'));
    curl_setopt($curl, CURLOPT_URL, "https://api.servicearealookup.com/api/provider/topoffer/search?GroupId=".$groupId);
    curl_setopt($curl, CURLOPT_REFERER, 'https://www.connectyourhome.com');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    if(! $resp2 = curl_exec($curl)) {
        if($resp2 == "") {
            print "The call to https://api.servicearealookup.com/api/provider/topoffer/search?GroupId=".$groupId." returned nothing. (blank page)";
            echo "<br/>";
            print curl_error($curl);
            exit();
        }
        print "An error occurred: " . curl_error($curl);
        curl_close($curl);
        exit();
    }
    curl_close($curl);
    $top_offer_data = json_decode($resp2, true);

/*
 *
 * Template Name: EDP - SAL
 *
 */
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
			  background: url('https://www.connectyourhome.com/wp-content/themes/connect-you5-home/images/step-bg.png') no-repeat center center;
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
		.edp-head{
		  text-align: center;
		}	
			header.page-head .phone .phone-number{
				font-size: 2em;
			}
		.page-head .brand{
			margin: 30px;
		}
		header.page-head .brand{
			margin: 30px;
		}
		.brand-band h2{
			font-size: 24px;
		}
		.discount-grid-headline{
			color: #ff9933;
		}
		.discount-grid{
			border: solid lightgray 2px;
		}
		.img-holder img.grid-img{
			max-height: 130px;
		}
		.modal-backdrop.in{
			opacity: .75;
		}
		#homeSearch{
			width: 100%;
			height: inherit;
		}
		.rebateGiftInput{
			margin-bottom: 10px;
		}
		.modal-brand{
			max-width: 150px;
		}
		.modal-body{
			margin-top: 0px;
		}
		.masthead .masthead-widget{
			border-radius: 40px;
		}
		#edp-form-block{
			margin-top: 10px;
		}

		#edp-form-block hr{
			margin-top: 12px;
			border-top: 1px solid #777777;
		}
		.form-bg-container{
		    /*background: lightblue;*/
		    /*border: 2px solid;*/
		    /*background: blue;*/
		    display: inline-block;
		    padding-bottom: 3%;
		    /*margin-top: 20px;*/
		    width: 100%;
		}
		@media (min-width: 992px){
			.masthead {
			     overflow: inherit; 
			}
		}
		.masthead{
/*			background-image: url("<?php echo $HeroImage; ?>");
			background-image: url("http://localhost:8888/wp-content/uploads/2017/05/peeps-with-remote.png");
			background-repeat: no-repeat;*/
		}
		.masthead-form {
			background-color: #6CB33F;
		    padding: 30px;
		    padding-top: 0px;
		    padding-bottom: 10px;
		    left: 80px;
			z-index: 1000;
		}
		.form-holder{
		    position: absolute;
		    top: 0;			
		}
		.text-white{
			color: white;
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
                                    <div itemscope itemtype="http://schema.org/Organization">
                                        <span itemprop="telephone">
                                        <a href="#edp-form-block" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="phone-number btn btn-success btn-lg">
                                        <i class="glyphicon glyphicon-shopping-cart"></i> Start Saving!
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
					<div class="form-bg-container col-xs-6">
						<div class="hero-holder-div">		
							<img src="<?php if(!empty($HeroImage)) { echo $HeroImage; } else { echo $HeroImageMain; } ?>">
				            <div class="form-holder">
				                <div class="col-xs-6 masthead-form">
				                <h4 class="text-center text-white">
				                    Your Exclusive <?php echo $Name; ?> Discounts Start Here.
				                </h4>
				                <form id="edp-form" action="/cyb-results/?groupId=<?php echo $groupId; ?>" method="POST">
			                    	<input class="input rebateGiftInput form-control" type="text" name="fname" id="fnameRebateGift" placeholder="Enter First Name" >
			                		<input class="input rebateGiftInput form-control" type="text" name="lname" id="lnameRebateGift" placeholder="Enter Last Name" >
				                    <input class="input rebateGiftInput form-control" type="text" name="email" id="emailRebateGift" placeholder="Enter Email" required>
				                    <input class="input rebateGiftInput form-control" type="text" name="phone" id="phoneRebateGift" placeholder="Enter Phone" >
				                    <input class="input form-inline rebateGiftInput address form-control" type="text" name="search" id="edpSearch" placeholder="Enter address" required>
				                    <div class="col-md-12">	            		
					            		<input disabled class="btn btn-success btn-block edp-form-submit"  type="submit" value="View <?php echo $Name; ?> Deals!">
									</div>
				                    <input id="street_number_business_modal" type="hidden" name="street" />
				                    <input id="route_business_modal" type="hidden" name="route" />
				                    <input id="suite_business_modal" type="hidden" name="suite" />
				                    <input id="locality_business_modal" type="hidden" name="locality" />
				                    <input id="administrative_area_level_1_business_modal" type="hidden" name="administrative_area_level_1" />
				                    <input id="postal_code_business_modal" type="hidden" name="zip" />
				                    <input id="country_business_modal" type="hidden" name="country" />
				            		<input id="group_id_modal" type="hidden" name="groupId" value="<?php echo $groupId; ?>" />                 	                            
				            		<input id="partner_name" type="hidden" name="partnerName" value="<?php echo $Name; ?>" />                 	                            
				            		<input id="partner_logo" type="hidden" name="partnerLogo" value="<?php echo $Logo; ?>" />                 	                            
				                </form>
				                </div>
				            </div>            	
				        </div>		
				    </div>                    	
                </div>
            </div>
        </div>
    </section>

	<section id="edp-form-block">
		<div class="row">
			<div class="col-md-12">
<!-- 			<div class="widget-holder">
				<div class="masthead-widget">
                    <div class="col-xs-2">
						<div class="arr-container">
						  <a href="#edp-form-block" class="arrow down">Down</a>
						</div>                    	
                    </div>
                    <div class="col-xs-8">
                        <h4>
                            Complete Form to Get Started
                        </h4>	
                    </div>
                    <div class="col-xs-2">
						<div class="arr-container">
						  <a href="#edp-form-block" class="arrow down">Down</a>
						</div>                    	
                    </div>
                </div>
            </div> -->
			<!-- <div class="form-bg-container">
				<div class="col-xs-10 col-xs-offset-1">		
		            <div class="form-holder">
		                <h4 class="text-center">
		                    Your Exclusive <?php echo $Name; ?> Discounts Start Here.
		                </h4>
		                <div class="col-xs-6 col-xs-offset-3">
		                	<hr/>
		                <form id="edp-form" action="/cyb-results/?groupId=<?php echo $groupId; ?>">
	                    	<input class="input rebateGiftInput form-control" type="text" name="fname" id="fnameRebateGift" placeholder="Enter First Name" >
	                		<input class="input rebateGiftInput form-control" type="text" name="lname" id="lnameRebateGift" placeholder="Enter Last Name" >
		                    <input class="input rebateGiftInput form-control" type="text" name="email" id="emailRebateGift" placeholder="Enter Email" >
		                    <input class="input rebateGiftInput form-control" type="text" name="phone" id="phoneRebateGift" placeholder="Enter Phone" >
		                    <input class="input form-inline rebateGiftInput address form-control" type="text" name="search" id="edpSearch" placeholder="Enter address" >
			                <div class="col-md-8 col-md-offset-2">
			                	<hr/>
			                </div>	
		                    <div class="col-md-4 col-md-offset-4">	            		
			            		<input disabled class="btn btn-success btn-block edp-form-submit"  type="submit" value="View <?php echo $Name; ?> Deals!">
							</div>
		                    <input id="street_number_business_modal" type="hidden" name="street" />
		                    <input id="route_business_modal" type="hidden" name="route" />
		                    <input id="suite_business_modal" type="hidden" name="suite" />
		                    <input id="locality_business_modal" type="hidden" name="locality" />
		                    <input id="administrative_area_level_1_business_modal" type="hidden" name="administrative_area_level_1" />
		                    <input id="postal_code_business_modal" type="hidden" name="zip" />
		                    <input id="country_business_modal" type="hidden" name="country" />
		            		<input id="group_id_modal" type="hidden" name="groupId" value="<?php echo $groupId; ?>" />                 	                            
		            		<input id="partner_name" type="hidden" name="partnerName" value="<?php echo $Name; ?>" />                 	                            
		            		<input id="partner_logo" type="hidden" name="partnerLogo" value="<?php echo $Logo; ?>" />                 	                            
		                </form>
		                </div>
		            </div>            	
		        </div>		
		    </div> -->
	    </div>
        <br/>
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
    <hr/>
    <section>
    	<div class="row">
    		<h2 class="discount-grid-headline">Our Most Popular <?php echo $Name; ?> Deals And Discounts</h2>
    	</div>
    	<div class="row">
		<?php
		$i = 0;
		foreach ($top_offer_data as &$value) {
			if($i < 3){
			    $BrandName = $value['Name'];
			    $BrandDescription = explode("*", $value['Description'])[1];
			    $BrandLogo = $value['Logo'];
			    ?>
				<div class="col-md-4 grid-col">
					<div class="discount-grid">
						<div class="img-holder">
			    			<img class="grid-img" src="<?php echo $BrandLogo; ?>"> 
			    		</div>
			    		<div class="discount-text">
			    			<?php echo $BrandDescription; ?>
			    		</div>
					</div>
				</div>
		    <?php
		    $i++;
			}
		}    
		?>
    	</div>
    </section>

    <section>
    	<div class="row">
    		<div class="col-md-6">
    			<div class="program-details">
    				<h3 class="program-details-headline">With the Connect Your Home&reg; discount program you get:</h3>
	    			<ul class="program-details-list">
	    				<li>Premier sale support</li>
	    				<li>Our best offer from each brand</li>
	    				<li>Exclusive cash card rewards</li>
	    				<li>Priority installation dates</li>
	    			</ul>
    			</div>
    		</div>
    		<div class="col-md-6">
    			<div class="customer-service-woman">
    				<img src="https://www.connectyourhome.com/wp-content/uploads/2017/05/9097604-Headset-Customer-service-operator-woman-from-call-center-smiling-with-headset-showing-blank-empty-si-Stock-Photo.jpg">
    			</div>
    		</div>
    	</div>
    </section>

	<section class="how-it-works">
        <div class="row">
            <div class="col-md-12">
                <div class="mast edp-video-box">
                    <h2 class="edp-video-headline">
                        How the <?php echo $Name; ?> Employee discount program works
                    </h2>
                    <p>
                    	Our relationships with the nation's top providers mean you get all the services you want, and none that you don't, in one easy call.
                    </p>
                </div>
            </div>
        </div>
        <div class="row" style="display: none;">
            <div class="wrapper">
                <div class="youtube" data-embed="GRmJlOSwFwQ">
                    <div class="play-button"></div>
                </div>
            </div>           
        </div>
    </section>

    <section>
    	<div class="row text-center">
    		<div class="col-md-3 offer-block">
				<div class="offer-holder clearfix">
	    			<h2>TV <span><img class="offer-icon" src="https://www.connectyourhome.com/wp-content/uploads/2017/05/tv-bg.png"></span></h2>
	    			<p>Starting at</p>
	    			<h3 class="offer-price"><span class="dollar-sign">$</span>55<span class="cents">99</span></h3>
	    			<div class="duration">mo</div>
	    		</div>

			</div>
    		<div class="col-md-3 offer-block">
				<div class="offer-holder clearfix">
	    			<h2>Internet <span><img class="offer-icon" src="https://www.connectyourhome.com/wp-content/uploads/2017/05/internet_Icon_193x145.png"></span></h2>
	    			<p>Starting at</p>
	    			<h3 class="offer-price"><span class="dollar-sign">$</span>55<span class="cents">99</span></h3>
	    			<div class="duration">mo</div>
	    		</div>

			</div>
    		<div class="col-md-3 offer-block">
				<div class="offer-holder clearfix">
	    			<h2>Security <span><img class="offer-icon" src="https://www.connectyourhome.com/wp-content/uploads/2017/05/security_Icon193x145.png"></span></h2>
	    			<p>Starting at</p>
	    			<h3 class="offer-price"><span class="dollar-sign">$</span>55<span class="cents">99</span></h3>
	    			<div class="duration">mo</div>
	    		</div>

			</div>
    		<div class="col-md-3 offer-block">
				<div class="offer-holder clearfix">
	    			<h2>Bundles</h2>
	    			<p>Starting at</p>
	    			<h3 class="offer-price"><span class="dollar-sign">$</span>55<span class="cents">99</span></h3>
	    			<div class="duration">mo</div>
	    		</div>

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
<?php 
   // echo "<script>";
   // echo "document.addEventListener('DOMContentLoaded', function() {";
   // echo "console.log('footer script rendered!');";
   // echo "jQuery('#edp-form-block').modal('show');";
   // echo "console.log('".$yourbrowser."');";
   // echo "});";
   // echo "</script>";
  ?>
  </div>
<?php wp_footer(); ?>
</body>
</html>