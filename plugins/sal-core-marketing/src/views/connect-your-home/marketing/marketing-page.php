<?php /**@var $cityData array*/?>
<?php /**@var $city \CYH\Marketing\ViewModels\UI\CityItem*/?>
<?php /**@var $constants array*/?>
<?php /**@var $urlHelper \CYH\Marketing\Helpers\UrlHelper*/?>

<?php $showSpectrum=0;?>
<section class="intro-section">
    <div class="container-fluid">
        <div class="row">
            <div class="darken-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="inner-block vertical-align">
                        <h1 class="inner-title">Best Internet Providers in <?php echo $city->NormalName?>, <?php echo $city->StateCode?> </h1>
                        <p class="inner-text"><?php echo $city->TagLine?></p>
                        <div class="zip-code-form">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="sr-only" for="zipCode">Email</label>
                                    <input type="text" value="<?php echo $city->Zip?>" class="form-control zip-code" id="zipCode" placeholder="ZIP code">
                                </div>
                                <input type="hidden" value="<?php echo $city->Zip?>" id="currentZipCode"/>
                                <button type="button" id="cyh_process_zip" class="btn btn-green">Update location</button>
                            </div>
                            <div>
                                <span class="active process-status" id="cyh_process_status"></span>
                            </div>
                        </div>
                        <ol class="breadcrumb">
                            <li><span>Home</span></li>
                            <li><span class="active">Internet</span></li>
                            <li><span class="active"><?php echo $city->StateName?></span></li>
                            <li><span class="active"><?php echo $city->NormalName?></span></li>
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
            <h2>In <?php echo $city->NormalName?> There Are offers from <?php echo count($cityData['providers']);?> providers </h2>
            <ul class="providers-slider">
                <?php foreach ($cityData['providers'] as $provider):?>
                    <?php
                    if(preg_match('/Spectrum/i', $provider->Name)) {
                        $showSpectrum=1;
                    }
                    ?>
                    <li><img src="<?php echo $provider->Logo; ?>" width="253px" height="120px"></li>
                <?php endforeach;?>
            </ul>

            <p class="provider-count">
                <span class="current-slide green-text">3</span> of <span class="slide-count green-text"><?php echo count($cityData['providers']);?></span> providers
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
            <h2>Top <?php echo (count($cityData['topProvidersData']) <5) ? count($cityData['topProvidersData']) : 5?> internet providers in <?php echo $city->NormalName?>, <?php echo $city->StateCode?></h2>

            <table class="table providers-table hidden-xs">
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
                <?php if (count($cityData['topProvidersData']) >0):?>
                <?php $topCounter = 0;?>
                <?php $usedIds = [];?>
                <?php foreach ($cityData['topProvidersData'] as $spCatSorted):?>
                <?php if (in_array($spCatSorted['provider']->Id, $usedIds)) {continue;}?>
                <?php if ($topCounter == 5) {break;}?>
                    <tr>
                        <td><img src="<?php echo $spCatSorted['provider']->Logo; ?>" width="130px" height="50px"></td>
                        <td><span class="big-text"><span class="number"><?php echo ($spCatSorted['products'][0]->Price) ? '$'.$spCatSorted['products'][0]->Price : '-'; ?></span></span> <?php echo $spCatSorted['products'][0]->PriceDescriptionEnd; ?></td>
                        <td><span class="big-text"><span class="number"><?php echo $spCatSorted['avgSpeed'];?></span> <?php echo $spCatSorted['speedUnitsAvg'];?></span></td>
                        <td><span class="big-text"><span class="number"><?php echo $spCatSorted['maxSpeed'];?></span> <?php echo $spCatSorted['speedUnitsMax'];?></span> </td>
                        <td class="hidden-xs hidden-sm"><a class="btn btn-orange" data-brand-id="<?php echo $spCatSorted['provider']->Id?>">See all packages</a></td>
                    </tr>
                    <tr class="hidden-md hidden-lg">
                        <td colspan="4">
                            <a class="btn btn-orange" data-brand-id="<?php echo $spCatSorted['provider']->Id?>">See all packages</a>
                        </td>
                    </tr>
                    <?php $topCounter++;?>
                    <?php array_push($usedIds, $spCatSorted['provider']->Id);?>
                    <?php endforeach;?>
                <?php else:?>
                    <tr>
                        <td colspan="5">No items found</td>
                    </tr>
                <?php endif;?>
                </tbody>
            </table>

            <?php if (count($cityData['topProvidersData']) >0):?>
            <ul class="providers-table-slider hidden-sm hidden-md hidden-lg">
                <?php $topCounter = 0;?>
                <?php $usedIds = [];?>
                <?php foreach ($cityData['topProvidersData'] as $spCatSorted):?>
                <?php if (in_array($spCatSorted['provider']->Id, $usedIds)) {continue;}?>
                <?php if ($topCounter == 5) {break;}?>
                <li>
                    <table class="table providers-table tablet">
                        <thead>
                            <tr class="thead-row">
                                <th scope="col" class="col-xs-6">Brand</th>
                                <th scope="col" class="col-xs-6">Price From</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td><img src="<?php echo $spCatSorted['provider']->Logo; ?>" width="130px" height="50px"></td>
                                <td><span class="big-text"><span class="number"><?php echo ($spCatSorted['products'][0]->Price) ? '$'.$spCatSorted['products'][0]->Price : '-'; ?></span></span> <?php echo $spCatSorted['products'][0]->PriceDescriptionEnd; ?></td>
                            </tr>
                            <tr class="thead-row thead-simple">
                                <th>AVG. Speed</th>
                                <th>Max Speed</th>
                            </tr>
                            <tr>
                                <td><span class="big-text"><span class="number"><?php echo $spCatSorted['avgSpeed'];?></span> <?php echo $spCatSorted['speedUnitsAvg'];?></span></td>
                                <td><span class="big-text"><span class="number"><?php echo $spCatSorted['maxSpeed'];?></span> <?php echo $spCatSorted['speedUnitsMax'];?></span> </td>
                            </tr>
                            <tr class="btn-row">
                                <td colspan="2">
                                    <a class="btn btn-orange" data-brand-id="<?php echo $spCatSorted['provider']->Id?>">See all packages</a>
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
                                <td><img src="<?php echo $spCatSorted['provider']->Logo; ?>" width="130px" height="50px"></td>
                            </tr>
                            <tr class="thead-row thead-simple">
                                <th >Price From</th>
                            </tr>
                            <tr>
                                <td><span class="big-text"><span class="number"><?php echo ($spCatSorted['products'][0]->Price) ? '$'.$spCatSorted['products'][0]->Price : '-'; ?></span></span> <?php echo $spCatSorted['products'][0]->PriceDescriptionEnd; ?></td>
                            </tr>
                            <tr class="thead-row thead-simple">
                                <th>Max Speed</th>
                            </tr>
                            <tr>
                                <td><span class="big-text"><span class="number"><?php echo $spCatSorted['maxSpeed'];?></span> <?php echo $spCatSorted['speedUnitsMax'];?></span> </td>
                            </tr>
                            <tr class="btn-row">
                                <td>
                                    <a class="btn btn-orange" data-brand-id="<?php echo $spCatSorted['provider']->Id?>">See all packages</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </li>
                    <?php $topCounter++;?>
                    <?php array_push($usedIds, $spCatSorted['provider']->Id);?>
                <?php endforeach;?>
            </ul>
            <p class="provider-count hidden-sm hidden-md hidden-lg">
                <span class="current-slide green-text">3</span> of <span class="slide-count green-text"><?php echo count($cityData['providers']);?></span> providers
            </p>
            <?php else:?>
                <p class="not-found-items hidden-sm hidden-md hidden-lg">No items found</p>
            <?php endif;?>
            <div class="button-wrap">
                <a href="#best-offers" class="btn btn-green btn-big btn-green-glow">Go to best offers</a>
            </div>

        </div>
    </div>
