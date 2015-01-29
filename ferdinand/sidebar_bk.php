
	<div id="pageBottom">

		<!--<div class="footer">Forlaget Hr. Ferdinand / Søbækvej 12 / DK-3060 Espergærde / tlf. 40 41 46 40 / tlf. 51 28 41 46</div>-->
		<div class="footer">Forlaget Hr. Ferdinand / Søbækvej 12 / DK-3060 Espergærde / CVR: 27262562 / tlf. 40 41 46 40 / tlf. 51 28 41 46</div>

	</div>

</div>





<div class="sideCol">

	<div class="nyhed_block" style="margin-bottom:16px;">
		<a href="<?php echo site_url('/boger/e-boger/'); ?>">
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
		<h5>INDKØBSKURV</h5>
		<ul>
	<?php
	global $blog_id;
	$total = 0;
	$pct = 0;
	$caertitemsforsidebar = $_SESSION['eshopcart'.$blog_id];
	foreach ($caertitemsforsidebar as $rows) {
		//print_r($row);
		$total += $rows["qty"] * $rows["price"];
		echo "<li>".$rows["qty"]." x <a href='".get_permalink($rows["postid"])."'>".$rows["pname"]."</a></li>";
		$pct++;
	}
	if($pct > 0)
	{
	echo "<li style='text-align: right;border-top: #cccccc solid 1px;margin-top: 5px;padding: 5px;font-size: 14px;'>DKK ".sprintf( __('%1$s%2$s','eshop'), $currsymbol, number_format_i18n($total,__('2','eshop')))."</li>";
	 //eshop_widget('Shopping Cart') ?>
	</ul>
	 <a href="<?php echo get_permalink(45);?>">Gå till kassen</a>
	 <?php }else {
	 	?>
	 	Din indkøbskurv er tom
	 	<?php
	 } ?>
	</div>
	<div class="bestsellers">

		<h5>BESTSELLERLISTEN</h5>

<?php $a=1; while(the_repeater_field('best_seller','options')): ?>

<?php $post = get_sub_field('book'); ?>
<?php $arr = get_post_meta($post -> ID, 'forfattere'); ?>

		<div class="item">

 <?php
if ( has_post_thumbnail( $post -> ID ) ) {

$domsxe = simplexml_load_string(get_the_post_thumbnail( $post -> ID ) );
$thumbnailsrc = $domsxe->attributes()->src;
?>
			<div class="image">

				<img src="<?php bloginfo('stylesheet_directory'); ?>/scripts/timthumb.php?src=<?php echo str_replace(get_bloginfo('url'), "", $thumbnailsrc); ?>&w=26&h=38" alt="<?php echo $arr[0]; ?>: <?php echo $post -> post_title; ?>" style="height:38px;width:26px;border-width:0px;" />

			</div>
<?php } ?>


			<a class="text" href="<?php echo get_permalink( $post -> ID ); ?>">

				<span class="author"><?php echo $a; ?>. <?php echo $arr[0]; ?></span>

				<span class="name"> <?php echo $post -> post_title; ?></span>

			</a>

			<div class="clearBoth"></div>

		</div>
<?php $a++; endwhile; ?>


	</div>

<div class="bestsellers">
<div class="fb-like-box" data-href="https://www.facebook.com/forlaget.hrferdinand" data-width="205" data-show-faces="true" data-stream="false" data-header="true"></div>
</div>




</div>