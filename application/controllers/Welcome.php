<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
// ------------------------------------------
	public function ci()
	{
		$this->load->view('welcome_message');
	}
// ------------------------------------------
public function home_fc(){
	// var_dump($this->session->userdata());
	if($this->session->userdata('logged_in') != '1'){redirect('login');}
	if($this->session->userdata('level_2') != '1'){redirect('search-by-place');}
	if($this->session->userdata('level_3') != '1'){redirect('community-details');}

	$this->load->view('templates/head/header');
	$this->load->view('home/home');
	$this->load->view('templates/foot/footer');

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
		
		// var_dump($this->session->userdata());
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
	// $this->session->sess_destroy();
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
        // returned false from model if email dosent exists
        return true;
        // this will return (false) changed from true to set_rules on top
    }else{
        return false;
    }
}
// ------------------------------------------

public function logout_fc(){
	$this->session->sess_destroy();
	// var_dump($this->session->userdata());
}
// ------------------------------------------

// ------------------------------------------
// ------------------------------------------
public function enter_pincode_fc(){
	if($this->session->userdata('logged_in') != '1'){redirect('login');}
	if($this->session->userdata('level_2') != '0'){redirect('home');}

	$this->form_validation->set_rules('pincode','Pincode','required|callback_does_pincode_exists_fc');
	if(!$this->form_validation->run()){

	$this->load->view('templates/head/header');
	$this->load->view('register/enter_pincode');
	$this->load->view('templates/foot/footer');
	}else{
		$pincode = $this->input->post('pincode');
		$value = $this->input->post('pincode');
	$value_col_name = 'pincode';
	$table_name = 'pincode_list';

	$present = $this->get_model->check_a_value_present_fm($value,$value_col_name,$table_name);
	if(!$present){
		$this->form_validation->set_message('does_pincode_exists_fc','Enter a valid pincode');
		return false;
	}else{
		// return true;
		redirect('add-address/'.$pincode);
	}
	}
}
// ------------------------------------------
public function add_address_fc($pincode){
	if($this->session->userdata('logged_in') != '1'){redirect('login');}

	$this->form_validation->set_rules('address_line_1','Address Line 1','required');
	if(!$this->form_validation->run()){
		$this->db->where('pincode',$pincode);
		$select_array = array('officename_only','pincode','divisionname','Taluk','Districtname','statename');
		$this->db->select($select_array);
		$this->db->from('all_india_po_list');
		$query = $this->db->get();
		$data['po_list'] = $po_list = $query->result_array();
		$data['num_rows'] = $query->num_rows();
		$data['pincode'] = $pincode;
		$this->load->view('templates/head/header');
		$this->load->view('register/add_address',$data);
		$this->load->view('templates/foot/footer');
// var_dump($po_list);

	}else{
		$address_line_1 = $this->input->post('address_line_1');
		$landmark = $this->input->post('landmark');
		$pincode = $this->input->post('pincode');
		$city = $this->input->post('city');
		$district = $this->input->post('district');
		$state = $this->input->post('state');
		$country = $this->input->post('country');

			$data = array(
				'address_line_1' => $address_line_1, 
				'landmark' => $landmark,
				'pincode' => $pincode, 
				'city' => $city, 
				'district' => $district, 
				'state' => $state, 
				'country' => $country, 
				'level_2' => '1',
			);
		$unique_id = $this->session->userdata('user_id');
		$unique_id_col_name = 'user_id';
		$table_name = 'users';
		$this->update_model->update_fm($unique_id,$unique_id_col_name,$table_name,$data);
	}
}
// ------------------------------------------
public function does_pincode_exists_fc(){
	$value = $this->input->post('pincode');
	$value_col_name = 'pincode';
	$table_name = 'pincode_list';

	$present = $this->get_model->check_a_value_present_fm($value,$value_col_name,$table_name);
	if(!$present){
		$this->form_validation->set_message('does_pincode_exists_fc','Enter a valid pincode');
		return false;
	}else{
		return true;
	}
}
// ------------------------------------------
public function community_details_fc(){
	if($this->session->userdata('logged_in') != '1'){redirect('login');}

		
	$query = $this->db->get('relegion_list');
	$result = $query->result_array();
	$data['relegion_list'] = $result;

	$query = $this->db->get('caste_id');
	$result = $query->result_array();
	$data['caste_id_table'] = $result;
	$this->load->view('templates/head/header');
    $this->load->view('register/community_details',$data);
    $this->load->view('templates/foot/footer');

}
// ------------------------------------------
public function caste_selected(){
	if($this->session->userdata('logged_in') != '1'){redirect('login');}

	$relegion = $this->input->post('relegion');
	// $this->session->set_userdata('temp_rel',$relegion);
	$caste = $this->input->post('caste');
	// $this->session->set_userdata('temp_cas',$caste);

// var_dump($this->session->userdata());
	redirect('community-details/'.$relegion.'/'.$caste);

}
// ------------------------------------------
public function community_details_relegion_caste_fc($relegion,$caste){
	if($this->session->userdata('logged_in') != '1'){redirect('login');}

	$this->session->set_userdata('temp_rel',$relegion);
	$this->session->set_userdata('temp_cas',$caste);

	$query = $this->db->get('relegion_list');
	$result = $query->result_array();
	$data['relegion_list'] = $result;
	
	$query = $this->db->get('caste_id');
	$result = $query->result_array();
	$data['caste_id_table'] = $result;
	$data['caste_name'] = $caste;
	$data['relegion'] = $relegion;

	$this->db->where('caste',$caste);
	$query = $this->db->get('caste_list');
	$result = $query->result_array();
	// var_dump($result);
	$data['sub_caste_list'] = $result; 

	$this->load->view('templates/head/header');
    $this->load->view('register/community_details',$data);
    $this->load->view('templates/foot/footer');
}
// ------------------------------------------
public function sub_caste_selected(){
	if($this->session->userdata('logged_in') != '1'){redirect('login');}

	$relegion = $this->session->userdata('temp_rel');
	$caste = $this->session->userdata('temp_cas');
	$sub_caste = $this->input->post('sub_caste');
	$this->session->set_userdata('temp_sub_cas',$sub_caste);
	// var_dump($this->session->userdata());
	redirect('community-details/'.$relegion.'/'.$caste.'/'.$sub_caste);
}

