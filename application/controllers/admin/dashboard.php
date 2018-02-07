<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$user = $this->session->userdata("logged_in");
		if($user!=TRUE){
			//admin folder
			redirect("login");
		}
	}


	public function index(){
		$this->load->view('admin/dashboard');
	}
	
	public function advertisement(){
		$query = $this->db->get('advertisement');
		$data['top_ad'] = $query->row();
		
		

		$this->load->view("admin/advertisement", $data);
	}
	
	public function insert_advertisement(){
		
		$query = $this->db->get('advertisement');
		$query = $query->result();
		foreach($query as $row){
			$this->db->where('id', $row->id);
			$this->db->delete('advertisement');
			unlink("./assets/admin/img/ads/".$row->picture);
		}
		
		$title = $this->input->post('title');
		//$files = $_FILES['picture'];
		
		//Start Upload Main Image Here
		$config['upload_path']          = './assets/admin/img/ads/';
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
		$newheight=64;
		//$newwidth=($width/$height)*200;
		$newwidth=728;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		$filename = $uploadedfile;
		imagejpeg($tmp,$filename,100);
		imagedestroy($src);
		imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
		// has completed.
		$main_image = $data["file_name"];
		
		$data_new = array(
				"title"				=>	$title,
				"picture"			=>	$main_image,
			);
		
		$success = $this->db->insert('advertisement', $data_new);
		if($success){
			$this->session->set_flashdata('added_success', 'You have added one Ad successfully');
			redirect("admin/dashboard/advertisement");
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/dashboard/advertisement");
		}
		
		
	}
	
	public function video(){
		$videos = $this->db->get("videos");
		$data["videos"] = $videos->row();
		$this->load->view("admin/video", $data);
	}
	
	public function update_video(){
		
		$query = $this->db->get("videos");
		$query = $query->row();
		$id = $query->id;
		$this->db->set("name", "video links");
		$this->db->set("link_1", $this->input->post("link_1"));
		$this->db->set("link_2", $this->input->post("link_2"));
		$this->db->where("id", $id);
		$this->db->update("videos");
		//$success = $this->db->insert('videos', $data);
		$this->session->set_flashdata('updated_success', 'You have updated videos successfully');
		redirect("admin/dashboard/video");
	}
}
