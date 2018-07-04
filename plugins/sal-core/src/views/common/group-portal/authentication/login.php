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
<div class="jumbotron cyh-background reset-vertical-margins reset-vertical-paddings">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-white text-center welcome-text mtop0 mbottom0">
                    Welcome Back !
                </h2>
                <p class="text-white text-center">
                    Login below to view new and current offers or to update your account
                </p>
                <?php if (isset($_REQUEST['salAction']) && isset($res)) {
                    do_action('\\' . \CYH\Controllers\Common\CommonUIComponents::class . "::RenderAlert", new \CYH\ViewModels\Alert($res->Status, $res->Data["Message"] . " " . $res->Data["Errors"][0]));
                }
                ?>
                <div class="row mtop20">
                    <div class="col-sm-offset-3 col-sm-6 gift-register-height">
                        <form id="login" action="<?php echo $urlPrefix ?>login?groupId=<?php echo $groupInfo->Id; ?>"
                              method="POST" class="mtop20">
                            <div class="mtop20 mbottom20">
                                <div class="form-group mtop20 rebateGiftInput has-feedback text-left">
                                    <label for="Email" class="text-white cyb-form-label">Email Address</label>
                                    <input type="hidden" name="salAction" value="login">
                                    <input class="input text-center has-feedback-reset form-control"
                                           type="text" name="Email"
                                           data-customEmail
                                           data-customEmail-error="Email format is invalid"
                                           required
                                           value="<?php \CYH\Helpers\OutputHelper::EchoHtmlEntities($loginInfo, "Email") ?>">
                                    <span class="glyphicon form-control-feedback"
                                          aria-hidden="true"></span>
                                </div>
                                <div class="form-group rebateGiftInput has-feedback">
                                    <label for="Password" class="text-white cyb-form-label">Password</label>
                                    <input class="input text-center has-feedback-reset form-control"
                                           type="password"
                                           name="Password"
                                           required
                                           data-minlength="5"
                                           value="<?php \CYH\Helpers\OutputHelper::EchoHtmlEntities($loginInfo, "Password") ?>">
                                    <span class="glyphicon form-control-feedback"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group rebateGiftInput">
                                <button type="submit" class="btn btn-success btn-block">
                                    Login To See Your Offers &amp; Account
                                </button>
                            </div>
                            <div class="form-group rebateGiftInput text-center">
                                <a href="<?php echo \CYH\Navigation\RebateGiftUrl::GetResetPasswordLink($groupInfo); ?>"
                                   class="forgot-password">Click here if you forgot your password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
do_action('\\' . \CYH\Controllers\GroupPortal\UIComponentsController::class . '::RenderGroupServiceProviders', $groupInfo);
?>

<script>
    jQuery(function($){
        //masked input init
        $('.maskedPhone').mask('000-000-0000');

        //registration and login forms validation
        InitializeValidation('#edp-form, #login');
    });
</script>
<?php
