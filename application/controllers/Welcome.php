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
		$this->form_validation->set_rules('created_by','Profile created by','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('marital_status','Marital Status','required');
		$this->form_validation->set_rules('name_b_g','Name','required');
		$this->form_validation->set_rules('dob','Date of Birth','required');
		$this->form_validation->set_rules('phone_no','Phone No','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confirm_password','Confirm Password','required');

		if($this->form_validation->run() === false){
			$created_by = $this->input->post('created_by');
		$this->session->set_userdata('created_by', $created_by);
			$gender = $this->input->post('gender');
		$this->session->set_userdata('gender', $gender);
			$marital_status = $this->input->post('marital_status');
	$this->session->set_userdata('marital_status', $marital_status);
			$name_b_g = $this->input->post('name_b_g');
	$this->session->set_userdata('name_b_g', $name_b_g);
			$dob = $this->input->post('dob');
	$this->session->set_userdata('dob', $dob);
			$phone_no = $this->input->post('phone_no');
	$this->session->set_userdata('phone_no', $phone_no);
			$email = $this->input->post('email');
	$this->session->set_userdata('email', $email);
	
		$this->load->view('templates/head/header');
		$this->load->view('register/register_1st_page');
		$this->load->view('templates/foot/footer');
		}else{
			$created_by = $this->input->post('created_by');
			$gender = $this->input->post('gender');
			$marital_status = $this->input->post('marital_status');
			$name_b_g = $this->input->post('name_b_g');
			$dob = $this->input->post('dob');
			$phone_no = $this->input->post('phone_no');
			$email = $this->input->post('email');
			$password = $this->input->post('password');


		}
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
