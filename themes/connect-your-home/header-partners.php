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
  
/* CSS Document */

.tandc-hoverl {
    position: relative;
    z-index: 0;
}
.tandc-hover:a {
    color:#FFF;
    font-family:Arial, Helvetica, sans-serif;
    font-size:11px;
}
.tandc-hover:hover {
    background-color: transparent;
    z-index: 50;
}
.tandc-hover span { /*CSS for enlarged image*/
    position: absolute;
    padding: 5px;
    left: -1000px;
    border: 1px dashed gray;
    visibility: hidden;
    color: black;
    text-decoration: none;
}
.tandc-hover span img { /*CSS for enlarged image*/
    border-width: 0;
    padding: 2px;
}
.tandc-hover:hover span { /*CSS for enlarged image on hover*/
    visibility: visible;
    top: 50;
    left: 400px; /*position where enlarged image should offset horizontally */
}
body {
    margin: 0px;
    padding: 0px;
    background: url('<?php echo get_template_directory_uri(); ?>/images/body_bg.png');
    text-align: left;
}
@font-face {
    font-family: "Open Sans";
    src: url("OpenSans-Regular.eot?") format("eot"), url("OpenSans-Regular.woff") format("woff"), url("OpenSans-Regular.ttf") format("truetype"), url("OpenSans-Regular.svg#OpenSans") format("svg");
    font-weight: normal;
    font-style: normal;
}
#main {
    width: 990px;
    overflow: hidden;
    background: url('<?php echo get_template_directory_uri(); ?>/images/main_bg.png') repeat-x top left #fff;
    margin: 0 auto;
    padding: 0 19px;
}
#header {
    width: 956px;
    overflow: hidden;
}
.logo_outer {
    width: 100%;
    overflow: hidden;
}
#logo {
    display:table;
    overflow: hidden;
    float: right;
    margin-top: 1px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    text-align: right;
    font-weight: bold;
}
.logo_right {
    width: 680px;
    overflow: hidden;
    float: left;
}
#menu {
    width: 590px;
    overflow: hidden;
    height: 39px;
    float: left;
}
#menu ul {
    margin: 0px;
    padding: 0px 0px 0px 15px;
    list-style: none;
    float: left;
;
}
#menu ul li {
    font-family: "Open Sans";
    font-size: 11px;
    text-align: center;
    text-transform: uppercase;
    float: left;
    display: block;
    line-height: 39px;
    text-shadow: 0.1em 0.1em #333;
}
#menu ul li a {
    color: #FFFFFF;
    text-decoration: none;
    display: block;
    font-weight: bold;
    padding: 0px 20px 0px 20px;
}
#menu ul li a:hover {
    background: #f58023;
    display: block;
}
.top_logos {
    width: 525px;
    overflow: hidden;
    float: left;
    margin-top: 3px;
}
.top_logos img {
    float: left;
}
#alias_block {
    width: 950px;
    height: 75px;
}
#company-name {
    float: right;
    padding-left: 25px;
    padding-top: 5px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    width: 420px;
    height: 50px;
}
#center {
    margin:auto;
    width:100%;
    text-align:center;
    background-color:white;
    font-family: Arial, Helvetica, sans-serif;
}
#content {
    font-family: Arial, Helvetica, sans-serif;
}
#company-cta {
    color: #333;
    padding-left: 0px;
    padding-top: 0px;
    font-size: 11pt;
}
#company-alias {
    color: #333;
    padding-left: 0px;
    padding-top: 0px;
    font-size: 14pt;
}
.number {
    width: 490px;
    height: 50px;
    /*overflow: hidden;*/
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    text-align: left;
    font-weight: bold;
    float: left;
}
.callnow {
    float: left;
    vertical-align: bottom;
    text-align: left;
    width: 150px;
    height: 50px;
    font-size: 14pt;
    /* padding-top: 5px;*/
}
.callnow-span {
    color: #333;
    font-size: 36px;
}
.callnow-span-es {
    color: #333;
    font-size: 28px;
}

.form-callnow-span {
    color: #fff;
    font-size: 18px;
    font-family: Arial, Helvetica, sans-serif;
    padding-top:18px;
}


