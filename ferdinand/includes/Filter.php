<?php

class Filter{

	//                                       __  _          
	//     ____  _________  ____  ___  _____/ /_(_)__  _____
	//    / __ \/ ___/ __ \/ __ \/ _ \/ ___/ __/ / _ \/ ___/
	//   / /_/ / /  / /_/ / /_/ /  __/ /  / /_/ /  __(__  ) 
	//  / .___/_/   \____/ .___/\___/_/   \__/_/\___/____/  
	// /_/              /_/                                 
	private $letters;
	private $query;
	private $db;

	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	                                             
	public function __construct($response)
	{
		global $wpdb;
		$this->db = $wpdb;
		$response = array_merge(array('letters' => ''), $response);
		$this->letters = $this->getLetters($response['letters']);

		$this->query = array(
			'SELECT'   => sprintf('SELECT SQL_CALC_FOUND_ROWS * FROM %s', $this->db->posts),
			'WHERE'    => sprintf(
				'WHERE 1=1 AND ( %1$s.ID NOT IN (SELECT object_id FROM %2$sterm_relationships WHERE term_taxonomy_id IN (12) ) ) AND %1$s.post_type = \'boger\' AND (%1$s.post_status = \'publish\')', 
				$this->db->posts, 
				$this->db->prefix
			),
			'LIKE'     => '',
			'GROUP_BY' => sprintf('GROUP BY %s.ID', $this->db->posts),
			'ORDER_BY' => $this->getOrderBy()
		);
	}	

	public function getOrderBy()
	{
		$offset = ($this->getPage()-1)*(int) get_option('posts_per_page');
		return sprintf('ORDER BY %s.post_title ASC LIMIT %d, 5', $this->db->posts, $offset);
	}

	public function getPosts()
	{
		if(isset($_GET['debug']))
		{
			echo '<pre>';
			var_dump($this->getQueryString());
			echo '</pre>';
		}

		$posts = (array) $this->db->get_results($this->getQueryString());
		if(count($posts))
		{
			foreach ($posts as &$p) 
			{
				$p = sanitize_post($p);
			}
		}
		return $posts;
	}

	public function getCount()
	{
		return $this->db->get_var('SELECT FOUND_ROWS()');
	}

	public function getTotal()
	{
		$total = ceil((int) $this->getCount()/ (int) get_option('posts_per_page' ));
		return max(1, $total);
	}

	public function getQueryString()
	{
		if(count($this->letters))
		{
			foreach ($this->letters as $l) 
			{
				$like[] = $this->db->posts.'.post_title LIKE \''.$l.'%\'';
			}
			$this->query['LIKE'] = sprintf('AND (%s)', implode(' OR ', $like));
		}
		return implode(' ', $this->query);
	}

	/**
	 * Set letters
	 * @param string $letters --- letters key
	 */
	public function getLetters($key)
	{
		$dic = $this->getDictionary();
		if(isset($dic[$key]))
		{
			return $dic[$key];	
		}
		return array();
	}

	public function getPagination()
	{
		$big = 999999999;
		$total = $this->getTotal();

		$page_links = paginate_links( 
			array(
				'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'  => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total'   => $total,
				'type'    => 'array'
			) 
		);
		if(!count($page_links)) return '';
		$r = "<div class=\"navigation\"><ol class=\"wp-paginate\">\n\t<li>";
		$r.= join("</li>\n\t<li>", $page_links);
		$r.= "</li>\n</ol>\n</div>\n";
		return $r;
	}

	public function getPage()
	{
		return ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
	}

	public function getDictionary()
	{
		return array(
			'AE' => array('A', 'B', 'C', 'D', 'E'),
			'FJ' => array('F', 'G', 'H', 'I', 'J'),
			'KQ' => array('K', 'L', 'M', 'N', 'O', 'P', 'Q'),
			'PT' => array('P', 'Q', 'R', 'S', 'T'),
			'UX' => array('U', 'V', 'W', 'X'),
			'YA' => array('Y', 'Z', 'A'),
		);
	}
}