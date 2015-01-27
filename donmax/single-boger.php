<?php get_header(); ?>
<div class="pageItem">
    <div class="text">		
        <div id="book"> 
      <?php if ( has_post_thumbnail() ):  ?>
 <?php 
  $domsxe = simplexml_load_string(get_the_post_thumbnail( ) );
  $thumbnailsrc = $domsxe->attributes()->src;
 ?>	
            <div class="image">		
               <img alt="<?php the_title(); ?>" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/timthumb.php?src=<?php echo get_image_path( str_replace(get_bloginfo('url'), "", $thumbnailsrc) ); ?>&w=151&h=226" />
            </div>
                
            <?php endif; ?>	
			
			<?php if ( get_field('ebook_link') ) { ?><a class="book-link" href="<?php the_field('ebook_link'); ?>">KØB E-BOGEN HER!</a><?php } ?>
            
        </div>
        <?php while (have_posts()) : the_post(); ?>
          <div class="post">	
            <?php the_content()?>		
          </div>
       <?php endwhile;?> 
       <?php comments_template( '', true ); ?>
	<div class="clearBoth" style="height: 15px;"></div>
        <?php  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  echo '<a title="Tilbage" class="back" href='.$url.'>Tilbage</a>';?>
       </div>
</div>
<?php get_template_part( 'sidebar', '' ); ?>
<?php get_footer(); ?>