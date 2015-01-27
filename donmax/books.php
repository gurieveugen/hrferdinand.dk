<?php
/*
Template Name: Books
*/
?>

<?php get_header(); ?>

<?php $page = (get_query_var('page')) ? get_query_var('page') : 1; query_posts('post_type=boger&posts_per_page=5&paged='.$paged); ?>

<?php $a=1; while (have_posts()) : the_post(); ?>
	<div class="item <?php if ( $a == 2 ) { echo ' alt'; $a=0; } ?>">

 <?php 
if ( has_post_thumbnail() ) {

$domsxe = simplexml_load_string(get_the_post_thumbnail( ) );
$thumbnailsrc = $domsxe->attributes()->src;
?>
		<div class="image">

			
			<a href="<?php the_permalink() ?>"><img alt="<?php the_title(); ?>" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/timthumb.php?src=<?php echo get_image_path( str_replace(get_bloginfo('url'), "", $thumbnailsrc) ); ?>&w=151&h=226" /></a>

		</div>
<?php } ?>

		<div class="content">

			<h5 class="title"><?php the_field('forfattere'); ?>: <span><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></span></h5>

			<div class="text">

				<p><?php the_excerpt(); ?></p>				

				<a class="more" href="<?php the_permalink() ?>">mere</a>

			</div>

		</div>

		<div class="clearBoth"></div>

	</div>
<?php $a++; endwhile;?>

<div class="clear"></div>
<?php if(function_exists('wp_paginate')) { wp_paginate(); } ?>

	
<?php get_template_part( 'sidebar', '' ); ?>
				
<?php get_footer(); ?>	