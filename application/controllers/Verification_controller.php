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
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
}