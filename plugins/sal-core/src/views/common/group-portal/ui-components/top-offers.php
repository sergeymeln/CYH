<div class="row discount-grid-container">
    <div class="discount-grid-table">
        <?php

        foreach ($topOffers as $key => $topOffer) {
            if ($key == 3) {
                break;
            }
            ?>
            <div class="col-md-4 grid-col">
                <div class="discount-grid">
                    <div class="img-holder">
                        <img class="grid-img" src="<?php echo $topOffer->Logo; ?>">
                    </div>
                    <div class="discount-text">
                        <ul class="top-offer-list text-left">
                            <?php
                            do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescription', $topOffer->DescriptionParsed, 'common', 'common');
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
