<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
<title><?php wp_title(''); ?></title>
<!-- META -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noodp" />
    <!-- CSS -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, projection" />

    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/javascripts/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/javascripts/jquery.tools.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/javascripts/jquery.waitforimages.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/javascripts/application.js"></script>

    <?php wp_head(); ?>
</head>
<body>
<div id="pageTop">
<div class="wrapper">
		<h1><a href="/" title="Hr. Ferdinand"><span>Hr. Ferdinand</span></a></h1>
		<div id="top-links">
	<a href="/ckforlag">>> C&K FORLAG</a>
	<a href="/donmax">>> DON MAX</a>
	<a href="/">>> HR. FERDINAND</a>
	</div>	
<form class="search" method="get" action="<?php bloginfo('home'); ?>">
	<input type="text" name="s" id="s"  class="text" value="" autocomplete="off" />
	<input type="submit" class="submit" value="søg" />
	<ul class="list-search-results">
	</ul>
	</form>
</div>
<div class="nav">
<div class="wrapper">
<?php wp_nav_menu('container_class=&menu_class=&menu_id=top-nav'); ?>

</div>            
</div>
</div>
<div class="clear"></div>
<?php if ( is_front_page() ) { ?>
	<div class="banner">
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

	</div>
	<?php } ?>
			<div id="wrapper">
            <div id="pageContent">                				

            <div class="contentCol">  
