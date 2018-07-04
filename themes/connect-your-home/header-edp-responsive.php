<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">   
<meta name="viewport" content="width=device-width, initial-scale=1">
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
/*!
 * Bootstrap v3.3.6 (http://getbootstrap.com)
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */
/*! normalize.css v3.0.3 | MIT License | github.com/necolas/normalize.css */

/* Template-specific stuff
 *
 * Customizations just for the template; these are not necessary for anything
 * with disabling the responsiveness.
 */
body,
.navbar-fixed-top,
.navbar-fixed-bottom {
  /*max-width: 970px;*/
}

/* Don't let the lead text change font-size. */
.lead {
  font-size: 16px;
}

/* Finesse the page header spacing */
.page-header {
  margin-bottom: 30px;
}

.page-header .lead {
  margin-bottom: 10px;
}

/* Non-responsive overrides
 *
 * Utilize the following CSS to disable the responsive-ness of the container,
 * grid system, and navbar.
 */
/* Reset the container */
.container {
  max-width: 970px;
  /*max-width: none !important;*/
}

/* Demonstrate the grids */
.container .navbar-header,
.container .navbar-collapse {
  margin-right: 0;
  margin-left: 0;
}

/* Always float the navbar header */
.navbar-header {
  float: left;
}

/* Undo the collapsing navbar */
.navbar-collapse {
  display: block !important;
  height: auto !important;
  padding-bottom: 0;
  overflow: visible !important;
  visibility: visible !important;
}

.navbar-toggle {
  display: none;
}

.navbar-collapse {
  border-top: 0;
}

.navbar-brand {
  margin-left: -15px;
}

/* Always apply the floated nav */
.navbar-nav {
  float: left;
  margin: 0;
}

.navbar-nav > li {
  float: left;
}

.navbar-nav > li > a {
  padding: 15px;
}

/* Redeclare since we override the float above */
.navbar-nav.navbar-right {
  float: right;
}

/* Undo custom dropdowns */
.navbar .navbar-nav .open .dropdown-menu {
  position: absolute;
  float: left;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.15);
  border-width: 0 1px 1px;
  border-radius: 0 0 4px 4px;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
}

.navbar-default .navbar-nav .open .dropdown-menu > li > a {
  color: #333;
}

.navbar .navbar-nav .open .dropdown-menu > li > a:hover,
.navbar .navbar-nav .open .dropdown-menu > li > a:focus,
.navbar .navbar-nav .open .dropdown-menu > .active > a,
.navbar .navbar-nav .open .dropdown-menu > .active > a:hover,
.navbar .navbar-nav .open .dropdown-menu > .active > a:focus {
  color: #fff !important;
  background-color: #428bca !important;
}

.navbar .navbar-nav .open .dropdown-menu > .disabled > a,
.navbar .navbar-nav .open .dropdown-menu > .disabled > a:hover,
.navbar .navbar-nav .open .dropdown-menu > .disabled > a:focus {
  color: #999 !important;
  background-color: transparent !important;
}

/* Undo form expansion */
.navbar-form {
  float: left;
  width: auto;
  padding-top: 0;
  padding-bottom: 0;
  margin-right: 0;
  margin-left: 0;
  border: 0;
  box-shadow: none;
}

/* Copy-pasted from forms.less since we mixin the .form-inline styles. */
.navbar-form .form-group {
  display: inline-block;
  margin-bottom: 0;
  vertical-align: middle;
}

.navbar-form .form-control {
  display: inline-block;
  width: auto;
  vertical-align: middle;
}

.navbar-form .form-control-static {
  display: inline-block;
}

.navbar-form .input-group {
  display: inline-table;
  vertical-align: middle;
}

.navbar-form .input-group .input-group-addon,
.navbar-form .input-group .input-group-btn,
.navbar-form .input-group .form-control {
  width: auto;
}

.navbar-form .input-group > .form-control {
  width: 100%;
}

