 <section class="phone">
            <div class="row text-center">
                                <div class="phone text-center footer-cta">
                                <span class="phone-label">Call Now To Order:</span>
                <?php
                if(get_field('cyb_phone_number', 'option')){ ?>
                    <a href="tel:<?php echo get_field('cyb_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Features');" class="phone-number btn btn-danger phone-button btn-custom">
                    <?php
                        echo get_field('cyb_phone_number', 'option');
                }elseif(get_field('phone_number_one_brand')){ ?><a href="tel:<?php echo get_field('phone_number_one_brand');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Features');" class="phone-number btn btn-danger phone-button btn-custom">
                <?php
                        echo get_field('phone_number_one_brand');
                }else{ ?><a href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Features');" class="phone-number btn btn-danger phone-button btn-custom">
                <?php
                        echo "insert phone here";
                } ?>
                    </a>
                </div>
            </div>
 </section>