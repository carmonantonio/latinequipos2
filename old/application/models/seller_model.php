<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Seller_Model extends CI_Model{
	
	public function view_all(){
		return $this->db->get("seller_detail");
	}
	
	public function insert($data){
		$query = $this->db->insert("seller_detail", $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function getseller($id){
		$this->db->where("id", $id);
		$query = $this->db->get("seller_detail");
		return $query->row();
	}
	
	public function update($id, $name, $phone_number, $email, $address, $occupation, $description){
		$this->db->set("name", $name);
		$this->db->set("phone_number", $phone_number);
		$this->db->set("email", $email);
		$this->db->set("address", $address);
		$this->db->set("occupation", $occupation);
		$this->db->set("description", $description);
		$this->db->where("id", $id);
		$query = $this->db->update("seller_detail");
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function deleteseller($id){
		$this->db->where("id", $id);
		$query = $this->db->delete("seller_detail");
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}