.navbar-form .control-label {
  margin-bottom: 0;
  vertical-align: middle;
}

.navbar-form .radio,
.navbar-form .checkbox {
  display: inline-block;
  margin-top: 0;
  margin-bottom: 0;
  vertical-align: middle;
}

.navbar-form .radio label,
.navbar-form .checkbox label {
  padding-left: 0;
}

.navbar-form .radio input[type="radio"],
.navbar-form .checkbox input[type="checkbox"] {
  position: relative;
  margin-left: 0;
}

.navbar-form .has-feedback .form-control-feedback {
  top: 0;
}

/* Undo inline form compaction on small screens */
.form-inline .form-group {
  display: inline-block;
  margin-bottom: 0;
  vertical-align: middle;
}

.form-inline .form-control {
  display: inline-block;
  width: auto;
  vertical-align: middle;
}

.form-inline .form-control-static {
  display: inline-block;
}

.form-inline .input-group {
  display: inline-table;
  vertical-align: middle;
}

.form-inline .input-group .input-group-addon,
.form-inline .input-group .input-group-btn,
.form-inline .input-group .form-control {
  width: auto;
}

.form-inline .input-group > .form-control {
  width: 100%;
}

.form-inline .control-label {
  margin-bottom: 0;
  vertical-align: middle;
}

.form-inline .radio,
.form-inline .checkbox {
  display: inline-block;
  margin-top: 0;
  margin-bottom: 0;
  vertical-align: middle;
}

.form-inline .radio label,
.form-inline .checkbox label {
  padding-left: 0;
}

.form-inline .radio input[type="radio"],
.form-inline .checkbox input[type="checkbox"] {
  position: relative;
  margin-left: 0;
}

.form-inline .has-feedback .form-control-feedback {
  top: 0;
}

@font-face {
  font-family: 'gotham_boldregular';
  src: url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-bold-webfont.eot");
  src: url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-bold-webfont.eot?#iefix") format("embedded-opentype"), url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-bold-webfont.woff") format("woff"), url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-bold-webfont.ttf") format("truetype"), url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-bold-webfont.svg#gotham_boldregular") format("svg");
  font-weight: normal;
  font-style: normal;
}

@font-face {
  font-family: 'gotham_blackregular';
  src: url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-black-webfont.eot");
  src: url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-black-webfont.eot?#iefix") format("embedded-opentype"), url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-black-webfont.woff2") format("woff2"), url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-black-webfont.woff") format("woff"), url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-black-webfont.ttf") format("truetype"), url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-black-webfont.svg#gotham_blackregular") format("svg");
  font-weight: normal;
  font-style: normal;
}

@font-face {
  font-family: 'gotham_bookregular';
  src: url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-book.eot");
  src: url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-book.eot?#iefix") format("embedded-opentype"), url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-book.woff") format("woff"), url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-book.ttf") format("truetype"), url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-book.svg#gotham_bookregular") format("svg");
  font-weight: normal;
  font-style: normal;
}

@font-face {
  font-family: 'gotham_bookitalic';
  src: url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-bookitalic.eot");
  src: url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-bookitalic.eot?#iefix") format("embedded-opentype"), url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-bookitalic.woff") format("woff"), url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-bookitalic.ttf") format("truetype"), url("<?php echo get_template_directory_uri(); ?>/fonts/gotham-bookitalic.svg#gotham_bookitalic") format("svg");
  font-weight: normal;
  font-style: normal;
}

/*!
 * IE10 viewport hack for Surface/desktop Windows 8 bug
 * Copyright 2014-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */
/*
 * See the Getting Started docs for more information:
 * http://getbootstrap.com/getting-started/#support-ie10-width
 */
@-webkit-viewport {
  width: device-width;
}

@-moz-viewport {
  width: device-width;
}

@-ms-viewport {
  width: device-width;
}

@viewport {
  width: device-width;
}

