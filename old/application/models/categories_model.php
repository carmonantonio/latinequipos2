<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Categories_Model extends CI_Model{
	
	public function view_main_cat(){
		$this->db->where("parent_cat", "0");
		return $this->db->get("categories");
	}
	
	public function view_main_cat_show(){
		$this->db->where("parent_cat", "0");
		$this->db->where("image_show", "Y");
		return $this->db->get("categories");
	}
	
	public function view_all(){
		$this->db->select("c.id, c.parent_cat AS parent_cat_id, c.category_name, ca.category_name AS parent_cat_name, c.image");
		$this->db->from("categories AS c");
		$this->db->join("categories AS ca", "ca.id = c.parent_cat", "LEFT");
		return $this->db->get();
	}
	
	public function insert($data){
		$query = $this->db->insert("categories", $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function getcategories($id){
		$this->db->where("id", $id);
		$query = $this->db->get("categories");
		return $query->row();
	}
	
	public function update($id, $uploaded_file_name){
		$this->db->set("image", $uploaded_file_name);
		$this->db->set("category_name", $this->input->post("category_name"));
		$this->db->set("parent_cat", $this->input->post("parent_cat"));
		$this->db->set("image_show", $this->input->post("image_show"));
		$this->db->where("id", $id);
		$query = $this->db->update("categories");
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function deletecategories($id){
		$this->db->where("id", $id);
		$query = $this->db->delete("categories");
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function load_countries(){
		return $this->db->get("countries");
	}
}