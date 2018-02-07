<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Categories_Model extends CI_Model{
	
	public function view_main_cat(){
		$this->db->where("parent_cat", "0");
		return $this->db->get("categories");
	}
	
	public function view_main_cat_en(){
		return $this->db->query("SELECT c.id as id, c.parent_cat, cl.language_code, cl.category_name, c.image, c.image_show
		FROM categories AS c
		JOIN categories_lng AS cl ON cl.cat_id = c.id
		WHERE c.parent_cat = '0' AND cl.language_code = 'en'");
	}
	
	public function view_main_cat_es(){
		return $this->db->query("SELECT c.id as id, c.parent_cat, cl.language_code, cl.category_name, c.image, c.image_show
		FROM categories AS c
		JOIN categories_lng AS cl ON cl.cat_id = c.id
		WHERE c.parent_cat = '0' AND cl.language_code = 'es'");
	}

	
	public function view_main_cat_show(){
		$this->db->where("parent_cat", "0");
		$this->db->where("image_show", "Y");
		return $this->db->get("categories");
	}
	
	public function view_all(){
		// $this->db->select("c.id, c.parent_cat AS parent_cat_id, c.category_name, ca.category_name AS parent_cat_name, c.image");
		// $this->db->from("categories AS c");
		// $this->db->join("categories AS ca", "ca.id = c.parent_cat", "LEFT");
		// return $this->db->get();
		return $this->db->query("SELECT c.id AS id, c.parent_cat AS parent_cat_id, cl.category_name AS category_name, c1.category_name AS parent_cat_name, c.image, c.image_show
FROM categories_lng AS cl
LEFT JOIN categories AS c ON c.id = cl.cat_id
LEFT JOIN categories_lng AS c1 ON c1.cat_id = c.parent_cat
WHERE cl.language_code = 'en'
GROUP BY cl.id");
	}
	
	public function cat_en_all(){
		return $this->db->query('SELECT c.*, cl.language_code, cl.category_name
		FROM categories c
		JOIN categories_lng AS cl ON cl.cat_id = c.id
		WHERE cl.language_code = "en"');
	}
	
	public function cat_es_all(){
		return $this->db->query('SELECT c.*, cl.language_code, cl.category_name
		FROM categories c
		JOIN categories_lng AS cl ON cl.cat_id = c.id
		WHERE cl.language_code = "es"');
	}
	
	public function insert($data){
		$query = $this->db->insert("categories", $data);
		$insert_id = $this->db->insert_id();
		if($query){
			return $insert_id;
		}else{
			return FALSE;
		}
		
	}
	public function insert_lng_en($data)
	{
		$query = $this->db->insert("categories_lng", $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function insert_lng_es($data)
	{
		$query = $this->db->insert("categories_lng", $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function getcategories_es($id){
		$query = $this->db->query("SELECT c.*, cl.category_name
FROM categories AS c
JOIN categories_lng AS cl ON cl.cat_id = c.id
WHERE c.id = $id AND cl.language_code = 'es'");
		return $query->row();
		
	}
	
	public function getcategories_en($id){
		$query = $this->db->query("SELECT c.*, cl.category_name
FROM categories AS c
JOIN categories_lng AS cl ON cl.cat_id = c.id
WHERE c.id = $id AND cl.language_code = 'en'");
		return $query->row();
		
	}
	
	public function update($id, $uploaded_file_name){
		$this->db->set("image", $uploaded_file_name);
		$this->db->set("parent_cat", $this->input->post("parent_cat_en"));
		$this->db->set("image_show", $this->input->post("image_show"));
		$this->db->where("id", $id);
		$this->db->update("categories");
		
		
		
		$query_es = $this->db->query("SELECT *
		FROM categories_lng
		WHERE cat_id = $id and language_code = 'es'");
		$query_es = $query_es->row();
		$query_es_id = $query_es->id;
		
		
		$query_en = $this->db->query("SELECT *
		FROM categories_lng
		WHERE cat_id = $id and language_code = 'en'");
		$query_en = $query_en->row();
		$query_en_id = $query_en->id;
		
		
		$this->db->set("category_name", $this->input->post("category_name_es"));
		$this->db->where("id", $query_es_id);
		$this->db->update("categories_lng");
		
		
		$this->db->set("category_name", $this->input->post("category_name_en"));
		$this->db->where("id", $query_en_id);
		$query = $this->db->update("categories_lng");
		
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