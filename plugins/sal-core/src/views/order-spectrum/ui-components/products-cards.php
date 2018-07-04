<?php

/* @var $products array */

?>

<section class="deals-holder">
    <div class="row">
    <?php $rowCounter = 1;
          foreach ($products as $product):
        /* @var $product \CYH\Models\Product */
        ?>
    <div class="col-md-4 deal-module-spacer">
        <div class="deal-module">
            <h2 class="deal-title"><?php echo $product->Name; ?></h2>
            <div class="sub-title">
                <div class="pre-price"><b><?php echo $product->PriceDescriptionBegin; ?></b></div>
                <?php if(!empty($product->Price)) { ?>
                    <div class="price-holder mtop10">
                        <?php
                        $priceArr = explode('.', $product->Price);
                        ?>
                        <strong class="price"><span class="price-value">$</span><?php echo $priceArr[0]; ?><span class="tens"><?php echo !empty($priceArr[1]) ? $priceArr[1]: '00' ; ?></span><span class="month">mo</span></strong>
                        <div class="post-price" ><?php echo $product->PriceDescriptionEnd; ?></div>
                    </div>
                <?php } ?>
                <hr class="hr-separator" />


                <?php do_action('\\' . \CYH\Controllers\Common\CommonUIComponents::class . '::RenderDescription', \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($product->Description), 'common', 'common');  ?>
                <div class="channels-holder">

                    <hr class="hr-separator"/>

                </div>
                <?php $formattedPhone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($product->Phone->Number); ?>
                <a class="learn-more-button" href="tel:<?php echo $formattedPhone;?>">Order: <?php echo $formattedPhone;?></a>
            </div>
        </div>
        <?php
            ++$rowCounter;
            if ($rowCounter >3){
            $rowCounter = 1;
        ?>
        </div><div class="row">
    <?php } ?>
    </div>


<?php endforeach;  ?>
    </div>
</section>
