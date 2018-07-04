<?php
/* @var $spInfo \CYH\Models\ServiceProvider */
$formattedPhone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($spInfo->Phone->Number);
?>
<header class="page-head">
    <div class="row">
        <div class="col-sm-3">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">

                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="brand hide logo-non-svg" alt="Connect Your Home&reg;">
            </a>
        </div>
        <div class="col-md-8 col-md-offset-1 col-sm-offset-0 col-sm-9 double-row">
            <div class="row top-search">
                <div class="col-md-12 col-sm-7 col-sm-offset-5 col-md-offset-0">
                </div>
            </div>
            <!-- /row -->
            <div class="row" cf>
                <div class="col-md-9 col-md-offset-3 col-sm-7 col-sm-offset-5">
                    <!-- BACKEND TODO: Dynamic Phone Number -->
                    <div class="phone">
                        <span class="phone-label">Order Today: </span>
                        <?php
                            if(!empty($spInfo->Phone->Number)) { ?>
                                <a href="tel:<?php echo get_field('phone_number_one_brand'); ?>"
                                    onClick="ga('send', 'event', 'Call', 'ClicktoCall');" class="phone-number">
                                <?php
                                echo $formattedPhone;
                            } elseif(get_field('phone_number_one_brand')){ ?>
                        <a href="tel:<?php echo get_field('phone_number_one_brand');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall');" class="phone-number">
                            <?php
                            echo get_field('phone_number_one_brand');
                            }elseif(get_field('cyb_phone_number', 'option')){ ?><a href="tel:<?php echo get_field('cyb_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall');" class="phone-number">
                                <?php
                                echo get_field('cyb_phone_number', 'option');
                                }else{ ?><a href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall');" class="phone-number">
                                    <?php
                                    echo "insert phone here";
                                    } ?>
                                </a>
                    </div>
                    <!-- /phone -->
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
</header>
