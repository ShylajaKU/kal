<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edu_controller extends CI_Controller {
// ------------------------------------------
public function education_and_job_fc(){
	if($this->session->userdata('logged_in') != '1'){redirect('login');}
	// if($this->session->userdata('level_4') == '1'){redirect('home');}

    $this->db->where('approved','1');
    $query = $this->db->get('highest_education');
    $result = $query->result_array();
    $data['highest_education_list'] = $result;


    $this->db->where('approved','1');
    $query = $this->db->get('professions_list');
    $result = $query->result_array();
    $data['professions_list'] = $result;

    $query = $this->db->get('annual_income');
    $result = $query->result_array();
    $data['annual_income_list'] = $result;

	// $data_to_view['current_value'] = $this->db->get('users')->row_array()['height_cm'];


    $this->form_validation->set_rules('highest_education','Highest Education','required' );
    if(!$this->form_validation->run()){
        $this->load->view('templates/head/header');
        $this->load->view('edu/education_and_job_details',$data);
        $this->load->view('templates/foot/footer');
    }else{
        //=======================================
        $higher_education = $this->input->post('highest_education');
        if($higher_education == '0'){
        $vip = $this->input->post('highest_education_typed_in');
        $data = array(
            'highest_education' => $vip,
            'created_by' => $this->session->userdata('user_id'),
            'approved' => '0',
            );
            $this->db->where('highest_education',$vip);
            $count = $this->db->get('highest_education')->num_rows();
            if(!$count){
                $this->db->insert('highest_education',$data);
            }
            $higher_education = $vip;
        }
        //=======================================
        $profession = $this->input->post('profession');
        if($profession == '0'){
            $vip = $this->input->post('profession_typed_in');
            $data = array(
                'profession' => $vip,
                'created_by' => $this->session->userdata('user_id'),
                'approved' => '0',
            );
            $this->db->where('profession',$vip);
            $count = $this->db->get('professions_list')->num_rows();
            if(!$count){
                $this->db->insert('professions_list',$data);
            }
            $profession = $vip;
        }
        //=======================================
        $annual_income_id = $known_value = $this->input->post('annual_income');
        $table_name = 'annual_income'; $col_name_of_known_value = 'sl_no'; $col_name_of_op_value = 'income_bracket';
        $income_bracket = $this->get_model->get_any_field_fm($table_name,$known_value,$col_name_of_known_value,$col_name_of_op_value);
        //=======================================
        $data = array(
            'education' => $higher_education,
            'occupation' => $profession,
            'income_bracket' => $income_bracket,
            'i_b_id' => $annual_income_id,
            'level_4' => 1,
        );
        $user_id = $this->session->userdata('user_id');
        $this->db->where('user_id',$user_id);
        $this->db->update('users',$data);
        redirect('home');
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


}