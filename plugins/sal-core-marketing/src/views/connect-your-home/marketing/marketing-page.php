<?php
//get_header('sal');
//global $wp_query;
//print_r($wp_query->virtual_page);
?>

<?php

//do_action('\\' . CYH\Marketing\Controllers\ConnectYourHome\MarketingsController::class . '::RenderMarketing');
?>


<section class="intro-section">
    <div class="container-fluid">
        <div class="darken-bg"></div>
        <div class="container">
            <div class="row">
                <div class="inner-block vertical-align">
                    <h1 class="inner-title">best internet providers in <?php echo $city->NormalName?>, <?php echo $city->StateCode?> </h1>
                    <p class="inner-text"><?php echo $city->TagLine?></p>
                    <div class="zip-code-form">
                        <form class="form-inline">
                            <div class="form-group">
                                <label class="sr-only" for="zipCode">Email</label>
                                <input type="text" class="form-control zip-code" id="zipCode" placeholder="ZIP code">
                            </div>
                            <button type="button" id="cyh_process_zip" class="btn btn-green">Update location</button>
                        </form>
                        <div>
                            <span class="active process-status" id="cyh_process_status"></span>
                        </div>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#" class="active">Internet</a></li>
                        <li><a href="#" class="active"><?php echo $city->StateName?></a></li>
                        <li><a class="active"><?php echo $city->NormalName?></a></li>
                    </ol>
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
                    <li><a href="#"><img src="<?php echo $provider->Logo; ?>" ></a></li>
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
            <h2>Top <?php echo (count($cityData['topProvidersData'] <5)) ? count($cityData['topProvidersData']) : 5?> internet providers in <?php echo $city->NormalName?> , <?php echo $city->StateCode?></h2>

<!-- Таблица для desktop начало -->

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
                        <td><img src="<?php echo $spCatSorted['provider']->Logo; ?>"></td>
                        <td><span class="big-text"><span class="number"><?php echo ($spCatSorted['products'][0]->Price) ? '$'.$spCatSorted['products'][0]->Price : 'NA'; ?></span> <?php echo $spCatSorted['products'][0]->PriceDescriptionEnd; ?></span></td>
                        <td><span class="big-text"><span class="number"><?php echo $spCatSorted['avgSpeed'];?></span> Mbps</span></td>
                        <td><span class="big-text"><span class="number"><?php echo $spCatSorted['maxSpeed'];?></span> Mbps</span> </td>
                        <td class="hidden-xs hidden-sm"><button class="btn btn-orange">See all packages</button></td>
                    </tr>
                    <tr class="hidden-md hidden-lg">
                        <td colspan="4"><a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($spCatSorted['provider']->Phone->Number)?>"
                                           onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($spCatSorted['provider']->Phone->Number)?>
                            </a>
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
<!-- Таблица для desktop конец -->

<!--Таблица для Tablet и Mbile начало
            здесь уже информация по каждому бранду идет в отдельной таблице, которая находится в <li> -->
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
                                <td><img src="<?php echo $spCatSorted['provider']->Logo; ?>"></td>
                                <td><span class="big-text"><span class="number"><?php echo ($spCatSorted['products'][0]->Price) ? '$'.$spCatSorted['products'][0]->Price : 'NA'; ?></span> <?php echo $spCatSorted['products'][0]->PriceDescriptionEnd; ?></span></td>
                            </tr>
                            <tr class="thead-row thead-simple">
                                <th>AVG. Speed</th>
                                <th>Max Speed</th>
                            </tr>
                            <tr>
                                <td><span class="big-text"><span class="number">55</span> Mbps</span></td>
                                <td><span class="big-text"><span class="number">100</span> Mbps</span> </td>
                            </tr>
                            <tr class="btn-row">
                                <td colspan="2"><a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($spCatSorted['provider']->Phone->Number)?>"
                                                   onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                        <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($spCatSorted['provider']->Phone->Number)?>
                                    </a></td>
                            </tr>

                        </tbody>
                    </table>