* {
  box-sizing: border-box;
}

*:before,
*:after {
  box-sizing: border-box;
}

body {
  font-family: 'gotham_bookregular';
}

body h1,
body h2,
body h4,
body h5,
body h6 {
  font-family: gotham_boldregular;
}

body p a {
  font-family: gotham_boldregular;
}

h1 {
  font-size: 44px;
}

h3 {
  font-size: 28px;
}

h4 {
  font-size: 24px;
}

header {
  padding: 25px 19px 0;
}

header img {
  max-width: 100%;
  height: auto;
}

header .phone {
  text-align: right;
  position: relative;
  right: -25px;
}

header .phone .phone-lbl {
  color: #333132;
  font-size: 20px;
  font-family: gotham_boldregular;
  padding-right: 4px;
  position: relative;
  top: 3px;
}

header .phone .phone-no {
  color: #ff9933;
  font-size: 44px;
  font-family: sans-serif;
  font-weight: 700;
}

header h3 {
  font-size: 21px;
  color: #6CB33F;
  font-family: gotham_boldregular;
  font-weight: 500;
}

.masthead {
  position: relative;
}

.masthead img {
  max-width: 100%;
  height: auto;
}

.masthead .mast-form {
  position: absolute;
  right: 22px;
  top: 5px;
  width: 296px;
}

.mast-form {
  background: #fff;
}

.mast-form .form-head {
  background: #333132;
  color: #fff;
  text-align: center;
  padding: 7px 0 2px;
  margin-bottom: 5px;
}

.mast-form .form-head h3 {
  font-size: 24px;
  margin: 0;
  padding: 0;
  font-family: gotham_boldregular;
}

.mast-form p {
  font-size: 12px;
  padding: 0;
  margin: 0;
  position: relative;
  top: -3px;
}

.mast-form .form-foot {
  background: #7d7d7d;
  color: #fff;
  text-align: center;
  margin-top: 12px;
  padding: 3px 0;
}

.mast-form .form-foot p {
  font-size: 15px;
  text-transform: uppercase;
  font-family: gotham_boldregular;
}

.mast-form input[type='text'],
.mast-form input[type='email'],
.mast-form input[type='tel']{
  width: 272px;
  display: block;
  border-radius: 4px;
  margin: 0 auto 6px;
}

.mast-form input[name="terms"] {
  margin-left: 12px;
}

.mast-form label[for="terms"] {
  font-size: 8px;
}

.mast-form label[for="terms"] a {
  color: #6CB33F;
}

.mast-form label[for="terms"] .btn.btn-orange {
  padding: 3px 2px;
  float: right;
  margin-right: 12px;
}

.brands {
  text-align: center;
  margin-top: 30px;
}

.logos-top{
    margin-top: 30px;
    margin-bottom: 25px;	
}

.brands .logos-top img,
.brands .logos-bottom img {
  display: inline-block;
}

.brands .row.logos-top img {
  margin: 0 30px 20px;
}

.brands .row.logos-bottom img {
  margin: 0 30px 0;
}

.phone-block {
  text-align: right;
  padding-right: 34px;
  margin-top: 7px;
  background: url('<?php echo get_template_directory_uri(); ?>/images/phone2.png') no-repeat 45px center;
}

.phone-block .phone-no {
  color: #ff9933;
  font-size: 35px;
  font-family: sans-serif;
  font-weight: 700;
  letter-spacing: 2px;
}

.phone-block .phone-lbl {
  font-size: 26px;
  padding-right: 15px;
  letter-spacing: -1px;
}

.brand-grid {
  border: 1px solid #c0c1c3;
  position: relative;
  margin-top: 18px;
  display: block;
}

.brand-grid > .brand-cta-row > .brand-cta {
/*  width: 33.3%;
  display: inline-block;
  text-align: center;
  border-right: 5px solid #c0c1c3;
  height: 117px;
  float: left;
  position: relative;*/
}

