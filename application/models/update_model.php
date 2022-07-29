<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_model extends CI_Model
{
// ---------------------------------------
public function update_fm($unique_id,$unique_id_col_name,$table_name,$data){
    $this->db->where($unique_id_col_name , $unique_id);
    $this->db->update($table_name,$data);
    

}
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------

}