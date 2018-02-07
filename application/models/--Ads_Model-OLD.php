<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Ads_Model extends CI_Model{
	
	public function insert($data){
		$query = $this->db->insert("ads", $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function view_all(){
		/*$this->db->select("ad.id, ad.name, ad.seller_id, sd.name AS seller_name, ad.category_id, c.category_name AS category_name, ad.parent_cat, ad.ad_posting_date, ad.location, ad.country_id, ad.model, ad.year, ad.serial_number, ad.hours, ad.refurbished, ad.weight, ad.`engine`, ad.accessories, ad.keyword, ad.selling_price, ad.main_image, ad.pictures, ad.active");
		$this->db->from("ads AS ad");
		$this->db->join("categories AS c", "c.id = ad.category_id");
		$this->db->join("seller_detail AS sd", "sd.id = ad.seller_id");
		return $this->db->get();*/
		return $this->db->query("SELECT a.id, al.name, a.seller_id, sdl.name AS seller_name, a.category_id, cl.category_name AS category_name, a.parent_cat, a.ad_posting_date, al.company, al.location, a.category_id, al.model, al.year, al.serial_number, al.hours, al.refurbished, al.weight, al.`engine`, al.accessories, al.keyword, al.selling_price, a.main_image, a.pictures, a.active
		FROM ads AS a
		JOIN ads_lng AS al ON al.ad_id = a.id
		JOIN seller_detail_lng AS sdl ON sdl.seller_id = a.seller_id
		JOIN categories_lng AS cl ON cl.cat_id = a.category_id
		WHERE al.language_code = 'en' AND sdl.language_code = 'en' AND cl.language_code = 'en'");
	}
	
	/*public function view_all_en(){
		return 
	}*/
	
	public function getads($id){
		$this->db->where("id", $id);
		$query = $this->db->get("ads");
		return $query->row();
	}
	
	public function getads_en($id){
		$query = $this->db->query("SELECT a.country_id, a.id, al.name, a.seller_id, sdl.name AS seller_name, a.category_id, cl.category_name AS category_name, a.parent_cat, a.ad_posting_date, al.company, al.location, a.category_id, al.model, al.year, al.serial_number, al.hours, al.refurbished, al.weight, al.`engine`, al.accessories, al.keyword, al.selling_price, a.main_image, a.pictures, a.active
FROM ads AS a
JOIN ads_lng AS al ON al.ad_id = a.id
JOIN seller_detail_lng AS sdl ON sdl.seller_id = a.seller_id
JOIN categories_lng AS cl ON cl.cat_id = a.category_id
WHERE al.language_code = 'en' AND sdl.language_code = 'en' AND cl.language_code = 'en' AND a.id = $id");
		return $query->row();
	}
	
	public function getads_es($id){
		$query = $this->db->query("SELECT a.country_id, a.id, al.name, a.seller_id, sdl.name AS seller_name, a.category_id, cl.category_name AS category_name, a.parent_cat, a.ad_posting_date, al.company, al.location, a.category_id, al.model, al.year, al.serial_number, al.hours, al.refurbished, al.weight, al.`engine`, al.accessories, al.keyword, al.selling_price, a.main_image, a.pictures, a.active
FROM ads AS a
JOIN ads_lng AS al ON al.ad_id = a.id
JOIN seller_detail_lng AS sdl ON sdl.seller_id = a.seller_id
JOIN categories_lng AS cl ON cl.cat_id = a.category_id
WHERE al.language_code = 'es' AND sdl.language_code = 'es' AND cl.language_code = 'es' AND a.id = $id");
		return $query->row();
	}
	
	
	
	public function load_parent_by_id($id, $val){
		if($id=="0"){
			return FALSE;
		}
		//$this->db->where("parent_cat", $id);
		return $this->db->query("SELECT c.id AS id, c.parent_cat, cl.language_code, cl.category_name, c.image, c.image_show
		FROM categories AS c
		JOIN categories_lng AS cl ON cl.cat_id = c.id
		WHERE c.parent_cat = '$id' AND cl.language_code = '$val'");
	}
	
	public function load_parent_by_id2($id){
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		
		return $this->db->query("SELECT *
		FROM categories AS c
		JOIN categories_lng AS cl ON cl.cat_id = c.id
		WHERE c.parent_cat = $id AND cl.language_code = '$lng_code'");
		
	}
	
	public function update($id, $main_image, $pictures){
		$this->db->set("seller_id", $this->input->post("seller_id_en"));
		$this->db->set("category_id", $this->input->post("category_id_en"));
		$this->db->set("parent_cat", $this->input->post("parent_cat_en"));
		$this->db->set("ad_posting_date", date("Y-m-d", strtotime($this->input->post("ad_posting_date"))));
		$this->db->set("country_id", $this->input->post("country_id"));
		$this->db->set("main_image", $main_image);
		$this->db->set("pictures", $pictures);
		$this->db->where("id", $id);
		$this->db->update("ads");
		
		
		
		
		$this->db->where("ad_id", $id);
		$this->db->where("language_code", 'en');
		$query = $this->db->get("ads_lng");
		$query = $query->row();
		
		$query_en_id = $query->id;
		
		$this->db->set("ad_id", $id);
		$this->db->set("language_code", 'en');
		$this->db->set("name", $this->input->post("name_en"));
		$this->db->set("company", $this->input->post("company_en"));
		$this->db->set("location", $this->input->post("location_en"));
		$this->db->set("model", $this->input->post("model_en"));
		$this->db->set("year", $this->input->post("year_en"));
		$this->db->set("serial_number", $this->input->post("serial_number_en"));
		$this->db->set("hours", $this->input->post("hours_en"));
		$this->db->set("refurbished", $this->input->post("refurbished_en"));
		$this->db->set("weight", $this->input->post("weight_en"));
		$this->db->set("engine", $this->input->post("engine_en"));
		$this->db->set("accessories", $this->input->post("accessories_en"));
		$this->db->set("keyword", $this->input->post("keyword_en"));
		$this->db->set("selling_price", $this->input->post("selling_price_en"));
		$this->db->where("id", $query_en_id);
		$this->db->update("ads_lng");
		
		
		
		
		
		$this->db->where("ad_id", $id);
		$this->db->where("language_code", 'es');
		$query = $this->db->get("ads_lng");
		$query = $query->row();
		
		$query_es_id = $query->id;
		
		$this->db->set("ad_id", $id);
		$this->db->set("language_code", 'es');
		$this->db->set("name", $this->input->post("name_es"));
		$this->db->set("company", $this->input->post("company_es"));
		$this->db->set("location", $this->input->post("location_es"));
		$this->db->set("model", $this->input->post("model_es"));
		$this->db->set("year", $this->input->post("year_es"));
		$this->db->set("serial_number", $this->input->post("serial_number_es"));
		$this->db->set("hours", $this->input->post("hours_es"));
		$this->db->set("refurbished", $this->input->post("refurbished_es"));
		$this->db->set("weight", $this->input->post("weight_es"));
		$this->db->set("engine", $this->input->post("engine_es"));
		$this->db->set("accessories", $this->input->post("accessories_es"));
		$this->db->set("keyword", $this->input->post("keyword_es"));
		$this->db->set("selling_price", $this->input->post("selling_price_es"));
		$this->db->where("id", $query_es_id);
		$query_final = $this->db->update("ads_lng");
		
		if($query_final){
			return TRUE;
		}else{
			return FALSE;
		}
		
	}
	
	public function delete($id){
		$this->db->where("id", $id);
		$query = $this->db->delete("ads");
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}