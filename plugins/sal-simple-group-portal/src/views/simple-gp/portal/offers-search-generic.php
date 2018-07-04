<div id="group-portal" class="adaptive-content">
    <div class="container">
        <header class="page-head text-center text-uppercase">
            <h2><?php echo $title ?></h2>
        </header>
        <div class="row mtop40">
            <div class="col-sm-6">
                <div class="phone">
                    <div itemscope="" itemtype="http://schema.org/Organization">
                                    <span itemprop="telephone">
                                    <a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($phone) ?>"
                                       class="phone-number btn btn-success btn-lg">
                                    <i class="glyphicon glyphicon-earphone"></i>
                                        <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($phone) ?></a>
                                    </span>
                    </div>
                </div>
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/gift.png'; ?>"
                     class=" mtop20 img-responsive visible-xs-block"/>
                <p class="mtop20 condensed">
                    <?php echo $welcomeText; ?>
                </p>

                <p class="mtop20 condensed">
                    <span class="text-green"><strong>$150</strong></span> gift for 4+ services (bundled or separate)
                    <br>
                    <span class="text-green"><strong>$100</strong></span> gift for three services (bundled or separate)
                    <br>
                    <span class="text-green"><strong>$50</strong></span> gift for two services (bundled or separate)
                    <br>
                    <span class="text-green"><strong>$25</strong></span> gift when buying one service. <br>
                </p>
            </div>
            <div class="col-sm-6">
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/gift.png'; ?>"
                     class="img-responsive hidden-xs"/>
                <p class="mtop20">
                    Ask our agent about additional bonuses!
                </p>
            </div>
        </div>
    </div>
    <div class="jumbotron cyh-background reset-vertical-margins reset-vertical-paddings">
        <div class="container">
            <div class="row mtop20 mbottom20">
                <div class="col-sm-12">
                    <p class="text-white text-center">
                        Enter your address to see what services are available
                    </p>
                    <?php
                    do_action('\\' . \CYH\Controllers\Common\CommonUIComponents::class . '::RenderAddressSearchBox', new \CYH\ViewModels\AddressSearch('/', 'order-cable-search', []), 'simple-gp/search-widget');
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="centered-content">
            <div class="mtop20">Delivered by:&nbsp;&nbsp;&nbsp;</div>
            <div class="mtop20">
                <img class="delivered-by-logo"
                     src="<?php echo get_stylesheet_directory_uri() . '/img/cyh-logo.png'; ?>"/>
            </div>
        </div>
        <?php if (count($addressSearch->TableItems) != 0) : ?>
            <div class="breadcrumbs">
                <div id="crumbs">
                    <a href="/">Home</a> » <span class="current">Results</span></div>
                <?php if (isset($address)): ?>
                    for <a class="resultsAddress"><?php echo \CYH\Helpers\FormatHelper::FormatAddress($address); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="results-page">
            <?php if (count($addressSearch->TableItems) != 0) : ?>
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
                                                <span class="price-intro"><?php echo $item->PriceDescriptionStart ?></span>
                                                <br/>
                                            <?php endif; ?>
                                            <span class="price">$ <?php echo $item->Price ?> </span><br/>
                                            <?php if (!empty($item->PriceDescriptionEnd)): ?>
                                                <span class="price-intro"><?php echo $item->PriceDescriptionEnd ?></span>
                                                <br/>
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
            });
        </script>
    </div>
</div>
