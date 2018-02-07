<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	


	public function index(){
		
		$data['main_cat1'] = $this->Home_Model->view_main_cat_show();
		$data['load_ads_row'] = $this->Home_Model->load_ads_row();
		$data['main_cat'] = $this->Home_Model->load_main_cat();
		$data['main_cat_search'] = $this->Home_Model->load_main_cat();
		$this->load->view('web/homepage', $data);
	}
	
	public function search($id=FALSE){
		$country = $this->input->post("country");
		//echo "<pre>"; print_r($country); exit;
		$price_range = $this->input->post("price_range");
		if(!empty($price_range)){
			$price_range = explode(",", $price_range);
			$low_range = $price_range[0];
			$high_range = $price_range[1];
		}else{
			$low_range = '';
			$high_range = '';
		}
		
		$data['ads'] = $this->Home_Model->load_ads_by_id($id, $low_range, $high_range, $country);
		/*echo "<pre>"; print_r($data['ads']->result()); exit;*/
		$data['main_cat'] = $this->Home_Model->load_main_cat();
		$data['main_cat_search'] = $this->Home_Model->load_main_cat();
		
		$this->load->view('web/search', $data);
	}
	
	public function search_by_cat($id){
		$data['ads'] = $this->Home_Model->search_by_cat($id);
		
		$this->db->where("id", $id);
		$query = $this->db->get("categories");
		$query_run = $query->row();
		
		$data['title'] = $query_run->category_name;
		
		$data['main_cat'] = $this->Home_Model->load_main_cat();
		$data['main_cat_search'] = $this->Home_Model->load_main_cat();
		$this->load->view('web/search', $data);
	}
	
	public function search_ad($id){
		$data['ad_by_id'] = $this->Home_Model->load_ad_by_id($id);
		$previous_views = $data['ad_by_id']->total_views;
		$new_view = $previous_views+1;
		$this->Home_Model->update_views($new_view, $id);
		$data['main_cat_search'] = $this->Home_Model->load_main_cat();
		$data['seller_data'] = $this->Home_Model->seller_detail($data['ad_by_id']->seller_id);
		
		//load ads by parent categories, related products
		$data['related_products'] = $this->Home_Model->related_products($data['ad_by_id']->parent_cat);
		$this->load->view('web/search_ad', $data);
	}
	
	public function load_parent(){
		$id = $this->input->post("id");
		$data['parent_cat'] = $this->Ads_Model->load_parent_by_id($id);
		$this->load->view("web/parent_cat_home", $data);
	}
}
