<section class="deals-holder">
    <?php
    if( $products ):
        foreach ( $products as $product ):
            /* @var $product \CYH\Models\Product  */
            ?>
                <div class="col-md-3 col-sm-6 deal-module-spacer">
                    <div class="deal-module">
                        <h2 class="deal-title" style="background: #ec1944;">
                            <a href="/dish-tv-packages/" class="text-white">
                            <?php echo $product->Name ?>
                            </a>
                        </h2>
                        <div class="sub-title">
                            <?php echo $product->PriceDescriptionBegin; ?><br>
                            <strong class="price">
                                <span style="font-size: 60px; position: absolute;left: -36px;top: 20px;">$</span>
                                <?php
                                $priceArr = explode('.', $product->Price);
                                echo $priceArr[0];
                                ?>
                                <span class="tens"><?php echo !empty($priceArr[1]) ? $priceArr[1]: '00' ; ?></span><span class="month"></span></strong>
                            <br/>
                            <?php echo $product->PriceDescriptionEnd; ?>
                            <p>
                            <hr style="border-color: darkgray"/>
                            </p>
                            <div class="write-up-container">
                                    <?php
                                    do_action('\\' . CYH\Controllers\Common\CommonUIComponents::class . '::RenderDescription', \CYH\Helpers\ContentDeserializeHelper::GetDescriptionFromTags($product->Description), 'common', 'dish-systems');
                                    ?>
                            </div>
                            <div >
                                <hr style="border-color: darkgray"/>
                            </div>
                            <br/>
                            <a class="learn-more-button" href="/dish-tv-packages/">Learn More</a>
                        </div>
                    </div>
                </div>

        <?php
        endforeach;
    endif;
    ?>
    <div class="clearfix"></div>

</section>