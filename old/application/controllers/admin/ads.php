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
		$data["ads"] = $this->Ads_Model->view_all();
		$this->load->view("admin/ads/view", $data);
	}

	public function Add(){
		$data["sellers"] = $this->Seller_Model->view_all();
		$data["categories"] = $this->Categories_Model->view_main_cat();
		$data['countries'] = $this->Categories_Model->load_countries();
		$this->load->view('admin/ads/add', $data);
	}
	
	public function insert(){
		
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
		
		$name 				= $this->input->post("name");
		$company 			= $this->input->post("company");
		$seller_id 			= $this->input->post("seller_id");
		$category_id 		= $this->input->post("category_id");
		$parent_cat 		= $this->input->post("parent_cat");
		$ad_posting_date 	= date("Y-m-d", strtotime($this->input->post("ad_posting_date")));
		$location 			= $this->input->post("location");
		$country_id 		= $this->input->post("country_id");
		$model 				= $this->input->post("model");
		$year 				= $this->input->post("year");
		$serial_number 		= $this->input->post("serial_number");
		$hours 				= $this->input->post("hours");
		$refurbished 		= $this->input->post("refurbished");
		$weight 			= $this->input->post("weight");
		$engine		 		= $this->input->post("engine");
		$accessories 		= $this->input->post("accessories");
		$keyword 			= $this->input->post("keyword");
		$selling_price		= $this->input->post("selling_price");
		$pictures 			= $image_name_uploaded;
		$main_image 		= $main_image;
		
		$data = array(
			"name"				=>	$name,
			"company"			=>	$company,
			"seller_id"			=>	$seller_id,
			"category_id"		=>	$category_id,
			"parent_cat"		=>	$parent_cat,
			"ad_posting_date"	=>	$ad_posting_date,
			"location"			=>	$location,
			"country_id"		=>	$country_id,
			"model"				=>	$model,
			"year"				=>	$year,
			"serial_number"		=>	$serial_number,
			"hours"				=>	$hours,
			"refurbished"		=>	$refurbished,
			"weight"			=>	$weight,
			"engine"			=>	$engine,
			"accessories"		=>	$accessories,
			"keyword"			=>	$keyword,
			"selling_price"		=>	$selling_price,
			"pictures"			=>	$pictures,
			"main_image"		=>	$main_image,
		);
		
		$status_added = $this->Ads_Model->insert($data);
		if($status_added){
			$this->session->set_flashdata('added_success', 'You have added one Ad successfully');
			redirect("admin/ads/add");
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/ads/add");
		}
	}
	
	public function getads($id){
		$data["sellers"] = $this->Seller_Model->view_all();
		$data["categories"] = $this->Categories_Model->view_all();
		$data["ads"] = $this->Ads_Model->getads($id);
		$data['countries'] = $this->Categories_Model->load_countries();
		$this->load->view("admin/ads/edit", $data);
	}
	
	public function load_parent(){
		$id = $this->input->post("id");
		$data['parent_cat'] = $this->Ads_Model->load_parent_by_id($id);
		$this->load->view("admin/ads/parent_cat", $data);
	}
	
	public function update($id){
		
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
		
		$status = $this->Ads_Model->update($id, $main_image, $pictures);
		if($status){
			$this->session->set_flashdata('updated_success', 'You have updated one Ad successfully');
			redirect("admin/ads/getads/".$id);
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/ads/getads/".$id);
		}
	}
	
	public function delete($id){
		$status = $this->Ads_Model->delete($id);
		if($status){
			$this->session->set_flashdata('deleted_success', 'You have updated one Ad successfully');
			redirect("admin/ads/view");
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/ads/view");
		}
	}
	
}