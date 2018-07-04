<div class="container">
    <?php
    $topNavMenu = new \CYH\ViewModels\CYBen\TopNavMenu();
    $topNavMenu->GroupInfo = $groupInfo;
    $topNavMenu->Cpt = $context->Principal->CrossPortalToken;
    do_action("\\" . \CYH\Controllers\Navigation\CYBenNavigation::class . "::RenderTopMenu", $topNavMenu);
    ?>

    <div class="results-page">
        <section class="results-header">

            <?php if (count($topOffers) == 0) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-8 brand-intro hero-holder">
                            <div class="masthead">
                                <?php $hero_image = get_field('bundle_hero'); ?>
                                <img src="https://www.connectyourhome.com/wp-content/uploads/2016/04/756x397_internetHero_1.jpg"
                                     class="resultsPage" alt="">
                            </div>
                        </div>
                        <div class="col-md-4 brand-intro">
                            <div class="masthead">
                                <div class="banner-msg">
                                    <h2>Please try again<br/></h2>
                                    <div class="row service-cta">
                                        <div class="col-md-12 ">
                                            <button type="button" class="btn btn-orange" data-toggle="modal"
                                                    data-target="#get-a-quote">
                                                Contact Us Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </section>
        <!-- /.results-header -->

        <?php if (isset($topOffers)) { ?>
            <section class="results">
                <div class="row">
                    <div class="results-headline text-center">
                        <h2>
                            Your exclusive <?php echo $groupInfo->Name; ?> deals and discounts
                        </h2>
                    </div>
                </div>
                <div class="row top-info">
                    <div class="col-md-12">
                        <div class="breadcrumbs">
                            <?php if (function_exists('qt_custom_breadcrumbs') && count($topOffers) > 0) {
                                qt_custom_breadcrumbs('/cyb/home?groupId=' . $groupInfo->Id);
                                echo " for Zip Code <a class='resultsAddress'>" . $addrText . "</a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="results-tbl tablesaw-stack">
                            <thead class="hidden-xs">
                            <tr>
                                <th class="provider-th">Provider</th>
                                <th class="features-th">Plans &amp; Features</th>
                                <th class="price-th">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($topOffers as $obj) {
                                /* @var $obj \CYH\Models\TopOffer */
                                $providerlogo = $obj->Provider->Logo;
                                $providerGWP = $obj->Provider->GWP->DisplayName;
                                $providerGWPInstructions = $obj->Provider->GWP->RequestInstructions;
                                $providerCTA = $obj->Tagline;
                                $providerDescription = $obj->Tagline;

                                $providerSalePrice = $obj->Price ? $obj->Price : 0;

                                if (strrpos($providerSalePrice, '.') == false) {
                                    $providerSalePrice .= '.00';
                                }

                                $providerFeatures = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($obj->Description);

                                $providerDisclaimer = $obj->Legal;

                                $formattedPhone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($obj->Provider->Phone->Number);

                                if (isset($providerCTA) || isset($providerDescription) || isset($providerSalePrice)) {
                                    echo "<tr>";
                                    echo "<td><img src='" . $providerlogo . "' class=\"img-natural\"/><hr/><div class='offer-verbiage'>Exclusive Offer</div>";
                                    if (!empty($providerGWP)) {
                                        $url = \CYH\Navigation\RebateGiftUrl::GetRedeemGiftLink($groupInfo);
                                        $redeemGiftUrl = \CYH\Navigation\RebateGiftUrl::AppendCPTData($url, $context->Principal->CrossPortalToken);
                                        ?>
                                        <p class='click-detail'>Click below for detail <i
                                                class='fa fa-chevron-down'></i></p>
                                        <div>
                                            <button class="btn btn-success provider-name"><?php echo $providerGWP; ?></button>
                                            <a href="<?php echo $redeemGiftUrl; ?>" class='btn btn-success full-width provider-name'>Redeem Gift</a>
                                        </div>
                                        <div class='instructions-gwp'>
                                            <span>x</span><?php echo $providerGWPInstructions; ?></div></td>
                                        <?php
                                    }
                                    echo "<td class='desc'><h4>" . $providerDescription . "</h4>";

                                    do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $providerFeatures, 'common', 'common');

                                    echo "</td>";
                                    $providerUrl = \CYH\Helpers\LinkHelper::AppendQueryParams("/cyb-brand/", [
                                        'providerId' => $obj->Provider->Id,
                                        'zipcode' => $address->Zip,
                                        'phoneNumber' => $formattedPhone,
                                        'groupId' => $groupInfo->Id
                                    ]);
                                    echo "<td><span class=\"price-intro\">Starting at</span><br />
                                  <span class=\"price\">$" . $providerSalePrice . "</span><br />
                                  <a href=\"" . 'tel:' . "$formattedPhone\" class=\"phone-number btn btn-success btn-lg\"><i class=\"glyphicon glyphicon-earphone\"></i> $formattedPhone</a>
                                  <br /> 
                                  <a href=\"" . $providerUrl . "\" class=\"btn btn-outline\"><span class=\"glyphicon glyphicon-search\" aria-hidden=\"true\"></span> More Offers From This Provider</a><br />
                                  ";

                                    if (isset($providerDisclaimer)) {
                                        echo '<a href="#" class="disclaimer">View Disclaimer</a>';
                                    }

                                    echo "</td></tr>";
                                    echo '<tr class="disclaimer-row">';
                                    echo '<td colspan="3">';
                                    if (isset($providerDisclaimer)) {

                                        echo $providerDisclaimer;
                                    }
                                    echo '</td>';
                                    echo '</tr>';

                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <small class="mleft20">
                            *Prices and service availability are subject to change without notice.
                        </small>
                    </div>
                </div>
            </section>
        <?php } ?>
        <!-- /.results-header -->
    </div> <!-- /results-page -->
    <style>
        .results-tbl tbody > tr.disclaimer-row {
            display: none;
        }
    </style>
    <script type="text/javascript">
        jQuery('button.provider-name').on('click', function () {
            jQuery(this).parents('td').first().find('.instructions-gwp').show()
        });
        jQuery('.instructions-gwp span').on('click', function () {
            jQuery(this).parent().hide();
        });
    </script>
</div> <!-- container -->
