<?php
/* @var $topNavMenu \CYH\ViewModels\GroupPortal\TopNavMenu */
?>
<header class="page-head">
    <div class="row">
        <div class="col-md-6 logo-links">
            <a class="logo-link"
               href="<?php echo $urlPrefix; ?>home?groupId=<?php echo $topNavMenu->GroupInfo->Id ?>"><img
                        src="<?php echo $topNavMenu->GroupInfo->Logo; ?>" class="brand"
                        alt="Connect Your Home&reg;"></a>
        </div>
        <div class="col-md-6 text-right">
            <?php
            do_action('\\' . \CYH\Controllers\Common\CommonUIComponents::class . '::RenderAddressSearchBox', new \CYH\ViewModels\AddressSearch($addressSearchBaseUrl, 'offer-search', ['groupId' => $topNavMenu->GroupInfo->Id]));
            $formattedPhone = \CYH\Helpers\FormatHelper::FormatPhoneNumber($topNavMenu->GroupInfo->SpPhone);
            ?>
            <div class="mtop20">
                <div class="phone mleft0 mright0 cyb-acc-top-phone">
                    <span class="phone-label">Contact Us Today: </span>
                    <a href="tel:<?php echo $formattedPhone; ?>" class="phone-number">
                        <?php echo $formattedPhone; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-6 col-sm-6">
            <nav class="top-nav mtop10">
                <a href="#" class="nav-toggle" id="nav-toggle" aria-hidden="false">Menu</a>
                <div class="menu-main-container">
                    <ul id="menu-main" class="menu">
                        <li class="menu-item"><a href="<?php echo $myAccUrl; ?>">My Account</a></li>
                        <li class="menu-item"><a
                                    href="<?php echo $urlPrefix . '?groupId=' . $topNavMenu->GroupInfo->Id . '&salAction=logout' ?>">Log
                                Out</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

