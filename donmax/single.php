<?php get_header(); ?>

				<?php while (have_posts()) : the_post(); ?>
				
			<div class="post">
			
				<div class="meta">
							Posted: <?php the_time('F n, Y'); ?>
				</div>
				
				<?php the_content(); ?>
				<div class="clear"></div>
				
			</div>
					
				<?php endwhile;?>
				
<?php get_footer(); ?>	