</section>
<section class="map-section">
    <div class="container">
        <div class="row">
            <h2>Quick Facts on <?php echo $city->NormalName?> Internet Services</h2>
            <?php $bulletsHalfCount = count($city->Bullets)/2;?>
            <?php $bulCounter = 0?>
            <div class="offers-list-wrap">
                <ul class="flex-list ">
                    <?php foreach ($city->Bullets as $bullet):?>
                        <?php if($bulCounter>=$bulletsHalfCount) {
                            echo '</ul><ul class="flex-list">';
                            $bulCounter = 0;
                        }?>
                        <li><?php echo $bullet;?></li>
                        <?php $bulCounter++?>
                    <?php endforeach;?>
                </ul>
            </div>
            <div id="map" class="map">
                <?php
                echo do_shortcode( '[flexiblemap height="600" width="100%" zoom="11" center="'.$city->Latitude.', '.$city->Longitude.'" marker="'.$city->Latitude.', '.$city->Longitude.'" ]' );
                ?>
            </div>
        </div>
    </div>
</section>

<section class="best-offers-tab-section">
    <div class="container">
        <div class="row">
            <h2 id="best-offers">Best Offers For Internet Service in <?php echo $city->NormalName?>, <?php echo $city->StateCode?></h2>
            <div class="offers-navigation simple">
            <ul class="nav nav-pills tab-offers">
                <li class="active"><a href="#internet" data-toggle="tab" class="btn btn-white">Internet</a></li>
                <li><a href="#internetTv" data-toggle="tab" class="btn btn-white">Internet + TV</a></li>
                <!--<li><a href="#internetTvVoice" data-toggle="tab" class="btn btn-white">Internet + TV + Voice</a></li>-->
            </ul>

            </div>
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
                        <?php $tempCounter = 0;
                        foreach ($cityData['productListSorted'] as $prod) {
                            if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetCats'])){continue;}
                            if(!$prod->IsBestOffer){continue;}
                            $tempCounter++;
                        }
                        ?>
                        <?php if($tempCounter > 0):?>
                        <?php foreach($cityData['productListSorted'] as $prod):?>
                            <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetCats'])){continue;}?>
                                <?php if(!$prod->IsBestOffer){continue;}?>
                                <?php
                                $speedData = \CYH\Marketing\Helpers\ProductDataHelper::getSpeedData($prod->DownloadSpeed);
                                $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($prod->Description);
                                if(count($content) !=0) {
                                    $tdClass = 'slide-cell';
                                    $spanClass = 'arrow-up';
                                } else {
                                    $tdClass = '';
                                    $spanClass = '';
                                }
                                ?>
                            <tr>
                                <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>" width="130px" height="50px"></td>
                                <td class="<?php echo $tdClass?>"><div><span class="middle-text "><?php echo $prod->Name?></span><span class="show-more <?php echo $spanClass?>">Details</span></div></td>
                                <td><span class="big-text"><span class="number"><?php echo $speedData['speed'];?></span><?php echo $speedData['speedUnits']?></span></td>
                                <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                            <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                                </td>
                                <td class="hidden-xs hidden-sm">
                                    <a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                       onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                        <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
                                    </a>
                                </td>
                            </tr>
                            <tr class="hidden-row">
                                <td></td>
                                <td colspan="3">
                                    <div class="hidden-content">
                                        <ul class="plan-description">
                                            <?php
                                            do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                                            ?>
                                        </ul>
                                        <a target="_blank" href="/offers-terms-and-conditions/#offer-<?php echo $prod->Id?>"> Terms & Conditions</a>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr class="hidden-md hidden-lg">
                                <td colspan="4">
                                    <a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                       onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                        <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
                                    </a></td>
                            </tr>
                        <?php endforeach;?>
                        <?php else:?>
                            <tr>
                                <td colspan="5">No items found</td>
                            </tr>
                        <?php endif;?>
                        </tbody>
                    </table>

                    <?php $tempCounter = 0;
                    foreach ($cityData['productListSorted'] as $prod) {
                        if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetCats'])){continue;}
                        if(!$prod->IsBestOffer){continue;}
                        $tempCounter++;
                    }
                    ?>
                    <?php if($tempCounter > 0):?>
                    <ul class="providers-table-slider hidden-sm hidden-md hidden-lg">
                        <?php foreach($cityData['productListSorted'] as $prod):?>
                        <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetCats'])){continue;}?>
                            <?php if(!$prod->IsBestOffer){continue;}?>
                            <?php
                                $speedData = \CYH\Marketing\Helpers\ProductDataHelper::getSpeedData($prod->DownloadSpeed);
                            $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($prod->Description);
                            if(count($content) !=0) {
                                $tdClass = 'slide-cell';
                                $spanClass = 'arrow-up';
                            } else {
                                $tdClass = '';
                                $spanClass = '';
                            }
                            ?>
                        <li>
                            <table class="table providers-table tablet">
                                <thead>
                                    <tr class="thead-row">
                                        <th scope="col" class="col-xs-6">Brand</th>
                                        <th scope="col" class="col-xs-6">Product Description</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>" width="130px" height="50px"></td>
                                        <td class="<?php echo $tdClass?>"><div><span class="middle-text"><?php echo $prod->Name?></span><span class="show-more <?php echo $spanClass?>">Details</span></div></td>
                                    </tr>
                                    <tr class="hidden-row">
                                        <td></td>
                                        <td>
                                            <div class="hidden-content">
                                                <ul class="plan-description">
                                                    <?php
                                                    do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                                                    ?>
                                                    <a target="_blank" href="/offers-terms-and-conditions/#offer-<?php echo $prod->Id?>"> Terms & Conditions</a>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th>Speed</th>
                                        <th>Price</th>
                                    </tr>
                                    <tr>
                                        <td><span class="big-text"><span class="number"><?php echo $speedData['speed'];?></span><?php echo $speedData['speedUnits']?></span></td>
                                        <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                                    <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                                        </td>
                                    </tr>
                                    <tr class="btn-row">
                                        <td colspan="2">
                                            <a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                               onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                                <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
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
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>" width="130px" height="50px"></td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th >Product Description</th>
                                    </tr>
                                    <tr>
                                        <td class="<?php echo $tdClass?>"><span class="middle-text <?php echo $spanClass?>"><?php echo $prod->Name?></span></td>
                                    </tr>
                                    <tr class="hidden-row">
                                        <td>
                                            <div class="hidden-content">
                                                <ul class="plan-description">
                                                    <?php
                                                    do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                                                    ?>
                                                    <a target="_blank" href="/offers-terms-and-conditions/#offer-<?php echo $prod->Id?>"> Terms & Conditions</a>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th >Price</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                                    <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                                        </td>
                                    </tr>
                                    <tr class="btn-row">
                                        <td><a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                               onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                                <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
                                            </a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <p class="provider-count hidden-sm hidden-md hidden-lg">
                        <span class="current-slide green-text">1</span> of <span class="slide-count green-text"><?php echo count($cityData['providers']);?></span> offers
                    </p>
                    <?php else:?>
                        <p class="not-found-items hidden-sm hidden-md hidden-lg">No items found</p>
                    <?php endif;?>
                </div>
                <div id="internetTv" class="tab-pane fade">
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
                        <?php $tempCounter = 0;
                        foreach ($cityData['productListSorted'] as $prod) {
                            if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetAndTvCats'])){continue;}
                            if(!$prod->IsBestOffer){continue;}
                            $tempCounter++;
                        }
                        ?>
                        <?php if($tempCounter > 0):?>
                        <?php foreach($cityData['productListSorted'] as $prod):?>
                            <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetAndTvCats'])){continue;}?>
                            <?php if(!$prod->IsBestOffer){continue;}?>
                                <?php
                                $speedData = \CYH\Marketing\Helpers\ProductDataHelper::getSpeedData($prod->DownloadSpeed);
                                $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($prod->Description);
                                if(count($content) !=0) {
                                    $tdClass = 'slide-cell';
                                    $spanClass = 'arrow-up';
                                } else {
                                    $tdClass = '';
                                    $spanClass = '';
                                }
                                ?>
                            <tr>
                                <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>" width="130px" height="50px"></td>
                                <td class="<?php echo $tdClass?>"><div><span class="middle-text"><?php echo $prod->Name?></span><span class="show-more <?php echo $spanClass?>">Details</span></div></td>
                                <td><span class="big-text"><span class="number"><?php echo $speedData['speed'];?></span><?php echo $speedData['speedUnits']?></span></td>
                                <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                            <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                                </td>
                                <td class="hidden-xs hidden-sm">
                                    <a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                       onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                        <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
                                    </a>
                                </td>
                            </tr>
                            <tr class="hidden-row">
                                <td></td>
                                <td colspan="3">
                                    <div class="hidden-content">
                                        <ul class="plan-description">
                                            <?php
                                            do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                                            ?>
                                        </ul>
                                        <a target="_blank" href="/offers-terms-and-conditions/#offer-<?php echo $prod->Id?>"> Terms & Conditions</a>

                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr class="hidden-md hidden-lg">
                                <td colspan="4">
                                    <a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                       onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                        <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        <?php else:?>
                            <tr>
                                <td colspan="5">No items found</td>
                            </tr>
                        <?php endif;?>
                        </tbody>
                    </table>

                    <?php $tempCounter = 0;
                    foreach ($cityData['productListSorted'] as $prod) {
                        if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetAndTvCats'])){continue;}
                        if(!$prod->IsBestOffer){continue;}
                        $tempCounter++;
                    }
                    ?>
                    <?php if($tempCounter > 0):?>
                    <ul class="providers-table-slider hidden-sm hidden-md hidden-lg">
                        <?php foreach($cityData['productListSorted'] as $prod):?>
                        <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetAndTvCats'])){continue;}?>
                            <?php if(!$prod->IsBestOffer){continue;}?>
                            <?php
                            $speedData = \CYH\Marketing\Helpers\ProductDataHelper::getSpeedData($prod->DownloadSpeed);
                            $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($prod->Description);
                            if(count($content) !=0) {
                                $tdClass = 'slide-cell';
                                $spanClass = 'arrow-up';
                            } else {
                                $tdClass = '';
                                $spanClass = '';
                            }
                            ?>
                        <li>
                            <table class="table providers-table tablet">
                                <thead>
                                <tr class="thead-row">
                                    <th scope="col" class="col-xs-6">Brand</th>
                                    <th scope="col" class="col-xs-6">Product Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>" width="130px" height="50px"></td>
                                        <td class="<?php echo $tdClass?>"><div><span class="middle-text"><?php echo $prod->Name?></span><span class="show-more <?php echo $spanClass?>">Details</span></div></td>
                                    </tr>
                                    <tr class="hidden-row">
                                        <td></td>
                                        <td>
                                            <div class="hidden-content">
                                                <ul class="plan-description">
                                                    <?php
                                                    do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                                                    ?>
                                                </ul>
                                                <a target="_blank" href="/offers-terms-and-conditions/#offer-<?php echo $prod->Id?>"> Terms & Conditions</a>

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th>Speed</th>
                                        <th>Price</th>
                                    </tr>
                                    <tr>
                                        <td><span class="big-text"><span class="number"><?php echo $speedData['speed'];?></span> <?php echo $speedData['speedUnits']?></span></td>
                                        <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                                    <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                                        </td>
                                    </tr>
                                    <tr class="btn-row">
                                        <td colspan="2">
                                            <a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                               onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                                <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
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
                                    <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>" width="130px" height="50px"></td>
                                </tr>
                                <tr class="thead-row thead-simple">
                                    <th >Product Description</th>
                                </tr>
                                <tr>
                                    <td class="<?php echo $tdClass?>"><span class="middle-text <?php echo $spanClass?>"><?php echo $prod->Name?></span></td>
                                </tr>
                                <tr class="hidden-row">
                                    <td>
                                        <div class="hidden-content">
                                            <ul class="plan-description">
                                                <?php
                                                do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                                                ?>
                                                <a target="_blank" href="/offers-terms-and-conditions/#offer-<?php echo $prod->Id?>"> Terms & Conditions</a>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="thead-row thead-simple">
                                    <th >Price</th>
                                </tr>
                                <tr>
                                    <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                                <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                                    </td>
                                </tr>
                                <tr class="btn-row">
                                    <td><a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                           onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                            <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
                                        </a></td>
                                </tr>
                                </tbody>
                            </table>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <p class="provider-count hidden-sm hidden-md hidden-lg">
                        <span class="current-slide green-text">1</span> of <span class="slide-count green-text"><?php echo count($cityData['providers']);?></span> offers
                    </p>
                    <?php else:?>
                        <p class="not-found-items hidden-sm hidden-md hidden-lg">No items found</p>
                    <?php endif;?>
                </div>
                <!--<div id="internetTvVoice" class="tab-pane fade">
                    <p>Internet + TV + Voice</p>
                </div>-->
            </div>
            <div class="button-wrap">
                <a href="#all-available-offers" class="btn btn-big btn-green btn-green-glow see-all-offers">See all Internet offers in <?php echo $city->NormalName?></a>
                <!--<a href="/auth/?groupId=1265743" target="_blank" class="btn btn-orange btn-big btn-orange-glow">Secret Deals</a>-->
            </div>
        </div>
    </div>
