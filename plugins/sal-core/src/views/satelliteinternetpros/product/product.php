<?php $headerColorClass = get_field('product-header-color');?>

<!--Hero image with description section -->
<section class="hero">
    <div class="row">
        <div class="col-md-8">
            <div class="masthead">

                <img src="<?php echo $spInfo->HeroImage; ?>" alt="<?php echo $spInfo->HeroImage; ?>" />
            </div>
        </div>
        <div class="col-md-4 brand-intro">
            <div class="masthead">
                <div class="banner-msg">
                    <br>
                    <?php do_action('\\' . \CYH\Controllers\Common\CommonUIComponents::class . '::RenderDescription', \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($spInfo->Description), 'common', 'common');  ?>

                </div>
            </div>
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
</section>
<!-- End Hero image with description section -->

<!--Tag line section-->
<section class="why-partner">
    <div class="row">

        <div class="col-md-12">
            <div class="ticker">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <p class="home-align">
                <?php  echo $spInfo->Tagline;?>
            </p>

        </div>
    </div>
    <br>
</section>
<!-- End Tag line section-->

<h2 class="home-align">
    <?php  echo $spInfo->Name." Satellite Internet Packages";?>
</h2>

<!--Products Section -->
<section class="deals-holder">
    <div class="satelliteinternetpros">
    <div class="row">
        <?php $rowCounter = 1;
        foreach ($products as $product):
            /* @var $product \CYH\Models\Product */
            ?>
            <div class="col-md-3 deal-module-spacer">
            <div class="deal-module">
                    <div class="<?php echo $headerColorClass; ?>">
                        <h2 class="deal-title"><?php echo $product->Name; ?></h2>
                    </div>
                <div class="sub-title">
                    <div class="pre-price"><b><?php echo $product->PriceDescriptionBegin; ?></b></div>
                    <?php if(!empty($product->Price)) { ?>
                        <div class="price-holder">
                            <?php
                            $priceArr = explode('.', $product->Price);
                            ?>
                            <p><strong class="price"><span>$</span><?php echo $priceArr[0]; ?><span class="tens"><?php echo !empty($priceArr[1]) ? $priceArr[1]: '00' ; ?></span><span class="month">mo</span></strong></p>
                            <div class="post-price" ><?php echo $product->PriceDescriptionEnd; ?></div>
                        </div>
                    <?php } ?>
                    <hr>

                    <div class="write-up-container">
                        <?php do_action('\\' . \CYH\Controllers\Common\CommonUIComponents::class . '::RenderDescription', \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($product->Description), 'common', 'common');  ?>
                    </div>
                    <?php $formattedPhone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($product->Phone->Number); ?>
                    <p><a class="learn-more-button btn btn-primary" href="tel:<?php echo $formattedPhone;?>">Order: <?php echo $formattedPhone;?></a></p>
                </div>
            </div>
            <?php
            ++$rowCounter;
            if ($rowCounter >4){
                $rowCounter = 1;
                ?>
                </div><div class="row">
            <?php } ?>
            </div>


        <?php endforeach;  ?>
    </div>
    </div>
</section>
<!-- End Product Section -->
<div class="clearfix"></div>


<section class="why-partner">
    <div class="row">
        <div class="col-md-12">
            <h2 class="home">
                <?php echo $spCat[0]->Tagline;?>
            </h2>
            <?php do_action('\\' . \CYH\Controllers\Common\CommonUIComponents::class . '::RenderDescription', \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($spCat[0]->Description), 'common', 'common');  ?>
        </div>
    </div>

</section>
<br>
<hr>
