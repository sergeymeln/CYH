<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msvalidate.01" content="9DDBB947C0850E3A05C7D2385EE2507E"/>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>"/>
    <link href="<?php echo get_template_directory_uri() ?>/css/checkbox-style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.1/themes/base/minified/jquery-ui.min.css"/>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5PL8LHN');</script>
    <!-- End Google Tag Manager -->
    <?php wp_head(); ?>
    <script>
        var $ = jQuery.noConflict();
    </script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo get_template_directory_uri(); ?>/javascripts/modernizr.min.js"
            type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/javascripts/detectizr.min.js"
            type="text/javascript"></script>


    <style type="text/css" media="print">

        body {
            color: #000;
            background: blue;
        }

        footer {
            display: none;
        }

        input[type=checkbox].css-checkbox {
            position: absolute;
            z-index: -1000;
            left: -1000px;
            overflow: hidden;
            clip: rect(0 0 0 0);
            height: 1px;
            width: 1px;
            margin: -1px;
            padding: 0;
            border: 0;
        }

        input[type=checkbox].css-checkbox + label.css-label {
            padding-left: 55px;
            height: 50px;
            display: inline-block;
            line-height: 50px;
            background-repeat: no-repeat;
            background-position: 0 0;
            font-size: 50px;
            vertical-align: middle;
            /*cursor:pointer;*/
            border: #337ab7 solid 2px;
            border-radius: 5px;

        }

        input[type=checkbox].css-checkbox:checked + label.css-label {
            background-position: 0 -50px;
        }

        label.css-label {
            background-image: url(https://www.connectyourhome.com/wp-content/uploads/2016/12/csscheckbox_7a51de2f6764739a60a1c57b7736eb7f.png);
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .hero {
            display: none;
        }

        .print-table {
            display: none;
        }

        header.page-head {
            border: none;
            display: none;
        }

        a:after {
            content: '';
        }

        a[href]:after {
            content: none !important;
        }

    </style>

    <style type="text/css">

        .headline {
            margin-bottom: 20px;
        }

        .bottom-border {
            margin-bottom: 10px;
        }

        header.page-head .phone .phone-number, .phone .phone-number.btn.btn-lg.btn-success {
            background-color: # <?php the_field('main_color'); ?> !important;
            color: #fff !important;
        }

        header.page-head {
            border-top: 4px solid #<?php the_field('main_color'); ?>;
        }

        .phone h3.phone-number {
            color: #ec1944;
        }

        .btn-success {
            color: #fff;
            background-color: #<?php the_field('main_color'); ?>;
            border-color: #<?php the_field('main_color'); ?>;
            background-image: -webkit-linear-gradient(top, #<?php the_field('main_color'); ?>, #<?php the_field('main_color'); ?> 100%);
            background-image: -o-linear-gradient(top, #<?php the_field('main_color'); ?> 0, #<?php the_field('main_color'); ?> 100%);
            background-image: -webkit-gradient(linear, left top, left bottom, from(#<?php the_field('main_color'); ?>), to(#<?php the_field('main_color'); ?>));
            background-image: linear-gradient(to bottom, #<?php the_field('main_color'); ?>, #<?php the_field('main_color'); ?> 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#<?php the_field('main_color'); ?>', endColorstr=#<?php the_field('main_color'); ?>, GradientType=0);
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            background-repeat: repeat-x;
            border-color: #<?php the_field('main_color'); ?>;
        }

        input[type=checkbox].css-checkbox {
            position: absolute;
            z-index: -1000;
            left: -1000px;
            overflow: hidden;
            clip: rect(0 0 0 0);
            height: 1px;
            width: 1px;
            margin: -1px;
            padding: 0;
            border: 0;
        }

        input[type=checkbox].css-checkbox + label.css-label {
            padding-left: 55px;
            height: 50px;
            display: inline-block;
            line-height: 50px;
            background-repeat: no-repeat;
            background-position: 0 0;
            font-size: 50px;
            vertical-align: middle;
            /*cursor:pointer;*/

        }

        input[type=checkbox].css-checkbox:checked + label.css-label {
            background-position: 0 -50px;
        }

        label.css-label {
            background-image: url(https://www.connectyourhome.com/wp-content/uploads/2016/12/csscheckbox_7a51de2f6764739a60a1c57b7736eb7f.png);
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

    </style>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5PL8LHN"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="container">
    <header class="page-head">
        <div class="row">
            <div class="col-sm-3">
                <a href="https://www.connectyourhome.com">

                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="brand" alt="Connect Your Home&reg;">
                </a>
            </div>
            <div class="col-md-8 col-md-offset-1 col-sm-offset-0 col-sm-9 double-row">
                <!-- /row -->
                <div class="row mbottom-sm-20" cf>
                    <div class="col-md-9 col-md-offset-3 col-sm-7 col-sm-offset-5">
                        <!-- BACKEND TODO: Dynamic Phone Number -->
                        <div class="phone">

                            <span class="phone-label">Order Now:</span>
                            <div itemscope itemtype="http://schema.org/Organization">
                                        <span itemprop="telephone">
                <?php
                if (get_field('edp_brand_phone')){ ?>
                                            <a href="tel:<?php echo get_field('edp_brand_phone', 'option'); ?>"
                                               onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header - YP');"
                                               class="phone-number btn btn-lg btn-success"><i
                                                        class="glyphicon glyphicon-earphone"></i>
                                                <?php
                                                echo get_field('edp_brand_phone');
                                                }elseif (get_field('phone_number_one_brand')){ ?><a
                                                        href="tel:<?php echo get_field('phone_number_one_brand'); ?>"
                                                        onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header - YP');"
                                                        class="phone-number btn btn-lg btn-success"><i
                                                            class="glyphicon glyphicon-earphone"></i>
                                                    <?php
                                                    echo get_field('phone_number_one_brand');
                                                    }elseif (get_field('brand_phone_number')){ ?><a
                                                            href="tel:<?php echo get_field('brand_phone_number'); ?>"
                                                            onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header - YP');"
                                                            class="phone-number btn btn-lg btn-success"><i
                                                                class="glyphicon glyphicon-earphone"></i>
                                                        <?php
                                                        echo get_field('brand_phone_number');
                                                        }else{ ?><a
                                                                href="tel:<?php echo get_field('home_phone_number', 'option'); ?>"
                                                                onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header - YP');"
                                                                class="phone-number btn btn-lg btn-success"><i
                                                                    class="glyphicon glyphicon-earphone"></i>
                                                            <?php
                                                            echo get_field('home_phone_number', 'option');
                                                            } ?>
                    </a>       
                                    </span>
                            </div>
                        </div>
                        <!-- /phone -->
                    </div>
                    <!-- col-md-5 col-md-offset-7 -->
                </div>
                <!-- /row -->
            </div>
            <div class="col-md-8 col-md-offset-2 header-cta">
                <div class="yp-header-cta text-center">
                    <?php the_field('header_cta'); ?>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-cyh" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <?php
                wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'depth' => 2,
                        'container' => 'div',
                        'container_class' => 'collapse navbar-collapse',
                        'container_id' => 'bs-example-navbar-collapse-1',
                        'menu_class' => 'nav navbar-nav',
                        'fallback_cb' => '\CYH\WpWalkers\BootstrapMenuWalker::fallback',
                        'walker' => new \CYH\WpWalkers\BootstrapMenuWalker())
                );
                ?>
            </div>
        </nav>
    </header>