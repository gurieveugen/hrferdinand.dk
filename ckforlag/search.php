<?php get_header(); ?>

<div class="pageItem">

<div class="text">			
				
			<div class="post">
		
<h2 class="search">Search Result for <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms"><em>"'); echo $key; _e('"</em></span>'); _e(' - '); echo $count . ' '; _e('articles'); wp_reset_query(); ?></h2>
				
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<h3 class="search"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
							
							<p><? excerpt('100'); ?></p>
							<?php endwhile; ?>
							<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
							
							<?php else : ?>
							<p><strong>Sorry, no pages matched your criteria.</strong></p>
							<?php endif; ?>
				
			</div>
					

		<div class="clearBoth" style="height: 15px;"></div>
<?php
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo '<a title="Tilbage" class="back" href='.$url.'>Tilbage</a>';
?>

	</div>

</div>

<?php get_template_part( 'sidebar', '' ); ?>

				
<?php get_footer(); ?>	