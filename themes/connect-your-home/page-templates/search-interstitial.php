<div class="search-interstitial">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 form-holder">
            <div class="art-wrap">
                <h3>Find Service In Your Area</h3>
                <form onsubmit="return false;"   >
                <input type="search" name="street" id="search-services" placeholder="Enter Address and Zipcode" class="address-autocomplete"> <button class="btn btn-orange search-button" type="submit">Go!</button>
                </form>
                <h3>Or call us! 
                <?php
                if(get_field('edp_brand_phone')){ ?>
                    <a href="tel:<?php echo get_field('edp_brand_phone', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Search Interstitial');" class="phone-number">
                    <?php
                        echo get_field('edp_brand_phone');
                }elseif(get_field('phone_number_one_brand')){ ?><a href="tel:<?php echo get_field('phone_number_one_brand');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Search Interstitial');" class="phone-number">
                <?php
                        echo get_field('phone_number_one_brand');
                }else{ ?><a href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Search Interstitial');" class="phone-number">
                <?php
                        echo get_field('home_phone_number', 'option');
                } ?>
                    </a>
                </h3>
            </div>
        </div>
        <!-- /.col-md-4 col-md-offset-4 -->
    </div>
    <!-- /.row -->
</div>