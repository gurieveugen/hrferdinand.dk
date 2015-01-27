<?php get_header(); ?>

<div class="pageItem">

<div class="text">

				<?php while (have_posts()) : the_post(); ?>
				
			<div class="post">
		
				<?php the_content(); ?>
				
			</div>
					
				<?php endwhile;?>
		<div class="clearBoth" style="height: 15px;"></div>
<?php
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo '<a title="Tilbage" class="back" href='.$url.'>Tilbage</a>';
?>

	</div>

</div>

<?php get_template_part( 'sidebar', '' ); ?>

				
<?php get_footer(); ?>	