.brand-grid > .brand-cta-row > .brand-cta:last-child {
  border-right: 0;
}

.brand-grid > .brand-cta-row > .brand-cta img {
  margin-bottom: 5px;
  width: auto;
  width: initial;
  max-height: 36px;
}

.brand-grid > .brand-cta-row > .brand-cta p {
  font-size: 11px;
  font-weight: 700;
  padding: 0 15px;
}

.brand-grid > .brand-cta-row > .brand-cta .inner {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -41%);
  -ms-transform: translate(-50%, -41%);
  transform: translate(-50%, -41%);
  width: 275px;
}
.inner p {
	line-height: 1.42857143;
}

.brand-grid > .brand-cta-row .brand-cta {
  /*border-bottom: 5px solid #c0c1c3;*/
  text-align: center;
}

.brand-grid .grid-badge {
  position: absolute;
  right: 256px;
  top: 82px;
}

.package-row {
  margin-top: 41px;
}

.package-row > .packages {
  display: inline-block;
  width: 33%;
  margin-right: 4px;
  border-bottom: 4px solid #6CB33F;
  border-top: 1px solid #6CB33F;
  border-left: 1px solid #6CB33F;
  border-right: 1px solid #6CB33F;
  float: left;
  height: 120px;
}

.package-row > .packages:last-child {
  margin-right: 0;
  float: right;
}

.package-row > .packages:last-child .btn.btn-orange {
  top: 19px;
}

.package-row > .packages h3 {
  text-transform: uppercase;
  color: #6CB33F;
  text-align: center;
  font-family: gotham_boldregular;
  margin-top: 5px;
}

.package-row > .packages .left {
  float: left;
  display: inline-block;
  position: relative;
}

.package-row > .packages .right {
  float: right;
  display: inline-block;
}

.package-row > .packages .btn.btn-orange {
  position: relative;
  left: -11px;
  width: 93px;
  top: 11px;
}

.package-row .green-bg {
  background: #6CB33F;
}

.package-row .green-bg h3 {
  color: #fff;
  font-size: 21px;
}

.price-strap {
  font-size: 16px;
  position: absolute;
  width: 160px;
}

.price {
  font-size: 57px;
  position: absolute;
  width: 225px;
  font-family: gotham_boldregular;
}

.price .currency {
  font-size: 40px;
  position: absolute;
  top: -5px;
}

.price .digits {
  font-size: 39px;
  top: -12px;
  position: relative;
}

.price .month {
  font-size: 14px;
  position: absolute;
}

.price-1 {
  top: -11px;
  padding-left: 56px;
}

.price-1 .price-strap {
  left: 65px;
  top: -4px;
}

.price-1 .currency {
  top: 8px;
  left: 29px;
}

.price-1 .month {
  bottom: 13px;
  left: 130px;
}

.price-2 {
  padding-left: 44px;
  top: -11px;
}

.price-2 .price-strap {
  left: 24px;
  top: -4px;
}

.price-2 .currency {
  top: 6px;
  left: 15px;
}

.price-2 .month {
  bottom: 13px;
  left: 138px;
}

.price-3 {
  padding-left: 40px;
  color: #fff;
}

.price-3 .price-strap {
  left: 25px;
  top: -6px;
}

.price-3 .currency {
  left: 12px;
  top: 5px;
}

.price-3 .month {
  left: 136px;
  bottom: 15px;
}

.steps {
  display: block;
  background: url('<?php echo get_template_directory_uri(); ?>/images/step-bg.png') no-repeat center center;
  background-size: 100%;
  margin-top: 42px;
  position: relative;
  height: 118px;
}

.steps .step-1 {
  position: absolute;
  right: 50px;
  top: 25px;
}

.steps .step-2 {
  position: absolute;
  right: 359px;
  top: 25px;
}

