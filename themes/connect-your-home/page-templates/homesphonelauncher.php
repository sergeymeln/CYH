<?php
/**
 * Template Name: Homesphonelauncher
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */
?>

<?php get_header('homesphonelauncher'); ?>
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
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </section>


    <section class="services">

        
        <div class="row service-head">
            <div class="col-md-8 col-md-offset-2">
                <h1>
                    <?php the_field('homepage_heading'); ?>
                </h1>
                <p>
                    <?php the_field('homepage_heading_strapline'); ?>
                </p>

        <a style="display: none;" href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Homes Email');" id="homesEmail" class="phone-number btn btn-success btn-block btn-lg"><i class="glyphicon glyphicon-earphone"></i> <?php echo get_field('home_phone_number', 'option');?></a>
            </div>
            <!-- /.col-md-8 col-md-offset-2 -->
        </div>
        <hr>
    </section>

<div class="col-md-12">
    <?php get_footer('home'); ?>
</div>

<script type="text/javascript">
   
    function findGetParameter(parameterName) {
        var result = null,
            tmp = [];
        location.search
        .substr(1)
            .split("&")
            .forEach(function (item) {
            tmp = item.split("=");
            if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
        return result;
    }

    var param1 = findGetParameter("phoneNumber")

    $(document).ready(function(){
        console.log("param1: ", param1);  
    })
    function submit()
    {   
        var phoneNumber = document.getElementById("homesEmail");
        phoneNumber.href = "tel:" + param1
        if(param1){
            phoneNumber.click();
        }
    }
</script>




