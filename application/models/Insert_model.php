<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert_model extends CI_Model
{
// ---------------------------------------
public function insert_fm($table_name,$data){
    $this->db->insert($table_name,$data);
    $insert_id = $this->db->insert_id();

    return  $insert_id;
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