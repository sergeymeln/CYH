<div id="get-a-quote" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">close</span></button>

            </div>
            <div class="modal-body">
            <div class="col-md-12">
                <h2>Call now!</h2>
                <h3>
                <?php
                if(get_field('edp_brand_phone')){ ?>
                    <a href="tel:<?php echo get_field('edp_brand_phone', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Modal Form');" class="phone-number">
                    <?php
                        echo get_field('edp_brand_phone');
                }elseif(get_field('phone_number_one_brand')){ ?><a href="tel:<?php echo get_field('phone_number_one_brand');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Modal Form');" class="phone-number">
                <?php
                        echo get_field('phone_number_one_brand');
                }else{ ?><a href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Modal Form');" class="phone-number">
                <?php
                        echo get_field('home_phone_number', 'option');
                } ?>
                    </a>
                </h3>
            </div>   
                
            </div>
            <div class="footer-cta">
                <p>Act Now and Have Your New Service Installed in as Little as 24 Hours!</p>
            </div>
            <div class="row mtop10">
                <div class="col-xs-6">
                    <a href="http://www.bbb.org/denver/business-reviews/cable-tv-internet-and-telephone-installation-service/connect-your-home-llc-in-denver-co-90165080/#bbbonlineclick" target="_blank" rel="nofollow"><img src="https://seal-denver.bbb.org/seals/blue-seal-293-61-bbb-90165080.png" style="border: 0; max-width: 200px;" alt="Connect Your Home, LLC BBB Business Review" /></a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->