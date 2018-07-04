<?php
$columns = 0;
if (!is_null($deals->Tv)) {
    $columns++;
}
if (!is_null($deals->Internet)) {
    $columns++;
}
if (!is_null($deals->Security)) {
    $columns++;
}
if (!is_null($deals->Bundles)) {
    $columns++;
}

switch ($columns) {
    case 1:
        $offerClass = 'col-md-4';
        $offerOffsetClass = 'col-md-offset-4';
        break;
    case 2:
        $offerClass = 'col-md-3';
        $offerOffsetClass = 'col-md-offset-3';
        break;
    case 3:
        $offerClass = 'col-md-4';
        $offerOffsetClass = '';
        break;
    case 4:
        $offerClass = 'col-md-3';
        $offerOffsetClass = '';
        break;
    default:
        $offerClass = 'col-md-3';
        $offerOffsetClass = '';
        break;
}
?>

<style type="text/css">
    .steps {
        background: url('<?php echo get_template_directory_uri(); ?>/images/step-bg.png') no-repeat center center;
        background-size: 100%;
    }

    .hero-holder-div {
        background-image: url(<?php  echo get_template_directory_uri() . '/images/group-portal/group-default-bg.png'; ?>);
    }

    .top-offer-list {
        list-style: inherit;
    }
