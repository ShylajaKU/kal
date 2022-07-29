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
		// $this->load->view('templates/login_header/login_header');
		
		$this->load->view('landing/landing');
		$this->load->view('templates/foot/footer');

	}
// ------------------------------------------
	public function register_1st_page(){
if($this->session->userdata('level_1') == '1'){redirect('home');}

		$this->form_validation->set_rules('created_by','Profile created by','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('marital_status','Marital Status','required');
		$this->form_validation->set_rules('name_b_g','Name','required');
		$this->form_validation->set_rules('dob','Date of Birth','required');
		$this->form_validation->set_rules('phone_no','Phone No','required');
		$this->form_validation->set_rules('email','Email','required|callback_check_email_exists_fc');
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
			if($created_by == 'self'){$created_by_id = '0';}
			if($created_by == 'parents'){$created_by_id = '1';}
			if($created_by == 'sibling'){$created_by_id = '2';}
			if($created_by == 'relative'){$created_by_id = '3';}
			if($created_by == 'friend'){$created_by_id = '4';}
			$gender = $this->input->post('gender');
			if($gender == 'male'){$gender_id = '0';}
			if($gender == 'female'){$gender_id = '1';}
			$marital_status = $this->input->post('marital_status');
			if($marital_status == 'unmarried'){$marital_status_id = '0';}
			if($marital_status == 'widow/widower'){$marital_status_id = '1';}
			if($marital_status == 'divorced'){$marital_status_id = '2';}
			if($marital_status == 'seperated'){$marital_status_id = '3';}
			$name_b_g = $this->input->post('name_b_g');
			$dob = $this->input->post('dob');
			$phone_no = $this->input->post('phone_no');
			$email = $this->input->post('email');
			$enc_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$data = array(
				'email' => $email,
				'email_verified' => '0',
				'phone_no' => $phone_no,
				'phone_no_verified' => '0',
				'password' => $enc_password,
				'created_by' => $created_by,
				'created_by_id' => $created_by_id,
				'name' => $name_b_g,
				'gender' => $gender,
				'gender_id' => $gender_id,
				'dob' => $dob,
				'marital_status' => $marital_status,
				'marital_status_id' => $marital_status_id,
				'ip_address' => $this->get_model->get_client_ip(),
				'level_1' => '1',
			);
			$table_name = 'users';
			$user_id = $this->insert_model->insert_fm($table_name,$data);
			// $user_id is the insert_id
			// $this->db->insert_id();
			$array_items = array('created_by','gender','marital_status','name_b_g','dob','phone_no','email');
		$this->session->unset_userdata($array_items);

			$this->session->set_userdata('user_id',$user_id);
			$this->session->set_userdata('logged_in','1');
			$this->get_model->set_userdata_from_db($user_id);
			redirect('home');
		}
		
		var_dump($this->session->userdata());
	}
// ------------------------------------------
public function check_email_exists_fc($email){

    $this->form_validation->set_message('check_email_exists_fc', 'Email is already registered');

    if($this->get_model->check_email_exists_fm($email)){
        // returned true from model
        return true;
        // this will return true to set_rules on top
    }else{

        return false;
    }
    // this will returns to set_rules on top
}
// ------------------------------------------
public function login_fc(){
    $this->form_validation->set_rules('email','Email','required|callback_check_email_registered_fc');
	$this->form_validation->set_message('check_email_registered_fc', 'This email is not registered');
    $this->form_validation->set_rules('password','Password','required');
    if($this->form_validation->run() === false){
		$this->load->view('templates/head/header');
		$this->load->view('login/login');

		$this->load->view('templates/foot/footer');
	
	}else{
$email = $this->input->post('email');
$password = $this->input->post('password');
$user_id = $this->get_model->check_password_and_return_user_id_fm($email , $password);
		$this->get_model->set_userdata_from_db($user_id);
		$this->session->set_userdata('logged_in','1');
// var_dump($this->session->userdata());
		redirect('home');
	}
}
// ------------------------------------------
public function check_email_registered_fc($email){

    if($this->get_model->check_email_exists_fm($email)){
        // returned true from model if email exists
        return false;
        // this will return (false) changed from true to set_rules on top
    }else{
        return true;
    }
}
// ------------------------------------------

public function logout_fc(){
	$this->session->sess_destroy();
	var_dump($this->session->userdata());
}
// ------------------------------------------
public function home_fc(){
	if($this->session->userdata('logged_in') != '1'){redirect('login');}
	$this->load->view('templates/head/header');
	$this->load->view('home/home');

	$this->load->view('templates/foot/footer');

}

// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------





}
