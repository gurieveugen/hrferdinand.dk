<?php
/*
Template Name: DanDomainPay
*/
?>
<!DOCTYPE html>
<html>
<head>
<title><?php wp_title(''); ?></title>

<!-- META -->
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="noodp" />

<!-- CSS -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, projection" />
<!-- JAVASCRIPT -->  
<?php //wp_head(); ?>
</head>
<body>
<style type="text/css">

@import "reset.css";
body {
    background: url("images/bg.png") repeat-x scroll 0 0 #CDD5D8;
    border-top: 3px solid #383B3D;
    color: #000000;
    font: 62.5% arial,verdana,sans-serif;
}
html {
    height: 100%;
}
body {
    height: 100%;
    margin: 0;
    padding: 0;
    width: 100%;
}
#wrapper {
    margin: 0 auto;
    padding: 0;
    width: 948px;
}
.left {
    float: left;
}
.right {
    float: right;
}
.clear, .clearBoth {
    clear: both;
}
strong {
    font-weight: bold;
}
h1 span, h2 span, h3 span, h4 span, h5 span, h6 span {
    display: none;
}
h1 {
    color: #000000;
    font-size: 1em;
    margin: 0px;
}
h2 {
    color: #000000;
    font-size: 1em;
}
h3 {
    color: #000000;
    font-size: 1em;
}
h4 {
    color: #000000;
    font-size: 1em;
}
h5 {
    color: #000000;
    font-size: 1em;
}
.red {
    color: red;
}
.small {
    font-size: 1em;
}
.medium {
    font-size: 1.2em;
}
.large {
    font-size: 1.4em;
}
.caption {
    border-top: 1px solid #CCCCCC;
    color: #777777;
    font-size: 1em;
    margin-top: 3px;
    padding-top: 3px;
    text-align: right;
}
.number {
    text-align: right;
}
.center {
    text-align: center;
}
a:link {
    color: #000000;
    text-decoration: none;
}
a:visited {
    color: #000000;
    text-decoration: none;
}
a:hover {
    color: #000000;
    text-decoration: underline;
}
a:active {
    color: #000000;
    text-decoration: none;
}
#wrapper {
}
#pageTop {
    background: none repeat scroll 0 0 #383B3D;
    height: 204px;
    margin: 0 0 20px;
    position: relative;
    width: 100%;
}
#pageTop .wrapper {
    margin: 0 auto;
    position: relative;
    width: 940px;
}
#pageTop .nav {
    background: none repeat scroll 0 0 #771717;
    bottom: 0;
    height: 40px;
    left: 0;
    position: absolute;
    width: 100%;
}
#pageTop .nav LI {
    float: left;
    line-height: 40px;
    margin: 0 0 0 20px;
}
#pageTop .nav LI A {
    color: #FFFFFF;
    font-size: 14px;
    text-decoration: none;
    text-transform: uppercase;
}
.banner {
    height: 200px;
    margin: 0 auto 20px;
    width: 940px;
}
.banner IMG {
    display: block;
}
#pageTop H1 A {
    background: url("<?php echo get_bloginfo('template_url'); ?>/stylesheets/images/logo.png") no-repeat scroll 0 0 transparent;
    display: block;
    height: 72px;
    left: 0;
    outline: medium none;
    position: absolute;
    text-indent: -999999px;
    top: 69px;
    width: 299px;
}
#subscribe-link {
    color: #FFFFFF;
    display: inline-block;
    font-size: 14px;
    position: absolute;
    right: 0;
    text-decoration: none;
    top: 140px;
    z-index: 100;
}
#top-links {
    display: inline-block;
    font-size: 12px;
    position: absolute;
    right: 0;
    top: 30px;
}
#top-links A {
    color: #FFFFFF;
    display: block;
    margin: 0 0 5px;
    text-decoration: none;
    text-transform: uppercase;
}
#pageTop .search {
    margin: 0;
    padding: 0;
    position: absolute;
    right: 0;
    top: 170px;
    width: 220px;
    z-index: 100;
}
#pageTop .search input.text {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 0 none;
    float: left;
    font-size: 1.4em;
    height: 26px;
    line-height: 26px;
    margin: 0;
    padding: 0 5px;
    width: 160px;
}
#pageTop .search input.submit {
    background: none repeat scroll 0 0 #CBD0D3;
    border: 0 none;
    color: #000000;
    float: right;
    font-size: 1.4em;
    font-weight: bold;
    height: 26px;
    line-height: 26px;
    margin: 0;
    padding: 0;
    text-align: center;
    text-transform: uppercase;
    width: 40px;
}
#pageTop .lower {
    background: url("images/env_bottom.png") no-repeat scroll right top transparent;
    padding-bottom: 5px;
}
#pageTop .lower .subnav {
    background: url("images/nav_bg.png") no-repeat scroll right top #383B3D;
    height: 40px;
    margin: 0;
    padding: 0;
    width: 940px;
}
#pageTop .lower .subnav ul {
}
#pageTop .lower .subnav ul li {
    float: left;
    margin: 0 0 0 30px;
    padding: 12px 0 0;
}
#pageTop .lower .subnav ul li h4 {
}
#pageTop .lower .subnav ul li h4 a {
    color: #BAC2C4;
    font-size: 1.1em;
    margin: 0;
    padding: 0;
}
#pageTop .lower .subnav ul li.selected h4 a {
    color: #FFFFFF;
    font-weight: bold;
}
#pageTop .banner {
    overflow: hidden;
    width: 940px;
}
#pageTop .banner a {
    border: 0 none;
}
#pageTop .banner img {
    border: 0 none;
}
.pageHeader {
    background: #333333;
    height: 50px;
    margin: -20px auto 20px;
    padding: 20px 35px 0;
    position: relative;
    width: 870px;
}
.pageHeader.down {
    margin: 40px auto 25px;
}
.pageHeader h2 {
    color: #FFFFFF;
    font-size: 2.4em;
    font-weight: bold;
    margin: 0;
    padding: 0;
    text-transform: uppercase;
}
#pageContent {
    margin: 0;
    padding: 0;
    width: 948px;
}
#pageContent .contentCol {
    float: left;
    margin: 0 7px 0 0;
    padding: 0 0 15px;
    width: 688px;
}
#pageContent .sideCol {
    float: left;
    margin: -8px 0 0;
    padding: 0;
    width: 253px;
}
#pageContent .contentCol .item {
    height: 278px;
    margin: 0 0 7px;
    width: 688px;
}
#pageContent .contentCol .item .image {
    background: none repeat scroll 0 0 #FFFFFF;
    float: left;
    height: 226px;
    margin: 4px 11px 4px 4px;
    overflow: hidden;
    padding: 22px;
    text-align: center;
    width: 151px;
}
#pageContent .contentCol .item .image IMG {
    display: block;
    height: 226px;
    width: 151px;
}
#pageContent .contentCol .item .content {
    background: none repeat scroll 0 0 #FFFFFF;
    float: left;
    height: 230px;
    margin: 4px;
    overflow: hidden;
    padding: 20px;
    width: 430px;
}
#pageContent .contentCol .item .content h5 {
    color: #383B3D;
    font-size: 1.8em;
    font-weight: bold;
    margin: 5px 5px 10px;
    padding: 0;
}
#pageContent .contentCol .item .content h5 span {
    color: #8E0000;
    display: inline;
    margin: 0;
    padding: 0;
}
#pageContent .contentCol .item .content h5 span a {
    color: #8E0000;
}
#pageContent .contentCol .item .content .text {
    border-top: 1px dashed #888A8B;
    color: #383B3D;
    font-family: georgia,verdana,arial;
    font-size: 1.2em;
    line-height: 1.3em;
    margin: 0;
    padding: 10px 5px;
}
#pageContent .contentCol .item .content .text p {
    margin-bottom: 10px;
}
#pageContent .contentCol .item .content a.more {
    background: url("images/more_arrow_bg.png") no-repeat scroll left 6px transparent;
    color: #383B3D;
    font-size: 1.2em;
    font-weight: bold;
    margin: 0;
    padding: 0 0 0 10px;
}
#pageContent .contentCol .alt .image {
    float: right;
    margin: 4px;
}
#pageContent .contentCol .alt .content {
    float: left;
    margin: 4px 11px 4px 4px;
}
#pageContent .contentCol .pageItem {
    margin: 0 0 7px;
    width: 688px;
}
#pageContent .contentCol .pageItem .text {
    background: none repeat scroll 0 0 #FFFFFF;
    color: #383B3D;
    font-family: arial,verdana,sans-serif;
    font-size: 1.2em;
    line-height: 1.4em;
    margin: 4px;
    min-height: 230px;
    padding: 50px;
    width: 580px;
}
* html #pageContent .contentCol .pageItem .text {
    height: 230px;
}
#pageContent .contentCol .pageItem .text p {
    margin-bottom: 15px;
}
#pageContent .contentCol .pageItem .text ol {
}
#pageContent .contentCol .pageItem .text ul {
}
#pageContent .contentCol .pageItem .text img {
    margin: 0 0 10px 10px;
}
#pageContent .contentCol .pageItem .text a {
    color: #8E0000;
}
#pageContent .contentCol .pageItem .text a.back {
    background: url("images/back_arrow_bg.png") no-repeat scroll left 4px transparent;
    color: #383B3D;
    font-weight: bold;
    margin: 0;
    padding: 0 0 0 10px;
}
#pageContent .sideCol .banner {
    background: none repeat scroll 0 0 #8E0000;
    margin: 4px;
    padding: 0;
    width: 245px;
}
#pageContent .sideCol .newsBox {
    background: none repeat scroll 0 0 #E0E5E6;
    margin: 4px;
    padding: 20px;
    width: 205px;
}
#pageContent .sideCol .newsBox h5 {
    color: #383B3D;
    font-family: Georgia,Verdana,Arial;
    font-size: 1.3em;
    font-weight: bold;
    margin: 0 0 5px;
    padding: 0;
    text-transform: uppercase;
}
#pageContent .sideCol .newsBox .item {
    margin: 20px 0 0;
}
#pageContent .sideCol .newsBox .item .top {
    height: 64px;
    margin: 0 0 5px;
    overflow: hidden;
}
#pageContent .sideCol .newsBox .item .top .date {
    background: url("images/news_date_bg.png") no-repeat scroll 0 0 transparent;
    float: left;
    height: 64px;
    margin: 0;
    padding: 0 3px;
    width: 45px;
}
#pageContent .sideCol .newsBox .item .top .date span.day {
    color: #8E0000;
    display: block;
    font-family: Georgia,Verdana,Arial;
    font-size: 2.6em;
    font-weight: bold;
    margin: 0;
    padding: 0;
    text-align: center;
}
#pageContent .sideCol .newsBox .item .top .date span.month {
    color: #929292;
    display: block;
    font-family: Georgia,Verdana,Arial;
    font-size: 1.1em;
    margin: 0;
    padding: 0;
    text-align: center;
    text-transform: uppercase;
}
#pageContent .sideCol .newsBox .item .top .date span.year {
    color: #929292;
    display: block;
    font-family: Georgia,Verdana,Arial;
    font-size: 1em;
    margin: 0;
    padding: 0;
    text-align: center;
    text-transform: uppercase;
}
#pageContent .sideCol .newsBox .item .top .name {
    color: #181818;
    float: left;
    font-size: 1.2em;
    font-weight: bold;
    margin: 0;
    padding: 5px;
    width: 144px;
}
#pageContent .sideCol .newsBox .item .content {
    margin: 0;
    padding: 0;
}
#pageContent .sideCol .newsBox .item .content p {
    color: #454545;
    font-family: Georgia,Verdana,Arial;
    font-size: 1.2em;
    margin: 0 0 5px;
}
#pageContent .sideCol .newsBox .item .content p img {
    margin: 0 0 5px 10px;
}
#pageContent .sideCol .newsBox .item .content a.more {
    background: url("images/more_arrow_bg2.png") no-repeat scroll left 4px transparent;
    color: #383B3D;
    font-size: 1.2em;
    font-weight: bold;
    margin: 0;
    padding: 0 0 0 10px;
}
#pageContent .sideCol .bestsellers {
    background: none repeat scroll 0 0 #E0E5E6;
    margin: 4px 4px 15px;
    padding: 20px;
    width: 205px;
}
#pageContent .sideCol .bestsellers h5 {
    color: #383B3D;
    font-family: Georgia,Verdana,Arial;
    font-size: 1.3em;
    font-weight: bold;
    margin: 0 0 10px;
    padding: 0;
    text-transform: uppercase;
}
#pageContent .sideCol .bestsellers .item {
    margin: 8px 0;
}
#pageContent .sideCol .bestsellers .item .image {
    float: left;
    margin: 0 5px 0 0;
    padding: 0;
    width: 30px;
}
#pageContent .sideCol .bestsellers .item .text {
    float: left;
    margin: 0;
    padding: 4px 0 0;
    width: 170px;
}
#pageContent .sideCol .bestsellers .item .text span.author {
    color: #040404;
    display: block;
    font-family: Georgia,Arial,Verdana;
    font-size: 1.1em;
    font-weight: bold;
    margin: 0;
    padding: 0;
}
#pageContent .sideCol .bestsellers .item .text span.name {
    color: #8E0000;
    font-family: Georgia,Arial,Verdana;
    font-size: 1.1em;
    font-weight: bold;
    margin: 0;
    padding: 0;
}
#pageBottom {
    margin: 0 4px;
    padding: 4px 0 0;
    width: 680px;
}
#pageBottom .footer {
    background: none repeat scroll 0 0 #383B3D;
    color: #A2A9AC;
    font-size: 1.2em;
    font-weight: bold;
    height: 38px;
    margin: 0;
    padding: 22px 0 0;
    text-align: center;
    width: 680px;
}
.archive {
    width: 100%;
}
.archive th {
    padding: 0 10px 0 0;
}
.archive td {
    padding: 2px 10px 2px 0;
}
.archive .row {
}
.archive .altrow {
    background: none repeat scroll 0 0 #E3E3E3;
}
.archive .row td {
}
.archive .altrow td {
}
.archive .pager td {
    padding: 0;
    text-align: center;
}
.bestsellers .text {
    text-decoration: none !important;
}
.pageItem {
    position: relative;
}
#book {
    float: right;
    margin: 0 0 0 10px;
    width: 166px;
}
.addtocart {
    float: right;
    padding: 0 !important;
    width: 161px;
}
.addtocart LEGEND {
    display: none;
}
.shop-link {
    color: #FFFFFF !important;
    display: inline-block;
    font-size: 16px;
    position: absolute;
    right: 20px;
    top: 25px;
}
.list_of_book {
    margin: 4px 0 0 4px;
}
.list_of_book ul li {
    background: none repeat scroll 0 0 #FFFFFF;
    float: left;
    height: 175px;
    list-style-type: none;
    margin: 0 14px 14px 0;
    position: relative;
    width: 217px;
}
.list_of_book ul {
    margin: 0;
    overflow: hidden;
    padding: 0;
    width: 693px;
}
.wrap_img {
    margin: 12px 0 0 6px;
}
.wrap_img img {
    display: block;
}
.about_book {
    float: right;
    margin-right: 10px;
    width: 113px;
}
.name_book {
    font: 16px Verdana,Arial;
    margin-top: 14px;
}
.name_artist {
    font: 10px Verdana,Arial;
}
.about_book p {
    color: #898989;
    font: 12px Georgia,Arial;
    height: 45px;
    margin: 8px 0;
    overflow: hidden;
}
.price_book {
    bottom: 40px;
    font: 10px Georgia,Arial;
    left: 94px;
    position: absolute;
}
.way_to_book {
    background: none repeat scroll 0 0 #8E0000;
    border-radius: 3px 3px 3px 3px;
    bottom: 7px;
    float: right;
    position: absolute;
    right: 10px;
}
.way_to_book a {
    color: white;
}
.nyhed_block {
    background: none repeat scroll 0 0 #E0E5E6;
    margin-left: 4px;
    margin-top: 12px;
    position: relative;
    width: 245px;
}
.nyhed_block a {
    text-decoration: none;
}
.nyhed_block a div {
    text-decoration: none;
}
.nyhed_block a:after {
    clear: both;
    content: ".";
    display: block;
    font-size: 0;
    height: 0;
    line-height: 0;
    overflow: hidden;
}
.nyhed_block:after {
    clear: both;
    content: ".";
    display: block;
    font-size: 0;
    height: 0;
    line-height: 0;
    overflow: hidden;
}
.title_nyhed_block {
    background: url("images/nyhed_bg.png") no-repeat scroll 0 0 transparent;
    color: #FFFFFF;
    font-size: 16px;
    height: 30px;
    position: absolute;
    right: -12px;
    text-align: center;
    top: -10px;
    width: 103px;
}
.planshet {
    float: left;
    height: 105px;
    margin: 23px 0 0 15px;
    position: relative;
    width: 61px;
}
.this_planshet {
    background: url("images/planshet.png") no-repeat scroll 0 0 transparent;
    height: 105px;
    left: -6px;
    position: absolute;
    top: -12px;
    width: 63px;
}
.text_nyhed_block {
    float: left;
    font: 19px Verdana;
    margin-top: 23px;
    text-decoration: none;
    width: 167px;
}
.way_to_book input {
    background: none repeat scroll 0 0 transparent;
    border: 0 none;
    color: white;
}
.block_rating {
    float: left;
}
.stars {
    height: 16px;
    margin: 13px 0 0 5px;
    position: relative;
    width: 81px;
}
.grey_stars {
    background: url("images/gray.png") no-repeat scroll 0 0 transparent;
    height: 100%;
    width: 100%;
}
.yellow_stars {
    background: url("images/yellow.png") no-repeat scroll 0 0 transparent;
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
}
html body .text_comments h3 {
    font-size: 1.4em;
    font-weight: bold;
    margin: 15px 0;
    padding: 0;
}
.name_user_comment {
    color: #040404;
    display: block;
    font-family: Georgia,Arial,Verdana;
    font-size: 1.1em;
    margin: 0;
    padding: 0;
}
.this_text_comment {
    border-top: 1px dashed #888A8B;
    color: #383B3D;
    font-family: georgia,verdana,arial;
    font-size: 1.2em;
    line-height: 1.3em;
    margin: 0;
    padding: 5px;
}
.time_of_birth {
    color: #898989;
    font: 11px Arial;
    margin: 5px 0;
    overflow: hidden;
}
.comments {
    margin: 50px 0 0;
}
.one_commnents {
    margin: 0 0 20px;
}
.add_name {
    margin: 15px 0;
}
.add_name input {
    display: block;
    margin: 5px 0 0;
    padding: 8px 0;
    text-indent: 2%;
    width: 100%;
}
.add_email input {
    display: block;
    margin: 2px 0 0;
    padding: 8px 0;
    text-indent: 2%;
    width: 100%;
}
.add_email {
    margin: 0 0 15px;
}
.red_star {
    color: red;
}
.add_comments h3 {
    font-size: 1.4em;
    font-weight: bold;
    margin: 15px 0;
    padding: 0;
}
.textarea textarea {
    display: block;
    height: 200px;
    margin: 5px 0 0;
    padding: 8px 0;
    resize: none;
    text-indent: 2%;
    width: 100%;
}
.button_add input {
    background-color: #AAAAAA;
    border: 0 none;
    border-radius: 4px 4px 4px 4px;
    clear: both;
    color: #FFFFFF;
    cursor: pointer;
    display: inline-block;
    font-size: 15px;
    font-weight: bold;
    height: 32px;
    line-height: 32px;
    margin: 0 5px 10px 0;
    padding: 0 22px;
    text-align: center;
    text-decoration: none;
    vertical-align: top;
    white-space: nowrap;
    width: auto;
}
.button_add input:hover {
    background-color: #777777;
}
.button_add {
    margin: 25px 0 0;
}
.kapcha {
    margin: 15px 0 0;
}
.img_kode {
    display: inline-block;
    vertical-align: middle;
}
.enter_to_code {
    display: inline-block;
    vertical-align: middle;
}
.kapcha h3 {
    font-size: 1.4em;
    font-weight: bold;
    margin: 15px 0;
    padding: 0;
}
.img_kode {
    border: 1px solid #969590;
    margin: 0 15px 0 0;
}
html body .img_kode img {
    display: block;
    margin: 0 !important;
}
.enter_to_code input {
    margin: 4px 0 0;
}
.submit_block {
    display: none;
}
html body .click_function {
}
.click_function:hover {
    text-decoration: none;
}
.image .kk-star-ratings.lft {
    float: none;
    margin: 0 auto;
}
.postscast {
    display: inline-block;
    left: 85px;
    position: absolute;
    top: 0;
}
.kk-star-ratings {
    position: relative;
}
.meta {
    font-size: 11px;
    padding: 0 0 0 5px;
}
.post .meta {
    font-size: 12px;
    font-weight: bold;
    margin: 0 0 15px;
    padding: 0;
}

