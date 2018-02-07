<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function index(){
		$sess_lang = $this->session->userdata("language");
		
		if($sess_lang==''){
			$lng_code = 'en';
		}else if($sess_lang=='english'){
			$lng_code = 'en';
		}else if($sess_lang=='spanish'){
			$lng_code = 'es';
		}
		
		
		
		$data["news"] = $this->db->query("SELECT *
		FROM news AS n
		JOIN news_lng AS nl ON nl.news_id = n.id
		WHERE nl.language_code = '$lng_code'");
		
		$this->load->view('web/news', $data);
	}
}
