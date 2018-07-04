<div class="container">
    <header class="page-head">
        <div class="row">
            <div class="col-md-6 logo-links">
                <a class="logo-link" href="<?php echo $urlPrefix ?>?groupId=<?php echo $groupInfo->Id ?>"><img
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
                    do_action('\\' . \CYH\Controllers\Common\CommonUIComponents::class . "::RenderAlert", new \CYH\ViewModels\Alert($res->Status, $res->Data["Message"] . " " . $res->Data["Errors"][0]));
                }
                ?>
                <div class="row">
                    <div class="col-sm-offset-3 col-sm-6">
                        <form id="edp-form" role="form" class="mtop20"
                              action="<?php echo $urlPrefix ?>register?groupId=<?php echo $groupInfo->Id; ?>"
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
                                           type="text"
                                           data-customEmail
                                           data-customEmail-error="Email format is invalid"
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
                                    <label for="search" class="text-white cyb-form-label">ZIP code, address</label>
                                    <div class="input-group full-width">
                                        <input class="input text-center rebateGiftInput has-feedback-reset form-inline address form-control"
                                               type="text" name="search" id="registerAddressSearch" required>
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
        InitializeValidation('#edp-form');

        //initialization of address search
        var toggle = 0;
        $('#registerAddressSearch').autocomplete(
            {
                showHeader: true,
                minLength: 4,
                delay: 200,
                source: function (request, response) {
                    var url = "https://expressentry.melissadata.net/";
                    var id = "113933534";
                    $.getJSON(url + "jsonp/ExpressFreeForm?callback=?", {
                        format: "jsonp",
                        id: id,
                        FF: request.term,
                        maxrecords: "30"
                    }, function (data) {
                        response($.map(data.Results, function (item) {

                            if (item.Address.SuiteCount == 1)
                                return {
                                    label: item.Address.AddressLine1 + " " + item.Address.City + " " + item.Address.SuiteName + " " + item.Address.SuiteCount + ", " + item.Address.State + " " + item.Address.PostalCode,
                                    value: item.Address.AddressLine1 + " " + item.Address.City + ", " + item.Address.SuiteName + " " + item.Address.SuiteCount + ", " + item.Address.State + " " + item.Address.PostalCode,
                                    addObj: item
                                };
                            else if (item.Address.SuiteCount > 1)
                                return {
                                    label: item.Address.AddressLine1 + " " + item.Address.City + " (" + item.Address.SuiteName + "" + "), " + item.Address.State + " " + item.Address.PostalCode,
                                    value: item.Address.AddressLine1 + " " + item.Address.City + ", " + item.Address.State + " " + item.Address.PostalCode,
                                    addObj: item
                                };
                            else
                                return {
                                    label: item.Address.AddressLine1 + " " + item.Address.City + ", " + item.Address.State + " " + item.Address.PostalCode,
                                    value: item.Address.AddressLine1 + " " + item.Address.City + ", " + item.Address.State + " " + item.Address.PostalCode,
                                    addObj: item
                                };
                        }));
                    });
                },

                select: function (evt, ui) {
                    $('.search-button').attr('disabled', 'disabled');
                    $('.search-button').attr('title', 'Please select an address from the autocomplete dropdown in order to find deals near you!');

                    var res = ui.item.addObj;
                    var addressNumber = res.Address.AddressLine1.substr(0, res.Address.AddressLine1.indexOf(' '));
                    var addressStreet = res.Address.AddressLine1.substr(res.Address.AddressLine1.indexOf(' ') + 1);
                    var zipcode = res.Address.PostalCode.split("-")[0];
                    var city = res.Address.City;


                    var state = res.Address["CountrySubdivisionCode"].split("-")[1];
                    var concatAddress = addressNumber + " " + addressStreet + " " + city + " " + state + " " + zipcode;
                    var suiteLen = res.Address.SuiteList;
                    $('#suite').val(res.Address.SuiteList[1]);
                    setCookie('suite', "", 1);

                    var suiteArr = JSON.stringify(suiteLen);
                    setCookie('suiteArr', suiteArr, 1);
                    var inputStr = '#' + $(this).attr('id');
                    var inputSelect = $(inputStr);
                    if (suiteLen.length > 1 && toggle > 0) {
                        $('#suite').animate({width: '0%'}, 1000, function () {
                            $('#suite').remove();
                            toggle = 0;
                            suiteSelector(suiteLen, inputSelect);
                        });
                    }
                    else if (suiteLen.length == 1 && toggle > 0) {
                        $('#suite').parent().find('input').first().animate({width: '100%'}, 1000, function () {
                            $('#suite').remove();
                        });
                        $('#suite').animate({width: '0%'}, 1000, function () {
                            $('#suite').remove();
                        });
                        toggle = 0;
                    }

                    function suiteSelector(suites, input) {
                        if (toggle < 1 && suites.length > 1) {
                            var suiteCount = "";
                            for (var i = 0; i < suites.length; i++) {
                                suiteCount += '<option value="' + suites[i] + '">' + suites[i] + '</option>';
                            }
                            input.animate({}, 1000, function () {
                                if (!input.hasClass('rebateGiftInput')) {
                                    input.after('<select id="suite" class="suite" name="suite" style="width: 0px; margin-left: 3px; -webkit-appearance: menulist-button; border: solid 1px rgb(204, 204, 204); text-align-last:center; height: 30px;  -webkit-appearance: none; -webkit-border-radius: 0px; background: #fff;">' + suiteCount + '</select>');
                                    input.animate({width: '50%'}, 1000);
                                    $('#suite').animate({width: '20%'}, 1000);
                                    $('#suite').addClass('flasher');
                                    suiteSaver();
                                } else {
                                    input.css({display: 'inline'});
                                    input.animate({width: '70%'}, 1000, function () {
                                        input.after('<select id="suite" class="suite form-inline" name="suite" style="width: 0px; display: inline; margin-left: 3px; -webkit-appearance: menulist-button; border: solid 1px rgb(204, 204, 204); text-align-last:center; height: 36px;  border-radius: 5px;  -webkit-appearance: none; -webkit-border-radius: 5px; background: #fff;">' + suiteCount + '</select>');
                                        $('#suite').animate({width: '29%'}, 1000);
                                        $('#suite').addClass('flasher');
                                        suiteSaver();
                                    });
                                }
                            });
                            toggle++;
                        }
                    }

                    function suiteSaver() {
                        suiteVal = $('#suite').val();
                        setCookie('suite', suiteVal, 1);
                        $('#suite').change(function () {
                            $('#suite').removeClass('flasher');
                            suiteVal = $('#suite').val();
                            setCookie('suite', suiteVal, 1);
                            $('#suite').val(suiteVal);
                            $('#suite_business_modal').val(suiteVal);
                        });
                    }

                    $('#street_number').val(addressNumber);
                    $('#route').val(addressStreet);
                    $('#locality').val(city);
                    $('#administrative_area_level_1').val(state);
                    $('#postal_code').val(zipcode);
                    $('#country').val('USA');

                    $('#street_number_business_modal').val(addressNumber);
                    $('#route_business_modal').val(addressStreet);
                    $('#locality_business_modal').val(city);
                    $('#administrative_area_level_1_business_modal').val(state);
                    $('#postal_code_business_modal').val(zipcode);
                    $('#country_business_modal').val('USA');

                    setCookie('fullAddress', concatAddress, 1);
                    setCookie('street_number', addressNumber, 1);
                    setCookie('street', addressStreet, 1);
                    setCookie('city', city, 1);
                    setCookie('state', state, 1);
                    setCookie('zipcode', zipcode, 1);

                    $('#address, #homeSearch, #edpSearch, #search-services').val(concatAddress);
                    suiteSelector(suiteLen, inputSelect);
                }
            });


        $('input#address, input#homeSearch').focus(function () {
            $('.search-button').attr('disabled', 'disabled');
            $('.search-button').attr('title', 'Please select an address from the autocomplete dropdown in order to find deals near you!');
            $(this).val('');
        });

        $('input#address, input#homeSearch').focusout(function () {
            var cook = getCookie('fullAddress');
            if (cook) {
                $('.search-button').removeAttr('disabled');
                $('.search-button').removeAttr("title");
                $(this).val(cook);
            }
        });
    });
</script>
