<?php
/* @var $sp \CYH\Models\ServiceProvider */
?>

<header class="page-head">
    <div class="row">
        <div class="col-sm-3">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo $sp->Logo; ?>" class="brand" alt="<?php echo $sp->Name; ?>">
            </a>
        </div>
        <div class="col-md-8 col-md-offset-1 col-sm-offset-0 col-sm-9 double-row">
            <div class="row top-search">
                <div class="col-md-12 col-sm-7 col-sm-offset-5 col-md-offset-0">
                    <form id="header-search" onsubmit="return false;">
                        <div class="form-holder">
                            <input class="testing input address-autocomplete" type="form-control" name="search"
                                   id="address" placeholder="Enter address" style="padding:2px;width:70%; ">
                            <button class="btn btn-green search-button search-button-header" type="submit">Go!</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /row -->
            <div class="row" cf>
                <div class="col-md-9 col-md-offset-3 col-sm-12">
                    <!-- BACKEND TODO: Dynamic Phone Number -->
                    <div class="phone">
                        <span class="phone-label">Call Now To Order:</span>
                        <?php
                        $phone = '';
                        if (!empty($sp->Phone)) {
                            $phone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($sp->Phone->Number);
                        } elseif (get_field('cyb_phone_number', 'option')) {
                            $phone = get_field('cyb_phone_number', 'option');
                        } elseif (get_field('phone_number_one_brand')) {
                            $phone = get_field('phone_number_one_brand');
                        } else {
                            $phone = get_field('home_phone_number', 'option');
                        }
                        ?>
                        <a href="tel:<?php echo $phone; ?>"
                           onClick="ga('send', 'event', 'Call', 'ClicktoCall', 'ClicktoCall - Home Header', 1);"
                           class="phone-number btn phone-button">
                            <?php
                            echo $phone;
                            ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    <div class="row">
        <nav class="top-nav">
            <a href="#" class="nav-toggle" id="nav-toggle" aria-hidden="false">Menu</a>
            <?php wp_nav_menu(array('theme_location' => 'header-menu')); ?>
        </nav>
    </div>
</header>
