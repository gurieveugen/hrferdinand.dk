<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
<title><?php wp_title(''); ?></title>
<!-- META -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noodp" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/stylesheets/responsive.css" type="text/css" />
    <link rel="stylesheet" media="(max-width: 969px)" href="<?php bloginfo('stylesheet_directory'); ?>/stylesheets/sm.css" />
    <link rel="stylesheet" media="(max-width: 767px)" href="<?php bloginfo('stylesheet_directory'); ?>/stylesheets/xs.css" />


    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/javascripts/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/javascripts/jquery.tools.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/javascripts/jquery.waitforimages.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/javascripts/application.js"></script>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="pageTop">
<div class="wrapper container">
		<h1><a href="/" title="Hr. Ferdinand"><span>Hr. Ferdinand</span></a></h1>
		<div id="top-links">
	<a href="/ckforlag">&gt;&gt; C&K FORLAG</a>
	<a href="/donmax">&gt;&gt; DON MAX</a>
	<a href="/">&gt;&gt; HR. FERDINAND</a>
	</div>	
<form class="search" method="get" action="<?php bloginfo('home'); ?>">
	<input type="text" name="s" id="s"  class="text" value="" autocomplete="off" />
	<input type="submit" class="submit" value="søg" />
	<ul class="list-search-results"></ul>
	<img src="<?php bloginfo('stylesheet_directory'); ?>/stylesheets/images/ajax-loader.gif" alt="" class="loader">
	</form>
</div>
<div class="nav">
<div class="wrapper container">
<?php wp_nav_menu('container_class=&menu_class=&menu_id=top-nav'); ?>
<a href="#" id="btnMenu" class="btn-menu">Open/Close Menu</a>
</div>            
</div>
</div>
<?php if ( is_front_page() ) { ?>
	<div class="banner container">
	<?php

$rows = get_field('top_image', 'options');
$rows = array_filter($rows);
foreach( $rows as $key => $value ) {
    if( is_array( $value ) ) {
        foreach( $value as $key2 => $value2 ) {
            if( empty( $value2 ) ) 
                unset( $rows[ $key ][ $key2 ] );
        }
    }
    if( empty( $rows[ $key ] ) )
        unset( $rows[ $key ] );
}
$row_count = count($rows);
$i = rand(0, $row_count - 1);
if($rows[$i]['image'] != "")
{
 if(strstr($rows[$i]['image'],".swf"))
 {
 	?>
<a href="<?php echo $rows[$i]['link'];?>">
<object type="application/x-shockwave-flash" data="<?php echo $rows[$i]['image'];?>" width="940" height="201" allowScriptAccess="always"> 
    <param name="movie" value="<?php echo $rows[$i]['image'];?>" />
    <param name="quality" value="high" />
    </object>
</a>
<?php
 }else {
 	?>
	<a href="<?php echo $rows[$i]['link'];?>"><img title="glasslottet" src="<?php echo $rows[$i]['image'];?>" style="border-width:0px;" /></a>
	<?php } }?>
</div>
<?php } ?>
<?php if ( !is_front_page() ){ ?>
<div class="container">
	<div class="pageHeader">
	<?php if ( !is_category() ){ ?>
		<h2><?php the_title(); ?></h2>
		<?php } ?>
<?php if ( is_category() ){ ?>
		<h2><?php single_cat_title(); ?></h2>
		<?php } ?>
<?php if ( is_404() ){ ?>
		<h2>Not Found</h2>
		<?php } ?>
		<ul class="filter-cat">
			<li>Vis titler:</li>
			<li>
				<a href="#">A - E</a>
			</li>
			<li>
				<a href="#">F - J</a>
			</li>
			<li>
				<a href="#">K - Q</a>
			</li>
			<li>
				<a href="#">P - T</a>
			</li>
			<li>
				<a href="#">U - X</a>
			</li>
			<li>
				<a href="#">Y - A</a>
			</li>
		</ul>
	</div>
</div>
	<?php } ?>
			<div id="wrapper" class="container">
            <div id="pageContent">

            <div class="contentCol">  
