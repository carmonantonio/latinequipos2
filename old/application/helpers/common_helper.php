<?php

function load_main_cat(){
	$ci=& get_instance();
	$ci->load->database();
	$ci->db->select('*');
	$ci->db->where('parent_cat', '0');
	$query = $ci->db->get('categories');
	return $query;
}

function load_parent_cat($id){
	$ci=& get_instance();
	$ci->load->database();
	$ci->db->select('*');
	$ci->db->where('parent_cat', $id);
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


?>