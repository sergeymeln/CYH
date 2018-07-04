</div>
</div>
<!-- container -->


<?php include 'page-templates/modal-form.php' ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/javascripts/snap.svg-min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/javascripts/enlivenem.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
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