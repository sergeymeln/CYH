<?php
/* @var $spInfo \CYH\Models\ServiceProvider */
$formattedPhone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($spInfo->Phone->Number); ?>
<div class="row">
    <div class="col-sm-3">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php if(isset($spInfo->Logo)){ ?>

                <img src="<?php echo $spInfo->Logo ?>" class="brand logo-non-svg  logo-from-sal" alt="Connect Your Home&reg;" ">
            <?php }else{ ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="brand logo-non-svg" alt="Connect Your Home&reg;">
            <?php } ?>
        </a>
    </div>
    <div class="col-md-8 col-md-offset-1 col-sm-offset-0 col-sm-9 double-row">
        <div class="row top-search">
            <div class="col-md-12 col-sm-7 col-sm-offset-5 col-md-offset-0">
                <form id="header-search" onsubmit="return false;">
                    <div class="form-holder">
                        <input class="testing input address-autocomplete" type="form-control" name="search" id="address" placeholder="Enter address" style="padding:2px;width:70%; ">
                        <button class="btn btn-green search-button search-button-header" type="submit">Go!</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /row -->
        <div class="row" cf>
            <div class="col-md-9 col-md-offset-3 col-sm-7 col-sm-offset-5">
                <!-- BACKEND TODO: Dynamic Phone Number -->
                <div class="phone">
                    <span class="phone-label">Order Now:</span>
                    <div itemscope itemtype="http://schema.org/Organization">
                                        <span itemprop="telephone">
                                    <?php
                                    if(!empty($spInfo->Phone->Number)) { ?>
                                            <a href="tel:<?php echo $formattedPhone; ?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="phone-number btn btn-blue btn-success btn-lg">
                                        <i class="glyphicon glyphicon-earphone"></i>
                                                <?php echo $formattedPhone; }

                                                elseif(get_field('edp_brand_phone')){ ?>
                                                <a href="tel:<?php echo get_field('edp_brand_phone', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="phone-number btn btn-blue btn-success btn-lg">
                                        <i class="glyphicon glyphicon-earphone"></i>
                                                    <?php echo get_field('edp_brand_phone', 'option');

                                                    }elseif(get_field('phone_number_one_brand')){ ?><a href="tel:<?php echo get_field('phone_number_one_brand');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="phone-number btn btn-success btn-blue btn-lg">
                                    <i class="glyphicon glyphicon-earphone"></i>
                                                        <?php echo get_field('phone_number_one_brand');

                                                        }else{ ?><a href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="phone-number btn btn-success btn-blue btn-lg">
                                    <i class="glyphicon glyphicon-earphone"></i>
                                                            <?php echo get_field('home_phone_number', 'option');
                                                            } ?>
                                        </a>
                                    </span>
                    </div>
                </div>
            </div>
            <!-- col-md-5 col-md-offset-7 -->
        </div>
        <!-- /row -->
    </div>
</div>
<!-- /row -->
<div class="row">
    <nav class="top-nav">
        <a href="#" class="nav-toggle" id="nav-toggle" aria-hidden="false">Menu</a>
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </nav>
</div>