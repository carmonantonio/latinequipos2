<?php defined('BASEPATH') OR exit('No direct script access allowed');


class User_Model extends CI_Model{
	
	public function view_all(){
		return $this->db->get("users");
	}
	
	public function check_exists($email){
		$this->db->where("email", $email);
		$query = $this->db->get("users");
		return $query->num_rows();
	}
	
	public function insert($data){
		$this->db->insert("users", $data);
		return TRUE;
	}
	
	public function getuser($id){
		$this->db->where("id", $id);
		$query = $this->db->get("users");
		return $query->row();
	}
	
	public function getpass($id){
		$this->db->where("id", $id);
		$query = $this->db->get("users");
		$query_run = $query->row();
		return $query_run->password;
	}
	
	public function update($id, $full_name, $email, $role, $password_encr){
		$this->db->set("full_name", $full_name);
		$this->db->set("email", $email);
		$this->db->set("role", $role);
		$this->db->set("password", $password_encr);
		$this->db->where("id", $id);
		$query = $this->db->update("users");
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function deleteuser($id){
		$this->db->where("id", $id);
		$query = $this->db->delete("users");
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
		
	}
}