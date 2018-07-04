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
            <?php if (!get_field('nav_toggle')) { ?>
                <div class="col-sm-12">
                    <?php the_field('footer_column_1', 'option'); ?>
                </div>
            <?php } ?>
            <?php if (get_field('nav_toggle')) { ?>
                <div class="col-sm-3">
                    <?php the_field('footer_column_1', 'option'); ?>
                </div>
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
            <?php } ?>
        </div>
        <!-- /.row foot-links -->
        <div class="row copy">
            <div class="seal">
                <a href="http://www.bbb.org/denver/business-reviews/cable-tv-internet-and-telephone-installation-service/connect-your-home-llc-in-denver-co-90165080/#bbbonlineclick"
                   target="_blank" rel="nofollow"><img
                            src="https://seal-denver.bbb.org/seals/blue-seal-293-61-bbb-90165080.png"
                            style="border: 0; max-width: 200px;" alt="Connect Your Home, LLC BBB Business Review"/></a>


            </div>
            <hr/>
            <a class="cta-cyh" href="https://www.connectyourbusiness.com">Looking for business services? Visit Connect
                Your Business&reg;!</a>
            <div class="col-md-12"><p>&copy; Copyright <?php echo date('Y') ?>. Connect Your Home, LLC</p></div>
        </div>
</footer>
<form method="post" action="/results" id="search-form">
    <input id="street_number" type="hidden" name="street"/>
    <input id="route" type="hidden" name="route"/>
    <input id="suite" type="hidden" name="suite"/>
    <input id="locality" type="hidden" name="locality"/>
    <input id="administrative_area_level_1" type="hidden" name="administrative_area_level_1"/>
    <input id="postal_code" type="hidden" name="zip"/>
    <input id="country" type="hidden" name="country"/>
</form>
<?php include 'page-templates/modal-form.php' ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/javascripts/jquery-ui.1.10.3.min.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    var time = ($("body").hasClass('home')) ? 45000 : 60000;
    setTimeout(
        function () {
            var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/593eb657b3d02e11ecc697d7/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        }, time);
</script>
<!--End of Tawk.to Script-->
<?php wp_enqueue_script('cyh-app-main'); ?>

<?php wp_footer(); ?>
</body>
</html>