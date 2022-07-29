<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_model extends CI_Model
{
// ---------------------------------------
public function get_all_fm($table_name){
    $query = $this->db->get($table_name);
    return $result = $query->result_array();
}

// ---------------------------------------
public function get_rows_with_a_common_value_fm($known_value,$col_name_of_known_value,$table_name){
$this->db->where($col_name_of_known_value , $known_value);
$query = $this->db->get($table_name);
return $result = $query->result_array;
}

// ---------------------------------------
// Function to get the client IP address
public function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
// ---------------------------------------
public function check_email_exists_fm($email){

    $query = $this->db->get_where('users',array('email' => $email)) ;
    if(empty($query->row_array())){
        return false;
        // if array is empty it will return false back to controller
    }else{
        return true;
    }
    //return to user_controller/check_email_exists_fc (2nd)
}
// ---------------------------------------
public function set_userdata_from_db($user_id){
        $this->db->where('user_id',$user_id);
		$select_array = array('user_id','email','email_verified','phone_no','phone_no_verified','name','gender','marital_status','level_1','level_2');
		$this->db->select($select_array);
		$query = $this->db->get('users');
		$result = $query->result_array();
        $this->session->set_userdata($result[0]);
}
// ---------------------------------------
public function check_password_and_return_user_id_fm($email, $password){
    $table_name = 'users';
    $col_name_of_known_value = 'email';
    $col_name_of_op_value = 'password';
    $known_value = $email;
    $hash = $this->get_model->get_any_field_fm($table_name,$known_value,$col_name_of_known_value,$col_name_of_op_value);
    if(password_verify($password, $hash))
    {
        $this->db->where('email', $email);
        $result = $this->db->get('users');
        return $result->row(0)->user_id;
    }else{
        return false;
    }
}
// ---------------------------------------
public function get_any_field_fm($table_name,$known_value,$col_name_of_known_value,$col_name_of_op_value){
    $this->db->where($col_name_of_known_value , $known_value);
    $this->db->select($col_name_of_op_value);
    $query = $this->db->get($table_name);
    $result = $query->result_array();
    $op_value = $result[0][$col_name_of_op_value];
    return $op_value;
}
// ---------------------------------------
public function check_a_value_present_fm($value,$value_col_name,$table_name){
    $this->db->where($value_col_name,$value);
    $query = $this->db->get($table_name);
    $num_rows = $query->num_rows();
    if(!$num_rows){
        return false;
    }else{
        return true;
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