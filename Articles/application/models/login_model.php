<?php
	class Login_model extends CI_Model {
		public function login_valid($username, $password) {
			$this->db->where('uname', $username);
			$this->db->where('password', $password);
			$query = $this->db->get('new_users');
//"SELECT * FROM new_users WHERE uname='$username' and password='$password'";

			if($query->num_rows() > 0) {

				//echo "<pre>";
				//print_r($query->result()); exit;
				//print_r($query->row()); exit;
				//print_r($query->row()->id); exit;

				return $query->row()->id; //it returns id from table
				//return true;
			} else {
				return false;
			}
		}
	} 

?>