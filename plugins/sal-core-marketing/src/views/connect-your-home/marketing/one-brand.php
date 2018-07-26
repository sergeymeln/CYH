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
        foreach ($products as $prod) {
            if($prod->ServiceProviderCategory->Provider->Id != $brandId){continue;}
            $tempCounter++;
        }
        ?>
        <?php if($tempCounter > 0):?>
            <?php foreach($products as $prod):?>
                <?php if($prod->ServiceProviderCategory->Provider->Id != $brandId){continue;}?>
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
                            <?php /*if($prod->Legal != ''):*/?><!--
                            <a href="" data-toggle="modal" data-target="#legalInfo"> Terms & Conditions</a>
                            <span class="terms-content">
                                <?php /*echo $prod->Legal; */?>
                            </span>
                            --><?php /*endif;*/?>
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
    foreach ($products as $prod) {
        if($prod->ServiceProviderCategory->Provider->Id != $brandId){continue;}
        $tempCounter++;
    }
    ?>
    <?php if($tempCounter > 0):?>
        <ul class="providers-table-slider hidden-sm hidden-md hidden-lg">
            <?php foreach($products as $prod):?>
                <?php if($prod->ServiceProviderCategory->Provider->Id != $brandId){continue;}?>
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
                                    <?php /*if($prod->Legal != ''):*/?><!--
                                    <a href="" data-toggle="modal" data-target="#legalInfo"> Terms & Conditions</a>
                                    <span class="terms-content">
                                        <?php /*echo $prod->Legal; */?>
                                    </span>
                                    --><?php /*endif;*/?>
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
                            <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
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
                                        <?php /*if($prod->Legal != ''):*/?><!--
                                                    <a href="" data-toggle="modal" data-target="#legalInfo"> Terms & Conditions</a>
                                                    <span class="terms-content">
                                                        <?php /*echo $prod->Legal; */?>
                                                    </span>
                                                    --><?php /*endif;*/?>
                                        <!--Temporary add link-->
                                        <a target="_blank" href="/offers-terms-and-conditions/#offer-<?php echo $prod->Id?>"> Terms & Conditions</a>
                                    </ul>
                                </div>
                            </td>
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