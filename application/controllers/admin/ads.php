<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ads extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$user = $this->session->userdata("logged_in");
		if($user!=TRUE){
			//admin folder
			redirect("login");
		}
	}
	
	public function view(){
		$data["ads"] = $this->ads_model->view_all();
		$this->load->view("admin/ads/view", $data);
	}

	public function Add(){
		$data["sellers_en"] = $this->Seller_Model->view_all_en();
		$data["sellers_es"] = $this->Seller_Model->view_all_es();
		$data["categories_en"] = $this->Categories_Model->view_main_cat_en();
		$data["categories_es"] = $this->Categories_Model->view_main_cat_es();
		$data['countries'] = $this->Categories_Model->load_countries();
		$this->load->view('admin/ads/add', $data);
	}
	
	public function insert(){
		
		$seller_id_en 			= $this->input->post("seller_id_en");
		$seller_id_es 			= $this->input->post("seller_id_es");
		
		$category_id_en 		= $this->input->post("category_id_en");
		$category_id_es 		= $this->input->post("category_id_es");
		
		$parent_cat_en 			= $this->input->post("parent_cat_en");
		$parent_cat_es 			= $this->input->post("parent_cat_es");
		
		$ad_posting_date 	= date("Y-m-d", strtotime($this->input->post("ad_posting_date")));
		$country_id 		= $this->input->post("country_id");
		
		
		$language_code			= 'en';
		$name_en 				= $this->input->post("name_en");
		$company_en 			= $this->input->post("company_en");
		$location_en 			= $this->input->post("location_en");
		$model_en 				= $this->input->post("model_en");
		$year_en 				= $this->input->post("year_en");
		$serial_number_en 		= $this->input->post("serial_number_en");
		$hours_en 				= $this->input->post("hours_en");
		$refurbished_en 		= $this->input->post("refurbished_en");
		$weight_en 				= $this->input->post("weight_en");
		$engine_en		 		= $this->input->post("engine_en");
		$accessories_en 		= $this->input->post("accessories_en");
		$keyword_en 			= $this->input->post("keyword_en");
		$selling_price_en		= $this->input->post("selling_price_en");
		
		
		$language_code			= 'es';
		$name_es 				= $this->input->post("name_es");
		$company_es 			= $this->input->post("company_es");
		$location_es 			= $this->input->post("location_es");
		$model_es 				= $this->input->post("model_es");
		$year_es 				= $this->input->post("year_es");
		$serial_number_es 		= $this->input->post("serial_number_es");
		$hours_es 				= $this->input->post("hours_es");
		$refurbished_es 		= $this->input->post("refurbished_es");
		$weight_es 				= $this->input->post("weight_es");
		$engine_es		 		= $this->input->post("engine_es");
		$accessories_es 		= $this->input->post("accessories_es");
		$keyword_es 			= $this->input->post("keyword_es");
		$selling_price_es		= $this->input->post("selling_price_es");
		
		if($seller_id_en!=$seller_id_es){
			$this->session->set_flashdata('error_occur', 'Both Seller Should be Same');
			redirect("admin/ads/add");
			
		}
		
		if($category_id_en!=$category_id_es){
			$this->session->set_flashdata('error_occur', 'Both Categories Should be Same');
			redirect("admin/ads/add");
			
		}
		
		if($parent_cat_en!=$parent_cat_es){
			$this->session->set_flashdata('error_occur', 'Both Parent Categories Should be Same');
			redirect("admin/ads/add");
			
		}
		
		//Start Upload Main Image Here
		$config['upload_path']          = './assets/web/uploads/products/';
		$config['allowed_types']        = 'gif|jpg|JPG|png';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('userfile1');
		$data = $this->upload->data();
		$uploadedfile = $data["full_path"];
		$imagetype = $data["image_type"];
		if($imagetype=="png"){
			$src = imagecreatefrompng($uploadedfile);
		}else{
			$src = imagecreatefromjpeg($uploadedfile);
		}
		list($width,$height)=getimagesize($uploadedfile);
		$newheight=200;
		//$newwidth=($width/$height)*200;
		$newwidth=200;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		$filename = $uploadedfile;
		imagejpeg($tmp,$filename,100);
		imagedestroy($src);
		imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
		// has completed.
		$main_image = $data["file_name"];
		//End Upload Main Image Here
		
		
		//Start Upload Other Images Here
		$cpt = $_FILES['userfile']['name'];
		
		$image_name_uploaded = array();
		foreach($cpt as $key => $value){
			unset($config);
			$config = array();
			$config['upload_path']   = './assets/web/uploads/products/'; 
			$config['allowed_types'] = 'gif|jpg|JPG|png';
			$config['overwrite'] = FALSE;
			$config['remove_spaces'] = FALSE;
			$config['file_name'] = $_FILES['userfile']['name'][$key];
	
			$_FILES['f']['name'] =  $_FILES['userfile']['name'][$key];
			$_FILES['f']['type'] = $_FILES['userfile']['type'][$key];
			$_FILES['f']['tmp_name'] = $_FILES['userfile']['tmp_name'][$key];
			$_FILES['f']['error'] = $_FILES['userfile']['error'][$key];
			$_FILES['f']['size'] = $_FILES['userfile']['size'][$key];
	
			$this->load->library('upload', $config);
			$this->upload->initialize($config);            
			if (! $this->upload->do_upload('f')){
				$data['errors'] = $this->upload->display_errors();
			}else{
				$image_name = $this->upload->data();
				unset($config);
				$config = array();
				$config['image_library']    = 'gd2';
				$config['source_image']     = './assets/web/uploads/products/' . $image_name["file_name"];
				$config['width']            = 600;
				$config['height']           = 600;
		
				$this->load->library('image_lib', $config);
				$this->image_lib->clear();
				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				$types = array('.jpg');	

				$image_name_uploaded[] = $image_name["file_name"];			
			}
		}
		$image_name_uploaded++;
		//End Upload Other Images Here
		
		$image_name_uploaded = json_encode($image_name_uploaded);
		
		
		$pictures 			= $image_name_uploaded;
		$main_image 		= $main_image;
		
		$data_ads = array(
			"seller_id"			=>	$seller_id_en,
			"category_id"		=>	$category_id_en,
			"parent_cat"		=>	$parent_cat_en,
			"ad_posting_date"	=>	$ad_posting_date,
			"country_id"		=>	$country_id,
			"main_image"		=>	$main_image,
			"pictures"			=>	$pictures,
		);
		
		
		
		$query_ads = $this->db->insert('ads', $data_ads);
		if($query_ads){
			$ad_id = $this->db->insert_id();
			
			$data_en = array(
				"ad_id"				=>	$ad_id,
				"language_code"		=>	'en',
				"name"				=>	$name_en,
				"company"			=>	$company_en,
				"location"			=>	$location_en,
				"model"				=>	$model_en,
				"year"				=>	$year_en,
				"serial_number"		=>	$serial_number_en,
				"hours"				=>	$hours_en,
				"refurbished"		=>	$refurbished_en,
				"weight"			=>	$weight_en,
				"engine"			=>	$engine_en,
				"accessories"		=>	$accessories_en,
				"keyword"			=>	$keyword_en,
				"selling_price"		=>	$selling_price_en,
			);
			
			$this->db->insert('ads_lng', $data_en);
			
			
			$data_es = array(
				"ad_id"				=>	$ad_id,
				"language_code"		=>	'es',
				"name"				=>	$name_es,
				"company"			=>	$company_es,
				"location"			=>	$location_es,
				"model"				=>	$model_es,
				"year"				=>	$year_es,
				"serial_number"		=>	$serial_number_es,
				"hours"				=>	$hours_es,
				"refurbished"		=>	$refurbished_es,
				"weight"			=>	$weight_es,
				"engine"			=>	$engine_es,
				"accessories"		=>	$accessories_es,
				"keyword"			=>	$keyword_es,
				"selling_price"		=>	$selling_price_es,
			);
			
			$success = $this->db->insert('ads_lng', $data_es);
			if($success){
				$this->session->set_flashdata('added_success', 'You have added one Ad successfully');
				redirect("admin/ads/add");
			}else{
				$this->session->set_flashdata('error_occur', 'Some error occured please try again');
				redirect("admin/ads/add");
			}
		}
	}
	
	
	
	public function getads($id){
		$data["sellers_en"] = $this->Seller_Model->view_all_en();
		$data["sellers_es"] = $this->Seller_Model->view_all_es();
		$data["categories_en"] = $this->Categories_Model->view_main_cat_en();
		$data["categories_es"] = $this->Categories_Model->view_main_cat_es();
		$data['countries'] = $this->Categories_Model->load_countries();
		
		//echo "<pre>"; print_r($data['countries']->result()); exit;

		$data["ads_en"] = $this->ads_model->getads_en($id);
		$data["ads_es"] = $this->ads_model->getads_es($id);
		$this->load->view("admin/ads/edit", $data);
	}
	
	public function load_parent(){
		$id = $this->input->post("id");
		$val = $this->input->post("val");
		
		$data['parent_cat'] = $this->ads_model->load_parent_by_id($id, $val);
		$this->load->view("admin/ads/parent_cat", $data);
	}
	
	public function update($id){
		
		$seller_id_en 			= $this->input->post("seller_id_en");
		$seller_id_es 			= $this->input->post("seller_id_es");
		
		$category_id_en 		= $this->input->post("category_id_en");
		$category_id_es 		= $this->input->post("category_id_es");
		
		$parent_cat_en 			= $this->input->post("parent_cat_en");
		$parent_cat_es 			= $this->input->post("parent_cat_es");
		
		$ad_posting_date 		= date("Y-m-d", strtotime($this->input->post("ad_posting_date")));
		$country_id 			= $this->input->post("country_id");


		if($seller_id_en!=$seller_id_es){
			$this->session->set_flashdata('error_occur', 'Both Seller Should be Same');
			redirect("admin/ads/getads/".$id);
			
		}
		
		if($category_id_en!=$category_id_es){
			$this->session->set_flashdata('error_occur', 'Both Categories Should be Same');
			redirect("admin/ads/getads/".$id);
			
		}
		
		if($parent_cat_en!=$parent_cat_es){
			$this->session->set_flashdata('error_occur', 'Both Parent Categories Should be Same');
			redirect("admin/ads/getads/".$id);
			
		}

		
		
		
		//Getting Image from db
		$this->db->where("id", $id);
		$query = $this->db->get("ads");
		$query_run = $query->row();
		$main_image_from_db = $query_run->main_image;
		
		
		$main_image = $_FILES["userfile1"];
		$main_image = $main_image["name"];
		//Getting Main Image if Uploaded
		if(!empty($main_image)){
			//deleting file from folder first
			unlink("./assets/web/uploads/products/".$main_image_from_db);
			//Start Upload Main Image Here
			$config['upload_path']          = './assets/web/uploads/products/';
			$config['allowed_types']        = 'gif|jpg|JPG|png';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('userfile1');
			$data = $this->upload->data();
			$uploadedfile = $data["full_path"];
			$imagetype = $data["image_type"];
			if($imagetype=="png"){
				$src = imagecreatefrompng($uploadedfile);
			}else{
				$src = imagecreatefromjpeg($uploadedfile);
			}
			list($width,$height)=getimagesize($uploadedfile);
			$newheight=200;
			//$newwidth=($width/$height)*200;
			$newwidth=200;
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			$filename = $uploadedfile;
			imagejpeg($tmp,$filename,100);
			imagedestroy($src);
			imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
			// has completed.
			$main_image = $data["file_name"];
			//End Upload Main Image Here
		}else{
			$main_image = $main_image_from_db;
		}
		
		
		
		
		
		$main_pictures_from_db = $query_run->pictures;
		$main_pictures_from_db = json_decode($main_pictures_from_db);
		
		$pictures = $_FILES["userfile"]['name'];
		$pictures = json_encode($pictures);
		$pictures = str_replace('["',"",$pictures);
		$pictures = str_replace('"]',"",$pictures);
		
		if(!empty($pictures)){
			
			//Deleting all pictures from the folders
			foreach($main_pictures_from_db as $pics){
				unlink("./assets/web/uploads/products/".$pics);
			}
			
			//Start Upload Other Images Here
			$cpt = $_FILES['userfile']['name'];
			
			$image_name_uploaded = array();
			foreach($cpt as $key => $value){
				unset($config);
				$config = array();
				$config['upload_path']   = './assets/web/uploads/products/'; 
				$config['allowed_types'] = 'gif|jpg|JPG|png';
				$config['overwrite'] = FALSE;
				$config['remove_spaces'] = FALSE;
				$config['file_name'] = $_FILES['userfile']['name'][$key];
		
				$_FILES['f']['name'] =  $_FILES['userfile']['name'][$key];
				$_FILES['f']['type'] = $_FILES['userfile']['type'][$key];
				$_FILES['f']['tmp_name'] = $_FILES['userfile']['tmp_name'][$key];
				$_FILES['f']['error'] = $_FILES['userfile']['error'][$key];
				$_FILES['f']['size'] = $_FILES['userfile']['size'][$key];
		
				$this->load->library('upload', $config);
				$this->upload->initialize($config);            
				if (! $this->upload->do_upload('f')){
					$data['errors'] = $this->upload->display_errors();
				}else{
					$image_name = $this->upload->data();
					unset($config);
					$config = array();
					$config['image_library']    = 'gd2';
					$config['source_image']     = './assets/web/uploads/products/' . $image_name["file_name"];
					$config['width']            = 600;
					$config['height']           = 600;
			
					$this->load->library('image_lib', $config);
					$this->image_lib->clear();
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					$types = array('.jpg');	
	
					$image_name_uploaded[] = $image_name["file_name"];			
				}
			}
			$image_name_uploaded++;
			//End Upload Other Images Here
			
			$pictures = json_encode($image_name_uploaded);
			
			
			
		}else{
			
			$pictures = json_encode($main_pictures_from_db);
		}
		
		$status = $this->ads_model->update($id, $main_image, $pictures);
		if($status){
			$this->session->set_flashdata('updated_success', 'You have updated one Ad successfully');
			redirect("admin/ads/getads/".$id);
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/ads/getads/".$id);
		}
	}
	
	public function delete($id){
		$status = $this->ads_model->delete($id);
		if($status){
			$this->session->set_flashdata('deleted_success', 'You have updated one Ad successfully');
			redirect("admin/ads/view");
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/ads/view");
		}
	}
	
}