<div class="container">
    <header class="page-head">
        <div class="row">
            <div class="col-md-6 logo-links">
                <a class="logo-link" href="<?php echo $urlPrefix ?>?groupId=<?php echo $groupInfo->Id ?>"><img
                        src="<?php echo $groupInfo->Logo; ?>" class="brand"
                        alt="<?php echo $groupInfo->Name; ?>"></a>
            </div>
            <div class="col-md-6 text-right">
                <a class="logo-link" href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"
                                                   class="brand" alt="Connect Your Home&reg;"></a>
            </div>
        </div>
        <div>
            <h2 class="header-welcome-label">
                Welcome to your <?php echo $groupInfo->Name; ?> <br>
                Home Services Discount Program!
            </h2>
        </div>
    </header>
</div>
<div class="jumbotron cyh-background reset-vertical-margins">
    <div class="container">
        <?php
        /* @var $message \CYH\Models\Core\Result */
        if (!empty($message))
        {
            do_action('\\' . \CYH\Controllers\Common\CommonUIComponents::class . "::RenderAlert", new \CYH\ViewModels\Alert($message->Status, $message->Data));
        }
        ?>
        <div class="row">
            <div class="col-sm-6 vertical-separator">
                <p class="text-white text-center">
                    First Time Here?
                </p>
                <div class="text-center">
                    <a href="<?php echo $urlPrefix ?>guest/?groupId=<?php echo $groupInfo->Id ?>"
                       class="btn btn-success edp-form-submit welcome-btn ptop20 pbottom20">
                        <span>
                            Click here to <br>view all discounts <br>as a guest
                        </span>
                    </a>
                </div>
                <p class="text-white reset-font-size text-center mtop10">
                    As a guest, you can search and <br>view all of our exclusive offers!
                </p>
            </div>
            <div class="col-sm-6">
                <p class="text-white text-center">
                    Returning Member?
                </p>
                <div class="text-center">
                    <a href="<?php echo $urlPrefix ?>login/?groupId=<?php echo $groupInfo->Id ?>"
                       class="btn btn-success edp-form-submit welcome-btn ptop20 pbottom20">
                        <span>
                           Click here to <br>login and <br>view more offers
                        </span>
                    </a>
                </div>
                <p class="text-white reset-font-size text-center mtop10">
                    As a member, you can check on rebates <br>and search for new exclusive offers!
                </p>
            </div>
        </div>
    </div>
</div>
<div class="mtop40 mbottom40">
    <div class="container">
        <?php do_action('\\' . \CYH\Controllers\GroupPortal\UIComponentsController::class . '::RenderRegistraterCallBlock', $groupInfo) ?>
    </div>
</div>
<hr/>
<?php
do_action('\\' . \CYH\Controllers\GroupPortal\UIComponentsController::class . '::RenderGroupServiceProviders', $groupInfo);