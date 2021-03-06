<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php the_field('optimizely_script'); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msvalidate.01" content="9DDBB947C0850E3A05C7D2385EE2507E" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
    <meta name="google-site-verification" content="EFtzbtsY_0VcjlbC1YCbyftWw6hjWZjVqhqdnO1MeOQ" />

    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.1/themes/base/minified/jquery-ui.min.css" />
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
    <script src="<?php echo get_template_directory_uri(); ?>/javascripts/modernizr.min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/javascripts/detectizr.min.js" type="text/javascript"></script>
    <style type="text/css">
        .ui-corner-all{
            z-index: 10000;
            font-size: 10px;
        }

        .youtube {
            background-color: #000;
            margin-bottom: 30px;
            position: relative;
            padding-top: 56.25%;
            overflow: hidden;
            cursor: pointer;
            width: 100%;
        }
        .youtube img {
            width: 100%;
            top: -16.82%;
            left: 0;
            opacity: 0.7;
        }
        .youtube .play-button {
            height: 60px;
            background-color: #333;
            box-shadow: 0 0 30px rgba( 0,0,0,0.6 );
            z-index: 1;
            opacity: 0.8;
            border-radius: 6px;
        }
        .youtube .play-button:before {
            content: "";
            border-style: solid;
            border-width: 15px 0 15px 26.0px;
            border-color: transparent transparent transparent #fff;
        }
        .youtube img,
        .youtube .play-button {
            cursor: pointer;
        }
        .youtube img,
        .youtube iframe,
        .youtube .play-button,
        .youtube .play-button:before {
            position: absolute;
        }
        .youtube .play-button,
        .youtube .play-button:before {
            top: 50%;
            left: 50%;
            transform: translate3d( -50%, -50%, 0 );
        }
        .youtube iframe {
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
        }
    </style>
    <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="cecad52f-6122-4c18-b7a4-697dfa84d210" type="text/javascript" async></script>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5PL8LHN"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header class="page-head">
    <div class="container">

    </div>
</header>