<?php
	class User_Model extends CI_Model
	{
		public $user;
		
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_user($user_info)
		{
			// $select_user = "SELECT * FROM users WHERE email = ? AND password = ?";
			// $values = array($user_info['email'], $user_info['password']);
			// return $this->db->query($select_user, $values)->row_array();

			return $this->db->query("SELECT * FROM users WHERE email = '{$user_info[email]}'
									 AND password = '{$user_info[password]}'")->row_array();
		}
		
		public function insert_user($user_info)
		{
			$insert_query = "INSERT INTO users (first_name, last_name, email, password, created_at)
								VALUES (?, ?, ?, ?, NOW())";
			$values = (array($user_info['first_name'], $user_info['last_name'], $user_info['email'], $user_info['password']));
			$this->db->query($insert_query, $values);
			return $this->db->insert_id();
		}
	
	}

//end of file