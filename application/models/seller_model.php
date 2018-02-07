<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Seller_Model extends CI_Model{
	
	public function view_all(){
		return $this->db->query("SELECT sd.id AS id, sdl.name, sdl.phone_number, sdl.email, sdl.address, sdl.occupation, sdl.description
FROM seller_detail AS sd
JOIN seller_detail_lng AS sdl ON sdl.seller_id = sd.id
WHERE sdl.language_code = 'en'");
	}
	public function view_all_en(){
		return $this->db->query("SELECT sd.id AS id, sdl.name, sdl.phone_number, sdl.email, sdl.address, sdl.occupation, sdl.description
FROM seller_detail AS sd
JOIN seller_detail_lng AS sdl ON sdl.seller_id = sd.id
WHERE sdl.language_code = 'en'");
	}
	public function view_all_es(){
		return $this->db->query("SELECT sd.id AS id, sdl.name, sdl.phone_number, sdl.email, sdl.address, sdl.occupation, sdl.description
FROM seller_detail AS sd
JOIN seller_detail_lng AS sdl ON sdl.seller_id = sd.id
WHERE sdl.language_code = 'es'");
	}
	
	public function insert($data){
		$query = $this->db->insert("seller_detail", $data);
		$insert_id = $this->db->insert_id();
		if($query){
			return $insert_id;
		}else{
			return FALSE;
		}
	}
	public function insert_en($data){
		$query = $this->db->insert("seller_detail_lng", $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function insert_es($data){
		$query = $this->db->insert("seller_detail_lng", $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function getseller_en($id){
		$this->db->where("seller_id", $id);
		$this->db->where("language_code","en");
		$query = $this->db->get("seller_detail_lng");
		return $query->row();
	}
	public function getseller_es($id){
		$this->db->where("seller_id", $id);
		$this->db->where("language_code","es");
		$query = $this->db->get("seller_detail_lng");
		return $query->row();
	}
	
	public function update_en($id, $name, $phone_number, $email, $address, $occupation, $description){
		$this->db->set("name", $name);
		$this->db->set("phone_number", $phone_number);
		$this->db->set("email", $email);
		$this->db->set("address", $address);
		$this->db->set("occupation", $occupation);
		$this->db->set("description", $description);
		$this->db->where("seller_id", $id);
		$this->db->where("language_code","en");
		$query = $this->db->update("seller_detail_lng");
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function update_es($id, $name, $phone_number, $email, $address, $occupation, $description){
		$this->db->set("name", $name);
		$this->db->set("phone_number", $phone_number);
		$this->db->set("email", $email);
		$this->db->set("address", $address);
		$this->db->set("occupation", $occupation);
		$this->db->set("description", $description);
		$this->db->where("seller_id", $id);
		$this->db->where("language_code","es");
		$query = $this->db->update("seller_detail_lng");
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