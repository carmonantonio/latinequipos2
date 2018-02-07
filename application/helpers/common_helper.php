<?php

function load_main_cat(){
	$si=& get_instance();
	$sess_lang = $si->session->userdata("language");
	
	if($sess_lang==''){
		$lng_code = 'en';
	}else if($sess_lang=='english'){
		$lng_code = 'en';
	}else if($sess_lang=='spanish'){
		$lng_code = 'es';
	}
	
	$ci=& get_instance();
	$ci->load->database();
	
	$query = $ci->db->query("SELECT c.id as id, c.parent_cat, cl.language_code, cl.category_name, c.image, c.image_show
	FROM categories AS c
	JOIN categories_lng AS cl ON cl.cat_id = c.id
	WHERE c.parent_cat = 0 AND cl.language_code = '$lng_code'");
	return $query;
}

function load_parent_cat($id){
	$si=& get_instance();
	$sess_lang = $si->session->userdata("language");
	
	if($sess_lang==''){
		$lng_code = 'en';
	}else if($sess_lang=='english'){
		$lng_code = 'en';
	}else if($sess_lang=='spanish'){
		$lng_code = 'es';
	}
	
	$ci=& get_instance();
	$ci->load->database();
	
	$query = $ci->db->query("SELECT c.id AS id, c.parent_cat, cl.language_code, cl.category_name, c.image, c.image_show
	FROM categories AS c
	JOIN categories_lng AS cl ON cl.cat_id = c.id
	WHERE parent_cat = $id AND cl.language_code = '$lng_code'");
	return $query;
	
	
	$ci=& get_instance();
	$ci->load->database();
	$ci->db->select('*');
	$ci->db->where('parent_cat', $id);
	$ci->db->order_by("category_name", "ASC");
	$query = $ci->db->get('categories');
	return $query;
}

function load_ad($id){
	$ci=& get_instance();
	$ci->load->database();
	$ci->db->select('*');
	$ci->db->where('parent_cat', $id);
	$query = $ci->db->get('ads');
	return $query;
}

function load_countries(){
	$ci=& get_instance();
	$ci->load->database();
	$ci->db->select('*');
	$query = $ci->db->get('countries');
	return $query;
}


function load_top_ad(){
	$ci=& get_instance();
	$ci->load->database();
	$query = $ci->db->get('advertisement');
	return $query->row();
}


?>