<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Home_Model extends CI_Model{
	
	public function load_all_countries(){
		return $this->db->get("countries");
	}
	
	public function load_all_ads(){
		
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		
		
		$this->db->where("language_code",$lng_code);
		$query = $this->db->get("ads_lng");
		return $query;
		//echo "<pre>"; print_r($query->result()); exit;
	}
	
	public function load_ads_row(){
		/*$this->db->select("ad.id, ad.name, ad.company, ad.seller_id, sd.name AS seller_name, ad.category_id, c.category_name AS category_name, cou.name as country, ad.parent_cat, ad.ad_posting_date, ad.location, ad.country_id, ad.model, ad.year, ad.serial_number, ad.hours, ad.refurbished, ad.weight, ad.`engine`, ad.accessories, ad.keyword, ad.selling_price, ad.main_image, ad.pictures, ad.active");
		$this->db->from("ads AS ad");
		$this->db->join("categories AS c", "c.id = ad.category_id");
		$this->db->join("countries AS cou", "cou.id = ad.country_id", "LEFT");
		$this->db->join("seller_detail AS sd", "sd.id = ad.seller_id");
		$this->db->order_by("ad.id", "DESC");
		$this->db->limit("8");
		$this->db->get();*/
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		
		return $this->db->query("SELECT ad.id, al.name, al.company, ad.seller_id, sd.name AS seller_name, ad.category_id, c.category_name AS category_name, cou.name AS country, ad.parent_cat, ad.ad_posting_date, al.location, ad.country_id, al.model, al.`year`, al.serial_number, al.hours, al.refurbished, al.weight, al.`engine`, al.accessories, al.keyword, al.selling_price, ad.main_image, ad.pictures, ad.active
		FROM ads AS ad
		JOIN ads_lng AS al ON al.ad_id = ad.id
		JOIN categories_lng AS c ON c.cat_id = ad.category_id
		LEFT JOIN countries AS cou ON cou.id = ad.country_id
		JOIN seller_detail_lng AS sd ON sd.seller_id = ad.seller_id
		WHERE al.language_code = '$lng_code' AND c.language_code = '$lng_code' AND sd.language_code = '$lng_code'
		ORDER BY ad.id DESC
		LIMIT 8");
		
	}
	
	
	public function load_main_cat(){
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		$query = $this->db->query("SELECT c.id as id, c.parent_cat, cl.language_code, cl.category_name, c.image, c.image_show
		FROM categories AS c
		JOIN categories_lng AS cl ON cl.cat_id = c.id
		WHERE c.parent_cat = 0 AND cl.language_code = '$lng_code'");
		return $query;
	}
	
	public function view_main_cat_show(){
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		$query = $this->db->query("SELECT c.id as id, c.parent_cat, cl.language_code, cl.category_name, c.image, c.image_show
		FROM categories AS c
		JOIN categories_lng AS cl ON cl.cat_id = c.id
		WHERE c.parent_cat = 0 AND c.image_show = 'Y' AND cl.language_code = '$lng_code'");
		return $query;
	}
	
	public function load_ads_by_id($id=FALSE, $low_range, $high_range, $country, $product_name, $keyword){
		$side_bar_categories = $this->input->post("side_bar_categories");
		$side_bar_sub_categories = $this->input->post("side_bar_sub_categories");
		$side_bar_from = $this->input->post("side_bar_from");
		$side_bar_to = $this->input->post("side_bar_to");
		$search_string = $this->input->post("search_string");
		
		
		
		// $this->db->select("ad.id, ad.name, ad.company, ad.seller_id, sd.name AS seller_name, ad.category_id, c.category_name AS category_name, cou.name as country, ad.parent_cat, cat.category_name AS parent_category, ad.ad_posting_date, ad.location, ad.country_id, ad.model, ad.year, ad.serial_number, ad.hours, ad.refurbished, ad.weight, ad.`engine`, ad.accessories, ad.keyword, ad.selling_price, ad.main_image, ad.pictures, ad.active");
		// $this->db->from("ads AS ad");
		// $this->db->join("categories AS c", "c.id = ad.category_id");
		// $this->db->join("seller_detail AS sd", "sd.id = ad.seller_id");
		// $this->db->join("categories AS cat", "cat.id = ad.parent_cat");
		// $this->db->join("countries AS cou", "cou.id = ad.country_id", "LEFT");
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		
		
		$this->db->select("ad.id, al.name, al.company, ad.seller_id, sdl.name AS seller_name, sdl.phone_number AS seller_contact, sdl.email AS seller_email, sdl.address AS seller_address, sdl.occupation AS seller_occupation, sdl.description AS seller_description, c1.category_name AS category_name, cou.name AS country, ad.parent_cat, c2.category_name AS parent_category, ad.ad_posting_date, al.location, ad.category_id, al.model, al.year, al.serial_number, al.hours, al.refurbished, al.weight, al.`engine`, al.accessories, al.keyword, al.selling_price, ad.main_image, ad.pictures, ad.active, ad.total_views");
		$this->db->from("ads AS ad");
		$this->db->join("ads_lng AS al", "al.ad_id = ad.id");
		$this->db->join("seller_detail_lng AS sdl", "sdl.seller_id = ad.seller_id");
		$this->db->join("categories_lng AS c1", "c1.cat_id = ad.category_id");
		$this->db->join("categories_lng AS c2", "c2.cat_id = ad.parent_cat");
		$this->db->join("countries AS cou", "cou.id = ad.country_id");
		$this->db->where("al.language_code", $lng_code);
		$this->db->where("sdl.language_code", $lng_code);
		$this->db->where("c1.language_code", $lng_code);
		$this->db->where("c2.language_code", $lng_code);

		
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
			$this->db->where("(al.name LIKE '%$search_string%' OR sdl.name LIKE '%$search_string%' OR cou.name LIKE '%$search_string%' OR c1.category_name LIKE '%$search_string%' OR al.model LIKE '%$search_string%' OR al.year LIKE '%$search_string%' OR al.selling_price LIKE '%$search_string%' OR al.keyword LIKE '%$search_string%')");
		}
		
		if(!empty($low_range) && !empty($high_range)){
			$this->db->where("al.selling_price BETWEEN '$low_range' AND '$high_range'");
		}
		
		if(!empty($country)){
			$this->db->where("ad.country_id", $country);
		}
		
		if(!empty($product_name)){
			$this->db->where("al.name", $product_name);
		}
		
		if(!empty($keyword)){
			$this->db->where("al.keyword LIKE '%$keyword%'");
		}
		
		$this->db->order_by("ad.id", "DESC");
		
		return $this->db->get();
		
	}
	
	public function load_ad_by_id($id){
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		
		$query = $this->db->query('Select ad.id, al.name, al.company, ad.seller_id, sdl.name AS seller_name, sdl.phone_number AS seller_contact, sdl.email AS seller_email, sdl.address AS seller_address, sdl.occupation AS seller_occupation, sdl.description AS seller_description, c1.category_name AS category_name, cou.name AS country, c2.id as parent_cat, c2.category_name AS parent_category, ad.ad_posting_date, al.location, ad.category_id, al.model, al.year, al.serial_number, al.hours, al.refurbished, al.weight, al.`engine`, al.accessories, al.keyword, al.selling_price, ad.main_image, ad.pictures, ad.active, ad.total_views 
				FROM ads AS ad
				JOIN ads_lng as al ON al.ad_id = ad.id
				JOIN seller_detail_lng AS sdl ON sdl.seller_id = ad.seller_id
				JOIN categories_lng AS c1 ON c1.cat_id = ad.category_id
				JOIN categories_lng AS c2 ON c2.cat_id = ad.parent_cat
				JOIN countries AS cou ON cou.id = ad.country_id
				WHERE ad.id = "'.$id.'" and al.language_code = "'.$lng_code.'" AND sdl.language_code = "'.$lng_code.'" AND c1.language_code = "'.$lng_code.'" AND c2.language_code = "'.$lng_code.'"
				');
		return $query->row();
	}
	
	public function load_ad_by_id_new($id){
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		
		$query = $this->db->query("SELECT ad.id, al.name, al.company, ad.seller_id, sdl.name AS seller_name, sdl.phone_number AS seller_contact, sdl.email AS seller_email, sdl.address AS seller_address, sdl.occupation AS seller_occupation, sdl.description AS seller_description, c1.category_name AS category_name, cou.name AS country, c2.id as parent_cat, c2.category_name AS parent_category, ad.ad_posting_date, al.location, ad.category_id, al.model, al.year, al.serial_number, al.hours, al.refurbished, al.weight, al.`engine`, al.accessories, al.keyword, al.selling_price, ad.main_image, ad.pictures, ad.active, ad.total_views
		FROM ads AS ad
		JOIN ads_lng AS al ON al.ad_id = ad.id
		JOIN seller_detail_lng AS sdl ON sdl.seller_id = ad.seller_id
		JOIN categories_lng AS c1 ON c1.cat_id = ad.category_id
		JOIN categories_lng AS c2 ON c2.cat_id = ad.parent_cat
		JOIN countries AS cou ON cou.id = ad.country_id
		WHERE ad.id = ".$id." AND al.language_code = '".$lng_code."' AND sdl.language_code = '".$lng_code."' AND c1.language_code = '".$lng_code."' AND c2.language_code = '".$lng_code."'");
		return $query->row();
	}
	
	
	public function load_ad_by_id_2($id){
		
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		
		$query = $this->db->query("SELECT ad.id, al.name, al.company, ad.seller_id, sdl.name AS seller_name, sdl.phone_number AS seller_contact, sdl.email AS seller_email, sdl.address AS seller_address, sdl.occupation AS seller_occupation, sdl.description AS seller_description, c1.category_name AS category_name, cou.name AS country, ad.parent_cat, c2.category_name AS parent_category, ad.ad_posting_date, al.location, ad.category_id, al.model, al.year, al.serial_number, al.hours, al.refurbished, al.weight, al.`engine`, al.accessories, al.keyword, al.selling_price, ad.main_image, ad.pictures, ad.active, ad.total_views
		FROM ads AS ad
		JOIN ads_lng AS al ON al.ad_id = ad.id
		JOIN seller_detail_lng AS sdl ON sdl.seller_id = ad.seller_id
		JOIN categories_lng AS c1 ON c1.cat_id = ad.category_id
		JOIN categories_lng AS c2 ON c2.cat_id = ad.parent_cat
		JOIN countries AS cou ON cou.id = ad.country_id
		WHERE ad.id = $id AND al.language_code = '$lng_code' AND sdl.language_code = '$lng_code' AND c1.language_code = '$lng_code' AND c2.language_code = '$lng_code'");
		return $query->row();
	}
	
	public function update_views($new_view, $id){
		$this->db->set("total_views", $new_view);
		$this->db->where("id", $id);
		$this->db->update("ads");
		return TRUE;
	}
	
	public function search_by_cat($id){
		// $this->db->select("ad.id, ad.name, ad.company, ad.seller_id, sd.name AS seller_name, ad.category_id, c.category_name AS category_name, cou.name as country, ad.parent_cat, cat.category_name AS parent_category, ad.ad_posting_date, ad.location, ad.country_id, ad.model, ad.year, ad.serial_number, ad.hours, ad.refurbished, ad.weight, ad.`engine`, ad.accessories, ad.keyword, ad.selling_price, ad.main_image, ad.pictures, ad.active");
		// $this->db->from("ads AS ad");
		// $this->db->join("categories AS c", "c.id = ad.category_id");
		// $this->db->join("seller_detail AS sd", "sd.id = ad.seller_id");
		// $this->db->join("categories AS cat", "cat.id = ad.parent_cat");
		// $this->db->join("countries AS cou", "cou.id = ad.country_id", "LEFT");
		// $this->db->where("ad.category_id", $id);
		// $this->db->order_by("ad.id", "DESC");
		// return $this->db->get();
		
		
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		
		$query = $this->db->query("SELECT ad.id, al.name, al.company, ad.seller_id, sdl.name AS seller_name, sdl.phone_number AS seller_contact, sdl.email AS seller_email, sdl.address AS seller_address, sdl.occupation AS seller_occupation, sdl.description AS seller_description, c1.category_name AS category_name, cou.name AS country, ad.parent_cat, c2.category_name AS parent_category, ad.ad_posting_date, al.location, ad.category_id, al.model, al.year, al.serial_number, al.hours, al.refurbished, al.weight, al.`engine`, al.accessories, al.keyword, al.selling_price, ad.main_image, ad.pictures, ad.active, ad.total_views
		FROM ads AS ad
		JOIN ads_lng AS al ON al.ad_id = ad.id
		JOIN seller_detail_lng AS sdl ON sdl.seller_id = ad.seller_id
		JOIN categories AS c ON c.id = ad.category_id
		JOIN categories_lng AS c1 ON c1.cat_id = ad.category_id
		JOIN categories_lng AS c2 ON c2.cat_id = ad.parent_cat
		JOIN countries AS cou ON cou.id = ad.country_id
		WHERE c.id = $id AND al.language_code = '$lng_code' AND sdl.language_code = '$lng_code' AND c1.language_code = '$lng_code' AND c2.language_code = '$lng_code'");
		
		return $query;
		//echo "<pre>"; print_r($query->result()); exit;
	}
	
	public function load_products($counter){
		// $this->db->select("ad.id, ad.name, ad.company, ad.seller_id, sd.name AS seller_name, sd.phone_number AS seller_contact, sd.email AS seller_email, sd.address AS seller_address, sd.occupation AS seller_occupation, sd.description AS seller_description, sd.name AS seller_name, ad.category_id, c.category_name AS category_name, cou.name as country, ad.parent_cat, cat.category_name AS parent_category, ad.ad_posting_date, ad.location, ad.country_id, ad.model, ad.year, ad.serial_number, ad.hours, ad.refurbished, ad.weight, ad.`engine`, ad.accessories, ad.keyword, ad.selling_price, ad.main_image, ad.pictures, ad.active");
		// $this->db->from("ads AS ad");
		// $this->db->join("categories AS c", "c.id = ad.category_id");
		// $this->db->join("seller_detail AS sd", "sd.id = ad.seller_id");
		// $this->db->join("categories AS cat", "cat.id = ad.parent_cat");
		// $this->db->join("countries AS cou", "cou.id = ad.country_id", "LEFT");
		// $this->db->order_by("ad.id", "DESC");
		// $this->db->limit("10", $counter);
		
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		
		return $this->db->query("SELECT ad.id, al.name, al.company, ad.seller_id, sdl.name AS seller_name, sdl.phone_number AS seller_contact, sdl.email AS seller_email, sdl.address AS seller_address, sdl.occupation AS seller_occupation, sdl.description AS seller_description, c1.category_name AS category_name, cou.name AS country, ad.parent_cat, c2.category_name AS parent_category, ad.ad_posting_date, al.location, ad.category_id, al.model, al.year, al.serial_number, al.hours, al.refurbished, al.weight, al.`engine`, al.accessories, al.keyword, al.selling_price, ad.main_image, ad.pictures, ad.active, ad.total_views
		FROM ads AS ad
		JOIN ads_lng AS al ON al.ad_id = ad.id
		JOIN seller_detail_lng AS sdl ON sdl.seller_id = ad.seller_id
		JOIN categories_lng AS c1 ON c1.cat_id = ad.category_id
		JOIN categories_lng AS c2 ON c2.cat_id = ad.parent_cat
		JOIN countries AS cou ON cou.id = ad.country_id
		WHERE al.language_code = '$lng_code' AND sdl.language_code = '$lng_code' AND c1.language_code = '$lng_code' AND c2.language_code = '$lng_code'
		ORDER BY ad.id DESC
		LIMIT 10 OFFSET $counter");
		//$this->db->get();
		//print_r($this->db->last_query()); exit;
	}
	
	public function load_products_filter($val){
		
		// $this->db->query("SELECT ad.id, al.name, al.company, ad.seller_id, sdl.name AS seller_name, sdl.phone_number AS seller_contact, sdl.email AS seller_email, sdl.address AS seller_address, sdl.occupation AS seller_occupation, sdl.description AS seller_description, c1.category_name AS category_name, cou.name AS country, ad.parent_cat, c2.category_name AS parent_category, ad.ad_posting_date, al.location, ad.category_id, al.model, al.year, al.serial_number, al.hours, al.refurbished, al.weight, al.`engine`, al.accessories, al.keyword, al.selling_price, ad.main_image, ad.pictures, ad.active, ad.total_views
		// FROM ads AS ad
		// JOIN ads_lng AS al ON al.ad_id = ad.id
		// JOIN seller_detail_lng AS sdl ON sdl.seller_id = ad.seller_id
		// JOIN categories_lng AS c1 ON c1.cat_id = ad.category_id
		// JOIN categories_lng AS c2 ON c2.cat_id = ad.parent_cat
		// JOIN countries AS cou ON cou.id = ad.country_id
		// WHERE al.language_code = 'en' AND sdl.language_code = 'en' AND c1.language_code = 'en' AND c2.language_code = 'en'");
		
		
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		
		
		$this->db->select("ad.id, al.name, al.company, ad.seller_id, sdl.name AS seller_name, sdl.phone_number AS seller_contact, sdl.email AS seller_email, sdl.address AS seller_address, sdl.occupation AS seller_occupation, sdl.description AS seller_description, c1.category_name AS category_name, cou.name AS country, ad.parent_cat, c2.category_name AS parent_category, ad.ad_posting_date, al.location, ad.category_id, al.model, al.year, al.serial_number, al.hours, al.refurbished, al.weight, al.`engine`, al.accessories, al.keyword, al.selling_price, ad.main_image, ad.pictures, ad.active, ad.total_views");
		$this->db->from("ads AS ad");
		$this->db->join("ads_lng AS al", "al.ad_id = ad.id");
		$this->db->join("seller_detail_lng AS sdl", "sdl.seller_id = ad.seller_id");
		$this->db->join("categories_lng AS c1", "c1.cat_id = ad.category_id");
		$this->db->join("categories_lng AS c2", "c2.cat_id = ad.parent_cat");
		$this->db->join("countries AS cou", "cou.id = ad.country_id");
		$this->db->where("al.language_code", $lng_code);
		$this->db->where("sdl.language_code", $lng_code);
		$this->db->where("c1.language_code", $lng_code);
		$this->db->where("c2.language_code", $lng_code);
		
		if($val=="asc"){
			$this->db->order_by("al.name", "ASC");
			
		}
		
		if($val=="viewed"){
			$this->db->order_by("ad.total_views", "DESC");
			
		}
		
		if($val=="latest"){
			$this->db->order_by("ad.id", "DESC");
			
		}
		
		return $this->db->get();
		
	}
	
	public function total_categories(){
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}

		$query = $this->db->query("SELECT *
		FROM categories AS c
		JOIN categories_lng AS cl ON cl.cat_id = c.id
		WHERE c.parent_cat = '0' AND cl.language_code = '$lng_code'");
		return $query->num_rows();
	}
	
	public function get_first($first_row){
		return $this->db->query("SELECT *
		FROM categories AS c
		JOIN categories_lng AS cl ON cl.cat_id = c.id
		WHERE c.parent_cat = '0' AND cl.language_code = 'en'
		limit $first_row");
	}
	
	public function get_second($first_row){
		return $this->db->query("SELECT *
		FROM categories AS c
		JOIN categories_lng AS cl ON cl.cat_id = c.id
		WHERE c.parent_cat = '0' AND cl.language_code = 'en'
		LIMIT $first_row OFFSET $first_row");
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
	
	
	public function filter_search($val, $cat_id){
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		
		
		$this->db->select("ad.id, al.name, al.company, ad.seller_id, sdl.name AS seller_name, sdl.phone_number AS seller_contact, sdl.email AS seller_email, sdl.address AS seller_address, sdl.occupation AS seller_occupation, sdl.description AS seller_description, c1.category_name AS category_name, cou.name AS country, ad.parent_cat, c2.category_name AS parent_category, ad.ad_posting_date, al.location, ad.category_id, al.model, al.year, al.serial_number, al.hours, al.refurbished, al.weight, al.`engine`, al.accessories, al.keyword, al.selling_price, ad.main_image, ad.pictures, ad.active, ad.total_views");
		$this->db->from("ads AS ad");
		$this->db->join("ads_lng AS al", "al.ad_id = ad.id");
		$this->db->join("seller_detail_lng AS sdl", "sdl.seller_id = ad.seller_id");
		$this->db->join("categories_lng AS c1", "c1.cat_id = ad.category_id");
		$this->db->join("categories_lng AS c2", "c2.cat_id = ad.parent_cat");
		$this->db->join("countries AS cou", "cou.id = ad.country_id");
		$this->db->where("al.language_code", $lng_code);
		$this->db->where("sdl.language_code", $lng_code);
		$this->db->where("c1.language_code", $lng_code);
		$this->db->where("c2.language_code", $lng_code);
		$this->db->where("ad.category_id", $cat_id);
		if($val=="asc"){
			$this->db->order_by("al.name", "ASC");
		}
		
		if($val=="viewed"){
			$this->db->order_by("ad.total_views", "DESC");
		}
		
		if($val=="latest"){
			$this->db->order_by("ad.id", "DESC");
		}
		
		$query = $this->db->get();
		return $query;
	}
	
	public function search_similar($val){
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		
		
		
		
		$query = $this->db->query("SELECT *
				FROM ads_lng as al
				WHERE al.language_code = '$lng_code' and al.name LIKE '%$val%'");
		$query_run = $query->result();
		$result = array();
		foreach($query_run as $row){
			$result[] = $row->name;
			$result++;
		}
		return $result;
		
	}
	
}