.phonenumber {
    float: left;
    color: #f58023;
    font-size: 50px;
    padding-right: 10px;
    width: 490px;
    letter-spacing: -1px;
}
.phonenumber-es {
    float: left;
    color: #f58023;
    font-size: 40px;
    padding-right: 10px;
    width: 490px;
    letter-spacing: -1px;
}
.promocode-cta {
    color: #fff;
    padding-left: 2px;
    width: 200px;
    font-family: Arial, Helvetica, sans-serif;
    float: left;
    font-weight: bold;
    font-size: 15px;
    text-align: left;
    border: 1px #333 solid;
    background-color: #333;
    display: block;
}
.promocode {
    color: #fff;
    font-size: 15px;
}
#container {
    width: 956px;
    overflow: hidden;
}
.banner_block {
    width: 100%;
//width:964;
    overflow: hidden;
//margin:20px 0px;
}
/*
.banner_left {
  width:950px;
  overflow:hidden;
  float:left;
  z-index:1;
}
*/

.banner_left {
    width: 573px;
    overflow: visible;
    float: left;
}
.form_block {
    width: 336px;
    height: 334px;
    overflow: hidden;
    float: right;
    background: url(http://cyhimages.com/edp_images/bg_form-4.png) no-repeat;
    /*margin-top:13px;*/
}
.form_block-es {
    margin-top:5px;
    width: 336px;
    height: 334px;
    overflow: hidden;
    float: right;
    background: url(http://cyhimages.com/edp_images/bg_form-4-es.png) no-repeat;
    /*margin-top:13px;*/
}
.form {
    width: 220px;
    overflow: hidden;
    margin: 0 auto;
    padding-top: 55px;
    padding-bottom: 30px;
}
form fieldset {
    border: none;
}
.form_replacement {
    width: 336px;
    height: 300px;
    overflow: hidden;
}
.tandc {
    font-size: 9px;
    color: #ffffff;
    font-family: Arial, Helvetica, sans-serif;
}
form.find-deals1 .text {
    color: #0183a7;
//font:11px/14px Arial, Helvetica, sans-serif;
    width: 220px;
    height: 12px;
    font-size: 12px;
    margin-bottom: 3px;
}
/*
form input[type=submit] {
  background: url(http://cyhimages.com/edp_images/btn-edp-quote.png) 0 0 no-repeat;
  border: none;
  width: 220px;
  height: 48px;
  text-indent: -3000em;
  cursor: pointer;
  margin-top: 6px;
}
form input[type=submit]:hover {
  background: url(http://cyhimages.com/edp_images/btn-edp-quote.png) 0 100% no-repeat;
}*/

form input[type=submit] {
    background: url(http://cyhimages.com/edp_images/btn-edp-call.png) 0 0 no-repeat;
    border: none;
    width: 220px;
    height: 30px;
    text-indent: -2900em;
    cursor: pointer;
    margin-top: 6px;
}
form input[type=submit]:hover {
    background: url(http://cyhimages.com/edp_images/btn-edp-call.png) 0 100% no-repeat;
    border: none;
}
a[href="EMAIL.html"], .email-me {
    display: none;
}
.provider {
    margin-bottom: 5px;
    width: 220px;
}
.promo_blockouter {
    width: 100%;
    overflow: hidden;
    margin-bottom: 50px;
}
.promo_block1 {
    width: 227px;
    overflow: hidden;
    float: left;
    margin-right: 5px;
}
.last {
    margin: 0px;
}
#footer {
    width: 946px;
    overflow: hidden;
    margin: 0 auto;
    background-color: #ffffff;
    padding: 25px;
    border-top: 3px solid #666;
}
.foter_text {
    font-family: "Open Sans";
    font-size: 10px;
    text-align: left;
    color: #3e3a3a;
}
.footer_menu {
    font-family: "Open Sans";
    font-size: 12px;
    text-align: left;
    font-weight: bold;
    color: #3e3a3a;
    text-transform: uppercase;
}
h3 {
    font-family: "Open Sans";
    font-size: 16px;
    margin: 0px;
    padding: 15px 0px 10px 0px;
}
.footer_menu a {
    color: #3e3a3a;
    text-decoration: none;
}
.footer_menu a:hover {
    text-decoration: none;
    color: #3e3a3a;
}
.hovCurs:hover{
    cursor: pointer;
}
input[type=checkbox] {
  /* Double-sized Checkboxes */
  -ms-transform: scale(.75); /* IE */
  -moz-transform: scale(.75); /* FF */
  -webkit-transform: scale(.75); /* Safari and Chrome */
  -o-transform: scale(.75); /* Opera */
  /*padding: 5px;*/
}

.btn {
    border-radius: 10px;
    color:white;
    font-size:12pt;
    background-color:#F3901D;
    height:45px;
    width: 125px;
}
.btn:hover {
    background-color:#f58023;
}

    </style>


</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5PL8LHN"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
 