<!--//////////////////////////////////////-->
                    <table class="table providers-table mobile">
                        <thead>
                            <tr class="thead-row">
                                <th>Brand</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="<?php echo $spCatSorted['provider']->Logo; ?>"></td>
                            </tr>
                            <tr class="thead-row thead-simple">
                                <th >Price From</th>
                            </tr>
                            <tr>
                                <td><span class="big-text"><span class="number"><?php echo ($spCatSorted['products'][0]->Price) ? '$'.$spCatSorted['products'][0]->Price : 'NA'; ?></span> <?php echo $spCatSorted['products'][0]->PriceDescriptionEnd; ?></span></td>
                            </tr>
                            <tr class="thead-row thead-simple">
                                <th>Max Speed</th>
                            </tr>
                            <tr>
                                <td><span class="big-text"><span class="number">100</span> Mbps</span> </td>
                            </tr>
                            <tr class="btn-row">
                                <td><a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($spCatSorted['provider']->Phone->Number)?>"
                                                                      onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                            <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($spCatSorted['provider']->Phone->Number)?>
                                        </a></td>
                            </tr>

                        </tbody>
                    </table>
<!--//////////////////////////////////////-->
                </li>
                    <?php $topCounter++;?>
                    <?php array_push($usedIds, $spCatSorted['provider']->Id);?>
                <?php endforeach;?>
            </ul>
<!--Таблица для Tablet и Mbile конец -->
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
            <div id="map" class="map">
                <?php
                //  $a= 40.66347;
                //echo "[flexiblemap address=\"10 downing street london uk/\"]";
                //  sprintf('[flexiblemap  width="100%" zoom="11" center="%s, %s" marker="-34.916721,138.828878" ]', lat, lonf)
                echo do_shortcode( '[flexiblemap height="600" width="100%" zoom="11" center="'.$city->Latitude.', '.$city->Longitude.'" marker="'.$city->Latitude.', '.$city->Longitude.'" ]' );
                ?>
            </div>
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
        </div>
    </div>
</section>


<section class="best-offers-tab-section">
    <div class="container">
        <div class="row">
            <h2 id="best-offers">Best Offers For Internet Service in <?php echo $city->NormalName?>, <?php echo $city->StateCode?></h2>
            <ul class="nav nav-pills tab-offers">
                <li class="active"><a href="#internet" data-toggle="tab" class="btn btn-white">Internet</a></li>
                <li><a href="#internetTv" data-toggle="tab" class="btn btn-white">Internet + TV</a></li>
                <!--<li><a href="#internetTvVoice" data-toggle="tab" class="btn btn-white">Internet + TV + Voice</a></li>-->
            </ul>


            <div class="tab-content">
<!-- Контент первого таба начало-->
                <div id="internet" class="tab-pane fade in active">
