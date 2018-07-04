<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">   
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="msvalidate.01" content="9DDBB947C0850E3A05C7D2385EE2507E" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
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
    
    header.page-head .phone .phone-number,  .phone .phone-number.btn.btn-lg.btn-success{
        background-color: #<?php the_field('main_color'); ?> !important;
        color: #fff !important;
    }
    header.page-head{
            border-top: 4px solid #<?php the_field('main_color'); ?>;
    }
    
    .phone h3.phone-number{
        color: #ec1944 ;
    }


.btn-success {
    color: #fff;
    background-color: #<?php the_field('main_color'); ?>;
    border-color: #<?php the_field('main_color'); ?>;
    background-image: -webkit-linear-gradient(top,#<?php the_field('main_color'); ?>,#<?php the_field('main_color'); ?> 100%);
    background-image: -o-linear-gradient(top,#<?php the_field('main_color'); ?> 0,#<?php the_field('main_color'); ?> 100%);
    background-image: -webkit-gradient(linear,left top,left bottom,from(#<?php the_field('main_color'); ?>),to(#<?php the_field('main_color'); ?>));
    background-image: linear-gradient(to bottom,#<?php the_field('main_color'); ?>,#<?php the_field('main_color'); ?> 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#<?php the_field('main_color'); ?>', endColorstr=#<?php the_field('main_color'); ?>, GradientType=0);
    filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
    background-repeat: repeat-x;
    border-color: #<?php the_field('main_color'); ?>;
}


</style>

<style type="text/css">
.pbord .price-box {
    /*float: right;*/
    /*width: 193px;*/
}    
.price {
    text-indent: 0;
    color: #CC0000;
    /*padding-top: 16px;*/
    font-size: 43px;
    position: relative;
}
.price {
    text-indent: 0;
    color: #CC0000;
    /*padding-top: 16px;*/
    font-size: 33px;
    position: relative;
}
.price {
    float: left;
    width: 100px;
    height: 45px;
    right: 20px;
    /*text-indent: -9999px;*/
    /*overflow: hidden;*/
}
.price .tens {
    font-size: 20px;
    position: absolute;
    right: 0px;
    top: -4px;
}
.price .month {
    font-size: 20px;
    border-top: 2px solid #CC0000;
    position: absolute;
    bottom: 12px;
    line-height: 19px;
    right: -3px;
    padding-top: 1px;
    top: 20px;
}

.duration{
    font-size: 16px;
    white-space: 1px;    
    display: inline-block;
}
ul, ol {
    margin-top: 0;
    margin-bottom: 11px;
    padding-left: 30px;
    list-style: inherit;
}

.beginning{
    font-size: 17px;
    position: absolute;
    top: -30px;    
}

.price{
    top: 30px;
}

.offer-price{
    margin-bottom: 100px;    
    float: right;
}

</style>

</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5PL8LHN"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php $brand_logo = get_field('brand_logo'); ?>
<div class="container">
 <header class="page-head">
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">

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
                if(get_field('edp_brand_phone')){ ?>
                    <a href="tel:<?php echo get_field('edp_brand_phone', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header - YP');" class="phone-number btn btn-lg btn-success"><i class="glyphicon glyphicon-earphone"></i> 
                    <?php
                        echo get_field('edp_brand_phone');
                }elseif(get_field('phone_number_one_brand')){ ?><a href="tel:<?php echo get_field('phone_number_one_brand');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header - YP');" class="phone-number btn btn-lg btn-success"><i class="glyphicon glyphicon-earphone"></i> 
                <?php
                        echo get_field('phone_number_one_brand');
                }elseif(get_field('brand_phone_number')){ ?><a href="tel:<?php echo get_field('brand_phone_number');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header - YP');" class="phone-number btn btn-lg btn-success"><i class="glyphicon glyphicon-earphone"></i> 
                <?php
                        echo get_field('brand_phone_number');
                }else{ ?><a href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header - YP');" class="phone-number btn btn-lg btn-success"><i class="glyphicon glyphicon-earphone"></i> 
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
        </header>