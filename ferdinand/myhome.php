<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<?php query_posts('post_type=boger&category_name=featured&showposts=6'); ?>

<?php $a=1; while (have_posts()) : the_post(); ?>
	<div class="item <?php if ( $a == 2 ) { echo ' alt'; $a=0; } ?>">

 <?php 
if ( has_post_thumbnail() ) {

$domsxe = simplexml_load_string(get_the_post_thumbnail( ) );
$thumbnailsrc = $domsxe->attributes()->src;
?>
		<div class="image">

			
			<img alt="<?php the_title(); ?>" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/timthumb.php?src=<?php echo str_replace(get_bloginfo('url'), "", $thumbnailsrc); ?>&w=151&h=226" />

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

	
<?php get_template_part( 'sidebar', '' ); ?>
				
<?php get_footer(); ?>	