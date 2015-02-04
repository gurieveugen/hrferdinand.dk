<?php
/*
Template Name: Books
*/
?>

<?php get_header(); ?>
<?php 

$filter     = new Filter($_GET);
$posts      = $filter->getPosts();
$pagination = $filter->getPagination(); 
?>
<?php $a=1; foreach ($posts as $p):  ?>
	<div class="item <?php if ( $a == 2 ) { echo ' alt'; $a=0; } ?>">
	
 <?php 
if ( has_post_thumbnail($p->ID) ) 
{
	$domsxe = simplexml_load_string(get_the_post_thumbnail($p->ID) );
	$thumbnailsrc = $domsxe->attributes()->src;
	$thumbnailsrc = get_image_path($thumbnailsrc);
?>
		<div class="image">
			<img alt="<?php echo get_the_title( $p->ID ); ?>" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/timthumb.php?src=<?php echo str_replace(get_bloginfo('url'), "", $thumbnailsrc); ?>&w=151&h=226" />
		</div>
<?php } ?>

		<div class="content">

			<h5 class="title"><?php echo get_field('forfattere', $p->ID); ?>: <span><a href="<?php echo get_permalink($p->ID); ?>"><?php echo get_the_title( $p->ID ); ?></a></span></h5>

			<div class="text">

				<p><?php echo $p->post_excerpt; ?></p>				

				<a class="more" href="<?php echo get_permalink($p->ID); ?>">mere</a>

			</div>

		</div>

		<div class="clearBoth"></div>

	</div>
<?php $a++; endforeach;?>

<div class="clear"></div>
<?php 
echo $pagination;
?>

	
<?php get_template_part( 'sidebar', '' ); ?>
				
<?php get_footer(); ?>