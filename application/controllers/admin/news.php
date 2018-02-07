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
		
		$data["news"] = $this->db->query("SELECT n.id,n.date,nl.title,nl.description,nl.image
						FROM news AS n
						JOIN news_lng AS nl ON nl.news_id = n.id
						WHERE nl.language_code = 'en'");
		
	/* 	$this->db->order_by("id", "DESC");
		$data["news"] = $this->db->get("news"); */
		
		
		$this->load->view("admin/news/view", $data);
	}
	
	public function add(){
		$this->load->view('admin/news/add');
	}
	
	public function insert(){
		
		$date_en = date("Y-m-d", strtotime($this->input->post("date_en")));
		
			
		
		
		$title_en = $this->input->post("title_en");
		$description_en = $this->input->post("description_en");
		
		
		$title_es = $this->input->post("title_es");
		$description_es = $this->input->post("description_es");
		
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
		
		$date = array(
			"date" => $date_en
			);
		
		$status = $this->db->insert("news", $date);
		$last_id = $this->db->insert_id();
		
		
		
		$data_en = array(
			"news_id" => $last_id,
			"language_code" => "en",
			"title" => $title_en,
			"description" => $description_en,
			"image" => $main_image,
		);
		
		
		$data_es = array(
			"news_id" => $last_id,
			"language_code" => "es",
			"title" => $title_es,
			"description" => $description_es,
			"image" => $main_image,
		);
		
		$this->db->insert("news_lng", $data_en);
		$status_added = $this->db->insert("news_lng", $data_es);
		
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
		$this->db->delete("news");
		$this->db->where("news_id",$id);
		$status = $this->db->delete("news_lng");
		if($status){
			$this->session->set_flashdata('deleted_success', 'You have updated one Ad successfully');
			redirect("admin/news/view");
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/news/view");
		}
	}
	
	public function getnews($id){
		$status_en = $this->db->query("SELECT n.id,n.date,nl.title,nl.description,nl.image
		FROM news AS n
		JOIN news_lng AS nl ON nl.news_id = n.id
		WHERE nl.language_code = 'en' and n.id = $id "
		);
		
		$status_es = $this->db->query("SELECT n.id,n.date,nl.title,nl.description,nl.image
		FROM news AS n
		JOIN news_lng AS nl ON nl.news_id = n.id
		WHERE nl.language_code = 'es' and n.id = $id "
		);
		
		/* $this->db->where("id", $id);
		$status = $this->db->get("news"); */
		
		$data["news_en"] = $status_en->row();
		$data["news_es"] = $status_es->row();
		
		$this->load->view("admin/news/edit", $data);
	}
	
	public function update($id){
		//Getting Image from db
		$this->db->where("id", $id);
		$query = $this->db->get("news_lng");
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
		$this->db->where("id", $id);
		$this->db->update("news");
		
		
		
		$this->db->set("title", $this->input->post("title_en"));
		$this->db->set("description", $this->input->post("description_en"));
		$this->db->set("image", $main_image);
		$this->db->where("news_id", $id);
		$this->db->where("language_code","en");
		$this->db->update("news_lng");
		
		$this->db->set("title", $this->input->post("title_es"));
		$this->db->set("description", $this->input->post("description_es"));
		$this->db->set("image", $main_image);
		$this->db->where("news_id", $id);
		$this->db->where("language_code","es");
		$status = $this->db->update("news_lng");
		
		if($status){
			$this->session->set_flashdata('updated_success', 'You have updated one news successfully');
			redirect("admin/news/getads/".$id);
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/news/getads/".$id);
		}
	}
	
}