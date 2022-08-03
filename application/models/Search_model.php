<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model
{
// ---------------------------------------
// for registered users only
public function home_page_results_fm(){
    //  by gender and caste 
    $user_id = $this->session->userdata('user_id');

    $caste = $this->db->where('user_id',$user_id)->get('users')->result_array()[0]['caste'];
    $marital_status = $this->db->where('user_id',$user_id)->get('users')->result_array()[0]['marital_status'];
    $gender_of_user = $this->db->where('user_id',$user_id)->get('users')->result_array()[0]['gender'];
    if($gender_of_user == 'male'){
        $gender_to_search_for = 'female';
    }else{
        $gender_to_search_for = 'male';
    }

    $where_array = array(
        'user_active' => 1,
        'caste' => $caste,
        'marital_status' => $marital_status,
        'gender' => $gender_to_search_for,
    );
    $this->db->where($where_array);
    // $result = $this->db->get('users')->result_array();
    // return $result;

    $this->db->select('*');
    $this->db->from('users');
    $this->db->join('user_images', 'user_images.user_id = users.user_id and user_images.profile_photo = 1');
    $query = $this->db->get()->result_array();
    return $query;
}
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------



}