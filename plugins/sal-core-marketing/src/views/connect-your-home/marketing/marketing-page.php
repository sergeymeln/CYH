
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
                            <input type="hidden" value="<?php echo $city->Zip?>" id="currentZipCode"/>
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
                    <li><a target="_blank" href="<?php echo $provider->NavigationLink->LinkUrl?>"><img src="<?php echo $provider->Logo; ?>" ></a></li>
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
            <h2>Top <?php echo (count($cityData['topProvidersData']) <5) ? count($cityData['topProvidersData']) : 5?> internet providers in <?php echo $city->NormalName?> , <?php echo $city->StateCode?></h2>

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
                        <td><span class="big-text"><span class="number"><?php echo ($spCatSorted['products'][0]->Price) ? '$'.$spCatSorted['products'][0]->Price : '-'; ?></span></span> <?php echo $spCatSorted['products'][0]->PriceDescriptionEnd; ?></td>
                        <td><span class="big-text"><span class="number"><?php echo $spCatSorted['avgSpeed'];?></span> <?php echo $spCatSorted['speedUnitsAvg'];?></span></td>
                        <td><span class="big-text"><span class="number"><?php echo $spCatSorted['maxSpeed'];?></span> <?php echo $spCatSorted['speedUnitsMax'];?></span> </td>
                        <td class="hidden-xs hidden-sm"><a href="<?php echo $spCatSorted['spCategoryUrl'];?>" target="_blank" class="btn btn-orange">See all packages</a></td>
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
                                <td colspan="2"><a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($spCatSorted['provider']->Phone->Number)?>"
                                                   onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                        <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($spCatSorted['provider']->Phone->Number)?>
                                    </a></td>
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
                                <td><img src="<?php echo $spCatSorted['provider']->Logo; ?>"></td>
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
                                <td><a href="tel:<?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($spCatSorted['provider']->Phone->Number)?>"
                                                                      onclick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="btn btn-orange">
                                            <?php echo \CYH\Helpers\FormatHelper::FormatPhoneNumber($spCatSorted['provider']->Phone->Number)?>
                                        </a></td>
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
                echo do_shortcode( '[flexiblemap maptype="quickfacts" height="600" width="100%" zoom="11" center="'.$city->Latitude.', '.$city->Longitude.'" marker="'.$city->Latitude.', '.$city->Longitude.'" ]' );
                ?>
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
                                <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                <td class="<?php echo $tdClass?>"><span class="middle-text <?php echo $spanClass?>"><?php echo $prod->Name?></span></td>
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
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                        <td class="<?php echo $tdClass?>"><span class="middle-text <?php echo $spanClass?>"><?php echo $prod->Name?></span></td>
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
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th >Price From</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                                    <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                                        </td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th>Max Speed</th>
                                    </tr>
                                    <tr>
                                        <td><span class="big-text"><span class="number"><?php echo $speedData['speed'];?></span><?php echo $speedData['speedUnits']?></span> </td>
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
                        <span class="current-slide green-text">3</span> of <span class="slide-count green-text"><?php echo count($cityData['providers']);?></span> providers
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
                                <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                <td class="<?php echo $tdClass?>"><span class="middle-text <?php echo $spanClass?>"><?php echo $prod->Name?></span></td>
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
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                        <td class="<?php echo $tdClass?>"><span class="middle-text <?php echo $spanClass?>"><?php echo $prod->Name?></span></td>
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
                                    <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                </tr>
                                <tr class="thead-row thead-simple">
                                    <th >Price From</th>
                                </tr>
                                <tr>
                                    <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                                <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                                    </td>
                                </tr>
                                <tr class="thead-row thead-simple">
                                    <th>Max Speed</th>
                                </tr>
                                <tr>
                                    <td><span class="big-text"><span class="number"><?php echo $speedData['speed'];?></span> <?php echo $speedData['speedUnits']?></span> </td>
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
                        <span class="current-slide green-text">3</span> of <span class="slide-count green-text"><?php echo count($cityData['providers']);?></span> providers
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
                    $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($city->SectionOne);
                    do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                    ?>
                    <p class="text-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/spectrum-logo.png">
                    </p>
                    <h2><?php echo ($city->SectionTwoText != '') ? $city->SectionTwoText : 'We recommend Spectrum Bundles. Why?'?></h2>
                    <?php
                    $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($city->SectionTwo);
                    do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $content, 'common', 'common');
                    ?>
                    <h2><?php echo ($city->SectionThreeText != '') ? $city->SectionThreeText : 'Consider switching providers?'?></h2>
                    <?php
                    $content = \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($city->SectionThree);
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
                            <option data-hideTab="<?php echo $provider->HideTab?>" value="<?php echo $provider->Id;?>"><?php echo $provider->Name;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </form>
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
                        foreach ($cityData['productListSorted'] as $prod) {
                            if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetCats'])){continue;}
                            $tempCounter++;
                        }
                        ?>
                        <?php if($tempCounter > 0):?>
                        <?php foreach($cityData['productListSorted'] as $prod):?>
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
                            <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                            <td class="<?php echo $tdClass?>"><span class="middle-text <?php echo $spanClass?>"><?php echo $prod->Name?> </span></td>
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
                        if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetCats'])){continue;}
                        $tempCounter++;
                    }
                    ?>
                    <?php if($tempCounter > 0):?>
                    <ul class="providers-table-slider hidden-sm hidden-md hidden-lg">
                        <?php foreach($cityData['productListSorted'] as $prod):?>
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
                                    <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                    <td class="<?php echo $tdClass?>"><span class="middle-text <?php echo $spanClass?>"><?php echo $prod->Name?></span></td>
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
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th >Price From</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                                    <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                                        </td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th>Max Speed</th>
                                    </tr>
                                    <tr>
                                        <td><span class="big-text"><span class="number"><?php echo $speedData['speed'];?></span> <?php echo $speedData['speedUnits']?></span> </td>
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
                        <span class="current-slide green-text">3</span> of <span class="slide-count green-text"><?php echo count($cityData['providers']);?></span> providers
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
                        foreach ($cityData['productListSorted'] as $prod) {
                            if(!in_array($prod->ServiceProviderCategory->Category->Id,$constants['internetAndTvCats'])){continue;}
                            $tempCounter++;
                        }
                        ?>
                        <?php if($tempCounter > 0):?>
                        <?php foreach($cityData['productListSorted'] as $prod):?>
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
                                <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                <td class="<?php echo $tdClass?>"><span class="middle-text <?php echo $spanClass?>"><?php echo $prod->Name?> </span></td>
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
                        $tempCounter++;
                    }
                    ?>
                    <?php if($tempCounter > 0):?>
                    <ul class="providers-table-slider hidden-sm hidden-md hidden-lg">

                        <?php foreach($cityData['productListSorted'] as $prod):?>
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
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                        <td class="<?php echo $tdClass?>"><span class="middle-text <?php echo $spanClass?>"><?php echo $prod->Name?></span></td>
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
                                        <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th >Price From</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $prod->PriceDescriptionBegin; ?> <span class="big-text"><span class="number">
                                                    <?php echo ($prod->Price) ? '$'.$prod->Price : '-'; ?></span></span> <?php echo $prod->PriceDescriptionEnd; ?>
                                        </td>
                                    </tr>
                                    <tr class="thead-row thead-simple">
                                        <th>Max Speed</th>
                                    </tr>
                                    <tr>
                                        <td><span class="big-text"><span class="number"><?php echo $speedData['speed'];?></span> <?php echo $speedData['speedUnits']?></span> </td>
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
                        <span class="current-slide green-text">3</span> of <span class="slide-count green-text"><?php echo count($cityData['providers']);?></span> providers
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
                        <li><a href="/internet/<?php echo strtolower($relCity['state_code'])?>/<?php echo strtolower($relCity['city_name'])?>">
                                <?php echo $relCity['city_normal_name']?>
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
<section class="nearby-offers">
    <div class="container">
        <div class="row">
            <h2>See Internet Offers in 10 biggest cities in <?php echo $city->StateName?> state</h2>
            <?php if(count($city->BiggestCitiesInState) > 0):?>
                <div class="offers-list-wrap">
                    <?php $bigCitiesHalfCount = count($city->BiggestCitiesInState)/2;?>
                    <?php $counter = 0?>

                    <ul class="flex-list nearby-offers-list">
                        <?php foreach ($city->BiggestCitiesInState as $bigCity):?>
                            <?php if($counter>=$bigCitiesHalfCount) {
                                echo '</ul><ul class="flex-list nearby-offers-list">';
                                $counter = 0;
                            }?>
                            <li><a href="/internet/<?php echo strtolower($bigCity['state_code'])?>/<?php echo strtolower($bigCity['city_name'])?>">
                                    <?php echo $bigCity['city_normal_name']?>
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
<!-- container -->
<?php
//include 'page-templates/modal-form.php';
wp_enqueue_script('cyh-app-main');
?>
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