<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Terms_Conditions extends CI_Controller {

	public function index(){
		$this->db->where("serial_number", "1");
		$query = $this->db->get("terms_conditions");
		$data["page"] = $query->row();
		$this->load->view('web/terms_conditions', $data);
	}
	
	public function page(){
		$this->db->where("serial_number", "1");
		$query = $this->db->get("terms_conditions");
		$data["page"] = $query->row();
		
		$this->load->view("admin/terms_conditions/page", $data);
	}
	
	public function add_row(){
		$data['Counter'] = $this->input->post('counter');
		$this->load->view("admin/terms_conditions/new_row",$data);
	}
	
	public function update(){
		$title = $this->input->post("title");
		$paragraph = $this->input->post("paragraph");
		$tc = $this->input->post("tc");
		$new_tc = array();
		foreach($tc as $key => $val){
			$new_tc[] = $val;
			
		}
		$tc = json_encode($new_tc);
		
		
		$this->db->set("title", $title);
		$this->db->set("paragraph", $paragraph);
		$this->db->set("tc", $tc);
		$this->db->where("serial_number", "1");
		$this->db->update("terms_conditions");
		
			$this->session->set_flashdata('added_success', 'You have updated page successfully');
			redirect("terms_conditions/page");
	}
}