</section>
<section class="information-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-1 col-sm-10">
                <div class="row">
                    <h2><?php echo ($city->SectionOneText != '') ? $city->SectionOneText : 'Looking for an Internet Bundle'?></h2>
                    <div class="content">
                        <?php
                        $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($city->SectionOne);
                        do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                        ?>
                    </div>

                    <h2><?php echo ($city->SectionTwoText != '') ? $city->SectionTwoText : 'More Important Information About Choosing an Internet Provider in '.$city->NormalName?></h2>
                    <div class="content">
                        <?php
                        $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($city->SectionTwo);
                        do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                        ?>
                    </div>

                    <?php if($showSpectrum == 1):?>
                        <p class="text-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/spectrum-logo.png" width="255px" height="84px">
                        </p>
                        <h2><?php echo ($city->SectionThreeText != '') ? $city->SectionThreeText : 'We recommend Spectrum Bundles. Why?'?></h2>
                        <div class="content">
                            <?php
                            $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($city->SectionThree);
                            do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                            ?>
                        </div>
                    <?php endif;?>
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
            <h2 id="all-available-offers">All Available Internet Offers in <?php echo $city->NormalName?>, <?php echo $city->StateCode?></h2>
            <div class="offers-navigation">
                <ul class="nav nav-pills tab-offers">
                    <li class="active" id="allBrandsTab1"><a href="#internetOffers" data-toggle="tab" class="btn btn-white">Internet</a></li>
                    <li id="allBrandsTab2"><a href="#internetTvOffers" data-toggle="tab" class="btn btn-white">Internet + TV</a></li>
                    <!--<li><a href="#internetTvVoiceOffers" data-toggle="tab" class="btn btn-white">Internet + TV + Voice</a></li>-->
                </ul>
                <div class="form-inline">
                    <span class="loader"></span>
                    <!--<button type="button" class="btn btn-white" id="selectBrand">Select Brand</button>-->
                    <div class="form-group">
                        <label for="brandsList" class="sr-only">List of brands</label>
                        <span class="select-wrap">
                            <select class="form-control brand-list" name="brand-list" id="brandsList">
                                <option selected value="all">Select Brand</option>
                                <?php foreach ($cityData['providers'] as $provider):?>
                                <option data-hideTab="<?php echo $provider->HideTab?>" value="<?php echo $provider->Id;?>"><?php echo $provider->Name;?></option>
                                <?php endforeach;?>
                            </select>
                        </span>
                    </div>
                </div>
            </div>

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
                        <?php $tempCounter = 0;
                        foreach ($cityData['productListSortedAll'] as $prod) {
                            if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetCats'])){continue;}
                            $tempCounter++;
                        }
                        ?>
                        <?php if($tempCounter > 0):?>
                        <?php foreach($cityData['productListSortedAll'] as $prod):?>
                        <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetCats'])){continue;}?>
                                <?php
                                $speedData = \CYH\Marketing\Helpers\ProductDataHelper::getSpeedData($prod->DownloadSpeed);
                                $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($prod->Description);
                                if(count($content) != 0) {
                                    $tdClass = 'slide-cell';
                                    $spanClass = 'arrow-up';
                                } else {
                                    $tdClass = '';
                                    $spanClass = '';
                                }
                                ?>
                        <tr>
                            <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>" width="130px" height="50px"></td>
                            <td class="<?php echo $tdClass?>"><div><span class="middle-text"><?php echo $prod->Name?> </span><span class="show-more <?php echo $spanClass?>">Details</span></div></td>
                            <td><span class="big-text"><span class="number"><?php echo $speedData['speed'];?></span> <?php echo $speedData['speedUnits']?></span></td>
                            <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                        <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                            </td>
                            <td class="hidden-xs hidden-sm">
                                <a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                   onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                    <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
                                </a>
                            </td>
                        </tr>
                        <tr class="hidden-row">
                            <td></td>
                            <td colspan="3">
                                <div class="hidden-content">
                                    <ul class="plan-description">
                                        <?php
                                        do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                                        ?>
                                    </ul>
                                    <a target="_blank" href="/offers-terms-and-conditions/#offer-<?php echo $prod->Id?>"> Terms & Conditions</a>

                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="hidden-md hidden-lg">
                            <td colspan="4">
                                <a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                   onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                    <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php else:?>
                            <tr>
                                <td colspan="5">No items found</td>
                            </tr>
                        <?php endif;?>
                        </tbody>
                    </table>

                    <?php $tempCounter = 0;
                    foreach ($cityData['productListSortedAll'] as $prod) {
                        if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetCats'])){continue;}
                        $tempCounter++;
                    }
                    ?>
                    <?php if($tempCounter > 0):?>
                    <ul class="providers-table-slider hidden-sm hidden-md hidden-lg">
                        <?php foreach($cityData['productListSortedAll'] as $prod):?>
                        <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetCats'])){continue;}?>
                            <?php
                            $speedData = \CYH\Marketing\Helpers\ProductDataHelper::getSpeedData($prod->DownloadSpeed);
                            $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($prod->Description);
                            if(count($content) != 0) {
                                $tdClass = 'slide-cell';
                                $spanClass = 'arrow-up';
                            } else {
                                $tdClass = '';
                                $spanClass = '';
                            }
                            ?>
                        <li>
                            <table class="table providers-table tablet">
                                <thead>
                                <tr class="thead-row">
                                    <th scope="col" class="col-xs-6">Brand</th>
                                    <th scope="col" class="col-xs-6">Product Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>" width="130px" height="50px"></td>
                                    <td class="<?php echo $tdClass?>"><div><span class="middle-text"><?php echo $prod->Name?></span><span class="show-more <?php echo $spanClass?>">Details</span></div></td>
                                </tr>
                                <tr class="hidden-row">
                                    <td></td>
                                    <td>
                                        <div class="hidden-content">
                                            <ul class="plan-description">
                                                <?php
                                                do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                                                ?>
                                            </ul>
                                            <a target="_blank" href="/offers-terms-and-conditions/#offer-<?php echo $prod->Id?>"> Terms & Conditions</a>

                                        </div>
                                    </td>
                                </tr>
                                <tr class="thead-row thead-simple">
                                    <th>Speed</th>
                                    <th>Price</th>
                                </tr>
                                <tr>
                                    <td><span class="big-text"><span class="number"><?php echo $speedData['speed'];?></span> <?php echo $speedData['speedUnits']?></span></td>
                                    <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                                <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                                    </td>
                                </tr>
                                <tr class="btn-row">
                                    <td colspan="2">
                                        <a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                           onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                            <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
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
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>" width="130px" height="50px"></td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th >Product Description</th>
                                    </tr>
                                    <tr>
                                        <td class="<?php echo $tdClass?>"><span class="middle-text <?php echo $spanClass?>"><?php echo $prod->Name?></span></td>
                                    </tr>
                                    <tr class="hidden-row">
                                        <td>
                                            <div class="hidden-content">
                                                <ul class="plan-description">
                                                    <?php
                                                    do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                                                    ?>
                                                    <a target="_blank" href="/offers-terms-and-conditions/#offer-<?php echo $prod->Id?>"> Terms & Conditions</a>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th >Price</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                                    <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                                        </td>
                                    </tr>
                                    <tr class="btn-row">
                                        <td><a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                               onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                                <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
                                            </a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <p class="provider-count hidden-sm hidden-md hidden-lg">
                        <span class="current-slide green-text">1</span> of <span class="slide-count green-text"><?php echo count($cityData['providers']);?></span> offers
                    </p>
                    <?php else:?>
                        <p class="not-found-items hidden-sm hidden-md hidden-lg">No items found</p>
                    <?php endif;?>
                </div>

                <div id="internetTvOffers" class="tab-pane fade">
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
                        <?php $tempCounter = 0;
                        foreach ($cityData['productListSortedAll'] as $prod) {
                            if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetAndTvCats'])){continue;}
                            $tempCounter++;
                        }
                        ?>
                        <?php if($tempCounter > 0):?>
                        <?php foreach($cityData['productListSortedAll'] as $prod):?>
                            <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetAndTvCats'])){continue;}?>
                                <?php
                                $speedData = \CYH\Marketing\Helpers\ProductDataHelper::getSpeedData($prod->DownloadSpeed);
                                $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($prod->Description);
                                if(count($content) != 0) {
                                    $tdClass = 'slide-cell';
                                    $spanClass = 'arrow-up';
                                } else {
                                    $tdClass = '';
                                    $spanClass = '';
                                }
                                ?>
                            <tr>
                                <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>" width="130px" height="50px"></td>
                                <td class="<?php echo $tdClass?>"><div><span class="middle-text"><?php echo $prod->Name?> </span><span class="show-more <?php echo $spanClass?>">Details</span></div></td>
                                <td><span class="big-text"><span class="number"><?php echo $speedData['speed'];?></span> <?php echo $speedData['speedUnits']?></span></td>
                                <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                            <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                                </td>
                                <td class="hidden-xs hidden-sm"><button class="btn btn-orange"><?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?></button></td>
                            </tr>
                            <tr class="hidden-row">
                                <td></td>
                                <td colspan="3">
                                    <div class="hidden-content">
                                        <ul class="plan-description">
                                            <?php
                                            do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                                            ?>
                                        </ul>
                                        <a target="_blank" href="/offers-terms-and-conditions/#offer-<?php echo $prod->Id?>"> Terms & Conditions</a>

                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr class="hidden-md hidden-lg">
                                <td colspan="4">
                                    <a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                       onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                        <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        <?php else:?>
                            <tr>
                                <td colspan="5">No items found</td>
                            </tr>
                        <?php endif;?>
                        </tbody>
                    </table>

                    <?php $tempCounter = 0;
                    foreach ($cityData['productListSortedAll'] as $prod) {
                        if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetAndTvCats'])){continue;}
                        $tempCounter++;
                    }
                    ?>
                    <?php if($tempCounter > 0):?>
                    <ul class="providers-table-slider hidden-sm hidden-md hidden-lg">

                        <?php foreach($cityData['productListSortedAll'] as $prod):?>
                        <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetAndTvCats'])){continue;}?>
                            <?php
                            $speedData = \CYH\Marketing\Helpers\ProductDataHelper::getSpeedData($prod->DownloadSpeed);
                            $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($prod->Description);
                            if(count($content) != 0) {
                                $tdClass = 'slide-cell';
                                $spanClass = 'arrow-up';
                            } else {
                                $tdClass = '';
                                $spanClass = '';
                            }
                            ?>
                        <li>
                            <table class="table providers-table tablet">
                                <thead>
                                <tr class="thead-row">
                                    <th scope="col" class="col-xs-6">Brand</th>
                                    <th scope="col" class="col-xs-6">Product Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>" width="130px" height="50px"></td>
                                        <td class="<?php echo $tdClass?>"><div><span class="middle-text"><?php echo $prod->Name?></span><span class="show-more <?php echo $spanClass?>">Details</span></div></td>
                                    </tr>
                                    <tr class="hidden-row">
                                        <td></td>
                                        <td>
                                            <div class="hidden-content">
                                                <ul class="plan-description">
                                                    <?php
                                                    do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                                                    ?>
                                                </ul>
                                                <a target="_blank" href="/offers-terms-and-conditions/#offer-<?php echo $prod->Id?>"> Terms & Conditions</a>

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th>Speed</th>
                                        <th>Price</th>
                                    </tr>
                                    <tr>
                                        <td><span class="big-text"><span class="number"><?php echo $speedData['speed'];?></span> <?php echo $speedData['speedUnits']?></span></td>
                                        <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                                    <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                                        </td>
                                    </tr>
                                    <tr class="btn-row">
                                        <td colspan="2">
                                            <a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                               onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                                <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
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
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>" width="130px" height="50px"></td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th >Product Description</th>
                                    </tr>
                                    <tr>
                                        <td class="<?php echo $tdClass?>"><span class="middle-text <?php echo $spanClass?>"><?php echo $prod->Name?></span></td>
                                    </tr>
                                    <tr class="hidden-row">
                                        <td>
                                            <div class="hidden-content">
                                                <ul class="plan-description">
                                                    <?php
                                                    do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                                                    ?>
                                                    <a target="_blank" href="/offers-terms-and-conditions/#offer-<?php echo $prod->Id?>"> Terms & Conditions</a>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th >Price</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                                    <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                                        </td>
                                    </tr>
                                    <tr class="btn-row">
                                        <td><a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                               onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                                <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
                                            </a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <?php endforeach;?>
                    </ul>

                    <p class="provider-count hidden-sm hidden-md hidden-lg">
                        <span class="current-slide green-text">1</span> of <span class="slide-count green-text"><?php echo count($cityData['providers']);?></span> offers
                    </p>
                    <?php else:?>
                        <p class="not-found-items hidden-sm hidden-md hidden-lg">No items found</p>
                    <?php endif;?>
                </div>
                <!--<div id="internetTvVoiceOffers" class="tab-pane fade">
                    <p>Internet + TV + Voice</p>
                </div>-->
            </div>
            <div class="tab-content" id="oneBrandTab"></div>
            <div class="button-wrap">
                <a href="#best-offers" class="btn btn-big btn-green btn-green-glow">Go to best offers in <?php echo $city->NormalName?></a>
            </div>
        </div>
    </div>
