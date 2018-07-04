<div class="container">
    <header class="page-head">
        <div class="row">
            <div class="col-md-6 logo-links">
                <a class="logo-link" href="/cyb/?groupId=<?php echo $groupInfo->Id ?>"><img
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
<div class="jumbotron cyh-background reset-vertical-margins reset-vertical-paddings">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-white text-center welcome-text mtop0 mbottom0">
                    Welcome!
                </h2>
                <p class="text-white text-center">
                    You're a simple stem away from viewing your exclusive offers!
                </p>
                <p class="text-white reset-font-size text-center">
                    To provide you with the offers that are available in <br>your area, we just need your zip code
                    and email address!
                </p>
                <?php if (isset($_REQUEST['salAction']) && isset($res)) {
                    do_action("\CYH\Controllers\Notifications\AlertController::RenderAlert", new \CYH\ViewModels\Alert($res->Status, $res->Data["Message"] . " " . $res->Data["Errors"][0]));
                }
                ?>
                <div class="row mtop20">
                    <div class="col-sm-offset-3 col-sm-6 gift-register-height">
                        <form id="login" action="/cyb/guest/?groupId=<?php echo $groupInfo->Id; ?>"
                              method="POST" class="mtop20">
                            <div class="mtop20 mbottom20">
                                <div class="form-group mtop20 rebateGiftInput has-feedback text-left">
                                    <label for="Email" class="text-white cyb-form-label">Email Address</label>
                                    <input type="hidden" name="salAction" value="guest-login">
                                    <input class="input text-center has-feedback-reset form-control"
                                           type="email" name="Email"
                                           required
                                           value="<?php \CYH\Helpers\OutputHelper::EchoHtmlEntities($loginInfo, "Email") ?>">
                                    <span class="glyphicon form-control-feedback"
                                          aria-hidden="true"></span>
                                </div>
                                <div class="form-group rebateGiftInput has-feedback">
                                    <label for="Zip" class="text-white cyb-form-label">Zip Code</label>
                                    <input class="input text-center has-feedback-reset form-control"
                                           type="text"
                                           name="Zip"
                                           required
                                           pattern="^\d{5}(-\d{4})?$"
                                           data-pattern-error="Please enter Zip Code in one of the following formats: XXXXX or XXXXX-XXXX"
                                           value="<?php \CYH\Helpers\OutputHelper::EchoHtmlEntities($loginInfo, "Zip") ?>">
                                    <span class="glyphicon form-control-feedback"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group rebateGiftInput">
                                <button type="submit" class="btn btn-success btn-block">
                                    Click Here To See Your Offers
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mtop40 mbottom40">
    <div class="container">
        <?php do_action('\CYH\Controllers\ConnectYourBenefits\UIComponentsController::RenderRegistraterCallBlock', $groupInfo) ?>
    </div>
</div>
<hr/>
<?php
do_action('\\' . \CYH\Controllers\ConnectYourBenefits\UIComponentsController::class . '::RenderGroupServiceProviders', $groupInfo);
?>
<script>
    jQuery(function ($) {
        //masked input init
        $('.maskedPhone').mask('000-000-0000');

        //registration and login forms validation
        InitializeValidation('#edp-form, #login');
    });
</script>
<?php