</style>
<div id="pageTop">
<div class="wrapper">
  <h1><a href="/" title="Hr. Ferdinand"><span>Hr. Ferdinand</span></a></h1>
</div>
</div>
<div class="clear"></div>
<div class="pageHeader">
    <h2>DIN BETALNING</h2>
</div>
<div id="wrapper">
<div id="pageContent">
<div class="contentCol">  
<div class="pageItem">
<div class="text">            
  <div class="post">
      <p>
        <?php
//print_r($_REQUEST);
$SessionID = $_REQUEST['OrderID'];
if(isset($SessionID)) {
  session_id($SessionID); // Hvis session id er defineret, kan den bruges
}

session_start();

$sAmount = $_SESSION["Amountp"];
$sAmount = number_format($sAmount, 2, ',', ''); //"Amount as string". Decimal separator, brug ","


$bDebug = text; // Skal sættes til false ved normal brug. Hvis den er true. Bruges kun i testmode.


$sOKStatusUrl = "http://hrferdinand.dk/indkobskurv/thank-you/?eshopaction=dandomainipn";
$sFailStatusUrl = "http://hrferdinand.dk/indkobskurv/thank-you/?eshopaction=dandomainipn";
$sOKURL = "http://".getenv("SERVER_NAME")."/indkobskurv/thank-you/"; // Returnere hvis indbetalingen gik godt
$sFAILURL = "http://".getenv("SERVER_NAME")."/indkobskurv/cancelled-order/"; // Returnere hvis inbetalingen fejlede