<!-- Таблица для desktop начало -->
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
                            if(!in_array($prod->ServiceProviderCategory->Category->Id,[4,5])){continue;}
                            if(!$prod->IsBestOffer){continue;}
                            $tempCounter++;
                        }
                        ?>
                        <?php if($tempCounter > 0):?>
                        <?php foreach($cityData['productListSorted'] as $prod):?>
                            <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,[4,5])){continue;}?>
                            <?php if(!$prod->IsBestOffer){continue;}?>
                            <tr>
                                <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                <td class="slide-cell"><span class="middle-text arrow-up"><?php echo $prod->Name?></span></td>
                                <td><span class="big-text"><span class="number"><?php echo ($prod->DownloadSpeed) ? $prod->DownloadSpeed : 0;?></span> Mbps</span></td>
                                <td><span class="big-text"><span class="number"><?php echo ($prod->Price) ? '$'.$prod->Price : 'NA'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?></td>
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
                                            <?php $descr = str_replace(['{bullets}','{/bullets}'],['',''], $prod->Description)?>
                                            <?php $descr = explode('~~', $descr)?>
                                            <?php  foreach ($descr as $item):?>
                                                <?php if($item ==''){continue;}?>
                                            <li><?php echo $item;?></li>
                                        <?php endforeach;?>
                                        </ul>
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
<!-- Таблица для desktop конец -->
<!--Таблица для Tablet и Mbile начало
                                здесь уже информация по каждому бранду идет в отдельной таблице, которая находится в <li> -->
                    <?php $tempCounter = 0;
                    foreach ($cityData['productListSorted'] as $prod) {
                        if(!in_array($prod->ServiceProviderCategory->Category->Id,[4,5])){continue;}
                        if(!$prod->IsBestOffer){continue;}
                        $tempCounter++;
                    }
                    ?>
                    <?php if($tempCounter > 0):?>
                    <ul class="providers-table-slider hidden-sm hidden-md hidden-lg">
                        <?php foreach($cityData['productListSorted'] as $prod):?>
                        <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,[4, 5])){continue;}?>
                            <?php if(!$prod->IsBestOffer){continue;}?>
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
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                        <td class="slide-cell"><span class="middle-text arrow-up"><?php echo $prod->Name?></span></td>
                                    </tr>
                                    <tr class="hidden-row">
                                        <td></td>
                                        <td>
                                            <div class="hidden-content">
                                                <ul class="plan-description">
                                                    <?php $descr = str_replace(['{bullets}','{/bullets}'],['',''], $prod->Description)?>
                                                    <?php $descr = explode('~~', $descr)?>
                                                    <?php  foreach ($descr as $item):?>
                                                        <?php if($item ==''){continue;}?>
                                                        <li><?php echo $item;?></li>
                                                    <?php endforeach;?>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th>Speed</th>
                                        <th>Price</th>
                                    </tr>
                                    <tr>
                                        <td><span class="big-text"><span class="number"><?php echo ($prod->DownloadSpeed) ? $prod->DownloadSpeed : 'NA';?></span> Mbps</span></td>
                                        <td><span class="big-text"><span class="number"><?php echo ($prod->Price) ? '$'.$prod->Price : 'NA'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?></td>
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
<!-- //////////////////////////////////////////// -->
                            <table class="table providers-table mobile">
                                <thead>
                                    <tr class="thead-row">
                                        <th>Brand</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th >Price From</th>
                                    </tr>
                                    <tr>
                                        <td><span class="big-text"><span class="number"><?php echo ($prod->Price) ? '$'.$prod->Price : 'NA'; ?></span> <?php echo $prod->PriceDescriptionEnd; ?></span></td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th>Max Speed</th>
                                    </tr>
                                    <tr>
                                        <td><span class="big-text"><span class="number"><?php echo ($prod->DownloadSpeed) ? $prod->DownloadSpeed : 'NA';?></span> Mbps</span> </td>
                                    </tr>
                                    <tr class="btn-row">
                                        <td><a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                               onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                                <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
                                            </a></td>
                                    </tr>
                                </tbody>
                            </table>
<!-- //////////////////////////////////////////// -->
                        </li>
                        <?php endforeach;?>
                    </ul>
<!--Таблица для Tablet и Mbile конец -->
                    <p class="provider-count hidden-sm hidden-md hidden-lg">
                        <span class="current-slide green-text">3</span> of <span class="slide-count green-text"><?php echo count($cityData['providers']);?></span> providers
                    </p>
                    <?php else:?>
                        <p class="not-found-items hidden-sm hidden-md hidden-lg">No items found</p>
                    <?php endif;?>
                </div>
