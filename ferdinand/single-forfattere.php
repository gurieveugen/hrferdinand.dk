<?php get_header(); ?>
<?php
function get_short_text($text, $attr=array('length'=>140, 'dotted'=>'...'))
{

  $text=strip_tags($text);

  $encode='utf-8';

  if(empty($attr['dotted']))
  {
            $attr['dotted']='...';
  }

  if(mb_strlen($text, $encode)<=$attr['length'])
  {
          return $text;
  }

  $text1=$text;

  $text=mb_substr($text, 0, $attr['length'], $encode);

  $text_p=mb_strrpos($text, ' ', 0, $encode);

  if($text_p!==false)
  {
         $text=mb_substr($text, 0, $text_p);
  }

  if(mb_strlen($text, $encode)<mb_strlen($text1, $encode))
  {
            $text.=' '.$attr['dotted'];
  }

  return $text;

}

function eshop_boing2($pee='',$short='yes',$postid='',$isshortcode='n'){

  global $wpdb,$post,$eshopchk,$eshopoptions;

  if($postid=='') {$postid=$post->ID;}

  $stkav=get_post_meta( $postid, '_eshop_stock',true);

          $eshop_product=maybe_unserialize(get_post_meta( $postid, '_eshop_product',true ));

  $saleclass='';

  if(isset($eshop_product['sale']) && $eshop_product['sale']=='yes'){

    $saleclass=' sale';

  }

    $stocktable=$wpdb->prefix ."eshop_stock";

    $uniq=rand();



  //if the search page we don't want the form!

  //was (!strpos($pee, '[eshop_addtocart'))

    //need to precheck stock

    if($postid!=''){

      if(isset($eshopoptions['stock_control']) && 'yes' == $eshopoptions['stock_control']){

        $anystk=false;

        $stkq=$wpdb->get_results("SELECT option_id, available from $stocktable where post_id=$postid");

        foreach($stkq as $thisstk){

          $stkarr[$thisstk->option_id]=$thisstk->available;

        }

        $opt=$eshopoptions['options_num'];

        for($i=1;$i<=$opt;$i++){

          $currst=0;

          if(isset($stkarr[$i]) && $stkarr[$i]>0) $currst=$stkarr[$i];

          if($currst>0){

            $anystk=true;

            $i=$opt;

          }

        }

        if($anystk==false){

          $stkav='0';

          delete_post_meta( $postid, '_eshop_stock' );

        }

      }

    }

    $replace='';

    $stkav=apply_filters('eshop_show_addtocart',$stkav,$postid, $post);

    if($stkav=='1'){

      $currsymbol=$eshopoptions['currency_symbol'];

      if(isset($eshopoptions['cart_text']) && $eshopoptions['cart_text']!='' && $short=='no'){

        if($eshopoptions['cart_text_where']=='1')

          $replace .= '<p class="eshop-cart-text-above">'.stripslashes($eshopoptions['cart_text']).'</p>';

      }

      $replace .= '

      <form action="'.get_permalink($eshopoptions['cart']).'" method="post" id="eshopprod'.$postid.$uniq.'">';

      $theid=sanitize_file_name($eshop_product['sku']);

      //option sets

      $optsets = $eshop_product['optset'];

      $optsetsecho=$mainoptsecho='';

      if(is_array($optsets)){

        $opttable=$wpdb->prefix.'eshop_option_sets';

        $optnametable=$wpdb->prefix.'eshop_option_names';

        $optarray=array();

        foreach($optsets as $foo=>$opset){

          $qb[]="(n.optid=$opset && n.optid=s.optid)";

        }

        $qbs = implode("OR", $qb);

        $optionsetord=apply_filters('eshop_option_set_ordering','ORDER BY type, id ASC');

        $myrowres=$wpdb->get_results("select n.optid,n.name as name, n.type, s.name as label, s.price, s.id from $opttable as s,

          $optnametable as n where $qbs $optionsetord");

        $x=0;

        foreach($myrowres as $myrow){

          $optarray[$myrow->optid]['name']=$myrow->name;

          $optarray[$myrow->optid]['optid']=$myrow->optid;

          $optarray[$myrow->optid]['type']=$myrow->type;

          $optarray[$myrow->optid]['item'][$x]['id']=$myrow->id;

          $optarray[$myrow->optid]['item'][$x]['label']=$myrow->label;

          $optarray[$myrow->optid]['item'][$x]['price']=$myrow->price;

          $x++;

        }



        $enumb=0;

        if(is_array($optarray)){

          foreach($optarray as $optsets){

            switch($optsets['type']){

              case '0'://select

                $optsetsecho.="\n".'<span class="eshop eselect"><label for="exopt'.$optsets['optid'].$enumb.$uniq.'">'.stripslashes(esc_attr($optsets['name'])).'</label><select id="exopt'.$optsets['optid'].$enumb.$uniq.'" name="optset['.$enumb.'][id]">'."\n";

                foreach($optsets['item'] as $opsets){

                  if($opsets['price']!='0.00')

                    $addprice=sprintf( __(' + %1$s%2$s','eshop'), $currsymbol, number_format_i18n($opsets['price'],__('2','eshop')));

                  else

                    $addprice='';

                  $optsetsecho.='<option value="'.$opsets['id'].'">'.stripslashes(esc_attr($opsets['label'])).$addprice.'</option>'."\n";

                }

                $optsetsecho.="</select></span>\n";

                break;
                
              case '1'://checkbox

                $optsetsecho.="\n".'<fieldset class="eshop echeckbox"><legend>'.stripslashes(esc_attr($optsets['name'])).'</legend>'."\n";

                $ox=0;

                foreach($optsets['item'] as $opsets){

                  $ox++;

                  if($opsets['price']!='0.00')

                    $addprice=sprintf( __(' + %1$s%2$s','eshop'), $currsymbol, number_format_i18n($opsets['price'],__('2','eshop')));

                  else

                    $addprice='';

                  $optsetsecho.='<span><input type="checkbox" value="'.$opsets['id'].'" id="exopt'.$optsets['optid'].$enumb.'i'.$ox.$uniq.'" name="optset['.$enumb.'][id]" /><label for="exopt'.$optsets['optid'].$enumb.'i'.$ox.$uniq.'">'.stripslashes(esc_attr($opsets['label'])). $addprice.'</label></span>'."\n";

                  $enumb++;

                }

                $optsetsecho.="</fieldset>\n";

                break;

              case '2'://text

                foreach($optsets['item'] as $opsets){

                  if($opsets['price']!='0.00')

                    $addprice=sprintf( __(' + %1$s%2$s','eshop'), $currsymbol, number_format_i18n($opsets['price'],__('2','eshop')));

                  else

                    $addprice='';

                  $optsetsecho.="\n".'<span class="eshop etext"><label for="exopt'.$optsets['optid'].$enumb.$uniq.'">'.stripslashes(esc_attr($opsets['label'])).'<span>'.$addprice.'</span></label>'."\n";

                  $optsetsecho.='<input type="text" id="exopt'.$optsets['optid'].$enumb.$uniq.'" name="optset['.$enumb.'][text]" value="" />'."\n";

                  $optsetsecho.='<input type="hidden" name="optset['.$enumb.'][id]" value="'.$opsets['id'].'" />'."\n";

                  $optsetsecho.='<input type="hidden" name="optset['.$enumb.'][type]" value="'.$optsets['type'].'" />'."\n";

                }

                $optsetsecho.="</span>\n";

                break;

              case '3'://textarea

                foreach($optsets['item'] as $opsets){

                  if($opsets['price']!='0.00')

                    $addprice=sprintf( __(' + %1$s%2$s','eshop'), $currsymbol, number_format_i18n($opsets['price'],__('2','eshop')));

                  else

                    $addprice='';



                  $optsetsecho.="\n".'<span class="eshop etextarea"><label for="exopt'.$optsets['optid'].$enumb.$uniq.'">'.stripslashes(esc_attr($opsets['label'])).'<span>'.$addprice.'</span></label>'."\n";

                  $optsetsecho.='<textarea id="exopt'.$optsets['optid'].$enumb.$uniq.'" name="optset['.$enumb.'][text]" rows="4" cols="40"></textarea>'."\n";

                  $optsetsecho.='<input type="hidden" name="optset['.$enumb.'][id]" value="'.$opsets['id'].'" />'."\n";

                  $optsetsecho.='<input type="hidden" name="optset['.$enumb.'][type]" value="'.$optsets['type'].'" />'."\n";

                }

                $optsetsecho.="</span>\n";

                break;

            }

            $enumb++;



          }

        }

      }



      if($eshopoptions['options_num']>1 && !empty($eshop_product['products']['2']['option']) && !empty($eshop_product['products']['2']['price'])){

        if(isset($eshop_product['cart_radio']) && $eshop_product['cart_radio']=='1'){

          $opt=$eshopoptions['options_num'];

          $uniq=apply_filters('eshop_uniq',$uniq);

          $mainoptsecho.="\n<ul class=\"eshopradio\">\n";

          for($i=1;$i<=$opt;$i++){

            $option=$eshop_product['products'][$i]['option'];

            $price=$eshop_product['products'][$i]['price'];



            if(isset($eshopoptions['sale_prices']) && $eshopoptions['sale_prices'] == 1

            && isset($eshopoptions['sale']) && 'yes' == $eshopoptions['sale']  &&

            isset($eshop_product['products'][$i]['saleprice']) && $eshop_product['products'][$i]['saleprice']!=''

            && isset($eshop_product['sale']) && $eshop_product['sale']=='yes'){

              $price=$eshop_product['products'][$i]['saleprice'];

            }



            if($i=='1') $esel=' checked="checked"';

            else $esel='';

            $currst=1;

            if(isset($eshopoptions['stock_control']) && 'yes' == $eshopoptions['stock_control']){

              if(isset($stkarr[$i]) && $stkarr[$i]>0) $currst=$stkarr[$i];

              else $currst=0;

            }

            if($option!='' && $currst>0){

              if($price!='0.00')

                $mainoptsecho.='<li><input type="radio" value="'.$i.'" id="eshopopt'.$theid.'_'.$i.$uniq.'" name="option"'.$esel.' /><label for="eshopopt'.$theid.'_'.$i.$uniq.'">'.sprintf( __('%1$s @ %2$s%3$s','eshop'),stripslashes(esc_attr($option)), $currsymbol, number_format_i18n($price,__('2','eshop')))."</label>\n</li>";

              else

                $mainoptsecho.='<li><input type="radio" value="'.$i.'" id="eshopopt'.$theid.'_'.$i.$uniq.'" name="option" /><label for="eshopopt'.$theid.'_'.$i.$uniq.'">'.stripslashes(esc_attr($option)).'</label>'."\n</li>";

            }

          }

          $mainoptsecho.="</ul>\n";

          //combine 2 into 1 then extract

          $filterarray[0]=$mainoptsecho;

          $filterarray[1]=$eshop_product;

          $filterarray=apply_filters('eshop_after_radio',$filterarray);

          $mainoptsecho=$filterarray[0];





        }else{

          $opt=$eshopoptions['options_num'];

          $mainoptsecho.="\n".'<label for="eopt'.$theid.$uniq.'"><select id="eopt'.$theid.$uniq.'" name="option">';

          for($i=1;$i<=$opt;$i++){

            if(isset($eshop_product['products'][$i])){

              $option=$eshop_product['products'][$i]['option'];

              $price=$eshop_product['products'][$i]['price'];

              if(isset($eshopoptions['sale_prices']) && $eshopoptions['sale_prices'] == 1

              && isset($eshopoptions['sale']) && 'yes' == $eshopoptions['sale']

              && isset($eshop_product['products'][$i]['saleprice']) && $eshop_product['products'][$i]['saleprice']!=''

              && isset($eshop_product['sale']) && $eshop_product['sale']=='yes'){

                $price=$eshop_product['products'][$i]['saleprice'];

              }

              $currst=1;

              if(isset($eshopoptions['stock_control']) && 'yes' == $eshopoptions['stock_control']){

                if(isset($stkarr[$i]) && $stkarr[$i]>0) $currst=$stkarr[$i];

                else $currst=0;

              }

              if($option!='' && $currst>0){

                if($price!='0.00')

                  $mainoptsecho.='<option value="'.$i.'">'.sprintf( __('%1$s @ %2$s%3$s','eshop'),stripslashes(esc_attr($option)), $currsymbol, number_format_i18n($price,__('2','eshop'))).'</option>'."\n";

                else

                  $mainoptsecho.='<option value="'.$i.'">'.stripslashes(esc_attr($option)).'</option>'."\n";

              }

            }

          }

          $mainoptsecho.='</select></label>';

        }

      }else{

        $option=$eshop_product['products']['1']['option'];

        $price=$eshop_product['products']['1']['price'];

        if(isset($eshopoptions['sale_prices']) && $eshopoptions['sale_prices'] == '1'

        && isset($eshopoptions['sale']) && 'yes' == $eshopoptions['sale']

        && isset($eshop_product['products']['1']['saleprice']) && $eshop_product['products']['1']['saleprice']!=''

        && isset($eshop_product['sale']) && $eshop_product['sale']=='yes'){

          $price=$eshop_product['products']['1']['saleprice'];

        }

        $currst=1;

        if(isset($eshopoptions['stock_control']) && 'yes' == $eshopoptions['stock_control']){

          if(isset($stkarr[1]) && $stkarr[1]>0) $currst=$stkarr[1];

        }

        $mainoptsecho .='<input type="hidden" name="option" value="1" />';

        if($currst>0){

          $mainoptsecho.='<div class="price_book">';

          if($price!='0.00'){

            $mainoptsecho.=sprintf( __('%1$s%2$s','eshop'), $currsymbol, number_format_i18n($price,__('2','eshop')));

          }else{

            $mainoptsecho.=stripslashes(esc_attr($option));

          }

          $mainoptsecho.='</div>';

        }

      }

      /*

       default is set to true to show options sets followed by manin options

       change to false to show main option followed by option sets

      */

      $eshopoptionsorder=apply_filters('eshop_options_order',true);

      if($eshopoptionsorder)

        $replace .= $optsetsecho.$mainoptsecho;

      else

        $replace .= $mainoptsecho.$optsetsecho;

      $addqty=1;

      if(isset($eshopoptions['min_qty']) && $eshopoptions['min_qty']!='')

        $addqty=$eshopoptions['min_qty'];



      if($short=='yes'){

        $replace .='<input type="hidden" name="qty" value="'.$addqty.'" />';

      }else{

        $replace .='<label for="qty'.$theid.$uniq.'" class="qty">'.__('Antal:','eshop').'</label>

        <input type="text" value="'.$addqty.'" id="qty'.$theid.$uniq.'" maxlength="3" size="3" name="qty" class="iqty" />';

      }



      $replace .='

      <input type="hidden" name="pclas" value="'.$eshop_product['shiprate'].'" />

      <input type="hidden" name="pname" value="'.stripslashes(esc_attr($eshop_product['description'])).'" />

      <input type="hidden" name="pid" value="'.$eshop_product['sku'].'" />

      <input type="hidden" name="purl" value="'.get_permalink($postid).'" />

      <input type="hidden" name="postid" value="'.$postid.'" />

      <input type="hidden" name="eshopnon" value="set" />';

      $replace .= wp_nonce_field('eshop_add_product_cart','_wpnonce'.$uniq,true,false);

      /*

      <div class="way_to_book">

      <a href="<?php the_permalink() ?>">L?g i kurv</a>

    </div>

      */

      $replace .='<div class="way_to_book">';

      if($eshopoptions['addtocart_image']=='img'){

        $eshopfiles=eshop_files_directory();

        $imgloc=apply_filters('eshop_theme_addtocartimg',$eshopfiles['1'].'addtocart.png');

        $replace .='<input style="font-size:11px;" class="buttonimg eshopbutton" src="'.$imgloc.'" value="'.__('Add to Cart','eshop').'" title="'.__('Add selected item to your shopping basket','eshop').'" type="image" />';

      }else{

        $replace .='<input class="button eshopbutton" style="font-size:11px;" value="'.__('Add to Cart','eshop').'" title="'.__('Add selected item to your shopping basket','eshop').'" type="submit" />';

      }

      $replace .='</div>';

      $replace .='</form>';

      /*if(isset($eshopoptions['cart_text']) && $eshopoptions['cart_text']!=''  && $short=='no'){

        if($eshopoptions['cart_text_where']=='2')

          $replace .= '<p class="eshop-cart-text-below">'.stripslashes($eshopoptions['cart_text']).'</p>';

      }*/

    }

    return $replace;

}

?>
<div class="pageItem">

<div class="text">
			<div id="book">
			
 <?php 
if ( has_post_thumbnail() ) {

$domsxe = simplexml_load_string(get_the_post_thumbnail( ) );
$thumbnailsrc = $domsxe->attributes()->src;
?>
		<div class="image">

			
			<img alt="<?php the_title(); ?>" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/timthumb.php?src=<?php echo str_replace(get_bloginfo('url'), "", $thumbnailsrc); ?>&w=151&h=226" />

		</div>
<?php } ?>
			
			</div>
				<?php while (have_posts()) : the_post(); ?>
				
			<div class="post">
			
		
				<?php the_content(); ?>
				
			</div>
					
				<?php endwhile;?>
		<div class="clearBoth" style="height: 15px;"></div>
		<span class="add_comments"><h3>Bøger af <?php the_title(); ?></h3></span>
<?php
global $wpdb, $post,$wp_query;
$currprodid = $post->ID;
$customflds = get_post_custom();

$authors = get_the_title();

$authord_ids = explode(",",$authors);

$addwhere = "$wpdb->postmeta.meta_key = 'forfattere' AND (";
$i = 1;
foreach ($authord_ids as $key => $value) {
  if(count($authord_ids) == 1)
  if($i == count($authord_ids))
  {
    $addwhere .= "$wpdb->postmeta.meta_value like '$value' or $wpdb->postmeta.meta_value like '$value,%' or $wpdb->postmeta.meta_value like '%,$value' or $wpdb->postmeta.meta_value like '%,$value,%'";
  }else { 
    $addwhere .= "$wpdb->postmeta.meta_value like '$value' or $wpdb->postmeta.meta_value like '$value,%' or $wpdb->postmeta.meta_value like '%,$value' or $wpdb->postmeta.meta_value like '%,$value,%' or ";
  }
  $i++;
}
$addwhere .= ") AND ";

$sql_query = "SELECT wp_postmeta.post_id, wp_posts.* from wp_postmeta,wp_posts WHERE $addwhere wp_posts.ID=wp_postmeta.post_id AND wp_posts.ID != $currprodid and wp_posts.post_status='publish' order by post_date DESC";
$pages = $wpdb->get_results($sql_query);
foreach( $pages as $i => $post ) {
        $pages[$i] = sanitize_post($post, 'raw');
    }

    // Setup WP_Query object
    $new_wp_query = new WP_Query();
    $new_wp_query->query = $sql_query;
    $new_wp_query->posts_per_page = 6;
    $new_wp_query->posts = $pages;
    $new_wp_query->post_count = count($pages);
    if ( isset($found_posts) ) $new_wp_query->found_posts = $found_posts;
    if ( isset($max_num_pages) ) $new_wp_query->max_num_pages = $max_num_pages;


?>
<style type="text/css">
.list_of_book .ratingblock{
  padding-left: 10px;
}
.list_of_book .ratingstars{
  height: 24px;
  margin: 0px auto;
  width: 120px;
}
.list_of_book .about_book {
  float: right;
  width: 113px;
  margin-right: -17px;
  margin-top: -176px;
}
.list_of_book .name_book{
	margin-top: 0px;
}
.ratingtext {
  text-align: center;
}
</style>
<style type="text/css">

.list_of_book ul li{
  width: 188px;
}
#pageContent .contentCol .pageItem .text img{
  margin: 0 0 10px 0px;
}
</style>
<div class="list_of_book">
<ul>
<?php $a=1; while ($new_wp_query->have_posts()) : $new_wp_query->the_post(); ?>
<li>
<?php
if ( has_post_thumbnail()):
$domsxe = simplexml_load_string(get_the_post_thumbnail( ) );
$thumbnailsrc = $domsxe->attributes()->src;
$mpost = get_post(get_the_ID());
$rating = get_post_meta(get_the_ID(),'_kksr_avg',true);
$postscast = get_post_meta(get_the_ID(),'_kksr_casts',true);
if ( !$postscast ) { $postscast = 0; };
?>
<div class="block_rating">
<div class="wrap_img">
   <a href="<?php the_permalink(); ?>"><img alt="<?php the_title(); ?>" src="http://hrferdinand.dk/wp-content/themes/ferdinand/scripts/timthumb.php?src=<?php echo str_replace(get_bloginfo('url'), "http://hrferdinand.dk", $thumbnailsrc);?>&w=81&h=121" /></a>
</div>
<?php wp_gdsr_render_article($template_id = 50,$read_only = false,$stars_set = "",$stars_size = 16,$stars_set_ie6 = "",$echo = true) ?>
</div>    
<?php endif; ?>
  <div class="about_book">
    <div class="name_book">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </div>
    <div class="name_artist">
      <?php the_field('forfattere'); ?>
    </div>
    <?php if(mb_strlen($post->post_title)<23): ?>
    <p>
      <?php echo get_short_text($post->post_excerpt, $attr=array('length'=>50)) ?>
    </p>
        <?php endif; ?>
    <?php echo eshop_boing2(); ?>
  </div>
</li>
<?php $a++; endwhile;?>
</ul>
</div>
<div class="clear"></div>

<?php
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo '<a title="Tilbage" class="back" href='.$url.'>Tilbage</a>';
?>

	</div>

</div>

<?php get_template_part( 'sidebar', '' ); ?>

				
<?php get_footer(); ?>	