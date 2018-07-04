<?php /* @var $addressSearch \CYH\ViewModels\UI\AddressSearchEmbedded */ ?>
<div class="search-interstitial">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 form-holder">
            <div class="art-wrap">
                <h3>Find Service In Your Area</h3>
                <form onsubmit="return false;">
                    <input type="search" name="street" id="search-services"
                           placeholder="Enter Address and Zipcode" class="address-autocomplete">
                    <button class="btn btn-orange search-button" type="submit">Go!</button>
                </form>
                <h3>Or call us!
                    <?php
                    if (!empty($addressSearch) && !empty($addressSearch->Phone)){ ?>
                    <a href="tel:<?php echo $addressSearch->Phone ?>"
                       onClick="<?php echo $addressSearch->GaEventTrackingCode ?>"
                       class="phone-number btn btn-success btn-lg"><i
                            class="glyphicon glyphicon-earphone"></i>
                        <?php
                        echo $addressSearch->Phone;
                        } ?>
                    </a>
                </h3>
            </div>
        </div>
        <!-- /.col-md-4 col-md-offset-4 -->
    </div>
    <!-- /.row -->
</div>