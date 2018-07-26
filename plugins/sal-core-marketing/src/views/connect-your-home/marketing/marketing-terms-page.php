<?php $showSpectrum=0;?>

<section class="best-offers-tab-section">
    <div class="container">
        <div class="row">
            <h2 id="all-available-offers">Terms and Conditions</h2>

            <div class="tab-content" id="allBrandsTab">
                <div id="internetOffers" class="tab-pane fade in active">
                    <table class="table providers-table offers-table hidden-xs">
                        <thead>
                        <tr class="thead-row">
                            <th scope="col" class="col-sm-1 col-md-2">Brand</th>
                            <th scope="col" class="col-sm-5 col-md-4">Product Description</th>
                            <th scope="col">Terms and Conditions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $tempCounter = 0;
                        foreach ($cityData['productListSorted'] as $prod) {
                            $tempCounter++;
                        }
                        ?>
                        <?php if($tempCounter > 0):?>
                        <?php foreach($cityData['productListSorted'] as $prod):?>

                        <tr id="offer-<?php echo $prod->Id;?>">
                            <td><img src="<?php echo $prod->ServiceProviderCategory->Provider->Logo?>"></td>
                            <td><div><span class="middle-text"><?php echo $prod->Name?> </span></div></td>
                            <td><span>
                                    <?php echo $prod->Legal; ?>
                                </span>
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
                        $tempCounter++;
                    }
                    ?>
                    <?php if($tempCounter > 0):?>
                    <ul class="providers-table-slider hidden-sm hidden-md hidden-lg">
                        <?php foreach($cityData['productListSorted'] as $prod):?>

                        <li id="offer-<?php echo $prod->Id;?>">
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
                                    <td><div><span class="middle-text"><?php echo $prod->Name?></span></div></td>
                                </tr>

                                <tr class="thead-row thead-simple">
                                    <th>Terms and Conditions</th>
                                </tr>
                                <tr>
                                    <td><span><?php echo $prod->Legal; ?></span></td>
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
                                        <th >Terms and Conditions</th>
                                    </tr>
                                    <tr>
                                        <td><span><?php echo $prod->Legal; ?></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <p class="provider-count hidden-sm hidden-md hidden-lg">
                    </p>
                    <?php else:?>
                        <p class="not-found-items hidden-sm hidden-md hidden-lg">No items found</p>
                    <?php endif;?>
                </div>
                <!--<div id="internetTvVoiceOffers" class="tab-pane fade">
                    <p>Internet + TV + Voice</p>
                </div>-->
            </div>
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