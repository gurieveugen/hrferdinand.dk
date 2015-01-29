<?php

class Search{
	public function __construct()
	{
		add_action( 'wp_ajax_search', array(&$this, 'searchAJAX') );
		add_action( 'wp_ajax_nopriv_search', array(&$this, 'searchAJAX') );
	}

	public function searchAJAX()
	{
		if(!$this->isSearch()) 
		{
			echo json_encode(array('status' => 'NULL'));
			die();
		}

		$s = $_POST['s'];

		$args = array(
			'posts_per_page'   => 5,
			'offset'           => 0,
			's'                => $s,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => array('boger', 'nyheder'),
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);

		$posts = get_posts( $args );
		if(count($posts))
		{
			foreach ($posts as $p) 
			{
				$p->image = (string) self::getThumbnailURL($p->ID);
				if(strlen(trim($p->image)))
				{
					$p->image = sprintf('%s/scripts/timthumb.php?src=%s&w=60&h=60', get_bloginfo('stylesheet_directory'), $p->image);
				}
				else
				{
					$p->image = 'http://placehold.it/60x60/383b3d/fff';
				}
				
				$p->link  = get_permalink($p->ID);
			}
		}

		echo json_encode(
			array(
				'status' => 'OK',
				'posts'  => $posts,
				'args'   => $args
			)
		);
		die();
	}

	/**
	 * is have search query
	 * @return boolean --- true if yes | false if not
	 */
	public function isSearch()
	{
		if(isset($_POST['s']) AND strlen(trim($_POST['s'])) ) return true;
		return false;
	}

	/**
	 * Get thumbnail url
	 * @param  integer $id  --- post id
	 * @param  string $size --- image seize. Default: full
	 * @return string       --- URL
	 */
	public static function getThumbnailURL($id, $size = 'full')
	{
		if(!has_post_thumbnail($id)) return false;
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), $size);
		return $thumb['0'];
	}
}