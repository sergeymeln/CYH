<?php
/* @var $groupInfo \CYH\Models\Groups\GroupInfo */
/* @var $zip string */
?>

<div id="group-portal">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 text-center">
                <img src="<?php echo $groupInfo->Logo ?>" class="sgp-logo" alt="<?php echo $groupInfo->Name ?>"/>
            </div>
            <div class="col-sm-10">
                <div class="results-headline text-center sgp-page-header">
                    <h2>
                        Exclusive deals and discounts
                    </h2>
                </div>
            </div>
        </div>
        <div class="mtop20">
            <?php
            do_action('\\' . \CYH\Controllers\Common\CommonUIComponents::class . '::RenderDescription', \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($groupInfo->Description), 'common', 'common');
            ?>
        </div>
    </div>
    <div class="jumbotron cyh-background reset-vertical-margins reset-vertical-paddings">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-white text-center welcome-text mtop0 mbottom0">
                        Welcome!
                    </h2>
                    <p class="text-white text-center">
                        You're a simple step away from viewing your exclusive offers!
                    </p>
                    <p class="text-white reset-font-size text-center">
                        To provide you with the offers that are available in <br>your area, we just need your zip code!
                    </p>
                    <?php if (isset($_REQUEST['salAction']) && isset($alert)) {
                        do_action('\\' . \CYH\Controllers\Common\CommonUIComponents::class . "::RenderAlert", $alert);
                    }
                    ?>
                    <div class="row mtop20">
                        <div class="col-sm-offset-3 col-sm-6 gift-register-height">
                            <form id="login"
                                  method="POST" class="mtop20">
                                <div class="mtop20 mbottom20">
                                    <div class="form-group rebateGiftInput has-feedback">
                                        <label for="Zip" class="text-white cyb-form-label">Zip Code</label>
                                        <input class="input text-center has-feedback-reset form-control"
                                               type="text"
                                               name="Zip"
                                               required
                                               pattern="^\d{5}(-\d{4})?$"
                                               data-pattern-error="Please enter Zip Code in one of the following formats: XXXXX or XXXXX-XXXX"
                                               value="<?php \CYH\Helpers\OutputHelper::EchoHtmlEntitiesFromString($zip) ?>">
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
    <div class="container">
        <div class="results-page mtop20">
            <?php if (isset($products)) { ?>
                <section class="results">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="results-tbl full-width tablesaw-stack">
                                <thead class="hidden-xs">
                                <tr>
                                    <th class="provider-th">Provider</th>
                                    <th class="features-th">Plans &amp; Features</th>
                                    <th class="price-th">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                foreach ($products as $obj) {
                                    /* @var $obj \CYH\Models\Product */
                                    $providerlogo = $obj->ServiceProviderCategory->Provider->Logo;

                                    $providerSalePrice = $obj->Price ? $obj->Price : 0;

                                    if (strrpos($providerSalePrice, '.') == false) {
                                        $providerSalePrice .= '.00';
                                    }

                                    $providerFeatures = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($obj->Description);

                                    $formattedPhone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($groupInfo->SpPhone);

                                    echo "<tr>";
                                    echo "<td><img src='" . $providerlogo . "' class=\"img-natural\"/><hr/>";
                                    echo "<td class='desc'><h4>" . $obj->Name . "</h4>";

                                    do_action('\\' . \CYH\Controllers\Common\CommonUIComponents::class . '::RenderDescription', $providerFeatures, 'common', 'common');

                                    echo "</td>";
                                    echo "<td><span class=\"price-intro\">Starting at</span><br />
                                  <span class=\"price\">$" . $providerSalePrice . "</span><br />
                                  <a href=\"" . 'tel:' . "$formattedPhone\" class=\"phone-number btn btn-success btn-lg\"><i class=\"glyphicon glyphicon-earphone\"></i> $formattedPhone</a>
                                  <br />";

                                    if (isset($obj->Legal) && !empty($obj->Legal)) {
                                        echo '<a href="#" class="disclaimer">View Disclaimer</a>';
                                    }

                                    echo "</td></tr>";
                                    echo '<tr class="disclaimer-row">';
                                    echo '<td colspan="3">';
                                    if (isset($obj->Legal) && !empty($obj->Legal)) {

                                        echo $obj->Legal;
                                    }
                                    echo '</td>';
                                    echo '</tr>';

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
            document.addEventListener('DOMContentLoaded', function (event) {
                $('button.provider-name').on('click', function () {
                    jQuery(this).parents('td').first().find('.instructions-gwp').show()
                });
                $('.instructions-gwp span').on('click', function () {
                    jQuery(this).parent().hide();
                });

                $('.results-tbl a.disclaimer').click(function () {
                    $(this).parents('tr').next().toggle();

                    return false;
                });

                //registration and login forms validation
                InitializeValidation('#login');
            });
        </script>
    </div>
</div>