// Hvis De vil have kreditkort logoer med på indtasningssiden, samt stylesheet

//$sTunnelURI = "https://pay.dandomain.dk/securetunnel-bin.asp?url="; //Secure tunnel - is prepended all external URIs
//$sLogoDankort = "http://www.deres-domain.dk/images/icon_dankort.gif"; 
//$sLogoVISA = "http://www.deres-domain.dk/images/icon_visa.gif";
//$sLogoMastercard = "http://www.deres-domain.dk/images/icon_mastercard.gif";
//$sLogoCart = "http://www.deres-domain.dk/images/cart_big.gif";
//$sStylesheet = "http://www.deres-domæne.dk/styles.css"; Evt. brug af stylesheet
// Hent evt. logoer på www.betaling.dk



$sInputType = "hidden"; // Standard input felter sættes "hidden"
if($bDebug) {
  $sInputType = "hidden"; // Text felter sættes til "Text" ved test
}


?>  <?php
    //echo "<pre>";
    //print_r($_SESSION);
    //echo "</pre>";
    ?>
    <form method="post" action="https://pay.dandomain.dk/securecapture.asp">
      <? if ($bDebug) { ?>
        <input type="<?php echo  $sInputType ?>" name="TestMode" value="1" /> <!-- Bruges i Test mode. Husk manuelt at tilrettet Merchantnr. til 1234567 -->
      <? } ?>
         <!-- CurrentcyID vælger hvilken valuta der handles med -->     
      <input type="<?php echo  $sInputType ?>" name="CurrencyID" title="CurrencyID" value="208">
      <input type="<?php echo  $sInputType ?>" name="MerchantNumber" title="MerchantNumber" value="<?php echo $_SESSION["merchantnumber"]; ?>" >
      <input type="<?php echo  $sInputType ?>" name="OrderID" title="OrderID" value="<?php echo  $_SESSION["Orderid"] ?>" >
      <input type="<?php echo  $sInputType ?>" name="Amount" title="Amount" value="<?php echo  $sAmount ?>" >
      <input type="<?php echo  $sInputType ?>" name="OKURL" title="OKURL" value="<?php echo  $sOKURL ?>" >
      <input type="<?php echo  $sInputType ?>" name="FAILURL" title="FAILURL" value="<?php echo  $sFAILURL ?>" > 
      <input type="<?php echo  $sInputType ?>" name="OKStatusUrl" title="OKStatusUrl" value="<?php echo  $sOKStatusUrl ?>" > 
      <input type="<?php echo  $sInputType ?>" name="FailStatusUrl" title="FailStatusUrl" value="<?php echo  $sFailStatusUrl ?>" > 
      <input type="<?php echo  $sInputType ?>" name="SessionId" title="SessionId" value="<?php print session_id(); ?>" > 
      <p>
        I alt trækkes DKK <strong><?php echo  $sAmount ?></strong> på nedenstående kort.
      </p>
      <p>
        Indtast kort nummer, udløbsdato, og kontrolkode (CVC):<br />
        <input class="textboxgray" type="text" name="CardNumber" maxlength="30" />
        <select name="ExpireMonth" class="textboxgray"  style="width: 40px;">
          <?
            for($month = 1; $month < 13; $month++) { 
              echo '<option value="'.$month.'">'.sprintf("%02u",$month).'</option>'; 
            }
          ?>
        </select>
        <select name="ExpireYear" class="textboxgray" style="width: 40px;">
          <?
            $thisyear = strftime("%y");
            for($year = $thisyear; $year < ($thisyear + 12); $year++) {
              echo '<option value="'.$year.'">'.sprintf("%02u",$year).'</option>';
            }
          ?>
        </select>
        <input class="textboxgray" type="text" name="CardCVC" maxlength="3" style="width:40px;" />
      </p>
      <p>
        <input type="submit" value="Fortsæt &raquo;" />
      </p>
    </form>

      </p>  
    </div>
    <div class="clearBoth" style="height: 15px;"></div>
  </div>
</div>
  <div id="pageBottom">
    <!--<div class="footer">Forlaget Hr. Ferdinand / Søbækvej 12 / DK-3060 Espergærde / tlf. 40 41 46 40 / tlf. 51 28 41 46</div>-->
    <div class="footer">Forlaget Hr. Ferdinand / Søbækvej 12 / DK-3060 Espergærde / CVR: 27262562 / tlf. 40 41 46 40 / tlf. 51 28 41 46</div>
  </div>
</div>
<div class="sideCol">
  <div style="margin-bottom:16px;" class="nyhed_block">
      <div style="padding:10px; font-size:15px;">
      Sikker betalning med DanDomain<br/>
      <div style="margin:0px auto; width:180px; margin-top:10px;"><img src="<?php echo get_bloginfo('template_url'); ?>/img/dandomain.jpg" /></div>
      </div>
  </div>
</div>
<div class="clearBoth"></div>
</div> <!-- /pageContent -->
</div> <!-- /wrapper -->
</body>
</html> 