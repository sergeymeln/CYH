<div class="container">
    <header class="page-head">
        <div class="row">
            <div class="col-md-6 logo-links">
                <a class="logo-link" href="/cyb/?groupId=<?php echo $groupInfo->Id ?>"><img
                        src="<?php echo $groupInfo->Logo; ?>" class="brand"
                        alt="Connect Your Home"></a>
            </div>
            <div class="col-md-6 text-right">
                <a class="logo-link" href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"
                                                   class="brand" alt="Connect Your Home"></a>
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
                    Create an account below to view new and current offers
                </p>
                <?php if (isset($context->Request['salAction']) && isset($res)) {
                    do_action("\CYH\Controllers\Notifications\AlertController::RenderAlert", new \CYH\ViewModels\Alert($res->Status, $res->Data["Message"] . " " . $res->Data["Errors"][0]));
                }
                ?>
                <div class="row">
                    <div class="col-sm-offset-3 col-sm-6">
                        <form id="edp-form" role="form" class="mtop20"
                              action="/cyb/register?groupId=<?php echo $groupInfo->Id; ?>"
                              method="POST">
                            <div class="create-account">
                                <input type="hidden" name="salAction" value="register">
                                <div class="form-group rebateGiftInput has-feedback">
                                    <label for="fname" class="text-white cyb-form-label">First Name</label>
                                    <input class="input text-center has-feedback-reset form-control conditional-validation"
                                           type="text"
                                           name="fname" id="fnameRebateGift"
                                           required
                                           value="<?php \CYH\Helpers\OutputHelper::EchoHtmlEntities($regInfo, "FirstName") ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="create-account">
                                <div class="form-group rebateGiftInput has-feedback">
                                    <label for="lname" class="text-white cyb-form-label">Last Name</label>
                                    <input class="input text-center has-feedback-reset form-control conditional-validation"
                                           type="text"
                                           name="lname" id="lnameRebateGift"
                                           required
                                           value="<?php \CYH\Helpers\OutputHelper::EchoHtmlEntities($regInfo, "LastName") ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group rebateGiftInput has-feedback">
                                    <label for="email" class="text-white cyb-form-label">Email</label>
                                    <input class="input text-center has-feedback-reset form-control"
                                           type="email"
                                           name="email" id="emailRebateGift"
                                           value="<?php \CYH\Helpers\OutputHelper::EchoHtmlEntities($regInfo, "Email") ?>"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="create-account">
                                <div class="form-group rebateGiftInput has-feedback">
                                    <label for="phone" class="text-white cyb-form-label">Phone</label>
                                    <input class="input text-center has-feedback-reset form-control maskedPhone conditional-validation"
                                           type="text"
                                           name="phone" id="phoneRebateGift"
                                           required data-minlength="12"
                                           value="<?php \CYH\Helpers\OutputHelper::EchoHtmlEntities($regInfo, "PhoneNumber") ?>">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div>
                                <div class="form-group rebateGiftInput has-feedback">
                                    <label for="search" class="text-white cyb-form-label">Address</label>
                                    <div class="input-group full-width">
                                        <input class="input text-center rebateGiftInput has-feedback-reset form-inline address form-control"
                                               type="text" name="search" id="edpSearch" required>
                                    </div>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="create-account">
                                <div class="form-group rebateGiftInput has-feedback">
                                    <label for="Password" class="text-white cyb-form-label">Password</label>
                                    <input class="input text-center has-feedback-reset form-control conditional-validation"
                                           type="password"
                                           name="Password" id="passwordRebateGift"
                                           value="<?php \CYH\Helpers\OutputHelper::EchoHtmlEntities($regInfo, "Password") ?>"
                                           required data-minlength="5">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="create-account">
                                <div class="form-group rebateGiftInput has-feedback">
                                    <label for="PasswordConfirm" class="text-white cyb-form-label">Confirm Password</label>
                                    <input class="input text-center has-feedback-reset form-control conditional-validation"
                                           type="password"
                                           name="PasswordConfirm" id="passwordConfirmRebateGift"
                                           value="<?php \CYH\Helpers\OutputHelper::EchoHtmlEntities($regInfo, "ConfirmPassword") ?>"
                                           required data-match="#passwordRebateGift" data-minlength="5">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="mtop20">
                                <div class="form-group mbottom10">
                                    <button id="rgRegister"
                                            class="btn btn-success btn-block edp-form-submit"
                                            type="submit">
                                        Create Account And View Offers
                                    </button>
                                </div>
                            </div>
                            <input id="street_number_business_modal" type="hidden"
                                   name="street"/>
                            <input id="route_business_modal" type="hidden" name="route"/>
                            <input id="suite_business_modal" type="hidden" name="suite_business_modal"/>
                            <input id="locality_business_modal" type="hidden" name="locality"/>
                            <input id="administrative_area_level_1_business_modal" type="hidden"
                                   name="administrative_area_level_1"/>
                            <input id="postal_code_business_modal" type="hidden" name="zip"/>
                            <input id="country_business_modal" type="hidden" name="country"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<script>
    $(function () {
        //masked input init
        $('.maskedPhone').mask('000-000-0000');

        //registration and login forms validation
        InitializeValidation('#edp-form')
    });

    function InitializeValidation(selector) {
        $(selector).validator({
            disable: false
        }).on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                //if validation successfully passed
                $.LoadingOverlay("show");
            }
        });
        $(selector).on('valid.bs.validator', function (e) {
            $(e.relatedTarget).data("title", e.detail)
                .tooltip("destroy");
        })
        $(selector).on('invalid.bs.validator', function (e) {
            $(e.relatedTarget).tooltip("destroy") // Destroy any pre-existing tooltip so we can repopulate with new tooltip content
                .data("title", e.detail)
                .tooltip();
        });
    }
</script>
