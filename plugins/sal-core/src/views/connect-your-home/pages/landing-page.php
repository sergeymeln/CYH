<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<?php /**@var $plans array*/?>
<section>
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <div class="results-headline text-center sgp-page-header">
                <h1>
                    Your Search Results Returned the Following Exclusive Deals and Discounts
                </h1>
            </div>
        </div>
        </div>
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
                <?php if(count($plans) > 0):?>
               <?php foreach ($plans as $plan):?>
               <tr>
                    <td><img src="<?php echo $plan['logo']; ?>">
                    </td>
                    <td>
                        <h2><?php echo $plan['providerPlanTitle']; ?></h2>
                        <?php $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($plan['planBullets']);?>
                        <ul class="plus-list">
                            <ul class="plus-list text-left">
                                <?php
                                do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                                ?>
                            </ul>
                        </ul>
                    </td>
                    <td>
                        <p><?php echo $plan['priceStart']?></p>
                        <span class="price-value">
                            <?php if(is_numeric($plan['planPrice'])):?>$<?php endif;?><?php echo $plan['planPrice']?><?php if(is_array($plan['showAsterisk']) && $plan['showAsterisk'][0] == 'yes'):?><sup><span class="disclaimer">*</span></sup><?php endif;?>
                        </span>
                        <p><?php echo $plan['priceEnd']?></p>
                        <br>
                        <br>
                        <p class="above-phone-text"><?php echo $plan['abovePhoneText']?></p>
                        <a href="tel: <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($plan['phoneNumber'])?>" class="btn btn-success btn-lg" target="_self">
                            <i class="glyphicon glyphicon-earphone"></i> <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($plan['phoneNumber'])?> </a>
                        <span class="disclaimer">View Disclaimer</span>
                        <div class="disclaimer-row">
                            <?php echo $plan['disclaimer']?>
                        </div>
                    </td>
                </tr>

               <?php endforeach;?>
               <?php else :?>
                    <span>No items found</span>
               <?php endif; ?>
                </tbody>
            </table>

        </div>
        <div class="land-desclaimer">
            <small>
                Disclaimer: The trademarks and brand names displayed on CYH belong to their respective companies or owners. CYH has no association with the trademarks, brands or companies. CYH plans, reviews and comparisons are based on data available to the public on the internet. The use of any third party trademarks on this site in no way indicates any relationship, connection, association, sponsorship, or affiliation between CYH and the holders of said trademarks. Actual prices of services and availability of services may vary according to the physical address of your location.
            </small>
        </div>
    </div>
</section><!-- container -->
<?php wp_enqueue_script( 'landing-js',
    get_template_directory_uri() . '/javascripts/dist/landing.min.js',
    ['jquery'],
    filemtime(get_template_directory() . '/javascripts/dist/landing.min.js'),
    true );
wp_enqueue_style( 'landing-css', get_template_directory_uri() .'/css/landing.min.css' );

remove_action( 'wp_footer', 'ld_embedchat', 5 );

?>