<!-- Контент первого таба конец-->
<!-- Контент второго таба начало-->
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
                            if(!in_array($prod->ServiceProviderCategory->Category->Id,[7])){continue;}
                            if(!$prod->IsBestOffer){continue;}
                            $tempCounter++;
                        }
                        ?>
                        <?php if($tempCounter > 0):?>
                        <?php foreach($cityData['productListSorted'] as $prod):?>
                            <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,[7])){continue;}?>
                            <?php if(!$prod->IsBestOffer){continue;}?>
                            <tr>
                                <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                <td class="slide-cell"><span class="middle-text arrow-up"><?php echo $prod->Name?></span></td>
                                <td><span class="big-text"><span class="number"><?php echo ($prod->DownloadSpeed) ? $prod->DownloadSpeed : 'NA';?></span> Mbps</span></td>
                                <td><span class="big-text"><span class="number"><?php echo ($prod->Price) ? '$'.$prod->Price : 'NA'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?></td>
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
                                            <?php $descr = str_replace(['{bullets}','{/bullets}'],['',''], $prod->Description)?>
                                            <?php $descr = explode('~~', $descr)?>
                                            <?php  foreach ($descr as $item):?>
                                                <?php if($item ==''){continue;}?>
                                                <li><?php echo $item;?></li>
                                            <?php endforeach;?>
                                        </ul>
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
                    <!-- Таблица для desktop конец -->
                    <!--Таблица для Tablet и Mbile начало
                                                    здесь уже информация по каждому бранду идет в отдельной таблице, которая находится в <li> -->
                    <?php $tempCounter = 0;
                    foreach ($cityData['productListSorted'] as $prod) {
                        if(!in_array($prod->ServiceProviderCategory->Category->Id,[7])){continue;}
                        if(!$prod->IsBestOffer){continue;}
                        $tempCounter++;
                    }
                    ?>
                    <?php if($tempCounter > 0):?>
                    <ul class="providers-table-slider hidden-sm hidden-md hidden-lg">
                        <?php foreach($cityData['productListSorted'] as $prod):?>
                        <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,[7])){continue;}?>
                            <?php if(!$prod->IsBestOffer){continue;}?>
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
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                        <td class="slide-cell"><span class="middle-text arrow-up"><?php echo $prod->Name?></span></td>
                                    </tr>
                                    <tr class="hidden-row">
                                        <td></td>
                                        <td>
                                            <div class="hidden-content">
                                                <ul class="plan-description">
                                                    <?php $descr = str_replace(['{bullets}','{/bullets}'],['',''], $prod->Description)?>
                                                    <?php $descr = explode('~~', $descr)?>
                                                    <?php  foreach ($descr as $item):?>
                                                        <?php if($item ==''){continue;}?>
                                                        <li><?php echo $item;?></li>
                                                    <?php endforeach;?>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th>Speed</th>
                                        <th>Price</th>
                                    </tr>
                                    <tr>
                                        <td><span class="big-text"><span class="number"><?php echo ($prod->DownloadSpeed) ? $prod->DownloadSpeed : 'NA';?></span> Mbps</span></td>
                                        <td><span class="big-text"><span class="number"><?php echo ($prod->Price) ? '$'.$prod->Price : 'NA'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?></td>
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
<!-- //////////////////////////////////////////// -->
                            <table class="table providers-table mobile">
                                <thead>
                                <tr class="thead-row">
                                    <th>Brand</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                </tr>
                                <tr class="thead-row thead-simple">
                                    <th >Price From</th>
                                </tr>
                                <tr>
                                    <td><span class="big-text"><span class="number"><?php echo ($prod->Price) ? '$'.$prod->Price : 'NA'; ?></span> <?php echo $prod->PriceDescriptionEnd; ?></span></td>
                                </tr>
                                <tr class="thead-row thead-simple">
                                    <th>Max Speed</th>
                                </tr>
                                <tr>
                                    <td><span class="big-text"><span class="number"><?php echo ($prod->DownloadSpeed) ? $prod->DownloadSpeed : 'NA';?></span> Mbps</span> </td>
                                </tr>
                                <tr class="btn-row">
                                    <td><a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                           onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                            <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
                                        </a></td>
                                </tr>
                                </tbody>
                            </table>
<!-- //////////////////////////////////////////// -->
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <p class="provider-count hidden-sm hidden-md hidden-lg">
                        <span class="current-slide green-text">3</span> of <span class="slide-count green-text"><?php echo count($cityData['providers']);?></span> providers
                    </p>
                    <?php else:?>
                        <p class="not-found-items hidden-sm hidden-md hidden-lg">No items found</p>
                    <?php endif;?>
                </div>
<!-- Контент второго таба конец-->
<!-- Контент третьего таба начало-->
                <!--<div id="internetTvVoice" class="tab-pane fade">
                    <p>Internet + TV + Voice</p>
                </div>-->
            </div>
