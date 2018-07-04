

         </div>
         </div>
    <!-- container -->

        <footer>
            <div class="border-styler"></div>
            <div class="container">
            <div class="row terms">
                <div class="col-md-3 pull-right">
                    <!-- <a href="#">Terms &amp; Conditions</a> -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <div class="row foot-links">
                <div class="col-sm-3">
                   <?php the_field('footer_column_1', 'option'); ?>
                </div>
                <!-- /.col-md3 -->
                <div class="col-sm-3">
                    <?php the_field('footer_column_2', 'option'); ?>
                </div>
                <!-- /.col-md3 -->
                <div class="col-sm-3">
                    <?php the_field('footer_column_3', 'option'); ?>
                </div>
                <!-- /.col-md3 -->
                <div class="col-sm-3">
                    <?php the_field('footer_column_4', 'option'); ?>
                </div>
                <!-- /.col-md3 -->
            </div>
            <!-- /.row foot-links -->
            <div class="row copy">
	            <div class="seal">
	                <a href="http://www.bbb.org/denver/business-reviews/cable-tv-internet-and-telephone-installation-service/connect-your-home-llc-in-denver-co-90165080/#bbbonlineclick" target="_blank" rel="nofollow"><img src="https://seal-denver.bbb.org/seals/blue-seal-293-61-bbb-90165080.png" style="border: 0; max-width: 200px;" alt="Connect Your Home, LLC BBB Business Review" /></a>


	              
	            </div>
	            <hr/>
	            <a class="cta-cyh" href="https://www.connectyourbusiness.com">
	            	Are you looking for business services? Visit Connect Your Business&reg;!
	            </a>
	            <div class="col-md-12">
	            	<p>&copy; Copyright <?php echo date( 'Y' )?>. Connect Your Home, LLC
	            	</p>
            <small style="color: #fff;">
                <?php the_field('dish_disclaimer', 'option') ?>
            </small>                    
	            </div>
            </div>
        </footer>
        <form method="post" action="/results" id="search-form">
            <input id="street_number" type="hidden" name="street" />
            <input id="route" type="hidden" name="route" />
            <input id="suite" type="hidden" name="suite" />
            <input id="locality" type="hidden" name="locality" />
            <input id="administrative_area_level_1" type="hidden" name="administrative_area_level_1" />
            <input id="postal_code" type="hidden" name="zip" />
            <input id="country" type="hidden" name="country" />
        </form>
<?php include 'page-templates/modal-form.php' ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php wp_enqueue_script('cyh-app-main'); ?>
    <?php wp_enqueue_script('enliven-em'); ?>
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

<?php wp_footer(); ?>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
var time = ($("body").hasClass('home')) ? 45000 : 60000; 
setTimeout(
    function(){
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/593eb657b3d02e11ecc697d7/default';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
},time);
</script>
<!--End of Tawk.to Script-->
</body>
</html>