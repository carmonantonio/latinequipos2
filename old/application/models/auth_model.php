<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Auth_Model extends CI_Model{

	public function authentication($email, $password){
		$this->db->where("email", $email);
		$this->db->where("password", $password);
		$query = $this->db->get("users");
		return $query->num_rows();
	}
	
	public function user_session($email){
		$this->db->where("email", $email);
		$query = $this->db->get("users");
		return $query->result();
	}

}