<!-- Контент третьего таба конец-->
            <div class="button-wrap">
                <a href="#all-available-offers" class="btn btn-big btn-green btn-green-glow">See all Internet offers in <?php echo $city->NormalName?></a>
                <a href="/auth/?groupId=1265743" target="_blank" class="btn btn-orange btn-big btn-orange-glow">Secret Deals</a>
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
                    <?php
                    $secContent = str_replace("{q}","'", $city->SectionOne);
                    $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($secContent);
                    do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                    ?>
                    <p class="text-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/spectrum-logo.png">
                    </p>
                    <h2><?php echo ($city->SectionTwoText != '') ? $city->SectionTwoText : 'We recommend Spectrum Bundles. Why?'?></h2>
                    <?php
                    $secContent = str_replace("{q}","'", $city->SectionTwo);
                    $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($secContent);
                    do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                    ?>
                    <h2><?php echo ($city->SectionThreeText != '') ? $city->SectionThreeText : 'Consider switching providers?'?></h2>
                    <?php
                    $secContent = str_replace("{q}","'", $city->SectionThree);
                    $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($secContent);
                    do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                    ?>
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
                <form class="form-inline">
                    <span class="loader"></span>
                    <button type="button" class="btn btn-white" id="selectBrand">Select Brand</button>
                    <div class="form-group">
                        <label for="brandsList" class="sr-only">List of brands</label>
                        <select class="form-control brand-list" name="brand-list" id="brandsList">
                            <option selected value="all">All list of brands</option>
                            <?php foreach ($cityData['providers'] as $provider):?>
                            <option value="<?php echo $provider->Id;?>"><?php echo $provider->Name;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </form>
            </div>

            <div class="tab-content" id="allBrandsTab">
<!-- Контент первого таба начало-->
                <div id="internetOffers" class="tab-pane fade in active">
<!-- Таблица для desktop начало -->
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
                        foreach ($cityData['productListSorted'] as $prod) {
                            if(!in_array($prod->ServiceProviderCategory->Category->Id,[4,5])){continue;}
                            $tempCounter++;
                        }
                        ?>
                        <?php if($tempCounter > 0):?>
                        <?php foreach($cityData['productListSorted'] as $prod):?>
                        <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,[4,5])){continue;}?>
                        <tr>
                            <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                            <td class="slide-cell"><span class="middle-text arrow-up"><?php echo $prod->Name?> </span></td>
                            <td><span class="big-text"><span class="number"><?php echo ($prod->DownloadSpeed) ? $prod->DownloadSpeed : 'NA';?></span> Mbps</span></td>
                            <td><span class="big-text"><span class="number"><?php echo ($prod->Price) ? '$'.$prod->Price : 'NA'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?></td>
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
                                        <?php $descr = str_replace(['{bullets}','{/bullets}'],['',''], $prod->Description)?>
                                        <?php $descr = explode('~~', $descr)?>
                                        <?php  foreach ($descr as $item):?>
                                            <?php if($item ==''){continue;}?>
                                            <li><?php echo $item;?></li>
                                        <?php endforeach;?>
                                    </ul>
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
<!-- Таблица для desktop конец -->
<!--Таблица для Tablet и Mbile начало
        здесь уже информация по каждому бранду идет в отдельной таблице, которая находится в <li> -->
                    <?php $tempCounter = 0;
                    foreach ($cityData['productListSorted'] as $prod) {
                        if(!in_array($prod->ServiceProviderCategory->Category->Id,[4,5])){continue;}
                        $tempCounter++;
                    }
                    ?>
                    <?php if($tempCounter > 0):?>
                    <ul class="providers-table-slider hidden-sm hidden-md hidden-lg">
                        <?php foreach($cityData['productListSorted'] as $prod):?>
                        <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,[4,5])){continue;}?>
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
                                    <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                    <td class="slide-cell"><span class="middle-text arrow-up"><?php echo $prod->Name?></span></td>
                                </tr>
                                <tr class="hidden-row">
                                    <td></td>
                                    <td>
                                        <div class="hidden-content">
                                            <ul class="plan-description">
                                                <?php $descr = str_replace(['{bullets}','{/bullets}'],['',''], $prod->Description)?>
                                                <?php $descr = explode('~~', $descr)?>
                                                <?php  foreach ($descr as $item):?>
                                                    <?php if($item ==''){continue;}?>
                                                    <li><?php echo $item;?></li>
                                                <?php endforeach;?>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="thead-row thead-simple">
                                    <th>Speed</th>
                                    <th>Price</th>
                                </tr>
                                <tr>
                                    <td><span class="big-text"><span class="number"><?php echo ($prod->DownloadSpeed) ? $prod->DownloadSpeed : 'NA';?></span> Mbps</span></td>
                                    <td><span class="big-text"><span class="number"><?php echo ($prod->Price) ? '$'.$prod->Price : 'NA'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?></td>
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
<!-- ////////////////////////////////////////////-->
                            <table class="table providers-table mobile">
                                <thead>
                                    <tr class="thead-row">
                                        <th>Brand</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th >Price From</th>
                                    </tr>
                                    <tr>
                                        <td><span class="big-text"><span class="number"><?php echo ($prod->Price) ? '$'.$prod->Price : 'NA'; ?></span> <?php echo $prod->PriceDescriptionEnd; ?></span></td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th>Max Speed</th>
                                    </tr>
                                    <tr>
                                        <td><span class="big-text"><span class="number"><?php echo ($prod->DownloadSpeed) ? $prod->DownloadSpeed : 'NA';?></span> Mbps</span> </td>
                                    </tr>
                                    <tr class="btn-row">
                                        <td><a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                               onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                                <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
                                            </a></td>
                                    </tr>
                                </tbody>
                            </table>
