<?php

class Filter{

	//                                       __  _          
	//     ____  _________  ____  ___  _____/ /_(_)__  _____
	//    / __ \/ ___/ __ \/ __ \/ _ \/ ___/ __/ / _ \/ ___/
	//   / /_/ / /  / /_/ / /_/ /  __/ /  / /_/ /  __(__  ) 
	//  / .___/_/   \____/ .___/\___/_/   \__/_/\___/____/  
	// /_/              /_/                                 
	private $letter_start;
	private $letter_end;
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
		$response = array_merge(
			array(
				'letter_start' => '',
				'letter_end'   => ''
			), 
			$response
		);

		$this->setLetterStart($response['letter_start']);
		$this->setLetterEnd($response['letter_end']);
		$this->query = array(
			'SELECT'   => sprintf('SELECT * FROM wp_posts'),
			'WHERE'    => 'WHERE 1=1 AND ( wp_posts.ID NOT IN (SELECT object_id FROM wp_term_relationships WHERE term_taxonomy_id IN (12) ) ) AND wp_posts.post_type = \'boger\' AND (wp_posts.post_status = \'publish\')',
			'LIKE'     => '',
			'GROUP_BY' => 'GROUP BY wp_posts.ID',
			'ORDER_BY' => 'ORDER BY wp_posts.post_title ASC LIMIT 0, 5'
		);
	}	

	public function getPosts()
	{
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
		if(strlen($this->letter_start) && strlen($this->letter_end))
		{
			$this->query['LIKE'] .= 'AND ('.$this->db->posts.'.post_title LIKE \''.$this->letter_start.'%\'';
			$this->query['LIKE'] .= ' OR '.$this->db->posts.'.post_title LIKE \'%'.$this->letter_end.'\')';
		}
		return implode(' ', $this->query);
	}

	/**
	 * Set letter start
	 * @param string $letter --- letter to set
	 */
	public function setLetterStart($letter)
	{
		
		$allow_letters = array('', 'A', 'F', 'K', 'P', 'U', 'Y');
		if(in_array($letter, $allow_letters)) $this->letter_start = $letter;
		else $this->letter_start = $allow_letters[0];
	}

	/**
	 * Set letter end
	 * @param string $letter --- letter to set
	 */
	public function setLetterEnd($letter)
	{
		$allow_letters = array('', 'E', 'J', 'Q', 'T', 'X', 'A');
		if(in_array($letter, $allow_letters)) $this->letter_end = $letter;
		else $this->letter_end = $allow_letters[0];
	}

	public function getPage()
	{
		return (get_query_var('page')) ? get_query_var('page') : 1; 
	}
}