// ------------------------------------------
public function community_details_relegion_caste_subcaste_fc($relegion,$caste,$sub_caste){
	if($this->session->userdata('logged_in') != '1'){redirect('login');}
	// $query = $this->db->get('caste_id');
	// $result = $query->result_array();
	// $data['caste_id_table'] = $result;
	// $data['caste_name'] = $caste;
	// $this->db->where('caste',$caste);
	// $query = $this->db->get('caste_list');
	// $result = $query->result_array();
	// $data['sub_caste_list'] = $result; 
	// $data['sub_caste_name'] = $sub_caste;
	// $data['relegion'] = ucwords(strtolower($this->session->userdata('temp_rel')));
	$data['relegion'] = $relegion;
	$data['caste'] = $caste;
	$data['sub_caste'] = $sub_caste;
	$this->form_validation->set_rules('caste','Caste','required');
	if(!$this->form_validation->run()){
	$this->load->view('templates/head/header');
    $this->load->view('register/save_community_details',$data);
    $this->load->view('templates/foot/footer');
	}else{
		$data = array(
			'relegion' => $relegion,
			'caste' => $caste,
			'sub_caste' => $sub_caste,
			'level_3' => '1',
		);
		$user_id = $this->session->userdata('user_id');
		// echo $user_id;
		// var_dump($this->session->userdata());
		$this->db->where('user_id',$user_id);
		$this->db->update('users',$data);
	}
}
// ------------------------------------------
public function go_back_to_community(){
	$this->session->unset_userdata('temp_rel');
	$this->session->unset_userdata('temp_cas');
	$this->session->unset_userdata('temp_sub_cas');
	redirect('community-details');
}

// ------------------------------------------
// ------------------------------------------





}
