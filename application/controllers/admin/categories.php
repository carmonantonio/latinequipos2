<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$user = $this->session->userdata("logged_in");
		if($user!=TRUE){
			//admin folder
			redirect("login");
		}
	}

	public function Add(){
		
		//$data["sellers"] = $this->Seller_Model->view_all();
		$data["cat_en"] = $this->Categories_Model->cat_en_all();
		$data["cat_es"] = $this->Categories_Model->cat_es_all();
		$this->load->view('admin/categories/add', $data);
	}
	
	public function view(){
		$data["categories"] = $this->Categories_Model->view_all();
		$this->load->view("admin/categories/view", $data);
	}
	
	public function insert(){
		
		$parent_cat_en = $this->input->post("parent_cat_en");
		$parent_cat_es = $this->input->post("parent_cat_es");
		
		if($parent_cat_en === $parent_cat_es)
		{
		$config['upload_path']          = './assets/web/uploads/categories/';
		$config['allowed_types']        = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('userfile');
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
		$uploaded_file_name = $data["file_name"];
		
		
		$image_show = $this->input->post("image_show");
		
		
	
		$data = array(
			/* "category_name" => $category_name, */
			"image" => $uploaded_file_name,
			"parent_cat" => $parent_cat_en,
			"image_show" => $image_show,
		);
		$status = $this->Categories_Model->insert($data);
		
		

		$last_id = $status;
		$category_name_en = $this->input->post("category_name_en");
		$lng_code_en = $this->input->post("lng_en");
			$data_en = array(
			"cat_id" => $last_id,
			"language_code" => $lng_code_en,
			"category_name" => $category_name_en
		);
		$status_en = $this->Categories_Model->insert_lng_en($data_en);
		
		
		$category_name_es = $this->input->post("category_name_es");
		$lng_code_es = $this->input->post("lng_es");
			$data_es = array(
			"cat_id" => $last_id,
			"language_code" => $lng_code_es,
			"category_name" => $category_name_es
		);
		$status_es = $this->Categories_Model->insert_lng_es($data_es);
		if($status){
			$this->session->set_flashdata('added_success', 'You have added one Category successfully');
			redirect("admin/categories/add");
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/categories/add");
		}
		}
		else
		{
			$this->session->set_flashdata('error_occur', 'Parent Category should be same!');
			redirect("admin/categories/add");
		}
		
	}
	
	public function getcategories($id){
		//$data["categories"] = $this->Categories_Model->view_all();
		$data["category_en"] = $this->Categories_Model->getcategories_en($id);
		$data["category_es"] = $this->Categories_Model->getcategories_es($id);
		$data["cat_en"] = $this->Categories_Model->cat_en_all();
		$data["cat_es"] = $this->Categories_Model->cat_es_all();
		$this->load->view("admin/categories/edit", $data);
	}
	
	public function update($id){
		
		if($this->input->post('parent_cat_en') === $this->input->post('parent_cat_es'))
		{
		$image_change = $_FILES["userfile"];
		$image_change = $image_change["name"];
		
		
		if(!empty($image_change)){
			$config['upload_path']          = './assets/web/uploads/categories/';
			$config['allowed_types']        = 'gif|jpg|png';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('userfile');
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
			$uploaded_file_name = $data["file_name"];		
		}else{
			
			$this->db->where("id", $id);
			$query = $this->db->get("categories");
			$query_run = $query->row();
			
			$uploaded_file_name = $query_run->image;
		}
		
		
		
		
		
		$status = $this->Categories_Model->update($id , $uploaded_file_name);
		if($status){
			$this->session->set_flashdata('updated_success', 'You have updated one Category successfully');
			redirect("admin/categories/getcategories/".$id);
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/categories/getcategories/".$id);
		}
		}
		else
		{
			$this->session->set_flashdata('error_occur', 'Parent Category should be same!');
			redirect("admin/categories/getcategories/".$id);
		}
	}
	
	public function deletecategories($id){
		$status = $this->Categories_Model->deletecategories($id);
		if($status){
			$this->session->set_flashdata('deleted_success', 'You have deleted one Category successfully');
			redirect("admin/categories/view");
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/categories/view");
		}
	}
	
	
	
	
}