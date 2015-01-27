
	<div id="pageBottom">

		<!--<div class="footer">Forlaget Hr. Ferdinand / Søbækvej 12 / DK-3060 Espergærde / tlf. 40 41 46 40 / tlf. 51 28 41 46</div>-->
		<div class="footer">Forlaget Hr. Ferdinand / Søbækvej 12 / DK-3060 Espergærde / CVR: 27262562 / tlf. 40 41 46 40 / tlf. 51 28 41 46</div>
	</div>

</div>





<div class="sideCol">

	<div class="nyhed_block" style="margin-bottom:16px;">
		<a href="http://hrferdinand.dk/boger/e-boger/">
			<div class="title_nyhed_block">
				NYHED!
			</div>
			<div class="planshet">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/img/img2.png" alt="" />
				<div class="this_planshet"></div>
			</div>
			<div class="text_nyhed_block">
			KØB DINE<br />
E-BØGER HER<br />
			</div>
		</a>
	</div>



<div class="bestsellers">
<div class="fb-like-box" data-href="https://www.facebook.com/forlaget.hrferdinand" data-width="205" data-show-faces="true" data-stream="false" data-header="true"></div>
</div>

<div class="newsBox">

	<h5>Seneste Nyheder</h5>

<?php query_posts('post_type=nyheder&showposts=3'); ?>
<?php while (have_posts()) : the_post(); ?>
	<div class="item">

		<div class="top">

			<div class="date">
				<span class="day"><?php the_time('j'); ?></span>
				<span class="month"><?php the_time('M'); ?></span>
				<span class="year"><?php the_time('Y'); ?></span>
			</div>

			<div class="name"><?php the_title(); ?></div>
			<div class="clearBoth"></div>

		</div>

		<div class="content">

			<p>
 <?php
if ( has_post_thumbnail() ) {

$domsxe = simplexml_load_string(get_the_post_thumbnail( ) );
$thumbnailsrc = $domsxe->attributes()->src;
?>
				<img src="<?php bloginfo('stylesheet_directory'); ?>/scripts/timthumb.php?src=<?php echo get_image_path( str_replace(get_bloginfo('url'), "", $thumbnailsrc) ); ?>&w=75&h=115" align="right" alt="<?php the_title(); ?>" style="border-width:0px;" />
<?php } ?>
				<?php echo custom_trim_excerpt(20); ?>

			</p>

			<a class="more" href="<?php the_permalink(); ?>">mere</a>

		</div>

	</div>
<?php endwhile;?>
<?php wp_reset_query(); ?>

</div>



</div>