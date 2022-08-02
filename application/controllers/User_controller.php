<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {
// ------------------------------------------
public function your_profile_fc(){
    if(!$this->session->userdata('logged_in')){redirect('login');}
    $user_id = $this->session->userdata('user_id');
    $unique_id = $this->session->userdata('unique_id');
    $array = array(
        'user_id' => $user_id,
        'unique_id' => $unique_id,
    );
    $this->db->where($array);
    $query = $this->db->get('users');
    $users_table = $query->result_array();
    $count = $query->num_rows();
    if($count !== 1){
        $this->session->set_flashdata('error','Verification Failed Please login again');
        redirect('login');
    }else{
        $data['users_table'] = $users_table[0];
        // var_dump($users_table[0]);
    

    $this->load->view('templates/head/header');
    $this->load->view('user/your_profile',$data);
    $this->load->view('templates/foot/footer'); 
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
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
}