</style>
<div class="container">
    <?php
    $topNavMenu = new \CYH\ViewModels\GroupPortal\TopNavMenu();
    $topNavMenu->GroupInfo = $groupInfo;
    $topNavMenu->Cpt = $context->Principal->CrossPortalToken;
    do_action("\\" . \CYH\Controllers\GroupPortal\UIComponentsController::class . "::RenderTopMenu", $topNavMenu);
    ?>

    <section class="hero">
        <div class="row">
            <div class="col-md-12">
                <div class="masthead">
                    <div class="form-bg-container">
                        <div class="hero-holder-div">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2 class="text-center mtop80"><?php echo $groupInfo->Tagline; ?></h2>
                                    <p class="text-center mtop80">
                                        <a class="btn btn-success btn-lg" href="<?php echo \CYH\Helpers\LinkHelper::AppendQueryParams($addressSearchUrl, ['groupId' => $groupInfo->Id])  ?>">Get Deals</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    do_action('\\' . \CYH\Controllers\GroupPortal\UIComponentsController::class . '::RenderGroupServiceProviders', $groupInfo);
    ?>

    <section>
        <div class="row">
            <h2 class="discount-grid-headline">Our Most Popular <?php echo $groupInfo->Name; ?> Deals And
                Discounts</h2>
        </div>
        <?php
        do_action('\\' . \CYH\Controllers\GroupPortal\UIComponentsController::class . '::RenderTopOffersBlock', $topOfferFilter);
        ?>
    </section>

    <section>
        <div class="row">
            <div class="col-md-6">
                <div class="program-details">
                    <h3 class="program-details-headline">With The Connect Your Benefits&reg; Discount Program You
                        Get:</h3>
                    <ul class="program-details-list">
                        <li>Premier sale support</li>
                        <li>Our best offer from each brand</li>
                        <li>Exclusive cash card rewards</li>
                        <li>Priority installation dates</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="customer-service-woman">
                    <img src="https://www.connectyourbenefits.com/wp-content/uploads/2017/06/GettyImages-169502898.jpg">
                </div>
            </div>
        </div>
    </section>

    <section class="how-it-works">
        <div class="row">
            <div class="col-md-12">
                <div class="mast edp-video-box">
                    <h2 class="edp-video-headline">
                        How the <?php echo $groupInfo->Name; ?> discount program works
                    </h2>
                    <p>Our relationships with the nation's top providers mean you get all the services you want, and
                        none that you don't, in one easy call.</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row text-center">
            <?php
            $offsetInitialized = false;
            if ($deals->Tv != null) {
                if (!$offsetInitialized) {
                    $class = $offerOffsetClass . ' ' . $offerClass;
                } else {
                    $class = $offerClass;
                }
                ?>
                <div class="<?php echo $class; ?> offer-block">
                    <div class="offer-holder clearfix">
                        <h2>TV <span><img class="offer-icon"
                                          src="https://www.connectyourhome.com/wp-content/uploads/2017/05/tv-bg.png"></span>
                        </h2>
                        <p>Starting at</p>
                        <h3 class="offer-price"><span
                                class="dollar-sign">$</span><?php echo \CYH\Helpers\FormatHelper::GetFloatNumberPart($deals->Tv->Price) ?>
                            <span class="cents"><?php echo \CYH\Helpers\FormatHelper::GetFloatRealNumberPart($deals->Tv->Price) ?></span>
                        </h3>
                        <div class="duration">mo</div>
                    </div>
                </div>
                <?php
                $offsetInitialized = true;
            }
            if ($deals->Internet != null) {
                if (!$offsetInitialized) {
                    $class = $offerOffsetClass . ' ' . $offerClass;
                } else {
                    $class = $offerClass;
                }
                ?>
                <div class="<?php echo $class; ?> offer-block">
                    <div class="offer-holder clearfix">
                        <h2>Internet <span><img class="offer-icon"
                                                src="https://www.connectyourhome.com/wp-content/uploads/2017/05/internet_Icon_193x145.png"></span>
                        </h2>
                        <p>Starting at</p>
                        <h3 class="offer-price"><span
                                class="dollar-sign">$</span><?php echo \CYH\Helpers\FormatHelper::GetFloatNumberPart($deals->Internet->Price) ?>
                            <span class="cents"><?php echo \CYH\Helpers\FormatHelper::GetFloatRealNumberPart($deals->Internet->Price) ?></span>
                        </h3>
                        <div class="duration">mo</div>
                    </div>
                </div>
                <?php
                $offsetInitialized = true;
            }
            if ($deals->Security != null) {
                if (!$offsetInitialized) {
                    $class = $offerOffsetClass . ' ' . $offerClass;
                } else {
                    $class = $offerClass;
                }
                ?>
                <div class="<?php echo $class; ?> offer-block">
                    <div class="offer-holder clearfix">
                        <h2>Security <span><img class="offer-icon"
                                                src="https://www.connectyourhome.com/wp-content/uploads/2017/05/security_Icon193x145.png"></span>
                        </h2>
                        <p>Starting at</p>
                        <h3 class="offer-price"><span
                                class="dollar-sign">$</span><?php echo \CYH\Helpers\FormatHelper::GetFloatNumberPart($deals->Security->Price) ?>
                            <span class="cents"><?php echo \CYH\Helpers\FormatHelper::GetFloatRealNumberPart($deals->Security->Price) ?></span>
                        </h3>
                        <div class="duration">mo</div>
                    </div>
                </div>
                <?php
                $offsetInitialized = true;
            }
            if ($deals->Bundles != null) {
                if (!$offsetInitialized) {
                    $class = $offerOffsetClass . ' ' . $offerClass;
                } else {
                    $class = $offerClass;
                }

                ?>
                <div class="<?php echo $class; ?> offer-block">
                    <div class="offer-holder clearfix">
                        <h2>Bundles</h2>
                        <p>Starting at</p>
                        <h3 class="offer-price"><span
                                class="dollar-sign">$</span><?php echo \CYH\Helpers\FormatHelper::GetFloatNumberPart($deals->Bundles->Price) ?>
                            <span class="cents"><?php echo \CYH\Helpers\FormatHelper::GetFloatRealNumberPart($deals->Bundles->Price) ?></span>
                        </h3>
                        <div class="duration">mo</div>
                    </div>
                </div>
                <?php
                $offsetInitialized = true;
            } ?>
        </div>
    </section>

    <section class="why-choose-cyh">
        <div class="steps steps-bg steps-hide">
            <h3>Why Choose <br>
                Connect Your Home&reg;?
            </h3>
            <p class="step-1">
                You’ve got options - <br>
                don’t get locked-in to an <br>
                overpriced bundle!</p>
            <p class="step-2">
                Mix-and-match providers to <br>
                get the lowest price bundles <br>
                available anywhere!
            </p>
        </div>
        <div class="step-holder">
            <div class="steps-stacked steps">
                <div class="step-banner1 col-md-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/step_banner/step-bg-question-mark.jpg">
                    <div class="stack-steps">
                        <h3>Why Choose <br>
                            Connect Your Home&reg;?
                        </h3>
                    </div>
                </div>
                <div class="step-banner2 col-md-4">
                    <img src='<?php echo get_template_directory_uri(); ?>/images/step_banner/step-bg-step-1.jpg'>
                    <div class="stack-steps">
                        <p>You’ve got options - <br>
                            don’t get locked-in to an <br>
                            overpriced bundle!
                        </p>
                    </div>
                </div>
                <div class="step-banner3 col-md-4">
                    <img src='<?php echo get_template_directory_uri(); ?>/images/step_banner/step-bg-step-2.jpg'>
                    <div class="stack-steps">
                        <p>Mix-and-match providers to <br>
                            get the lowest price bundles <br>
                            available anywhere!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


