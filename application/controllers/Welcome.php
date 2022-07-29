<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
// ------------------------------------------
	public function ci()
	{
		$this->load->view('welcome_message');
	}
// ------------------------------------------
	public function landing(){
		$this->load->view('templates/head/header');
		$this->load->view('templates/login_header/login_header');
		
		$this->load->view('landing/landing');
		$this->load->view('templates/foot/footer');

	}
// ------------------------------------------
	public function register_1st_page(){
		$table_name = 'marital_status';
		$data['marital_status'] = $this->get_model->get_all_fm($table_name);
		$this->load->view('templates/head/header');
		$this->load->view('register/register_1st_page',$data);
		$this->load->view('templates/foot/footer');

	}
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------





}
