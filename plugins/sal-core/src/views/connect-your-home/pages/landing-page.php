<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<section>
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <div class="results-headline text-center sgp-page-header">
                <h1>
                    Exclusive deals and discounts
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
                    <td><img src="<?php echo $plan['logo']; ?>" width="130px" height="50px">
                        <?php if($plan['exclusiveOfferDetails'] != ''):?>
                        <hr><div class="offer-verbiage">Exclusive Offer</div>
                        <p class="click-detail">Click below for detail</p>
                        <div>
                            <button class="btn btn-success btn-lg provider-name">$100 Visa Gift Card</button>
                            <a href="#" class="btn btn-success btn-lg provider-name">Redeem
                                Gift</a>
                        </div>
                        <div class="instructions-gwp">
                            <span>x</span>
                            <?php echo $plan['exclusiveOfferDetails'];?>
                        </div>
                            <?php endif;?>
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
                        <p>Starting at</p>
                        <span class="price-value">$<?php echo $plan['planPrice']?> </span>
                        <br>
                        <br>
                        <a href="tel: <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($plan['phoneNumber'])?>" class="btn btn-success btn-lg" target="_self">
                            <i class="glyphicon glyphicon-earphone"></i> <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($plan['phoneNumber'])?> </a>
                        <span class="disclaimer">View Disclaimer</span>
                    </td>
                </tr>
                <tr class="disclaimer-row">
                    <td colspan="3"><?php echo $plan['disclaimer']?></td>
                </tr>

               <?php endforeach;?>
               <?php else :?>

                    No items found
               <?php

                endif; ?>

                </tbody>
            </table>

        </div>
    </div>
</section><!-- container -->
<?php wp_deregister_script( 'fastclick' );?>