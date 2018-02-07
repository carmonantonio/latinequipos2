<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Home_Model extends CI_Model{
	
	public function load_all_countries(){
		return $this->db->get("countries");
	}
	
	public function load_ads_row(){
		$this->db->select("ad.id, ad.name, ad.company, ad.seller_id, sd.name AS seller_name, ad.category_id, c.category_name AS category_name, cou.name as country, ad.parent_cat, ad.ad_posting_date, ad.location, ad.country_id, ad.model, ad.year, ad.serial_number, ad.hours, ad.refurbished, ad.weight, ad.`engine`, ad.accessories, ad.keyword, ad.selling_price, ad.main_image, ad.pictures, ad.active");
		$this->db->from("ads AS ad");
		$this->db->join("categories AS c", "c.id = ad.category_id");
		$this->db->join("countries AS cou", "cou.id = ad.country_id", "LEFT");
		$this->db->join("seller_detail AS sd", "sd.id = ad.seller_id");
		$this->db->order_by("ad.id", "DESC");
		$this->db->limit("8");
		return $this->db->get();
	}
	
	
	public function load_main_cat(){
		$this->db->where("parent_cat", "0");
		return $this->db->get("categories");
	}
	
	public function view_main_cat_show(){
		$this->db->where("parent_cat", "0");
		$this->db->where("image_show", "Y");
		$this->db->limit("6");
		return $this->db->get("categories");
	}
	
	public function load_ads_by_id($id=FALSE, $low_range, $high_range, $country){
		$side_bar_categories = $this->input->post("side_bar_categories");
		$side_bar_sub_categories = $this->input->post("side_bar_sub_categories");
		$side_bar_from = $this->input->post("side_bar_from");
		$side_bar_to = $this->input->post("side_bar_to");
		$search_string = $this->input->post("search_string");
		
		$this->db->select("ad.id, ad.name, ad.company, ad.seller_id, sd.name AS seller_name, ad.category_id, c.category_name AS category_name, cou.name as country, ad.parent_cat, cat.category_name AS parent_category, ad.ad_posting_date, ad.location, ad.country_id, ad.model, ad.year, ad.serial_number, ad.hours, ad.refurbished, ad.weight, ad.`engine`, ad.accessories, ad.keyword, ad.selling_price, ad.main_image, ad.pictures, ad.active");
		$this->db->from("ads AS ad");
		$this->db->join("categories AS c", "c.id = ad.category_id");
		$this->db->join("seller_detail AS sd", "sd.id = ad.seller_id");
		$this->db->join("categories AS cat", "cat.id = ad.parent_cat");
		$this->db->join("countries AS cou", "cou.id = ad.country_id", "LEFT");
		
		if($id!=FALSE){
			$this->db->where("ad.parent_cat", $id);
		}
		
		if(!empty($side_bar_categories)){
			$this->db->where("ad.category_id", $side_bar_categories);
		}
		
		if(!empty($side_bar_sub_categories)){
			$this->db->where("ad.parent_cat", $side_bar_sub_categories);
		}
		
		if(!empty($side_bar_from) && !empty($side_bar_to)){
			$this->db->where('year >=', $side_bar_from);
			$this->db->where('year <=', $side_bar_to);
		}
		
		if(!empty($search_string)){
			$this->db->where("ad.name LIKE '%$search_string%' OR sd.name LIKE '%$search_string%' OR cou.name LIKE '%$search_string%' OR c.category_name LIKE '%$search_string%' OR ad.make LIKE '%$search_string%' OR ad.model LIKE '%$search_string%' OR ad.year LIKE '%$search_string%' OR ad.price_excl LIKE '%$search_string%' OR ad.referance LIKE '%$search_string%'");
		}
		
		if(!empty($low_range) && !empty($high_range)){
			$this->db->where("ad.price_excl BETWEEN '$low_range' AND '$high_range'");
		}
		
		if(!empty($country)){
			$this->db->where("ad.country_id", $country);
		}
		
		
		$this->db->order_by("ad.id", "DESC");
		return $this->db->get();
		
	}
	
	public function load_ad_by_id($id){
		$this->db->select("ad.id, ad.name, ad.company, ad.seller_id, sd.name AS seller_name, sd.phone_number AS seller_contact, sd.email AS seller_email, sd.address AS seller_address, sd.occupation AS seller_occupation, sd.description AS seller_description, sd.name AS seller_name, ad.category_id, c.category_name AS category_name, cou.name as country, ad.parent_cat, cat.category_name AS parent_category, ad.ad_posting_date, ad.location, ad.country_id, ad.model, ad.year, ad.serial_number, ad.hours, ad.refurbished, ad.weight, ad.`engine`, ad.accessories, ad.keyword, ad.selling_price, ad.main_image, ad.pictures, ad.active, ad.total_views");
		$this->db->from("ads AS ad");
		$this->db->join("categories AS c", "c.id = ad.category_id");
		$this->db->join("seller_detail AS sd", "sd.id = ad.seller_id");
		$this->db->join("categories AS cat", "cat.id = ad.parent_cat");
		$this->db->join("countries AS cou", "cou.id = ad.country_id", "LEFT");
		$this->db->where("ad.id", $id);
		$this->db->order_by("ad.id", "DESC");
		$query = $this->db->get();
		return $query->row();
	}
	
	public function update_views($new_view, $id){
		$this->db->set("total_views", $new_view);
		$this->db->where("id", $id);
		$this->db->update("ads");
		return TRUE;
	}
	
	public function search_by_cat($id){
		$this->db->select("ad.id, ad.name, ad.company, ad.seller_id, sd.name AS seller_name, ad.category_id, c.category_name AS category_name, cou.name as country, ad.parent_cat, cat.category_name AS parent_category, ad.ad_posting_date, ad.location, ad.country_id, ad.model, ad.year, ad.serial_number, ad.hours, ad.refurbished, ad.weight, ad.`engine`, ad.accessories, ad.keyword, ad.selling_price, ad.main_image, ad.pictures, ad.active");
		$this->db->from("ads AS ad");
		$this->db->join("categories AS c", "c.id = ad.category_id");
		$this->db->join("seller_detail AS sd", "sd.id = ad.seller_id");
		$this->db->join("categories AS cat", "cat.id = ad.parent_cat");
		$this->db->join("countries AS cou", "cou.id = ad.country_id", "LEFT");
		$this->db->where("ad.category_id", $id);
		$this->db->order_by("ad.id", "DESC");
		return $this->db->get();
	}
	
	public function load_products($counter){
		$this->db->select("ad.id, ad.name, ad.company, ad.seller_id, sd.name AS seller_name, sd.phone_number AS seller_contact, sd.email AS seller_email, sd.address AS seller_address, sd.occupation AS seller_occupation, sd.description AS seller_description, sd.name AS seller_name, ad.category_id, c.category_name AS category_name, cou.name as country, ad.parent_cat, cat.category_name AS parent_category, ad.ad_posting_date, ad.location, ad.country_id, ad.model, ad.year, ad.serial_number, ad.hours, ad.refurbished, ad.weight, ad.`engine`, ad.accessories, ad.keyword, ad.selling_price, ad.main_image, ad.pictures, ad.active");
		$this->db->from("ads AS ad");
		$this->db->join("categories AS c", "c.id = ad.category_id");
		$this->db->join("seller_detail AS sd", "sd.id = ad.seller_id");
		$this->db->join("categories AS cat", "cat.id = ad.parent_cat");
		$this->db->join("countries AS cou", "cou.id = ad.country_id", "LEFT");
		$this->db->order_by("ad.id", "DESC");
		$this->db->limit("10", $counter);
		return $this->db->get();
		//$this->db->get();
		//print_r($this->db->last_query()); exit;
	}
	
	public function load_products_filter($val){
		$this->db->select("ad.id, ad.name, ad.company, ad.seller_id, sd.name AS seller_name, sd.phone_number AS seller_contact, sd.email AS seller_email, sd.address AS seller_address, sd.occupation AS seller_occupation, sd.description AS seller_description, sd.name AS seller_name, ad.category_id, c.category_name AS category_name, cou.name as country, ad.parent_cat, cat.category_name AS parent_category, ad.ad_posting_date, ad.location, ad.country_id, ad.model, ad.year, ad.serial_number, ad.hours, ad.refurbished, ad.weight, ad.`engine`, ad.accessories, ad.keyword, ad.selling_price, ad.main_image, ad.pictures, ad.active");
		$this->db->from("ads AS ad");
		$this->db->join("categories AS c", "c.id = ad.category_id");
		$this->db->join("seller_detail AS sd", "sd.id = ad.seller_id");
		$this->db->join("categories AS cat", "cat.id = ad.parent_cat");
		$this->db->join("countries AS cou", "cou.id = ad.country_id", "LEFT");
		if($val=="asc"){
			$this->db->order_by("ad.name", "ASC");
		}
		
		if($val=="viewed"){
			$this->db->order_by("ad.total_views", "DESC");
		}
		
		return $this->db->get();
	}
	
	public function total_categories(){
		$this->db->where("parent_cat", "0");
		$query = $this->db->get("categories");
		return $query->num_rows();
	}
	
	public function get_first($first_row){
		$this->db->where("parent_cat", "0");
		$this->db->limit($first_row, "");
		return $this->db->get("categories");
	}
	
	public function get_second($first_row){
		$this->db->where("parent_cat", "0");
		$this->db->limit($first_row, $first_row);
		return $this->db->get("categories");
	}
	
	public function seller_detail($id){
		$this->db->where("id", $id);
		$query = $this->db->get("seller_detail");
		return $query->row();
	}
	
	public function related_products($id){
		$this->db->where("parent_cat", $id);
		return $this->db->get("ads");
	}
	
}