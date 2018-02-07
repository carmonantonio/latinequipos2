<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seller extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$user = $this->session->userdata("logged_in");
		if($user!=TRUE){
			//admin folder
			redirect("login");
		}
	}

	public function Add(){
		$this->load->view('admin/seller/add');
	}
	
	public function view(){
		$data["seller"] = $this->Seller_Model->view_all();
		$this->load->view('admin/seller/view', $data);
	}
	
	public function insert(){
		$name = $this->input->post("name");
		$phone_number = $this->input->post("phone_number");
		$email = $this->input->post("email");
		$address = $this->input->post("address");
		$occupation = $this->input->post("occupation");
		$description = $this->input->post("description");
		
		$data = array(
			"name" => $name,
			"phone_number" => $phone_number,
			"email" => $email,
			"address" => $address,
			"occupation" => $occupation,
			"description" => $description,
		);
		
		$status = $this->Seller_Model->insert($data);
		if($status){
			$this->session->set_flashdata('added_success', 'You have added one seller successfully');
			redirect("admin/seller/add");
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/seller/add");
		}
	}
	
	public function getseller($id){
		$data["seller_by_id"] = $this->Seller_Model->getseller($id);
		$this->load->view("admin/seller/edit", $data);
	}
	
	public function update($id){
		$name = $this->input->post("name");
		$phone_number = $this->input->post("phone_number");
		$email = $this->input->post("email");
		$address = $this->input->post("address");
		$occupation = $this->input->post("occupation");
		$description = $this->input->post("description");

		$status = $this->Seller_Model->update($id, $name, $phone_number, $email, $address, $occupation, $description);
		if($status){
			$this->session->set_flashdata('updated_success', 'You have updated one seller successfully');
			redirect("admin/seller/getseller/".$id);
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/seller/getseller/".$id);
		}
	}
	
	public function deleteseller($id){
		$status = $this->Seller_Model->deleteseller($id);
		
		if($status){
			$this->session->set_flashdata('deleted_success', 'You have deleted one seller successfully');
			redirect("admin/seller/view");
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/seller/view");
		}
	}
}