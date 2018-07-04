<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">   
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="msvalidate.01" content="9DDBB947C0850E3A05C7D2385EE2507E" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<meta name="google-site-verification" content="EFtzbtsY_0VcjlbC1YCbyftWw6hjWZjVqhqdnO1MeOQ" />
<link rel="stylesheet" href="https://code.jquery.com/ui/1.9.1/themes/base/minified/jquery-ui.min.css" />
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
.btn-success{
    background-color: #ec1944;
    background-image: none;
    border-color: #B81494;
}
.btn-success:hover{
    background-color: #B81494;
    background-image: none;
    color: #000;
}

.deal-title{
    background-color: #ec1944;
}
.sub-title h4 {
    text-decoration: none !important;
    color: #ec1944;
}
.learn-more-button{
    background-color: #ec1944;
}

a {
    color: #ec1944;
}
footer {
    background-color: #ec1944;
}

.border-styler {
    border-top: 4px solid #B81494;
    padding-top: 25px;
}
header.page-head {
    border-top: 4px solid #B81494;
    padding: 15px 15px 0 15px;
    /*margin-top: 45px;*/
}
.phone .phone-number {
    color: #fff;
    display: block;
    /* font-size: 2.33em; */
    white-space: nowrap;
    margin-bottom: 20px;
    font-size: 50px;
}
.disclaimer{
    margin-top:20px;
    margin-bottom:30px;
}

.abv-fold-feature-cell p{
    line-height: 16px;
}
.price {
    text-indent: 0;
    color: #000;
    padding-top: 16px;
    font-size: 113px;
    position: relative;
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
                    <a href="#"><img src="<?php the_field('affiliate_logo'); ?>" class="brand" alt="Connect Your Home&reg;"></a>
                </div>
                <div class="col-md-8 col-md-offset-1 col-sm-offset-0 col-sm-9 double-row">
                    <div class="row top-search mbottom-sm-20">
                        <div class="col-md-12 col-sm-7 col-sm-offset-5 col-md-offset-0">

                        </div>
                    </div>
                    <div class="row mbottom-sm-20" cf>
                        <div class="col-md-9 col-md-offset-3 col-sm-7 col-sm-offset-5">


                            <div class="phone">
                                <span class="phone-label">Call Now To Order:</span>
                                    <div itemscope itemtype="http://schema.org/Organization">
                                        <span itemprop="telephone">
                                    <?php
                                    if(get_field('affiliate_phone')){ ?>
                                        <a href="tel:<?php echo get_field('affiliate_phone');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="phone-number btn btn-success btn-lg">
                                        <i class="glyphicon glyphicon-earphone"></i> 
                                        <?php echo get_field('affiliate_phone');

                                    }elseif(get_field('phone_number_one_brand')){ ?><a href="tel:<?php echo get_field('phone_number_one_brand');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="phone-number btn btn-success btn-lg">
                                    <i class="glyphicon glyphicon-earphone"></i> 
                                    <?php echo get_field('phone_number_one_brand');

                                    }else{ ?><a href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="phone-number btn btn-success btn-lg">
                                    <i class="glyphicon glyphicon-earphone"></i> 
                                    <?php echo get_field('home_phone_number', 'option');
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
            </div>
        </header>