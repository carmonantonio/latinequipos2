<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_Us extends CI_Controller {

	public function index(){
		/*$this->db->where("serial_number", "1");
		$query = $this->db->get("about_us");
		$data["page"] = $query->row();*/
		
		

		
		$this->load->view('web/about_us');
	}
	
	public function page(){
		$this->db->where("serial_number", "1");
		$row = $this->db->get("about_us");
		$data["page"] = $row->row();
		
		$this->load->view("admin/about_us/page", $data);
	}
	
	public function add_row(){
		$data["counter"] = $this->input->post("counter");
		$this->load->view("admin/about_us/row", $data);
	}
	
	public function update(){
		$title = $this->input->post("title");
		$paragraph = $this->input->post("paragraph");
		$description = $this->input->post("description");

		$new_description = array();
		foreach($description as $key => $val){
			$new_description[] = $val;
			
		}
		$description = json_encode($new_description);
		
		
		$this->db->set("title", $title);
		$this->db->set("paragraph", $paragraph);
		$this->db->set("description", $description);
		$this->db->where("serial_number", "1");
		$this->db->update("about_us");
		
		$this->session->set_flashdata('added_success', 'You have updated page successfully');
		redirect("about_us/page");
		
	}
}