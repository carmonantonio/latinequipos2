<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	/*public function __construct(){
		parent::__construct();
		$SESSION_LANG = $this->session->userdata('language');
		if($SESSION_LANG=="english"){
			$ci = get_instance();
			$ci->config->set_item('language', 'english');
			$this->lang->load('en', 'english');
		}else if($SESSION_LANG=="spanish"){
			$ci = get_instance();
			$ci->config->set_item('language', 'spanish');
			$this->lang->load('sp', 'spanish');
		}
	}*/

	public function index(){
		//print_r($this->session->userdata("language")); exit;
		$data['main_cat1'] = $this->Home_Model->view_main_cat_show();
		$data['load_ads_row'] = $this->Home_Model->load_ads_row();
		$data['main_cat'] = $this->Home_Model->load_main_cat();
		$data['main_cat_search'] = $this->Home_Model->load_main_cat();
		$videos = $this->db->get("videos");
		$data['videos'] = $videos->row();
		$this->load->view('web/homepage', $data);
		//$this->load->view('web/homepage');
	}
	
	public function language_change(){
		$lang = $this->input->get("lang");
		if(!empty($lang)){
			if($lang=="english"){
				$this->session->set_userdata('language', 'english');
				redirect($_SERVER['HTTP_REFERER']);
			}else if($lang=="spanish"){
				$this->session->set_userdata('language', 'spanish');
				redirect($_SERVER['HTTP_REFERER']);
			}else if($lang=="portuguese"){
				$this->session->set_userdata('language', 'portuguese');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}
	
	public function search($id=FALSE){
		
		
		$this->load->helper('form');
		
		$keyword = $this->input->get("keyword");
		
		
		$product_name = $this->input->post("product_name");
		
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
		
		$data['ads'] = $this->Home_Model->load_ads_by_id($id, $low_range, $high_range, $country, $product_name, $keyword);
		
		$data['ads_row'] = $data['ads']->row();
		/*echo "<pre>"; print_r($data['ads']->result()); exit;*/
		$data['main_cat'] = $this->Home_Model->load_main_cat();
		$data['main_cat_search'] = $this->Home_Model->load_main_cat();
		
		$this->load->view('web/search', $data);
	}
	
	public function search_by_cat($id){
		$data['ads'] = $this->Home_Model->search_by_cat($id);
		$data['ads_row'] = $data['ads']->row();
		
		
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		$this->db->where("cat_id", $id);
		$this->db->where("language_code", $lng_code);
		$query = $this->db->get("categories_lng");
		$query_run = $query->row();
		
		$data['title'] = $query_run->category_name;
		
		$data['main_cat'] = $this->Home_Model->load_main_cat();
		$data['main_cat_search'] = $this->Home_Model->load_main_cat();
		$this->load->view('web/search', $data);
	}
	
	public function search_ad($id){
		
		$data['ad_by_id'] = $this->Home_Model->load_ad_by_id_2($id);
		
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
		$data['parent_cat'] = $this->ads_model->load_parent_by_id2($id);
		$this->load->view("web/parent_cat_home", $data);
	}
	
	public function subscribe(){
		$this->db->where("email", $this->input->post("email"));
		$checkexists = $this->db->get("subscribers");
		if($checkexists->num_rows()>0){
			echo "This Email is already exist";
		}else{
			$data = array("email" => $this->input->post("email"));
			if($this->db->insert("subscribers", $data)){
				echo "Tahnk You for Subscrbing Us!";
			};
		}
	}
	
	public function filter_search(){
		$val = $this->input->post("val");
		$cat_id = $this->input->post("cat_id");
		$data["products"] = $this->Home_Model->filter_search($val, $cat_id);
		$this->load->view('web/filter_search', $data);
	}
	
	public function search_similar(){
		$val = $this->input->post("val");
		if(!empty($val)){
			$data_new = $this->Home_Model->search_similar($val);
			$data["json_data"] = json_encode($data_new);
			$this->load->view('web/search_similar', $data);
			//print_r($data);
			
			
			//$this->load->view('web/search_similar', $data);
		}else{
			echo "No Result Found";
		}
	}
}