</section>
<section class="nearby-offers">
    <div class="container">
        <div class="row">
            <h2>See Internet Offers in Nearby Locations</h2>
            <?php if(count($city->RelatedCities) > 0):?>
            <div class="offers-list-wrap">
                <?php $relCitiesHalfCount = count($city->RelatedCities)/2;?>
                <?php $counter = 0?>

                <ul class="flex-list nearby-offers-list">
                    <?php foreach ($city->RelatedCities as $relCity):?>
                        <?php if($counter>=$relCitiesHalfCount) {
                            echo '</ul><ul class="flex-list nearby-offers-list">';
                            $counter = 0;
                        }?>
                        <li><a href="<?php echo $urlHelper->getCityUrl($relCity)?>">
                                <?php echo $relCity['city_normal_name']?>, <?php echo $relCity['state_code']?>
                            </a>
                        </li>
                        <?php $counter++?>
                    <?php endforeach;?>
                </ul>
            </div>
                <?php else:?>
                <div class="offers-list-wrap">
                    <span>No items found</span>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>
<?php if(count($city->BiggestCitiesInState) > 0):?>
<section class="nearby-offers">
    <div class="container">
        <div class="row">
            <h2>See Internet Offers in 10 biggest cities in <?php echo $city->StateName?> state</h2>
                <div class="offers-list-wrap">
                    <?php $bigCitiesHalfCount = count($city->BiggestCitiesInState)/2;?>
                    <?php $counter = 0?>

                    <ul class="flex-list nearby-offers-list">
                        <?php foreach ($city->BiggestCitiesInState as $bigCity):?>
                            <?php if($counter>=$bigCitiesHalfCount) {
                                echo '</ul><ul class="flex-list nearby-offers-list">';
                                $counter = 0;
                            }?>
                            <li><a href="<?php echo $urlHelper->getCityUrl($bigCity)?>">
                                    <?php echo $bigCity['city_normal_name']?>, <?php echo $bigCity['state_code']?>
                                </a>
                            </li>
                            <?php $counter++?>
                        <?php endforeach;?>
                    </ul>
                </div>
        </div>
    </div>
</section>

<?php endif;?>
<!-- container -->