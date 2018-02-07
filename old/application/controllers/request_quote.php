<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request_Quote extends CI_Controller {

	public function index(){
		$id = $this->input->get("id");
		if($id){
			$data['ad_detail_request'] = $this->Home_Model->load_ad_by_id($id);
		}
		$data['main_categories'] = $this->Home_Model->load_main_cat();
		$data['countries'] = $this->Home_Model->load_all_countries();
		
		$this->load->view('web/request_quote', $data);
	}
	
	public function add_quote(){
		$first_name = $this->input->post("first_name");
		$last_name = $this->input->post("last_name");
		$cat = $this->input->post("cat");
		$sub_cat = $this->input->post("sub_cat");
		$country = $this->input->post("country");
		$email = $this->input->post("email");
		$contact = $this->input->post("contact");
		$message = $this->input->post("message");
		
		$data = array(
			"first_name"	=>		$first_name,
			"last_name"		=>		$last_name,
			"cat_id"		=>		$cat,
			"sub_cat_id"	=>		$sub_cat,
			"country_id"	=>		$country,
			"email"			=>		$email,
			"contact"		=>		$contact,
			"message"		=>		$message,
		);
		
		$this->db->insert("request_quote", $data);
		
		//getting category name
		$this->db->where("id", $cat);
		$cat_query = $this->db->get("categories");
		$cat_query_run = $cat_query->row();
		$category = $cat_query_run->category_name;
		
		//getting sub category name
		$this->db->where("id", $sub_cat);
		$sub_cat_query = $this->db->get("categories");
		$sub_cat_query_run = $sub_cat_query->row();
		$sub_category = $sub_cat_query_run->category_name;
		
		//getting country name
		$this->db->where("id", $country);
		$country_query = $this->db->get("countries");
		$country_query_run = $country_query->row();
		$country = $country_query_run->name;
		
		$email_data = array(
			"first_name"	=>		$first_name,
			"last_name"		=>		$last_name,
			"category"		=>		$category,
			"sub_category"	=>		$sub_category,
			"country"		=>		$country,
			"email"			=>		$email,
			"contact"		=>		$contact,
			"message"		=>		$message,
		);
		
		if($this->email($email_data)){
			$this->session->set_flashdata('email_sent', 'Thank you for contacting us, we\'ll get back you soon');
		}
		
		redirect("request_quote");
		
	}
	
	public function email($data){
		

		
		$this->load->library('email');
		$config = array(
			'protocol' => 'sendmail',
			'mailpath' => '/usr/sbin/sendmail',
			'mailtype' => 'html', 
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
  
		);
		$this->email->initialize($config);
		
		$from = $data['email'];
		$subject = "Request a Quote";
		//$email_message = $this->load->view('email/general_inquiry', true);
		$email_message = '
			<p>Hello,</p><br>
			<p><b><i>You got new request a quote</i></b></p><br>
			<p><b>Name: </b>"'.$data['first_name']." ".$data['last_name'].'"</p>
			<p><b>Category: </b>"'.$data['category'].'"</p>
			<p><b>Sub-Category: </b>"'.$data['sub_category'].'"</p>
			<p><b>Country: </b>"'.$data['country'].'"</p>
			<p><b>Email: </b>"'.$data['email'].'"</p>
			<p><b>Contact: </b>"'.$data['contact'].'"</p>
			<p><b>Message: </b>"'.$data['message'].'"</p>
			<p><br><br><br><b>Regards</b></p>
		';
		$this->email->from($from, 'LatinEquips');
		$this->email->to("addi.ahmad9@gmail.com");
		$this->email->subject($subject);
		$this->email->message($email_message);
		$this->email->newline = "\r\n";
		$this->email->crlf = "\n";
		$this->email->send(); 	    
	    $this->email->print_debugger();
		
		return TRUE;
	}
}
