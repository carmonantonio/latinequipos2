<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$user = $this->session->userdata("logged_in");
		if($user!=TRUE){
			//admin folder
			redirect("login");
		}
	}
	
	public function view(){
		$this->db->order_by("id", "DESC");
		$data["news"] = $this->db->get("news");
		$this->load->view("admin/news/view", $data);
	}
	
	public function add(){
		$this->load->view('admin/news/add');
	}
	
	public function insert(){
		$date = date("Y-m-d", strtotime($this->input->post("date")));
		$title = $this->input->post("title");
		$description = $this->input->post("description");
		
		
		//Start Upload Main Image Here
		$config['upload_path']          = './assets/web/uploads/news/';
		$config['allowed_types']        = 'gif|jpg|JPG|png';
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
		$newheight=285;
		//$newwidth=($width/$height)*200;
		$newwidth=590;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		$filename = $uploadedfile;
		imagejpeg($tmp,$filename,100);
		imagedestroy($src);
		imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
		// has completed.
		$main_image = $data["file_name"];
		//End Upload Main Image Here
		
		
		
		$data = array(
			"date" => $date,
			"title" => $title,
			"description" => $description,
			"image" => $main_image,
		);
		
		$status_added = $this->db->insert("news", $data);
		
		if($status_added){
			$this->session->set_flashdata('added_success', 'You have added one News successfully');
			redirect("admin/news/add");
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/news/add");
		}
	}
	
	public function delete($id){
		$this->db->where("id", $id);
		$status = $this->db->delete("news");
		if($status){
			$this->session->set_flashdata('deleted_success', 'You have updated one Ad successfully');
			redirect("admin/news/view");
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/news/view");
		}
	}
	
	public function getads($id){
		$this->db->where("id", $id);
		$status = $this->db->get("news");
		$data["news"] = $status->row();
		$this->load->view("admin/news/edit", $data);
	}
	
	public function update($id){
		//Getting Image from db
		$this->db->where("id", $id);
		$query = $this->db->get("news");
		$query_run = $query->row();
		$main_image_from_db = $query_run->image;
		
		
		$main_image = $_FILES["userfile"];
		$main_image = $main_image["name"];
		//Getting Main Image if Uploaded
		if(!empty($main_image)){
			//deleting file from folder first
			unlink("./assets/web/uploads/news/".$main_image_from_db);
			//Start Upload Main Image Here
			$config['upload_path']          = './assets/web/uploads/news/';
			$config['allowed_types']        = 'gif|jpg|JPG|png';
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
			$newheight=285;
			//$newwidth=($width/$height)*200;
			$newwidth=590;
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
		
		$this->db->set("date", date("Y-m-d", strtotime($this->input->post("date"))));
		$this->db->set("title", $this->input->post("title"));
		$this->db->set("description", $this->input->post("description"));
		$this->db->set("image", $main_image);
		$this->db->where("id", $id);
		$status = $this->db->update("news");
		if($status){
			$this->session->set_flashdata('updated_success', 'You have updated one news successfully');
			redirect("admin/news/getads/".$id);
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/news/getads/".$id);
		}
	}
	
}