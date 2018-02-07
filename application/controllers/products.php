<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
	
	public function index(){
		$counter = $this->input->post("counter");
		if($counter==""){
			$counter = 0;
		}
		
		$data['main_cat_search'] = $this->Home_Model->load_main_cat();
		$data["products"] = $this->Home_Model->load_products($counter);
		$data["counter"] = $counter;
		//echo "<pre>"; print_r($data["products"]->result()); exit;
		$this->load->view('web/products', $data);
	}
	
	public function load_more(){
		$counter = $this->input->post("counter");
		$data['main_cat_search'] = $this->Home_Model->load_main_cat();
		$data["products"] = $this->Home_Model->load_products($counter);
		$this->load->view('web/products_load_more', $data);
	}
	
	public function filter_search(){
		$val = $this->input->post("val");
		
		$data['main_cat_search'] = $this->Home_Model->load_main_cat();
		$data["products"] = $this->Home_Model->load_products_filter($val);
		$this->load->view('web/filter_search', $data);
	}
}