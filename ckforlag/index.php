<?php get_header(); ?>

				<?php while (have_posts()) : the_post(); ?>
		
			<div class="post">
				<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="meta">
							Posted: <?php the_time('F n, Y'); ?>
				</div>
				
				<p><?php the_excerpt(); ?><br><a class="more" href="<?php the_permalink(); ?>">Read More...</a></p> 
				
				
			</div>
			<div class="clear"></div>
			
		<?php endwhile;?>
		
		<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
				
<?php get_footer(); ?>
