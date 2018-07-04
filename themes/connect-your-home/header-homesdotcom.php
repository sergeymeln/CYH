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
    .ui-corner-all{
        z-index: 10000;
        font-size: 10px;
    }

    body .fsBody .fsSectionHeader{
        background-color: #6CB33F;
        text-align: center;
        color: #fff;        
    }
    body .fsBody .fsForm h2.fsSectionHeading{
        color: #fff;        
    }
#nt-title li {
    font-size: 28px;
    color: #4E4E4E;
    white-space: nowrap;
    list-style: none;
    overflow: hidden;
    text-overflow: ellipsis;
}    
</style>





</head>
<body onload="submit()" <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5PL8LHN"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="container">
 <header class="page-head">
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php $logo = get_field('logo_img');?>
                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt'] ?>" />
                    </a>
                </div>  
                <div class="col-sm-3">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="brand cyh-logo" alt="Connect Your Home&reg;">
                    </a>
                </div>
                <div class="col-md-6 col-sm-offset-0 col-sm-9 double-row">
                    <div class="row top-search mbottom-sm-20">
                        <div class="col-md-12 col-sm-7 col-sm-offset-5 col-md-offset-0">
                            <form id="header-search" onsubmit="return false;">
                            <div class="form-holder">
                                    <input class="testing input address-autocomplete" type="form-control" name="search" id="address" placeholder="Enter address" style="padding:2px;width:70%; ">
                                <button class="btn btn-green search-button search-button-header" type="submit">Go!</button> 
                            </div>   
                            </form>
                        </div>
                    </div>
                    <div class="row mbottom-sm-20" cf>
                        <div class="">


                            <div class="phone">
                                <!-- <span class="phone-label">Order Now :</span> -->
                                    <div itemscope itemtype="http://schema.org/Organization">
                                        <span itemprop="telephone">
                                    <?php
                                    if(get_field('edp_brand_phone')){ ?>
                                        <a href="tel:<?php echo get_field('edp_brand_phone', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header');" class="phone-number btn btn-success btn-lg">
                                        <i class="glyphicon glyphicon-earphone"></i> 
                                        <?php echo get_field('edp_brand_phone');

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

                </div>              
            </div>
        </header>