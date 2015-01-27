<?php
/*
Template Name: Poster
*/
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$customfield = get_post_custom($post_id);
?>

<style type="text/css">
body {
	padding: 0px;
	margin: 0px;
}
.image-thumb {
	position: fixed;
	background-color: #333333;
	opacity:0.8;
	filter:alpha(opacity=80); /* For IE8 and earlier */
	padding: 5px 0px;
	width: 100%;
	top: 0px;
	left: 0px;
	text-align: center;
}
.image-thumb a, img{
	opacity:1;
	filter:alpha(opacity=100); /* For IE8 and earlier */
}
</style>
<div style="text-align:center"><a href="<?php echo $customfield["buynowbtnurl"][0]; ?>" class="image-fav"><img src="<?php echo $feat_image;?>" width="50%" /></a></div>
<div class="image-thumb">
  <a href="<?php echo $customfield["buynowbtnurl"][0]; ?>" class="image-fav"><img src="<?php bloginfo('template_directory'); ?>/img/buynowbtn.png"></a>
</div>
</style>