.steps h3 {
  font-family: gotham_boldregular;
  color: #6CB33F;
  position: relative;
  width: 293px;
  text-align: center;
  font-size: 22px;
  line-height: 22px;
  top: 35px;
}

.btn-orange {
  background: #ff9933;
  color: #fff;
  padding: 0 9px;
  border-radius: 0;
  font-size: 16px;
  text-transform: uppercase;
  line-height: 19px;
  font-family: gotham_boldregular;
}

.btn-orange {
  background: #ff9933;
  color: #fff;
  padding: 0 9px;
  border-radius: 0;
  font-size: 16px;
  text-transform: uppercase;
  line-height: 19px;
  font-family: gotham_boldregular;
}

footer {
  background: #e9e9e9;
  text-align: center;
  padding: 20px 0 0;
  margin-top: 45px;
}

footer .copyright {
  font-size: 10px;
}

footer .fine {
  font-size: 8px;
}


.edp-brand-image{
	max-width: 50%;
}

.edp-brand-image-link{
	text-align: center;
    display: inherit;
}
.brand-grid .grid-badge {
	position: absolute;
    right: 0px;
    top: 82px;
    left: 593px;
    width: inherit;
    height: 81px;
}

.steps p{
	font-size: 14px;
  line-height: 1.42857143;
}
.step-holder {
  display: none;
}

@media only screen and (max-width: 980px) {
  .steps-hide{
    display: none;
  }  
  .stack-steps{
    position: absolute;
    right: 30px;
    top: 20px;
    z-index: 100;
    text-align: right;
  }
.step-holder {
    display: block;
    width: 350px;
    margin: auto;  
}

.step-banner1{
  position: relative;
}
.step-banner2{
  position: relative;
}
.step-banner3{
  position: relative;
}

.phone .phone-number.edp-number{
      font-size: 30px;
}

header img{
    max-width: 250px;  
}

}
.edp-head{
  text-align: center;
}



    </style>


</head>
<body <?php body_class(); ?> style="overflow-x: hidden;">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5PL8LHN"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="container">
<!--main start-->
<!-- <div id="main"> -->
<header>
        <div class="row">
            <div class="col-md-4 edp-head">
                <img class="brand" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Connect Your Home&reg;">
            </div>
            <!-- /.col-xs-3 -->
            <div class="col-md-7 col-md-offset-1 col-sm-12">
                <div class="phone"><span class="phone-lbl">Call Now To Order:</span><span class="phone-no">
                                    <div itemscope itemtype="http://schema.org/Organization">
                                        <span itemprop="telephone">

<!-- dynamic phone number via url params -->                <?php
                if(get_field('edp_brand_phone')){ ?>
                    <a href="tel:<?php echo get_field('edp_brand_phone');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header - EDP Responsive');" class="btn btn-lg btn-success phone-number edp-number">
                        <i class="glyphicon glyphicon-earphone"></i> 
                    <?php
                        echo get_field('edp_brand_phone');
                }elseif(get_field('phone_number_one_brand')){ ?><a href="tel:<?php echo get_field('phone_number_one_brand');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header - EDP Responsive');" class="btn btn-lg btn-success phone-number edp-number">
                        <i class="glyphicon glyphicon-earphone"></i> 
                <?php
                        echo get_field('phone_number_one_brand');
                }else{ ?><a href="tel:<?php echo get_field('home_phone_number', 'option');?>" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Header - EDP Responsive');" class="btn btn-lg btn-success phone-number edp-number">
                        <i class="glyphicon glyphicon-earphone"></i> 
                <?php
                        echo get_field('home_phone_number', 'option');
                } ?>
                    </a>
                                    </span>
                                </div>    
                </span></div>
            </div>
            <!-- /.col-xs-4 col-xs-offset-4 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                   
                    <h3><?php
                        echo get_field('edp_tagline');
                 ?></h3>

                            </div>
            <!-- /.col-xs-12 -->
        </div>
        <!-- /.row -->
    </header>