<!-- ////////////////////////////////////////////-->
                        </li>
                        <?php endforeach;?>
                    </ul>
<!--Таблица для Tablet и Mbile конец -->
                    <p class="provider-count hidden-sm hidden-md hidden-lg">
                        <span class="current-slide green-text">3</span> of <span class="slide-count green-text"><?php echo count($cityData['providers']);?></span> providers
                    </p>
                    <?php else:?>
                        <p class="not-found-items hidden-sm hidden-md hidden-lg">No items found</p>
                    <?php endif;?>
                </div>
<!-- Контент первого таба конец-->
<!-- Контент второго таба начало-->
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
                        foreach ($cityData['productListSorted'] as $prod) {
                            if(!in_array($prod->ServiceProviderCategory->Category->Id,[7])){continue;}
                            $tempCounter++;
                        }
                        ?>
                        <?php if($tempCounter > 0):?>
                        <?php foreach($cityData['productListSorted'] as $prod):?>
                            <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,[7])){continue;}?>
                            <tr>
                                <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                <td class="slide-cell"><span class="middle-text arrow-up"><?php echo $prod->Name?> </span></td>
                                <td><span class="big-text"><span class="number"><?php echo ($prod->DownloadSpeed) ? $prod->DownloadSpeed : 'NA';?></span> Mbps</span></td>
                                <td><span class="big-text"><span class="number"><?php echo ($prod->Price) ? '$'.$prod->Price : 'NA'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?></td>
                                <td class="hidden-xs hidden-sm"><button class="btn btn-orange"><?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?></button></td>
                            </tr>
                            <tr class="hidden-row">
                                <td></td>
                                <td colspan="3">
                                    <div class="hidden-content">
                                        <ul class="plan-description">
                                            <?php $descr = str_replace(['{bullets}','{/bullets}'],['',''], $prod->Description)?>
                                            <?php $descr = explode('~~', $descr)?>
                                            <?php  foreach ($descr as $item):?>
                                                <?php if($item ==''){continue;}?>
                                                <li><?php echo $item;?></li>
                                            <?php endforeach;?>
                                        </ul>
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
                    <!-- Таблица для desktop конец -->
                    <!--Таблица для Tablet и Mbile начало
                            здесь уже информация по каждому бранду идет в отдельной таблице, которая находится в <li> -->
                    <?php $tempCounter = 0;
                    foreach ($cityData['productListSorted'] as $prod) {
                        if(!in_array($prod->ServiceProviderCategory->Category->Id,[7])){continue;}
                        $tempCounter++;
                    }
                    ?>
                    <?php if($tempCounter > 0):?>
                    <ul class="providers-table-slider hidden-sm hidden-md hidden-lg">

                        <?php foreach($cityData['productListSorted'] as $prod):?>
                        <?php if(!in_array($prod->ServiceProviderCategory->Category->Id,[7])){continue;}?>
                        <li>
                            <table class="table providers-table table">
                                <thead>
                                <tr class="thead-row">
                                    <th scope="col" class="col-xs-6">Brand</th>
                                    <th scope="col" class="col-xs-6">Product Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                        <td class="slide-cell"><span class="middle-text arrow-up"><?php echo $prod->Name?></span></td>
                                    </tr>
                                    <tr class="hidden-row">
                                        <td></td>
                                        <td>
                                            <div class="hidden-content">
                                                <ul class="plan-description">
                                                    <?php $descr = str_replace(['{bullets}','{/bullets}'],['',''], $prod->Description)?>
                                                    <?php $descr = explode('~~', $descr)?>
                                                    <?php  foreach ($descr as $item):?>
                                                        <?php if($item ==''){continue;}?>
                                                        <li><?php echo $item;?></li>
                                                    <?php endforeach;?>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th>Speed</th>
                                        <th>Price</th>
                                    </tr>
                                    <tr>
                                        <td><span class="big-text"><span class="number"><?php echo ($prod->DownloadSpeed) ? $prod->DownloadSpeed : 'NA';?></span> Mbps</span></td>
                                        <td><span class="big-text"><span class="number"><?php echo ($prod->Price) ? '$'.$prod->Price : 'NA'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?></td>
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
<!-- ////////////////////////////////////////////-->
                            <table class="table providers-table mobile">
                                <thead>
                                    <tr class="thead-row">
                                        <th>Brand</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th >Price From</th>
                                    </tr>
                                    <tr>
                                        <td><span class="big-text"><span class="number"><?php echo ($prod->Price) ? '$'.$prod->Price : 'NA'; ?></span> <?php echo $prod->PriceDescriptionEnd; ?></span></td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th>Max Speed</th>
                                    </tr>
                                    <tr>
                                        <td><span class="big-text"><span class="number"><?php echo ($prod->DownloadSpeed) ? $prod->DownloadSpeed : 'NA';?></span> Mbps</span> </td>
                                    </tr>
                                    <tr class="btn-row">
                                        <td><a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>"
                                               onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                                <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number)?>
                                            </a></td>
                                    </tr>
                                </tbody>
                            </table>
