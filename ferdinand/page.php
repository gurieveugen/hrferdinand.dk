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

<?php
global $post;
if($post->ID == 47)
{
		global $wpdb;
    	global $eshopoptions;
    	$checked = md5($_REQUEST['OrderID']);
		$orderdets=eshop_rtn_order_details($checked);
		echo "<div id='cartdetsref' style='display:none'>".nl2br($orderdets['cart'])."</div>";
?>
<script type="text/javascript">

//document.getElementById("orderno").innerHTML = "< ? php echo $_REQUEST['transact'];?>";
document.getElementById("custname").innerHTML = "<?php echo $orderdets['firstname'];?>";
//alert($("#custname").html());
document.getElementById("orderdate").innerHTML = "<?php echo $orderdets['date'];?>";
document.getElementById("cart").innerHTML = $("#cartdetsref").html();
</script>
<?php
//print_r($_REQUEST);
}
?>
<?php get_footer(); ?>	