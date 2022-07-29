<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address_controller extends CI_Controller {
// ------------------------------------------
public function search_by_place_fc(){
    $table_name = 'state_id';
    $select = array('state_id','statename','statename_slug');
    $state_names = $this->address_model->get_selected_data_fm($table_name,$select);
    // var_dump($state_names);
    $data['state_names'] = $state_names;
    $this->form_validation->set_rules('state_id','State Name','required');
    if(!$this->form_validation->run()){
		$this->load->view('templates/head/header');
        $this->load->view('address/search_by_place',$data);
        $this->load->view('templates/foot/footer');
    
    }else{
        $state_id = $this->input->post('state_id');
        $table_name = 'state_id';
    $known_value = $state_id;
    $known_value_col_name = 'state_id';    
    $op_value_col_name = 'statename_slug';    
    $statename = $this->address_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
    }
}

// ------------------------------------------
public function state_entered(){
    $state_id = $this->input->post('state_id');
    $table_name = 'state_id';
    $known_value = $state_id;
    $known_value_col_name = 'state_id';    
    $op_value_col_name = 'statename_slug';    
    $statename_slug = $this->address_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
        redirect($statename_slug);
    
    }
// ------------------------------------------
public function state_in_url_fc(){
    $table_name = 'state_id';
    $select = array('state_id','statename');
    $state_names = $this->address_model->get_selected_data_fm($table_name,$select);
    // var_dump($state_names);
    $data['state_names'] = $state_names;

$value = $state_slug = $this->uri->segment(1);
$value_col_name = 'statename_slug';
$table_name = 'state_id';
$is_true = $this->get_model->check_a_value_present_fm($value,$value_col_name,$table_name);
if(!$is_true){redirect('search-by-place');}

$table_name = 'state_id';
$known_value = $state_slug;
$known_value_col_name = 'statename_slug';    
$op_value_col_name = 'state_id';    
$state_id = $this->address_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
$data['state_id'] = $state_id;

$table_name = 'state_id';
$known_value = $state_id;
$known_value_col_name = 'state_id';    
$op_value_col_name = 'statename_slug';    
$statename = $this->address_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);

$table_name = 'district_state_id';
$value = $state_id; $value_col_name = 'state_id';
$data['district_names'] = $this->address_model->get_specific_rows_fm($value,$value_col_name,$table_name);
// var_dump($data['district_names']);
$this->load->view('templates/head/header');
$this->load->view('address/search_by_place',$data);
$this->load->view('templates/foot/footer');

}
// ------------------------------------------
public function district_entered(){
    $uri1 = $this->uri->segment(1);
    $known_value = $district_id = $this->input->post('district_id');
    $known_value_col_name = $table_name = 'district_id';
    $op_value_col_name = 'Districtname_slug';
    $Districtname_slug = $this->address_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
    redirect($uri1.'/'.$Districtname_slug);
}
// ------------------------------------------
public function district_in_url_fc(){
    $table_name = 'state_id';
    $select = array('state_id','statename');
    $state_names = $this->address_model->get_selected_data_fm($table_name,$select);
    // var_dump($state_names);
    $data['state_names'] = $state_names;

    
$value = $state_slug = $this->uri->segment(1);
$value_col_name = 'statename_slug';
$table_name = 'state_id';
$is_true = $this->address_model->check_a_value_present_fm($value,$value_col_name,$table_name);
if(!$is_true){redirect('search-by-place');}
$value = $Districtname_slug = $this->uri->segment(2);
$value_col_name = 'Districtname_slug';
$table_name = 'district_id';
$is_true = $this->address_model->check_a_value_present_fm($value,$value_col_name,$table_name);
if(!$is_true){redirect('search-by-place');}

$table_name = 'state_id';
$known_value = $state_slug;
$known_value_col_name = 'statename_slug';    
$op_value_col_name = 'state_id';    
$state_id = $this->address_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
$data['state_id'] = $state_id;

$table_name = 'district_state_id';
$value = $state_id;
$value_col_name = 'state_id';
$data['district_names'] = $this->address_model->get_specific_rows_fm($value,$value_col_name,$table_name);


$Districtname_slug = $this->uri->segment(2);

$table_name = 'district_id';
$known_value = $Districtname_slug;
$known_value_col_name = 'Districtname_slug';
$op_value_col_name = 'district_id';
$district_id = $this->address_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
$data['district_id'] = $district_id;

$value = $district_id;
$value_col_name = 'district_id';
$table_name = 'all_india_po_list';
$data['officenames'] = $this->address_model->get_specific_rows_fm($value,$value_col_name,$table_name);



$this->load->view('templates/head/header');
$this->load->view('address/search_by_place',$data);
$this->load->view('templates/foot/footer');

}
// ------------------------------------------
public function po_entered(){
    $uri1 = $this->uri->segment(1);
    $uri2 = $this->uri->segment(2);
    $known_value = $po_sl_no = $this->input->post('po_sl_no');
    // $this->session->set_userdata('po_sl_no',$po_sl_no);
    $table_name = 'all_india_po_list';
    $known_value_col_name = 'sl_no';
    $op_value_col_name = 'officename_only_slug';
    $officename_only_slug = $this->address_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);

    redirect($uri1.'/'.$uri2.'/'.$officename_only_slug);
}
// ------------------------------------------
public function po_in_url_fc(){
    $table_name = 'state_id';
    $select = array('state_id','statename');
    $state_names = $this->address_model->get_selected_data_fm($table_name,$select);
    // var_dump($state_names);
    $data['state_names'] = $state_names;

    
$value = $state_slug = $this->uri->segment(1);
$value_col_name = 'statename_slug';
$table_name = 'state_id';
$is_true = $this->address_model->check_a_value_present_fm($value,$value_col_name,$table_name);
if(!$is_true){redirect('search-by-place');}
$value = $Districtname_slug = $this->uri->segment(2);
$value_col_name = 'Districtname_slug';
$table_name = 'district_id';
$is_true = $this->address_model->check_a_value_present_fm($value,$value_col_name,$table_name);
if(!$is_true){redirect('search-by-place');}
$value = $officename_only_slug = $this->uri->segment(3);
$value_col_name = 'officename_only_slug';
$table_name = 'all_india_po_list';
$is_true = $this->address_model->check_a_value_present_fm($value,$value_col_name,$table_name);
if(!$is_true){redirect('search-by-place');}


$table_name = 'state_id';
$known_value = $state_slug;
$known_value_col_name = 'statename_slug';    
$op_value_col_name = 'state_id';    
$state_id = $this->address_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
$data['state_id'] = $state_id;

$table_name = 'district_state_id';
$value = $state_id;
$value_col_name = 'state_id';
$data['district_names'] = $this->address_model->get_specific_rows_fm($value,$value_col_name,$table_name);


$Districtname_slug = $this->uri->segment(2);
$table_name = 'district_id';
$known_value = $Districtname_slug;
$known_value_col_name = 'Districtname_slug';
$op_value_col_name = 'district_id';
$district_id = $this->address_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
$data['district_id'] = $district_id;

$value = $district_id;
$value_col_name = 'district_id';
$table_name = 'all_india_po_list';
$data['officenames'] = $this->address_model->get_specific_rows_fm($value,$value_col_name,$table_name);


$officename_only_slug = $this->uri->segment(3);
$table_name = 'all_india_po_list';
$known_value = $officename_only_slug;
$known_value_col_name = 'officename_only_slug';
$op_value_col_name = 'sl_no';
$sl_no = $this->address_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
$data['po_sl_no'] = $sl_no;

$po_sl_no = $sl_no;

// $po_sl_no = $this->session->userdata('po_sl_no');
// $data['po_sl_no'] = $po_sl_no;

$table_name = 'all_india_po_list';
$known_value = $po_sl_no;
$known_value_col_name = 'sl_no';

$pincode_row = $this->address_model->get_row_fm($table_name,$known_value,$known_value_col_name);
var_dump($pincode_row);
$data['table_rows'] = $pincode_row;
$data['valid_pincode'] = true;

$sl_no_array = array(); 
foreach($pincode_row as $r){
    $sl_no = $r['sl_no'];
    $sl_no_array[] = $sl_no;
}

// $this->load->view('home/header');
// $this->load->view('home/search_by_place',$data);
// // $table_rows  $valid_pincode for search result page
// $this->load->view('search_result/search_result');
// $this->load->view('home/content');
// $this->load->view('home/footer');

}
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------

}