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
		$this->db->select("ad.id, ad.name, ad.seller_id, sd.name AS seller_name, ad.category_id, c.category_name AS category_name, ad.parent_cat, ad.ad_posting_date, ad.location, ad.country_id, ad.model, ad.year, ad.serial_number, ad.hours, ad.refurbished, ad.weight, ad.`engine`, ad.accessories, ad.keyword, ad.selling_price, ad.main_image, ad.pictures, ad.active");
		$this->db->from("ads AS ad");
		$this->db->join("categories AS c", "c.id = ad.category_id");
		$this->db->join("seller_detail AS sd", "sd.id = ad.seller_id");
		return $this->db->get();
	}
	
	public function getads($id){
		$this->db->where("id", $id);
		$query = $this->db->get("ads");
		return $query->row();
	}
	
	public function load_parent_by_id($id){
		if($id=="0"){
			return FALSE;
		}
		$this->db->where("parent_cat", $id);
		return $this->db->get("categories");
	}
	
	public function update($id, $main_image, $pictures){
		$this->db->set("name", $this->input->post("name"));
		$this->db->set("company", $this->input->post("company"));
		$this->db->set("seller_id", $this->input->post("seller_id"));
		$this->db->set("category_id", $this->input->post("category_id"));
		$this->db->set("parent_cat", $this->input->post("parent_cat"));
		$this->db->set("ad_posting_date", date("Y-m-d", strtotime($this->input->post("ad_posting_date"))));
		$this->db->set("location", $this->input->post("location"));
		$this->db->set("country_id", $this->input->post("country_id"));
		$this->db->set("model", $this->input->post("model"));
		$this->db->set("year", $this->input->post("year"));
		$this->db->set("serial_number", $this->input->post("serial_number"));
		$this->db->set("hours", $this->input->post("hours"));
		$this->db->set("refurbished", $this->input->post("refurbished"));
		$this->db->set("weight", $this->input->post("weight"));
		$this->db->set("engine", $this->input->post("engine"));
		$this->db->set("accessories", $this->input->post("accessories"));
		$this->db->set("keyword", $this->input->post("keyword"));
		$this->db->set("selling_price", $this->input->post("selling_price"));
		$this->db->set("main_image", $main_image);
		$this->db->set("pictures", $pictures);
		$this->db->where("id", $id);
		$query = $this->db->update("ads");
		if($query){
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