<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function authentication(){
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$password = md5($password);
		
		$check = $this->Auth_Model->authentication($email, $password);
		if($check=="1"){
			$this->user_session($email);
			redirect('admin');
		}else{
			$this->session->set_flashdata('login_error', 'Invalid Credentials, Please try again...');
			redirect("login");
		}
		
		//$this->load->view('admin/login');
	}
	
	public function user_session($email){
		$session = $this->Auth_Model->user_session($email);
		$this->session->set_userdata('logged_in', $session);
		return TRUE;
	}
	
	public function logout(){
		$this->session->unset_userdata('logged_in');
		redirect("admin");
	}
}
