<?php
/* @var $addressSearch \CYH\ViewModels\CYH\AddressSearchResults */
?>
<div class="results-page">
    <?php
    do_action('\CYH\Controllers\ConnectYourCondo\UIComponentsController::RenderAddressSearchResultsHeaderSection', $addressSearch->Header);

    if (count($addressSearch->TableItems) == 0) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8 brand-intro hero-holder">
                    <div class="masthead">
                        <img src="<?php echo $addressSearch->DefaultHeroImage ?>"
                             class="resultsPage" alt="">
                    </div>
                </div>
                <div class="col-md-4 brand-intro">
                    <div class="masthead">
                        <div class="banner-msg text-center">
                            <h2>No Results found</h2>
                            <p>
                                Please try again with the different address
                            </p>
                            <div class="row service-cta">
                                <div class="col-md-12 ">
                                    <?php
                                    //duplicationg phone getting logic from header
                                    $phone = '';
                                    if (get_field('cyb_phone_number', 'option')) {
                                        $phone = get_field('cyb_phone_number', 'option');
                                    } elseif (get_field('phone_number_one_brand')) {
                                        $phone = get_field('phone_number_one_brand');
                                    }
                                    ?>

                                    <a href="tel:<?php echo $phone; ?>" class="btn btn-orange">
                                        Contact Us Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>
        <section class="results">
            <div class="row">
                <div class="col-md-12">
                    <table class="results-tbl tablesaw-stack">
                        <?php if (count($addressSearch->TableHeaders) > 0): ?>
                            <thead class="hidden-xs">
                            <tr>
                                <?php foreach ($addressSearch->TableHeaders as $th):
                                    /* @var $th \CYH\ViewModels\UI\TableHeaderItem */
                                    ?>
                                    <th class="<?php echo $th->CssClass ?>"><?php echo $th->Name ?></th>
                                <?php endforeach; ?>
                            </tr>
                            </thead>
                        <?php endif; ?>
                        <tbody>
                        <?php foreach ($addressSearch->TableItems as $item):
                            /* @var $item \CYH\ViewModels\CYH\ResultsTableListItem */ ?>
                            <tr>
                                <td>
                                    <img src="<?php echo $item->Logo ?>" class="img-natural"/>
                                </td>
                                <td class='desc'><h4><?php echo $item->Title ?></h4>
                                    <?php
                                    do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $item->Features, 'common', 'common');
                                    ?>
                                </td>
                                <td>
                                    <?php if (!empty($item->PriceDescriptionStart)): ?>
                                        <span class="price-intro"><?php echo $item->PriceDescriptionStart ?></span><br/>
                                    <?php endif; ?>
                                    <span class="price">$ <?php echo $item->Price ?> </span><br/>
                                    <?php if (!empty($item->PriceDescriptionEnd)): ?>
                                        <span class="price-intro"><?php echo $item->PriceDescriptionEnd ?></span><br/>
                                    <?php endif; ?>
                                    <?php if (!is_null($item->OrderButton)): ?>
                                        <a href="<?php echo $item->OrderButton->Link ?>"
                                           target="<?php echo $item->OrderButton->Target ?>"
                                           class="<?php echo $item->OrderButton->CssClass ?>">
                                            <?php echo $item->OrderButton->Label ?>
                                        </a>
                                        <br/>
                                    <?php endif; ?>
                                    <?php if (!is_null($item->MoreInfoButton)): ?>
                                        <a href="<?php echo $item->MoreInfoButton->Link ?>"
                                           target="<?php echo $item->MoreInfoButton->Target ?>"
                                           class="<?php echo $item->MoreInfoButton->CssClass ?>">
                                            <?php echo $item->MoreInfoButton->Label ?>
                                        </a>
                                        <br/>
                                    <?php endif; ?>
                                    <?php if (!empty($item->ViewDisclaimerButton)): ?>
                                        <a href="<?php echo $item->ViewDisclaimerButton->Link ?>"
                                           target="<?php echo $item->ViewDisclaimerButton->Target ?>"
                                           class="<?php echo $item->ViewDisclaimerButton->CssClass ?>">
                                            <?php echo $item->ViewDisclaimerButton->Label ?>
                                        </a>
                                        <br/>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php if ($item->Disclaimer): ?>
                                <tr class="disclaimer-row">
                                    <td colspan="<?php echo count($addressSearch->TableHeaders) ?>">
                                        <?php echo $item->Disclaimer ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </section>
    <?php endif; ?>
    <style>
        .results-tbl tbody > tr.disclaimer-row {
            display: none;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('.results-tbl a.disclaimer').click(function () {
                $(this).parents('tr').next().toggle();
                return false;
            });
        });
    </script>