<!-- ////////////////////////////////////////////-->
                        </li>
                        <?php endforeach;?>
                    </ul>

                    <p class="provider-count hidden-sm hidden-md hidden-lg">
                        <span class="current-slide green-text">3</span> of <span class="slide-count green-text"><?php echo count($cityData['providers']);?></span> providers
                    </p>
                    <?php else:?>
                        <p class="not-found-items hidden-sm hidden-md hidden-lg">No items found</p>
                    <?php endif;?>
                </div>
<!-- Контент второго таба конец-->
<!-- Контент третьего таба начало-->
                <!--<div id="internetTvVoiceOffers" class="tab-pane fade">
                    <p>Internet + TV + Voice</p>
                </div>-->
<!-- Контент третьего таба конец-->
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
                        <li><a href="/internet/<?php echo strtolower($relCity['state_code'])?>/<?php echo strtolower($relCity['city_name'])?>">
                                Internet Offers in <?php echo $relCity['city_normal_name']?>, <?php echo $relCity['state_code']?>
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




<script>
    /*$('ul.tabs').each(function(){

        // For each set of tabs, we want to keep track of
        // which tab is active and its associated content
        var $active, $content, $links = $(this).find('.link');
        console.log($links);
        // If the location.hash matches one of the links, use that as the active tab.
        // If no match is found, use the first link as the initial active tab.
        $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
        $active.addClass('active');

        $content = $($active[0].hash);

        // Hide the remaining content
        $links.not($active).each(function () {
            $(this.hash).hide();
        });

        // Bind the click event handler
        $(this).on('click', 'a', function(e){
            // Make the old tab inactive.
            $active.removeClass('active');
            $content.hide();

            // Update the variables with the new link and content
            $active = $(this);
            $content = $(this.hash);

            // Make the tab active.
            $active.addClass('active');
            $content.show();

            // Prevent the anchor's default click action
            e.preventDefault();
        });
    });*/
    /*function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";}

        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";}*/


</script>


<!-- container -->
<?php
//include 'page-templates/modal-form.php';
wp_enqueue_script('cyh-app-main');
?>

<!--map script -->





<!-- end map script-->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    var time = ($("body").hasClass('home')) ? 45000 : 60000;
    setTimeout(
        function () {
            var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/593eb657b3d02e11ecc697d7/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        }, time);
</script>
<!--End of Tawk.to Script-->
<?php wp_footer(); ?>
</body>
</html>





