<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function index(){
		
		//getting total number of categories in database
		$total_categories = $this->Home_Model->total_categories();
		$first_row = $total_categories/2;
		$first_row = round($first_row);
		$data['first'] = $this->Home_Model->get_first($first_row);
		$data['second'] = $this->Home_Model->get_second($first_row);
		
		$data['main_cat_search'] = $this->Home_Model->load_main_cat();
		$this->load->view('web/category', $data);
	}
}
