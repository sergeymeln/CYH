<section class="all-brand-grid">
    <?php
    // counter to open and close rows
    $columnNum = 1;
    $rowNumber = 1;
    echo ' <div class="row"><div class="row-height">';

    $itemCount = count($items);
    $rowCount = floor($itemCount / 3) + 1;
    $lastRowColumnCount = $itemCount % 3;
    switch ($itemCount % 3) {
        case 1:
            $fillerClass = 'col-sm-4';
            break;
        case 2:
            $fillerClass = 'col-sm-2';
            break;
    }

    foreach ($items as $item):
        /* @var $item \CYH\ViewModels\UI\GridItem */
        //inserting filler class only before first element of last row if it has not 3 items
        if ($rowNumber == $rowCount && in_array($lastRowColumnCount, [1, 2]) && $columnNum % 3 == 1 && isset($fillerClass)) { ?>
            <div class="<?php echo $fillerClass ?> col-sm-height hidden-xs">
            </div>
            <?php
        }
        ?>

        <div class="col-sm-4 brand-module col-sm-height">
            <div class="inside inside-full-height">
                <img class="img-natural" src="<?php echo $item->Logo; ?>"
                     alt="<?php echo $item->Title . ' Logo' ?>">
                <h3>
                    <?php
                    if (!empty($item->Title)) {
                        echo $item->Title;
                    }
                    ?>
                </h3>
                <p class="text-center"><?php echo $item->Tagline; ?></p>
                <?php
                switch ($item->DescrRenderMode) {
                    case \CYH\ViewModels\RenderMode::DYNAMIC:
                        do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $item->Description, 'common', 'common');
                        break;
                    default:
                        echo '<p>' . $item->Description . '</p>';
                        break;
                }
                ?>

                <?php if (!empty($item->AdditionalDetails)): ?>
                    <div class="brand-inner">
                        <div class="brand-details clearfix">
                            <?php foreach ($item->AdditionalDetails as $detail) {
                                /* @var $detail \CYH\ViewModels\UI\AdditionalDetailsItem */
                                ?>
                                <div class="brand-detail-item clearfix">
                                    <div class="pull-left"><?php echo $detail->Name ?></div>
                                    <div class="pull-right"><?php echo $detail->Value ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="brand-links">
                    <a href="<?php echo $item->ActionButton->Link; ?>"
                       class="<?php echo !empty($item->ActionButton->CssClass) ? $item->ActionButton->CssClass : 'brands-btn btn btn-plans btn-lg' ?> "
                       target="<?php echo $item->ActionButton->Target ?>"
                        <?php if (!empty($item->ActionButton->ColorOverride) || !empty($item->ActionButton->BackgroundColorOverride)): ?>
                            style="<?php echo !empty($item->ActionButton->ColorOverride) ? 'color:' . $item->ActionButton->ColorOverride . ';' : '' ?>
                            <?php echo !empty($item->ActionButton->BackgroundColorOverride) ? 'background-color:' . $item->ActionButton->BackgroundColorOverride . ';' : '' ?>
                                    "
                        <?php endif; ?>
                    >
                        <?php echo $item->ActionButton->Label; ?>
                    </a>
                </div>
            </div>
        </div>

        <?php

        if ($columnNum == $itemCount && in_array($lastRowColumnCount, [1, 2]) && isset($fillerClass)) {
            ?>
            <div class="<?php echo $fillerClass ?> col-sm-height hidden-xs">
            </div>
            <?php
        }

        // After every three entries close and open a row
        if ($columnNum % 3 == 0) {
            $rowNumber++;
            echo '</div></div><div class="row"><div class="row-height">';
        } ?>


        <?php
        $columnNum++;
    endforeach;

    echo ' </div></div>';

    ?>
</section>
<style>
    .all-brand-grid .brand-module .btn {
        position: static;
        display: block;
        width: 100%;
        margin: auto;
        transform: inherit;
    }

    .brand-inner {
        padding: 0 20px;
    }

    .brand-details {
        padding: 15px 0 20px;
    }

    .brand-detail-item {
        position: relative;
        width: 100%;
        float: left;
    }

    .brand-detail-item:after {
        position: absolute;
        content: "";
        top: 10px;
        left: 0;
        width: 100%;
        border-top: 2px dotted #000;
    }

    .brand-detail-item:before {
        position: absolute;
        content: "";
        bottom: 10px;
        left: 0;
        width: 100%;
        border-top: 2px dotted #000;
    }

    .brand-detail-item div {
        background-color: #fff;
        z-index: 1;
        position: relative;
    }

    .brand-detail-item .pull-left {
        padding-right: 5px;
        color: #939393;
    }

    .brand-detail-item .pull-right {
        padding-left: 5px;
    }

    .all-brand-grid > .row:nth-child(odd) > .row-height > .brand-module:nth-child(even) .brand-detail-item div,
    .all-brand-grid > .row:nth-child(even) > .row-height > .brand-module:nth-child(odd) .brand-detail-item div {
        background-color: #f6f6f6;
    }

    .row-height {
        text-align: center;
    }

    .brand-links {
        position: absolute;
        margin: auto 35px;
        left: 0;
        right: 0;
        bottom: 30px;
    }
</style>
