<?php /* @var $products a */ ?>

<section>
    <h2>
        <small class="section-title">
            DISH TV Packages
        </small>
    </h2>

    <?php foreach ($products as $product):
        /* @var $product \CYH\Models\Product */
        ?>
        <div id="<?php echo $product->Id ?>" class="package-holder">
            <h3 class="package-title-holder">
                <?php echo $product->Name ?> </h3>
            <div class="col-sm-6">
                <?php  ?>
                <p>
                    <strong class="black12">
                        <?php echo $product->Tagline; ?>
                    </strong>
                </p>
                <?php
                do_action('\\' . CYH\Controllers\Common\CommonUIComponents::class . '::RenderDescription', \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($product->Description), 'common', 'dish-systems');
                ?>
            </div>
            <div class="col-sm-6">
                <div class="price-box">
                    <p>
                        <?php
                        $priceArr = explode('.', $product->Price);
                        ?>
                        <strong class="price">
                            $<?php echo $priceArr[0]; ?> <span class="tens"><?php echo !empty($priceArr[1]) ? $priceArr[1]: '00' ; ?></span>
                            <span class="month">mo</span>
                        </strong>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="btn-group" role="group" aria-label="...">
                <?php
                $formattedPhone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($product->Phone->Number);
                ?>
                <a href="tel:<?php echo $formattedPhone ?>" class="btn btn btn-danger btn-custom" role="button"
                   onclick="ga('send', 'event', 'Call', 'ClicktoCall - Packages');" title="Order DISH Network">Order By
                    Phone: <?php echo $formattedPhone ?></a>
                <a href="/order-dish-network-online" class="btn btn-default"
                   onclick="ga('send', 'event', 'Form', 'Enter Form - Packages');" role="button" title="Order DISH Network">Order
                    Online</a>
            </div>
            <a href="/dish-programming/channels/dish-hd-local-channels/" class="pull-right" title="View Local Channels">View
                Channels</a>
            <div class="clearfix"></div>
        </div>
    <?php endforeach; ?>

    <div class="clearfix"></div>
</section>
