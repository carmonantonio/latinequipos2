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
		$name_en = $this->input->post("name_en");
		$data = array(
			"name" => $name_en
		);
		$last_id = $this->Seller_Model->insert($data);
		
		$language_en = $this->input->post('language_en');
		$name_en = $this->input->post("name_en");
		$phone_number_en = $this->input->post("phone_number_en");
		$email_en = $this->input->post("email_en");
		$address_en = $this->input->post("address_en");
		$occupation_en = $this->input->post("occupation_en");
		$description_en = $this->input->post("description_en");
		
		$data_en = array(
			"seller_id" => $last_id,
			"language_code" => "en",
			"name" => $name_en,
			"phone_number" => $phone_number_en,
			"email" => $email_en,
			"address" => $address_en,
			"occupation" => $occupation_en,
			"description" => $description_en,
		);
		
		$language_en = $this->input->post('language_es');
		$name_es = $this->input->post("name_es");
		$phone_number_es = $this->input->post("phone_number_es");
		$email_es = $this->input->post("email_es");
		$address_es = $this->input->post("address_es");
		$occupation_es = $this->input->post("occupation_es");
		$description_es = $this->input->post("description_es");
		
		$data_es = array(
			"seller_id" => $last_id,
			"language_code" => "es",
			"name" => $name_es,
			"phone_number" => $phone_number_es,
			"email" => $email_es,
			"address" => $address_es,
			"occupation" => $occupation_es,
			"description" => $description_es,
		);
		
		$status_en = $this->Seller_Model->insert_en($data_en);
		$status_es = $this->Seller_Model->insert_es($data_es);
		if($status_en && $status_es){
			$this->session->set_flashdata('added_success', 'You have added one seller successfully');
			redirect("admin/seller/add");
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/seller/add");
		}
	}
	
	public function getseller($id){
		$data["seller_by_en"] = $this->Seller_Model->getseller_en($id);
		$data["seller_by_es"] = $this->Seller_Model->getseller_es($id);
		$this->load->view("admin/seller/edit", $data);
	}
	
	public function update($id){
		$name_en = $this->input->post("name_en");
		$phone_number_en = $this->input->post("phone_number_en");
		$email_en = $this->input->post("email_en");
		$address_en = $this->input->post("address_en");
		$occupation_en = $this->input->post("occupation_en");
		$description_en = $this->input->post("description_en");

		$name_es = $this->input->post("name_es");
		$phone_number_es = $this->input->post("phone_number_es");
		$email_es = $this->input->post("email_es");
		$address_es = $this->input->post("address_es");
		$occupation_es = $this->input->post("occupation_es");
		$description_es = $this->input->post("description_es");
		
		$this->Seller_Model->update_en($id, $name_en, $phone_number_en, $email_en, $address_en, $occupation_en, $description_en);
		$status = $this->Seller_Model->update_es($id, $name_es, $phone_number_es, $email_es, $address_es, $occupation_es, $description_es);
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