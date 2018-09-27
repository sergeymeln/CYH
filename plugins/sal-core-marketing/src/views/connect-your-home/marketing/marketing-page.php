<?php /**@var $cityData array */ ?>
<?php /**@var $city \CYH\Marketing\ViewModels\UI\CityItem */ ?>
<?php /**@var $constants array */ ?>
<?php /**@var $urlHelper \CYH\Marketing\Helpers\UrlHelper */ ?>
<?php /**@var $showMap boolean*/?>
<div id="internetCityPage">
    <section class="intro-section">
        <div class="container-fluid">
            <div class="row">
                <div class="darken-bg"></div>
                <div class="container">
                    <div class="row">
                        <div class="inner-block vertical-align">
                            <h1 class="inner-title">Best Internet Providers in <?php echo $city->NormalName ?>, <?php echo $city->StateCode ?>&nbsp;<?php echo $city->Zip ?> </h1>
                            <p class="inner-text"><?php echo $city->TagLine ?></p>
                            <div class="zip-code-form">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label class="sr-only" for="zipCode">Email</label>
                                        <input type="text" value="<?php echo $city->Zip ?>"
                                               class="form-control zip-code" id="zipCode" placeholder="ZIP code">
                                    </div>
                                    <input type="hidden" value="<?php echo $city->Zip ?>" id="currentZipCode"/>
                                    <button type="button" id="cyh_process_zip" class="btn btn-green">Update location
                                    </button>
                                </div>
                                <div>
                                    <span class="active process-status" id="cyh_process_status"></span>
                                </div>
                            </div>
                            <ol class="breadcrumb">
                                <li><span>Home</span></li>
                                <li><span class="active">Internet</span></li>
                                <li><span class="active"><?php echo $city->StateName ?></span></li>
                                <li><span class="active"><?php echo $city->NormalName ?></span></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="offer-section">
        <div class="container">
            <div class="row">
                <h2>In <?php echo $city->NormalName ?> There Are offers from <span
                            data-bind="text: ProviderCount">several</span> providers </h2>
                <span class="active process-status loading" data-bind="css: {loading: Loading}"></span>
                <div class="providers-slider center-slider-content"
                     data-bind="foreach: Providers, slick: { slickOptions: ProviderSliderOptions(), orderNumberHandler: 'HeaderProviderOrderNumber'} ">
                    <div class="inner-slide"><img data-bind="attr: {src: Logo}"></div>
                </div>

                <p class="provider-count">
                    <span class="current-slide green-text" data-bind="text: HeaderProviderOrderNumber"></span> of <span
                            class="slide-count green-text"
                            data-bind="text: ProviderCount"></span>
                    providers
                </p>

                <div class="button-wrap">
                    <a href="#best-offers" class="btn btn-green btn-big btn-green-glow">Go to best offers</a>
                </div>
            </div>
        </div>
    </section>
    <section class="top-providers-section">
        <div class="container">
            <div class="row">
                <h2>
                    Top <span data-bind="text: TopProviderCount"></span> internet providers
                    in <?php echo $city->NormalName ?>, <?php echo $city->StateCode ?></h2>

                <span class="active process-status loading" data-bind="css: {loading: Loading}"></span>

                <table class="table providers-table hidden-xs cyh-invisible"
                       data-bind="css: {'cyh-invisible': Loading}">
                    <thead>
                    <tr class="thead-row">
                        <th scope="col" class="col-sm-2 col-md-2">Brand</th>
                        <th scope="col" class="col-sm-4 col-md-3">Price From</th>
                        <th scope="col" class="col-sm-3 col-md-2">AVG. Speed</th>
                        <th scope="col" class="col-sm-3 col-md-2">Max Speed</th>
                        <th scope="col" class="hidden-xs hidden-sm"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- ko if: TopProviderCount() > 0 -->
                    <!-- ko foreach: TopProviders -->
                    <tr>
                        <td><img width="130px" height="50px" data-bind="attr: {src: provider.Logo }"></td>
                        <td><span class="big-text"><span class="number"
                                                         data-bind="text: ( products()[0].Price()) ? '$' + products()[0].Price() : '-' "></span></span>
                            <span data-bind="text: products()[0].PriceDescriptionEnd"></span>
                        </td>
                        <td><span class="big-text"><span
                                        class="number" data-bind="text: avgSpeed"></span> <span
                                        data-bind="text: speedUnitsAvg"></span></span>
                        </td>
                        <td><span class="big-text"><span
                                        class="number" data-bind="text: maxSpeed"></span> <span
                                        data-bind="text: speedUnitsMax"></span></span>
                        </td>
                        <td class="hidden-xs hidden-sm"><a class="btn btn-orange"
                                                           data-bind="click: $root.SeeAllProviderPackages">See
                                all packages</a></td>
                    </tr>
                    <tr class="hidden-md hidden-lg">
                        <td colspan="4">
                            <a class="btn btn-orange" data-bind="click: $root.SeeAllProviderPackages">See all
                                packages</a>
                        </td>
                    </tr>
                    <!-- /ko -->
                    <!-- /ko -->
                    <!-- ko if: TopProviderCount() == 0 -->
                    <tr>
                        <td colspan="5">No items found</td>
                    </tr>
                    <!-- /ko -->
                    </tbody>
                </table>
                <!-- ko if: TopProviderCount() > 0 -->
                <div class="providers-table-slider hidden-sm hidden-md hidden-lg cyh-invisible"
                     data-bind="foreach: TopProviders, slick: { slickOptions: MobileTableOptions, orderNumberHandler: 'TopProvidersOrderNumber'}, css: {'cyh-invisible': Loading} ">
                    <div>
                        <table class="table providers-table tablet">
                            <thead>
                            <tr class="thead-row">
                                <th scope="col" class="col-xs-6">Brand</th>
                                <th scope="col" class="col-xs-6">Price From</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>
                                    <img width="130px"
                                         height="50px" data-bind="attr: {src: provider.Logo }">
                                </td>
                                <td><span class="big-text"><span class="number"
                                                data-bind="text: ( products()[0].Price()) ? '$' + products()[0].Price() : '-' "></span></span>
                                    <span data-bind="text: products()[0].PriceDescriptionEnd"></span>
                                </td>
                            </tr>
                            <tr class="thead-row thead-simple">
                                <th>AVG. Speed</th>
                                <th>Max Speed</th>
                            </tr>
                            <tr>
                                <td>
                                    <span class="big-text"><span class="number" data-bind="text: avgSpeed"></span> <span data-bind="text: speedUnitsAvg"></span></span>
                                </td>
                                <td>
                                    <span class="big-text"><span class="number" data-bind="text: maxSpeed"></span> <span data-bind="text: speedUnitsMax"></span></span>
                                </td>
                            </tr>
                            <tr class="btn-row">
                                <td colspan="2">
                                    <a class="btn btn-orange"
                                       data-bind="click: $root.SeeAllProviderPackages">See all
                                        packages</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                        <table class="table providers-table mobile">
                            <thead>
                            <tr class="thead-row">
                                <th>Brand</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><img width="130px" height="50px" data-bind="attr: {src: provider.Logo }"></td>
                            </tr>
                            <tr class="thead-row thead-simple">
                                <th>Price From</th>
                            </tr>
                            <tr>
                                <td><span class="big-text"><span
                                                class="number"
                                                data-bind="text: ( products()[0].Price()) ? '$' + products()[0].Price() : '-' "></span></span>
                                    <span data-bind="text: products()[0].PriceDescriptionEnd"></span>
                                </td>
                            </tr>
                            <tr class="thead-row thead-simple">
                                <th>Max Speed</th>
                            </tr>
                            <tr>
                                <td><span class="big-text"><span
                                                class="number" data-bind="text: maxSpeed"></span> <span
                                                data-bind="text: speedUnitsMax"></span></span>
                                </td>
                            </tr>
                            <tr class="btn-row">
                                <td>
                                    <a class="btn btn-orange"
                                       data-bind="click: $root.SeeAllProviderPackages">See all
                                        packages</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <p class="provider-count hidden-sm hidden-md hidden-lg cyh-invisible" data-bind="css: {'cyh-invisible': Loading}">
                    <span class="current-slide green-text" data-bind="text: TopProvidersOrderNumber"></span> of <span
                            class="slide-count green-text" data-bind="text: TopProviderCount"></span>
                    providers
                </p>
                <!-- /ko -->
                <!-- ko if: TopProviderCount() == 0 -->
                <p class="not-found-items hidden-sm hidden-md hidden-lg cyh-invisible" data-bind="css: {'cyh-invisible': Loading}">No items found</p>
                <!-- /ko -->


                <div class="button-wrap">
                    <a href="#best-offers" class="btn btn-green btn-big btn-green-glow">Go to best offers</a>
                </div>

            </div>
        </div>
    </section>
    <section class="map-section">
        <div class="container">
            <div class="row">
                <h2>Quick Facts on <?php echo $city->NormalName ?> Internet Services</h2>
                <span class="active process-status loading" data-bind="css: {loading: Loading}"></span>
                <div class="offers-list-wrap cyh-invisible" data-bind="css: {'cyh-invisible': Loading}">
                    <ul class="flex-list " data-bind="foreach: QuickFactsBegin">
                        <li data-bind="html: $data"></li>
                    </ul>
                    <ul class="flex-list " data-bind="foreach: QuickFactsEnd">
                        <li data-bind="html: $data"></li>
                    </ul>
                </div>
                <div id="map" class="map">
                    <?php
                    if($showMap) {
                        echo do_shortcode( '[flexiblemap height="600" width="100%" zoom="11" center="'.$city->Latitude.', '.$city->Longitude.'" marker="'.$city->Latitude.', '.$city->Longitude.'" ]' );
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="best-offers-tab-section">
        <div class="container">
            <div class="row">
                <h2 id="best-offers">Best Offers For Internet Service in <?php echo $city->NormalName ?>
                    , <?php echo $city->StateCode ?></h2>
                <div class="offers-navigation simple">
                    <ul class="nav nav-pills tab-offers">
                        <li data-bind="css:{ active: BestOffersTabSelected() == 1 }, click: function (data, event) { UpdateBestOfferTab(data, event, 1) }, clickBubble: false">
                            <a href="" class="btn btn-white">Internet</a>
                        </li>
                        <li data-bind="css:{ active: BestOffersTabSelected() == 2 }, click: function (data, event) { UpdateBestOfferTab(data, event, 2) }, clickBubble: false">
                            <a href="" class="btn btn-white">Internet + TV</a>
                        </li>
                    </ul>

                </div>
                <span class="active process-status loading" data-bind="css: {loading: Loading() || BestOffersLoading()}"></span>

                <div class="cyh-invisible" data-bind="css: {'cyh-invisible': Loading}">

                    <div class="tab-content">
                        <div id="internet" class="tab-pane fade in active">
                            <table class="table providers-table offers-table hidden-xs">
                                <thead>
                                <tr class="thead-row">
                                    <th scope="col" class="col-sm-1 col-md-1">Brand</th>
                                    <th scope="col" class="col-sm-5 col-md-4">Product Description</th>
                                    <th scope="col" class="col-sm-3 col-md-2">Speed</th>
                                    <th scope="col" class="col-sm-3 col-md-2">Price</th>
                                    <th scope="col" class="hidden-xs hidden-sm">Call to Order</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- ko if: BestOffersInternetCount() > 0 -->
                                <!-- ko foreach: BestOffersInternet -->
                                <tr>
                                    <td><img width="130px" height="50px"
                                             data-bind="attr: {src: ServiceProviderCategory.Provider.Logo}"></td>
                                    <td class="" data-bind="css: {'slide-cell': Description().length > 0}">
                                        <div><span class="middle-text " data-bind="text: Name"></span><span
                                                    class="show-more "
                                                    data-bind="css: {'arrow-up': Description().length > 0}">Details</span>
                                        </div>
                                    </td>
                                    <td><span class="big-text"><span
                                                    class="number" data-bind="text: DownloadSpeed"></span><span
                                                    data-bind="text: SpeedUnits"></span></span>
                                    </td>
                                    <td><span data-bind="text: PriceDescriptionBegin"></span> <span
                                                class="big-text"><span class="number"
                                                                       data-bind="text: Price() ? '$' + Price() : '-' "></span></span>
                                        <span data-bind="text: PriceDescriptionEnd"></span>
                                    </td>
                                    <td class="hidden-xs hidden-sm">
                                        <a onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');"
                                           class="btn btn-orange" data-bind="attr: {href: 'tel:' + $root.FormatPhone(Phone.Number())},
                                                                                 text: $root.FormatPhone(Phone.Number())">
                                        </a>
                                    </td>
                                </tr>
                                <tr class="hidden-row">
                                    <td></td>
                                    <td colspan="3">
                                        <div class="hidden-content">
                                            <ul class="plan-description">
                                                <!-- ko template: { name: 'description-template', data: Description } -->
                                                <!-- /ko -->
                                            </ul>
                                            <a target="_blank"
                                               data-bind="attr: {href: '/offers-terms-and-conditions/#offer-' + Id()}">
                                                Terms & Conditions
                                            </a>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr class="hidden-md hidden-lg">
                                    <td colspan="4">
                                        <a onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');"
                                           class="btn btn-orange" data-bind="attr: {href: 'tel:' + $root.FormatPhone(Phone.Number())},
                                                                                 text: $root.FormatPhone(Phone.Number())">
                                        </a></td>
                                </tr>
                                <!-- /ko -->
                                <!-- /ko -->
                                <!-- ko if: BestOffersInternetCount() == 0 -->
                                <tr>
                                    <td colspan="5">No items found</td>
                                </tr>
                                <!-- /ko -->
                                </tbody>
                            </table>


                            <!-- ko if: BestOffersInternetCount() > 0 -->
                            <div id="best-offers-slick" class="providers-table-slider hidden-sm hidden-md hidden-lg cyh-invisible"
                                 data-bind="foreach: BestOffersInternet, slick: { slickOptions: MobileTableOptions, orderNumberHandler: 'BestOffersOrderNumber', targetObservable: 'BestOffers'},css: {'cyh-invisible': Loading() || BestOffersLoading()} ">
                                <div>
                                    <table class="table providers-table tablet">
                                        <thead>
                                        <tr class="thead-row">
                                            <th scope="col" class="col-xs-6">Brand</th>
                                            <th scope="col" class="col-xs-6">Product Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td>
                                                <img width="130px" height="50px"
                                                     data-bind="attr: {src: ServiceProviderCategory.Provider.Logo}">
                                            </td>
                                            <td data-bind="css: {'slide-cell': Description().length > 0}">
                                                <div>
                                                    <span class="middle-text" data-bind="text: Name"></span><span
                                                            class="show-more "
                                                            data-bind="css: {'arrow-up': Description().length > 0}">Details</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="hidden-row">
                                            <td></td>
                                            <td>
                                                <div class="hidden-content">
                                                    <ul class="plan-description">
                                                        <!-- ko template: { name: 'description-template', data: Description } -->
                                                        <!-- /ko -->
                                                        <a target="_blank"
                                                           data-bind="attr: {href: '/offers-terms-and-conditions/#offer-' + Id()}">
                                                            Terms & Conditions
                                                        </a>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="thead-row thead-simple">
                                            <th>Speed</th>
                                            <th>Price</th>
                                        </tr>
                                        <tr>
                                            <td><span class="big-text"><span
                                                            class="number" data-bind="text: DownloadSpeed"></span><span
                                                            data-bind="text: SpeedUnits"></span></span>
                                            </td>
                                            <td><span data-bind="text: PriceDescriptionBegin"></span> <span
                                                        class="big-text"><span class="number"
                                                                               data-bind="text: Price() ? '$' + Price() : '-' ">
                                                    </span></span> <span data-bind="text: PriceDescriptionEnd"></span>
                                            </td>
                                        </tr>
                                        <tr class="btn-row">
                                            <td colspan="2">
                                                <a onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');"
                                                   class="btn btn-orange" data-bind="attr: {href: 'tel:' + $root.FormatPhone(Phone.Number())},
                                                                                 text: $root.FormatPhone(Phone.Number())">
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table providers-table mobile">
                                        <thead>
                                        <tr class="thead-row">
                                            <th>Brand</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <img width="130px" height="50px"
                                                     data-bind="attr: {src: ServiceProviderCategory.Provider.Logo }">
                                            </td>
                                        </tr>
                                        <tr class="thead-row thead-simple">
                                            <th>Product Description</th>
                                        </tr>
                                        <tr>
                                            <td data-bind="css: {'slide-cell': Description().length > 0}"><span
                                                        class="middle-text "
                                                        data-bind="css: {'arrow-up': Description().length > 0}"><span
                                                            class="middle-text" data-bind="text: Name"></span></span>
                                            </td>
                                        </tr>
                                        <tr class="hidden-row">
                                            <td>
                                                <div class="hidden-content">
                                                    <ul class="plan-description">
                                                        <!-- ko template: { name: 'description-template', data: Description } -->
                                                        <!-- /ko -->
                                                        <a target="_blank"
                                                           data-bind="attr: {href: '/offers-terms-and-conditions/#offer-' + Id()}">
                                                            Terms & Conditions
                                                        </a>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="thead-row thead-simple">
                                            <th>Price</th>
                                        </tr>
                                        <tr>
                                            <td><span data-bind="text: PriceDescriptionBegin"></span> <span
                                                        class="big-text"><span class="number"
                                                                               data-bind="text: Price() ? '$' + Price() : '-' ">
                                                    </span></span> <span data-bind="text: PriceDescriptionEnd"></span>
                                            </td>
                                        </tr>
                                        <tr class="btn-row">
                                            <td>
                                                <a onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');"
                                                   class="btn btn-orange" data-bind="attr: {href: 'tel:' + $root.FormatPhone(Phone.Number())},
                                                                                 text: $root.FormatPhone(Phone.Number())">
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <p class="provider-count hidden-sm hidden-md hidden-lg">
                                <span class="current-slide green-text" data-bind="text: BestOffersOrderNumber"></span>
                                of <span
                                        class="slide-count green-text" data-bind="text: BestOffersInternetCount"></span>
                                offers
                            </p>
                            <!-- /ko -->
                            <!-- ko if: BestOffersInternetCount() == 0 -->
                            <p class="not-found-items hidden-sm hidden-md hidden-lg">No items found</p>
                            <!-- /ko -->

                        </div>
                    </div>
                </div>

                <div class="button-wrap">
                    <a href="#all-available-offers" class="btn btn-big btn-green btn-green-glow see-all-offers"
                       data-bind="click: SeeAllInternetOffers">See all
                        Internet offers in <?php echo $city->NormalName ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="information-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-offset-1 col-sm-10">
                    <div class="row">
                        <h2><?php echo ($city->SectionOneText != '') ? $city->SectionOneText : 'Looking for an Internet Bundle' ?></h2>
                        <div class="content">
                            <?php
                            $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($city->SectionOne);
                            do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                            ?>
                        </div>

                        <h2><?php echo ($city->SectionTwoText != '') ? $city->SectionTwoText : 'More Important Information About Choosing an Internet Provider in ' . $city->NormalName ?></h2>
                        <div class="content">
                            <?php
                            $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($city->SectionTwo);
                            do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                            ?>
                        </div>

                        <div class="cyh-invisible" data-bind="if: HasSpectrum, css: {'cyh-invisible': !HasSpectrum()}">
                            <p class="text-center">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/spectrum-logo.png"
                                     width="255px" height="84px">
                            </p>
                            <h2><?php echo ($city->SectionThreeText != '') ? $city->SectionThreeText : 'We recommend Spectrum Bundles. Why?' ?></h2>
                            <div class="content">
                                <?php
                                $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($city->SectionThree);
                                do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                                ?>
                            </div>
                        </div>
                        <div class="button-wrap">
                            <a href="#best-offers" class="btn btn-big btn-green btn-green-glow">Go to best offers</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="best-offers-tab-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 id="all-available-offers">All Available Internet Offers in <?php echo $city->NormalName ?>
                        , <?php echo $city->StateCode ?></h2>
                    <div class="offers-navigation">
                        <ul class="nav nav-pills tab-offers">
                            <li id="allBrandsTab1"
                                data-bind="css:{ active: AllProductsTabSelected() == 1 }, click: function (data, event) { UpdateAllProductsTab(data, event, 1) }, clickBubble: false">
                                <a href="" class="btn btn-white">Internet</a>
                            </li>
                            <li id="allBrandsTab2"
                                data-bind="css:{ active: AllProductsTabSelected() == 2 }, click: function (data, event) { UpdateAllProductsTab(data, event, 2) }, clickBubble: false">
                                <a href="" class="btn btn-white">Internet
                                    + TV</a>
                            </li>
                        </ul>
                        <div class="form-inline">
                            <span class="loader"></span>
                            <div class="form-group">
                                <label for="brandsList" class="sr-only">List of brands</label>
                                <span class="select-wrap">
                            <select class="form-control brand-list" name="brand-list" id="brandsList" data-bind="options: Providers,
                                                                                                                 optionsValue: 'Id',
                                                                                                                 optionsText: 'Name',
                                                                                                                 value: SelectedProvider,
                                                                                                                 optionsCaption: 'Select Brand'">
                            </select>
                        </span>
                            </div>
                        </div>
                    </div>
                    <span class="active process-status loading" data-bind="css: {loading: Loading() || AllProductsLoading()}"></span>

                    <div class="cyh-invisible" data-bind="css: {'cyh-invisible': Loading}">


                        <div class="tab-content" id="allBrandsTab">
                            <div id="internetOffers" class="tab-pane fade in active">
                                <table class="table providers-table offers-table hidden-xs">
                                    <thead>
                                    <tr class="thead-row">
                                        <th scope="col" class="col-sm-1 col-md-2">Brand</th>
                                        <th scope="col" class="col-sm-5 col-md-4">Product Description</th>
                                        <th scope="col" class="col-sm-3 col-md-2">Speed</th>
                                        <th scope="col" class="col-sm-3 col-md-2">Price</th>
                                        <th scope="col" class="hidden-xs hidden-sm">Call to Order</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- ko if: AllProductsInternetCount() > 0 -->
                                    <!-- ko foreach: AllProductsInternet -->
                                    <tr>
                                        <td><img data-bind="attr: {src: ServiceProviderCategory.Provider.Logo }"
                                                 width="130px" height="50px"></td>
                                        <td data-bind="css: {'slide-cell': Description().length > 0}">
                                            <div><span class="middle-text" data-bind="text: Name"></span><span
                                                        class="show-more"
                                                        data-bind="css: {'arrow-up': Description().length > 0}">Details</span>
                                            </div>
                                        </td>
                                        <td><span class="big-text"><span
                                                        class="number" data-bind="text: DownloadSpeed"></span> <span
                                                        data-bind="text: SpeedUnits"></span></span>
                                        </td>
                                        <td><span data-bind="text: PriceDescriptionBegin"></span> <span
                                                    class="big-text"><span
                                                        class="number"
                                                        data-bind="text: Price() ? '$' + Price() : '-' "></span></span>
                                            <span data-bind="text: PriceDescriptionEnd"></span>
                                        </td>
                                        <td class="hidden-xs hidden-sm">
                                            <a onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');"
                                               class="btn btn-orange" data-bind="attr: {href: 'tel:' + $root.FormatPhone(Phone.Number())},
                                                                                 text: $root.FormatPhone(Phone.Number())">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="hidden-row">
                                        <td></td>
                                        <td colspan="3">
                                            <div class="hidden-content">
                                                <ul class="plan-description">
                                                    <!-- ko template: { name: 'description-template', data: Description } -->
                                                    <!-- /ko -->
                                                </ul>
                                                <a target="_blank"
                                                   data-bind="attr: {href: '/offers-terms-and-conditions/#offer-' + Id()}">
                                                    Terms & Conditions</a>

                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr class="hidden-md hidden-lg">
                                        <td colspan="4">
                                            <a onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');"
                                               class="btn btn-orange" data-bind="attr: {href: 'tel:' + $root.FormatPhone(Phone.Number())},
                                                                                 text: $root.FormatPhone(Phone.Number())">
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- /ko -->
                                    <!-- /ko -->
                                    <!-- ko if: AllProductsInternetCount() == 0 -->
                                    <tr>
                                        <td colspan="5">No items found</td>
                                    </tr>
                                    <!-- /ko -->
                                    </tbody>
                                </table>


                                <!-- ko if: AllProductsInternetCount() > 0 -->
                                <div id="all-products-slick"
                                     class="providers-table-slider hidden-sm hidden-md hidden-lg cyh-invisible"
                                     data-bind="foreach: AllProductsInternet, slick: { slickOptions: MobileTableOptions, orderNumberHandler: 'AllProductsOrderNumber', targetObservable: 'AllProducts'}, css: {'cyh-invisible': Loading() || AllProductsLoading()}">
                                    <div>
                                        <table class="table providers-table tablet">
                                            <thead>
                                            <tr class="thead-row">
                                                <th scope="col" class="col-xs-6">Brand</th>
                                                <th scope="col" class="col-xs-6">Product Description</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <img data-bind="attr: {src: ServiceProviderCategory.Provider.Logo }"
                                                         width="130px" height="50px"></td>
                                                <td data-bind="css: {'slide-cell': Description().length > 0}">
                                                    <div>
                                                            <span class="middle-text"><span
                                                                        data-bind="text: Name"></span></span><span
                                                                class="show-more"
                                                                data-bind="css: {'arrow-up': Description().length > 0}">Details</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="hidden-row">
                                                <td></td>
                                                <td>
                                                    <div class="hidden-content">
                                                        <ul class="plan-description">
                                                            <!-- ko template: { name: 'description-template', data: Description } -->
                                                            <!-- /ko -->
                                                        </ul>
                                                        <a target="_blank"
                                                           data-bind="attr: {href: '/offers-terms-and-conditions/#offer-' + Id()}">
                                                            Terms & Conditions</a>

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="thead-row thead-simple">
                                                <th>Speed</th>
                                                <th>Price</th>
                                            </tr>
                                            <tr>
                                                <td><span class="big-text"><span
                                                                class="number"
                                                                data-bind="text: DownloadSpeed"></span> <span
                                                                data-bind="text: SpeedUnits"></span></span>
                                                </td>
                                                <td><span data-bind="text: PriceDescriptionBegin"></span> <span
                                                            class="big-text"><span class="number"
                                                                                   data-bind="text: Price() ? '$' + Price() : '-' "></span></span>
                                                    <span data-bind="text: PriceDescriptionEnd"></span>
                                                </td>
                                            </tr>
                                            <tr class="btn-row">
                                                <td colspan="2">
                                                    <a onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');"
                                                       class="btn btn-orange" data-bind="attr: {href: 'tel:' + $root.FormatPhone(Phone.Number())},
                                                                                 text: $root.FormatPhone(Phone.Number())">
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="table providers-table mobile">
                                            <thead>
                                            <tr class="thead-row">
                                                <th>Brand</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <img data-bind="attr: {src: ServiceProviderCategory.Provider.Logo }"
                                                         width="130px" height="50px"></td>
                                            </tr>
                                            <tr class="thead-row thead-simple">
                                                <th>Product Description</th>
                                            </tr>
                                            <tr>
                                                <td data-bind="css: {'slide-cell': Description().length > 0}"><span
                                                            class="middle-text"
                                                            data-bind="css: {'arrow-up': Description().length > 0}"><span
                                                                data-bind="text: Name"></span></span>
                                                </td>
                                            </tr>
                                            <tr class="hidden-row">
                                                <td>
                                                    <div class="hidden-content">
                                                        <ul class="plan-description">
                                                            <!-- ko template: { name: 'description-template', data: Description } -->
                                                            <!-- /ko -->
                                                            <a target="_blank"
                                                               data-bind="attr: {href: '/offers-terms-and-conditions/#offer-' + Id()}">
                                                                Terms & Conditions</a>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="thead-row thead-simple">
                                                <th>Price</th>
                                            </tr>
                                            <tr>
                                                <td><span data-bind="text: PriceDescriptionBegin"></span> <span
                                                            class="big-text"><span class="number"
                                                                                   data-bind="text: Price() ? '$' + Price() : '-' "></span></span>
                                                    <span data-bind="text: PriceDescriptionEnd"></span>
                                                </td>
                                            </tr>
                                            <tr class="btn-row">
                                                <td>
                                                    <a onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');"
                                                       class="btn btn-orange" data-bind="attr: {href: 'tel:' + $root.FormatPhone(Phone.Number())},
                                                                                 text: $root.FormatPhone(Phone.Number())">
                                                    </a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <p class="provider-count hidden-sm hidden-md hidden-lg">
                                    <span class="current-slide green-text"
                                          data-bind="text: AllProductsOrderNumber"></span> of <span
                                            class="slide-count green-text"
                                            data-bind="text: AllProductsInternetCount"></span>
                                    offers
                                </p>
                                <!-- /ko -->
                                <!-- ko if: AllProductsInternetCount() == 0 -->
                                <p class="not-found-items hidden-sm hidden-md hidden-lg">No items found</p>
                                <!-- /ko -->
                            </div>
                        </div>
                        <div class="tab-content" id="oneBrandTab"></div>
                    </div>

                    <div class="button-wrap">
                        <a href="#best-offers" class="btn btn-big btn-green btn-green-glow">Go to best offers
                            in <?php echo $city->NormalName ?></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="nearby-offers">
        <div class="container">
            <div class="row">
                <h2>See Internet Offers in Nearby Locations</h2>
                <?php if (count($city->RelatedCities) > 0): ?>
                    <div class="offers-list-wrap">
                        <?php $relCitiesHalfCount = count($city->RelatedCities) / 2; ?>
                        <?php $counter = 0 ?>

                        <ul class="flex-list nearby-offers-list">
                            <?php foreach ($city->RelatedCities as $relCity): ?>
                                <?php if ($counter >= $relCitiesHalfCount) {
                                    echo '</ul><ul class="flex-list nearby-offers-list">';
                                    $counter = 0;
                                } ?>
                                <li><a href="<?php echo \CYH\Marketing\Helpers\UrlHelper::getCityUrl($relCity) ?>">
                                        <?php echo $relCity['city_normal_name'] ?>, <?php echo $relCity['state_code'] ?>
                                    </a>
                                </li>
                                <?php $counter++ ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="offers-list-wrap">
                        <span>No items found</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php if (count($city->BiggestCitiesInState) > 0): ?>
        <section class="nearby-offers">
            <div class="container">
                <div class="row">
                    <h2>See Internet Offers in 10 biggest cities in <?php echo $city->StateName ?> state</h2>
                    <div class="offers-list-wrap">
                        <?php $bigCitiesHalfCount = count($city->BiggestCitiesInState) / 2; ?>
                        <?php $counter = 0 ?>

                        <ul class="flex-list nearby-offers-list">
                            <?php foreach ($city->BiggestCitiesInState as $bigCity): ?>
                                <?php if ($counter >= $bigCitiesHalfCount) {
                                    echo '</ul><ul class="flex-list nearby-offers-list">';
                                    $counter = 0;
                                } ?>
                                <li><a href="<?php echo \CYH\Marketing\Helpers\UrlHelper::getCityUrl($bigCity) ?>">
                                        <?php echo $bigCity['city_normal_name'] ?>, <?php echo $bigCity['state_code'] ?>
                                    </a>
                                </li>
                                <?php $counter++ ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>
    <!-- container -->


    <script type="text/html" id="description-template">
        <!-- ko foreach: $data -->
        <!-- ko if: $data.type() == 1 -->
        <!-- ko template: { name: 'text-template', data: $data.elementParsedContent } -->
        <!-- /ko -->
        <!-- /ko -->
        <!-- ko if: $data.type() == 2 -->
        <!-- ko template: { name: 'bullets-template', data: $data.elementParsedContent } -->
        <!-- /ko -->
        <!-- /ko -->
        <!-- /ko -->
    </script>
    <script type="text/html" id="text-template">
        <p data-bind="html: $data">
        </p>
    </script>
    <script type="text/html" id="bullets-template">
        <ul class="plus-list text-left" data-bind="foreach: $data">
            <li data-bind="html: $data"></li>
        </ul>
    </script>

</div>

<script>
    $(function () {
        var data = {
            'action': 'get_internet_package_data',
            'cityId': '<?php echo $city->Id; ?>',
            'zip': '<?php echo $city->Zip; ?>'
        };

        $.post(ajax_object.ajax_url, data, function (response) {
            var data = JSON.parse(response);
            InternetCities.Initialize(data);
        });
    });
</script>