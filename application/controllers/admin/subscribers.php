<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscribers extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$user = $this->session->userdata("logged_in");
		if($user!=TRUE){
			//admin folder
			redirect("login");
		}
	}
	
	public function index(){
		$data['subscribers'] = $this->db->get("subscribers");
		$this->load->view("admin/subscribers", $data);
	}
	
	public function delete($id){
		$this->db->where("id", $id);
		$query = $this->db->delete("subscribers");
		if($query){
			$this->session->set_flashdata('deleted_success', 'You have delete one subscriber successfully');
			redirect("admin/subscribers");
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/subscribers");
		}
	}
}