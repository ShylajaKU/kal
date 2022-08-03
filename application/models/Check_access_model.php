<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_access_model extends CI_Model
{
// ---------------------------------------
public function check_reg_page_access_fm(){
    $user_id = $this->session->userdata['user_id'];
    if(!$user_id){redirect('login');}
    $page_name = $this->uri->segment(1);

$user_details = $this->db->where('user_id',$user_id)->get('users')->result_array()[0];
$email_verified = $user_details['email_verified'];
$phone_no_verified = $user_details['phone_no_verified'];
$unique_id = $user_details['unique_id'];
$user_active = $user_details['user_active']; 
$level_1 = $user_details['level_1']; //
$level_2 = $user_details['level_2'];
$level_3 = $user_details['level_3']; // community-details
$level_4 = $user_details['level_4']; // education-details
$level_5 = $user_details['level_5'];
$level_6 = $user_details['level_6']; // add-height
$logged_in = $this->session->userdata('logged_in');
switch ($page_name){
    case 'community-details';
        // if(!isset($logged_in)){redirect('login');}
        if(!$logged_in){redirect('login');}
        if(!$email_verified){redirect('please-verify-your-email');}
        if($level_3){redirect('home');}
    break;
    case 'add-height';

        if(!$email_verified){redirect('please-verify-your-email');}
        // if($level_6){redirect('home');}
    break;

}
}
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------


}