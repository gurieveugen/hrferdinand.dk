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
			'SELECT'   => sprintf('SELECT * FROM wp_posts'),
			'WHERE'    => 'WHERE 1=1 AND ( wp_posts.ID NOT IN (SELECT object_id FROM wp_term_relationships WHERE term_taxonomy_id IN (12) ) ) AND wp_posts.post_type = \'boger\' AND (wp_posts.post_status = \'publish\')',
			'LIKE'     => '',
			'GROUP_BY' => 'GROUP BY wp_posts.ID',
			'ORDER_BY' => $this->getOrderBy
		);
	}	

	public function getOrderBy()
	{
		$offset = ($this->getPage()-1)*(int) get_option('posts_per_page');
		return sprintf('ORDER BY wp_posts.post_title ASC LIMIT %d, 5', $offset);
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

	public function getQueryString()
	{
		if(count($this->letters))
		{
			foreach ($this->letters as $l) 
			{
				$like[] = $this->db->posts.'.post_title LIKE \''.$this->letter_start.'%\'';
			}
			$this->query['LIKE'] = sprintf('AND (%s)', implode(' OR ', $like));
		}
		return implode(' ', $this->query);
	}

	/**
	 * Set letters
	 * @param string $letters --- letters key
	 */
	public function getLetter($key)
	{
		$dic = $this->getDictionary();
		if(isset($dic[$key]))
		{
			return $dic[$key];	
		}
		return array();
	}

	public function getPage()
	{
		return (get_query_var('page')) ? get_query_var('page') : 1; 
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