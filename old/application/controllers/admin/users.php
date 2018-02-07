<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$user = $this->session->userdata("logged_in");
		if($user!=TRUE){
			//admin folder
			redirect("login");
		}
	}

	public function Add(){
		$this->load->view('admin/users/add');
	}
	
	public function view(){
		$data["users"] = $this->User_Model->view_all();
		$this->load->view("admin/users/view_all", $data);
	}
	
	public function insert(){
		$full_name = $this->input->post("full_name");
		$email = $this->input->post("email");
		$role = $this->input->post("role");
		$password = $this->input->post("password");
		$password = md5($password);
		
		//check if exists
		$check = $this->User_Model->check_exists($email);
		if($check=="1"){
			$this->session->set_flashdata('already_exists', 'This Email is already exists');
			redirect("admin/users/add");
		}else{
			$data = array(
				"full_name" => $full_name,
				"email" => $email,
				"role" => $role,
				"password" => $password,
			);
			$success = $this->User_Model->insert($data);
			if($success){
				$this->session->set_flashdata('added_success', 'You have added one user successfully');
				redirect("admin/users/add");
			}else{
				$this->session->set_flashdata('error_occur', 'Some error occured please try again');
				redirect("admin/users/add");
			}
		}
	}
	
	public function getuser($id){
		$data["getuser"] = $this->User_Model->getuser($id);
		$this->load->view('admin/users/edit', $data);
	}
	
	public function update($id){
		$full_name = $this->input->post("full_name");
		$email = $this->input->post("email");
		$role = $this->input->post("role");
		$password = $this->input->post("password");
		$password_encr = md5($password);
		
		if($password==""){
			$password_encr = $this->User_Model->getpass($id);
		}else{
			$password_encr = $password_encr;
		}
		
		$success = $this->User_Model->update($id, $full_name, $email, $role, $password_encr);
		if($success){
			$this->session->set_flashdata('updated_success', 'You have updated one user successfully');
			redirect("admin/users/getuser/".$id);
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/users/getuser/".$id);
		}
	}
	
	public function deleteuser($id){
		$success = $this->User_Model->deleteuser($id);
		if($success){
			$this->session->set_flashdata('deleted_success', 'You have deleted one user successfully');
			redirect("admin/users/view");
		}else{
			$this->session->set_flashdata('error_occur', 'Some error occured please try again');
			redirect("admin/users/view");
		}
	}
}
