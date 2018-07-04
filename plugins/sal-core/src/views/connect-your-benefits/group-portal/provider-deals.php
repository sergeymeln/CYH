<style type="text/css">
    @media only screen and (max-width: 980px) {
        .stack-steps{
            position: absolute;
            right: 30px;
            top: 20px;
            z-index: 100;
            text-align: right;
        }
        .steps h3 {
            font-family: gotham_boldregular;
            color: #6CB33F;
            position: relative;
            width: 293px;
            text-align: center;
            font-size: 22px;
            line-height: 22px;
            top: 35px;
        }
    }

    .steps {
        background: url('<?php echo get_template_directory_uri(); ?>/images/step-bg.png') no-repeat center center;
        background-size: 100%;
    }

    @media only screen and (max-width: 980px) {
        .step-holder {
            width: 350px;
        }
    }

</style>

<div class="container">
    <?php
    $topNavMenu = new \CYH\ViewModels\CYBen\TopNavMenu();
    $topNavMenu->GroupInfo = $groupInfo;
    $topNavMenu->Cpt = $context->Principal->CrossPortalToken;
    do_action("\\" . \CYH\Controllers\Navigation\CYBenNavigation::class . "::RenderTopMenu", $topNavMenu);
    ?>
    <section class="hero">
        <div class="row">
            <div class="col-md-12">
                <div class="masthead">
                    <?php

                    $repeater_counter = 0;
                    $img_found = false;


                    echo "\n";

                    // check if the repeater field has rows of data
                    if( have_rows('hero_repeater') ):

                        // loop through the rows of data
                        while ( have_rows('hero_repeater') ) : the_row();
                            $providerHero = get_sub_field('brand_id');

                            if ($providerHero == $context->Get['providerId']){
                                $img_found = true;
                                $HeroImageBrand = get_sub_field('hero_brand_image');
                                ?>
                                <img src="<?php echo $HeroImageBrand; ?>" />

                                <?php
                            }
                            ?>
                            <?php

                        endwhile;

                    else :

                        // no rows found

                    endif;

                    if(!$img_found){
                        echo "<img src='" . get_field('hero_image')['url'] . "' />";
                    }

                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="results-headline text-center">
                <h2>
                    Our Most Popular <?php echo $groupInfo->Name; ?> deals and discounts
                </h2>
            </div>
        </div>
    </section>
    <div class="one-brand">
        <section class="top-offer">
            <table class="results-tbl tablesaw-stack" >
                <thead class="hidden-xs">
                <tr>
                    <th class="provider-th"></th>
                    <th class="features-th"></th>
                    <th class="price-th"></th>
                </tr>
                </thead>
                <tbody>
                <?php

                $providerSalePrice = $topOffer->Price ? $topOffer->Price : 0;
                if(strrpos($providerSalePrice, '.') == false){
                    $providerSalePrice .= '.00';
                }

                $providerFeatures = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($topOffer->Description);
                $providerDisclaimer = $topOffer->Provider->Legal;
                $formattedProviderPhone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($topOffer->Provider->Phone->Number);

                if (isset($topOffer->Tagline) || isset($providerSalePrice) ){
                    echo "<tr>";
                    echo "<td>
                                <img src='" . $topOffer->Provider->Logo . "' class=\"img-natural\"/>
                                <hr/>
                                <div class='offer-verbiage'>Exclusive Offer</div>";
                    if(!empty($topOffer->Provider->GWP->DisplayName)) {
                        $url = \CYH\Navigation\RebateGiftUrl::GetRedeemGiftLink($groupInfo);
                        $redeemGiftUrl = \CYH\Navigation\RebateGiftUrl::AppendCPTData($url, $context->Principal->CrossPortalToken);
                        ?>
                        <p class='click-detail'>Click below for detail <i class='fa fa-chevron-down'></i></p>
                        <div>
                            <button class="btn btn-success provider-name"><?php echo $topOffer->Provider->GWP->DisplayName; ?></button>
                            <a href="<?php echo $redeemGiftUrl; ?>" class='btn btn-success full-width provider-name'>Redeem Gift</a>
                        </div>
                        <div class='instructions-gwp'>
                            <span>x</span><?php echo $topOffer->Provider->GWP->RequestInstructions; ?></div></td>
                        <?php
                    }
                    echo "</td>";
                    echo "<td class='desc'><h4>" . $topOffer->Tagline . "</h4>";

                    do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $providerFeatures, 'common', 'common');

                    echo "</td>";
                    echo "<td><span class=\"price-intro\">Starting at</span><br />
                                  <span class=\"price\">$" . $providerSalePrice . "</span><br />
                                  <a href=\"" . 'tel:' . "$formattedProviderPhone\" class=\"phone-number btn btn-success btn-lg\"><i class=\"glyphicon glyphicon-earphone\"></i> $formattedProviderPhone</a>
                                  <br /> 
                                  ";

                    echo "</td></tr>";

                }

                ?>
                </tbody>
            </table>
        </section>
        <?php
        $hasProducts = (count($products) > 0);
        if (!$hasProducts): ?>
        <div class="row">
            <div class="col-md-12">
                <small class="mleft20">
                    *Prices and service availability are subject to change without notice.
                </small>
            </div>
        </div>
        <?php endif; ?>
        <script type="text/javascript">
            jQuery('button.provider-name').on('click', function () {
                jQuery(this).parents('td').first().find('.instructions-gwp').show()
            });
            jQuery('.instructions-gwp span').on('click', function () {
                jQuery(this).parent().hide();
            });
        </script>
        <section class="packages">
            <div class="row">
                <div class="results-headline text-center">
                    <h3>
                        Call us to compare or order these great deals:
                        <a href="tel:<?php echo $formattedProviderPhone; ?>">
                            <?php echo $formattedProviderPhone; ?>
                        </a>
                    </h3>
                </div>
            </div>
            <?php
            $counter = 0;
            foreach($products as $plan){
                /* @var $plan \CYH\Models\Product */
                ?>
                <div class="package-module <?php echo $counter % 2 == 1? 'grey-bg': ''; ?>">
                    <div class="inner">
                        <div class="row">
                            <div class="col-md-8 col-sm-6 <?php echo $counter % 2 == 1? 'pull-right': 'pull-left'; ?>">
                                <h3>
                                    <?php echo $plan->Name; ?>
                                </h3>
                                <p>
                                    <?php echo $plan->Tagline; ?>
                                </p>

                                <?php
                                $planFeatures = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($plan->Description);
                                do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $planFeatures, 'common', 'common');
                                ?>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="sal-service-logo-holder">
                                    <img class="sal-service-logo" src="<?php echo $plan->Logo; ?>">
                                    <span class="count">
                                    <?php the_sub_field('campaign_count'); ?>
                                        <span class="count-strap">
                                        <?php the_sub_field('count_type'); ?>
                                    </span>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                            </div>
                            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-0">
                                <div class="price">
                                    <p>Starting at</p>
                                    <span class="price-value">$<?php
                                        $price = $plan->Price;
                                        if(strrpos($price, '.') == false){
                                            $price .= '.00';
                                        }

                                        echo $price; ?>
                                    </span>
                                    <br />
                                    <span class="price-strap">
                                        a month
                                        <?php
                                        $camp_dur = get_sub_field('campaign_duration');
                                        if($camp_dur){
                                            $str = ' for ' . $camp_dur;
                                            echo $str;
                                        }
                                        ?>
                                    </span>
                                    <?php if(get_sub_field('campaign_price')) { ?>
                                    <?php } else {?>
                                        <span class="price-value">
                                        <?php echo get_sub_field('alternative_text_top'); ?>
                                    </span>
                                        <br />
                                        <span class="price-strap"></span>
                                        <p class="green-upper">
                                            <?php echo get_sub_field('alternative_text_bottom'); ?>
                                        </p>
                                    <?php } ?>
                                    <a href="tel:<?php echo $this->context->Get['phoneNumber'];?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Bundles - CTA Banner');" class="phone-number btn btn-success btn-lg"><i class="glyphicon glyphicon-earphone"></i> <?php echo $this->context->Get['phoneNumber'];?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $counter += 1;
            } ?>
        </section>
        <?php if ($hasProducts): ?>
            <div class="row">
                <div class="col-md-12">
                    <small class="mleft20">
                        *Prices and service availability are subject to change without notice.
                    </small>
                </div>
            </div>
        <?php endif; ?>
        <?php
        do_action('\\' . \CYH\Controllers\ConnectYourBenefits\UIComponentsController::class . '::RenderGroupServiceProviders', $groupInfo);
        ?>

        <section class="why-choose-cyh">
            <div class="steps steps-bg steps-hide">
                <h3>
                    Why Choose
                    <br>
                    Connect Your Home&reg;?
                </h3>
                <p class="step-1">
                    You’ve got options -
                    <br>
                    don’t get locked-in to an
                    <br>
                    overpriced bundle!</p>
                <p class="step-2">
                    Mix-and-match providers to
                    <br>
                    get the lowest price bundles
                    <br>
                    available anywhere!
                </p>
            </div>
            <div class="step-holder">
                <div class="steps-stacked steps">
                    <div class="step-banner1 col-md-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/step_banner/step-bg-question-mark.jpg">
                        <div class="stack-steps">
                            <h3>
                                Why Choose
                                <br>
                                Connect Your Home&reg;?
                            </h3>
                        </div>
                    </div>
                    <div class="step-banner2 col-md-4">
                        <img src='<?php echo get_template_directory_uri(); ?>/images/step_banner/step-bg-step-1.jpg'>
                        <div class="stack-steps">
                            <p>
                                You’ve got options -
                                <br>
                                don’t get locked-in to an
                                <br>
                                overpriced bundle!
                            </p>
                        </div>
                    </div>
                    <div class="step-banner3 col-md-4">
                        <img src='<?php echo get_template_directory_uri(); ?>/images/step_banner/step-bg-step-2.jpg'>
                        <div class="stack-steps">
                            <p>
                                Mix-and-match providers to
                                <br>
                                get the lowest price bundles
                                <br>
                                available anywhere!
                            </p>
                        </div>
                    </div>
        </section>
        <section class='disclaimer'>
            <p class='disclaimerOnPageHolder'>
                <small style="padding-left: 20px;padding-right: 20px;display: inline-block;font-size: 11px;">
                    <?php the_field('disclaimer_on_page_copy');?>
                </small>
            </p>
            <button type="button" class="btn btn-info btn-md pull-right" id="myBtn">
                Terms & Conditions
            </button>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                &times;
                            </button>
                            <h4 class="modal-title">
                                Terms & Conditions
                            </h4>
                        </div>
                        <div class="modal-body">
                            <p class='disclaimerHolder'>
                                <?php echo $topOffer->Provider->Legal; ?>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.one-brand -->
</div> <!-- container -->
<div class="sticky-ticker-footer">
    CALL <a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($groupInfo->SpPhone); ?>" ><?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($groupInfo->SpPhone); ?></a> TO ORDER THIS EXCLUSIVE <?php echo $topOffer->Provider->Name; ?> DEAL WITH <?php echo $topOffer->Provider->GWP->DisplayName; ?> FOR <?php echo $groupInfo->Tagline; ?>
</div>