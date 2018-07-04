<?php
/**
 * Template Name: Partners
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */
?>

<?php get_header('partners'); ?>
  <!-- This is the page specific wrapping class -->
<div id="main">
<div id="header">
<div class="logo_outer">
    <div id="logo"> <a href="index.php?promo=04377"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-edp.png" alt="" title="" border="0"></a><br>
    </div>
        <div class="logo_right">
                <div id="menu" style="position:relative">
            <div id="menuSlide" style="height: 50px; width: 1000px; position:absolute">
                <ul>
                          <li><a href="/edp/index.php?promo=0437701">Dish Network</a></li>
      <li><a href="/edp/index.php?promo=0437703">ADT</a></li>
      <li><a href="/edp/index.php?promo=0437705">Charter</a></li>
      <li><a href="/edp/index.php?promo=0437709">Time Warner</a></li>
      <li><a href="/edp/index.php?promo=0437715">Comcast</a></li>
                </ul>
            </div>
        </div>
                <!--
<div class="top_logos">
      <a href='/edp/index.php?promo=0437703'><img src='http://cyhimages.com/edp_images/952x340-Affinity-ADT-LP-TOP.jpg' alt='' title='' border='0'/></a>
      <a href='/edp/index.php?promo=0437709'><img src='http://cyhimages.com/edp_images/tioff.png' alt='' title='' border='0'/></a>
      <a href='/edp/index.php?promo=0437715'><img src='http://cyhimages.com/edp_images/cooff.png' alt='' title='' border='0'/></a>
</div> -->
    </div>
</div>
<div id="alias_block" style="width:auto; display:table; margin:0 auto;">
    <div id="company-name" style="width:auto; display:table">
                    
                <div id="company-cta">Exclusive Offers For:<br>
                            </div>
            <div id="company-alias">PerkSpot Members</div>
                    </div>
        <div class="number">

                                                <div class="phonenumber"><span class="callnow-span">Call Now:
                                                         &nbsp;</span>888-338-8922</div>
            </div>
            
                            </div>

            
            <div id="container" style="width: auto; display:table;" class="adt">
                <div class="banner_block" style="width: auto; display:table; margin:0 auto;">
                    <div class="banner_left" style="display:table; width:auto; float:none">
                        <img style="margin:0 auto;" title="adt" src="http://cyhimages.com/edp_images/952x340-Affinity-ADT-LP-TOP.jpg" alt="adt">
                    </div>

                </div>
                <div class="promo_blockouter" style="width:auto;background-color:white;display:table"> <img src="http://cyhimages.com/edp_images/952x527-Affinity-ADT-LP-BOTTOM-02.jpg" border="0" alt="" title="" usemap=""> </div>
            </div>
        </div>
 <section class='disclaimer'>
        <p class='disclaimerOnPageHolder'>
            <!-- <?php the_field('disclaimer_on_page_copy');?> -->
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
                            <!-- <?php the_field('disclaimer_copy');?> 
                            -->        
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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

<?php include 'modal-form-onebrand.php' ?>
<?php include 'modal-form.php' ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri(); ?>/javascripts/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/javascripts/fastclick.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/javascripts/jvfloat.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/javascripts/main.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTUh9CBBaNmVbno_LaDXlpDFnbGUg9rPA&signed_in=true&libraries=places&callback=initAutocomplete" async defer></script>
    <style type="text/css">
         @media (max-width: 1000px) {
            #main {
                width: 100%;
                background-size: 100% 230px;
            }
            .btn {
                width: 200px;
            }
            #header {
                width: 100%;
            }
            #logo {
                float: none;
                margin: auto;
            }
            .logo_outer {
                text-align: center;
            }
            .logo_right {
                width: 100%;
                float: none;
            }
            #menu {
                width: 100%; 
                float: none;
            }
            #menuSlide {
                position: static !important;
                width: 100% !important;
                text-align: center;
            }
            #menu ul {
                float: none;
            }
            #menu ul li {
                display: inline-block;
                float: none;
            }
        }
        @media (max-width: 570px) {
            .logo_outer,
            .logo_right,
            #menu {
                overflow: visible;
            }
            #main {
                background-size: 100% 350px;
            }
            #alias_block {
                padding-top: 60px;
            }
            #company-name {
                float: none;
            }
            .phonenumber {
                width: 100%;
                float: none;
                font-size: 36px;
            }
            span.callnow-span {
                display: block;
            }
            .number {
                float: none;
                height: initial;
            }
            #menu ul {
                padding: 0;
            }
            #menu ul li a {
                padding: 0px 12px;
            }
        }
    </style>

</body>
</html>
