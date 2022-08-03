<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verification_controller extends CI_Controller {
// ------------------------------------------
public function send_email_verication_link_fc($user_id,$official_email_sl_no){
    // for verifying email
    $this->db->where('user_id',$user_id);
    // $this->db->select('user_id');
    $result = $this->db->get('users')->result_array();
    // var_dump($result);
    $email = $result[0]['email'];
    echo $email_ver_code_one = random_string('alnum', round(rand(10,16)));
    echo $email_ver_code_two = random_string('alnum', round(rand(7,15)));

    $data = array(
        'email_ver_code_one' => $email_ver_code_one,
        'email_ver_code_two' => $email_ver_code_two,
    );
    
    $this->db->where('user_id',$user_id);
    $this->db->update('users',$data);

$this->verification_model->send_verification_email_fm($email,$official_email_sl_no,$email_ver_code_one,$email_ver_code_two,$user_id);

}
// ------------------------------------------
public function please_verify_your_email_fc(){
    if(!$this->session->userdata('logged_in')){redirect('login');}
    if($this->session->userdata('email_verified')){redirect('home');}
    $user_id = $this->session->userdata('user_id');
    $table_name = 'users';
	$known_value = $user_id;
	$col_name_of_known_value = 'user_id';
	
	$col_name_of_op_value = 'email';
	$data['email'] = $this->get_model->get_any_field_fm($table_name,$known_value,$col_name_of_known_value,$col_name_of_op_value);
    $data['user_id'] = $user_id;
    $this->load->view('templates/head/header');
    $this->load->view('register/please_verify_your_email',$data);
    $this->load->view('templates/foot/footer'); 
}
// ------------------------------------------
public function resend_verification_email_fc($user_id){
    $this->db->where('user_id',$user_id);
    $result = $this->db->get('users')->result_array()[0];
    // var_dump($result);
    $email_ver_code_one = $result['email_ver_code_one'];
    $email_ver_code_two = $result['email_ver_code_two'];
    $email = $result['email'];
    $official_email_sl_no = 1;
    $this->verification_model->send_verification_email_fm($email,$official_email_sl_no,$email_ver_code_one,$email_ver_code_two,$user_id);
    $this->session->set_flashdata('success','Verificaton email has been resend');
    redirect('please-verify-your-email');
}
// ------------------------------------------

public function verify_your_email_fc($email_ver_code_one,$user_id,$email_ver_code_two){
    $array = array(
        'user_id' => $user_id,
        'email_ver_code_one' => $email_ver_code_one,
        'email_ver_code_two' => $email_ver_code_two,
    );

    $this->db->where($array); 
    $query = $this->db->get('users');
    $count = $query->num_rows();
    
    $data['email_verified'] = 2;

    if($count > 0){
        $data = array(
            'email_verified' => 1,
        );
        $this->db->where($array);
        $this->db->update('users',$data);
        $data['email_verified'] = 1;
    }else{
        $data['email_verified'] = 0;
    }
    $this->load->view('templates/head/header');
    $this->load->view('register/verify_your_email',$data);
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
}