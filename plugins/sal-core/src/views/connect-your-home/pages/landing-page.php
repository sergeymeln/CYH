<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<section>
    <div class="container">
        <div class="row">
            <table class="table providers-table">
                <thead class="hidden-xs hidden-sm">
                <tr class="thead-row">
                    <th scope="col" class="provider-th">Provider</th>
                    <th scope="col" class="features-th">Plans & Features</th>
                    <th scope="col" class="price-th">Price</th>
                </tr>
                </thead>
                <tbody>
               <?php if( have_rows('section') ):


                    while ( have_rows('section') ) : the_row();


                        $logo = get_sub_field('logo');
                        $provider_plan_title = get_sub_field('provider_plan_title');
                        $plan_bullets = get_sub_field('plan_bullets');
                        $plan_price = get_sub_field('plan_price');
                        $phone_number = get_sub_field('phone_number');
                        $disclaimer = get_sub_field('disclaimer');
                        $exclusive_offer_details = get_sub_field('exclusive_offer_details');
                        $gift_link = get_sub_field('gift_link');

                    ?>
               <tr>
                    <td><img src="<?php echo $logo; ?>" width="130px" height="50px"></td>
                    <td>
                        <h2><?php echo $provider_plan_title ?></h2>
                        <ul class="plus-list">
                            <ul class="plus-list text-left">
                                <li>165+ Channels</li>
                                <li>HD Channels</li>
                                <li>Whole-Home DVR</li>
                                <li>Speeds start at 20 Mbps</li>
                                <li>Online shopping and social networking</li>
                            </ul>
                        </ul>
                    </td>
                    <td>
                        <p>Starting at</p>
                        <span class="price-value">$114.99 </span>
                        <br>
                        <br>
                        <a href="tel:888-403-9281" class="btn btn-success btn-lg" target="_self">
                            <i class="glyphicon glyphicon-earphone"></i> 888-403-9281 </a>
                        <a href="#" class="disclaimer">View Disclaimer</a>
                    </td>
                </tr>
                <tr class="disclaimer-row">
                    <td colspan="3">test</td>
                </tr>

               <?php

                    endwhile;

                    else :

                    ?>

                    test
               <?php

                endif; ?>

                </tbody>
            </table>

        </div>
    </div>
</section><!-- container -->
<?php wp_deregister_script( 'fastclick' );?>