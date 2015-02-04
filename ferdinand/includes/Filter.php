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

		$this->where[] = '1=1';
		$this->where[] = sprintf('%1$s.post_type = \'boger\'', $this->db->posts);
		$this->where[] = sprintf('(%1$s.post_status = \'publish\' OR %1$s.post_status = \'private\')', $this->db->posts);

		$this->query = array(
			'SELECT'     => sprintf('SQL_CALC_FOUND_ROWS * FROM %s', $this->db->posts),
			'INNER JOIN' => $this->getInnerJoin(),
			'WHERE'      => $this->getWhere(),
			'GROUP BY'   => $this->getGroupBy(),
			'ORDER BY'   => $this->getOrderBy(),
			'LIMIT'      => $this->getLimit()
		);
	}	

	public function getGroupBy()
	{
		return sprintf('%s.ID', $this->db->posts);
	}

	public function getWhere()
	{
		$where   = array('1=1');
		$where[] = sprintf('%1$s.post_type = \'boger\'', $this->db->posts);
		$where[] = sprintf('(%1$s.post_status = \'publish\' OR %1$s.post_status = \'private\')', $this->db->posts);
		$where[] = sprintf('( %1$s.ID NOT IN (SELECT object_id FROM %2$sterm_relationships WHERE term_taxonomy_id IN (12) ) )', $this->db->posts, $this->db->prefix);

		if(count($this->letters))
		{
			foreach ($this->letters as $l) 
			{
				$like[] = $this->db->posts.'.post_title LIKE \''.$l.'%\'';
			}
			$where[] = sprintf('(%s)', implode(' OR ', $like));
		}

		if(is_category())
		{
			$qo = get_queried_object();
			$where[] = sprintf(
				'( %s.term_taxonomy_id IN (%d) )', 
				$this->db->term_relationships, 
				$qo->term_id
			);
		}

		return implode(' AND ', $where);
	}

	public function getInnerJoin()
	{
		if(is_category())
		{
			return sprintf('%1$s ON (%2$s.ID = %1$s.object_id)', $this->db->term_relationships, $this->db->posts);
		}
		return '';
	}

	public function getOrderBy()
	{
		return sprintf('%s.post_title ASC', $this->db->posts);
	}

	public function getLimit()
	{
		$offset = ($this->getPage()-1)*5;
		return sprintf('%d, 5', $offset);
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
		
		$count          = (int) $this->getCount();
		$posts_per_page = 5;
		$total          = ceil($count/$posts_per_page);
		return max(1, $total);
	}

	public function getQueryString()
	{
		$query = '';
		foreach ($this->query as $key => $value) 
		{
			if(strlen(trim($value)))
			{
				$query.= sprintf(' %s %s', $key, $value);
			}
		}

		return $query;
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