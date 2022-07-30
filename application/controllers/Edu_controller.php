<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edu_controller extends CI_Controller {
// ------------------------------------------
public function education_and_job_fc(){
	if($this->session->userdata('logged_in') != '1'){redirect('login');}

    $this->db->where('approved','1');
    $query = $this->db->get('highest_education');
    $result = $query->result_array();
    $data['highest_education_list'] = $result;
    $this->form_validation->set_rules('highest_education','Highest Education','required' );
    if(!$this->form_validation->run()){
        $this->load->view('templates/head/header');
        $this->load->view('edu/education_and_job_details',$data);
        $this->load->view('templates/foot/footer');
    }else{
        $he = $this->input->post('highest_education');
        if($he == '0'){
        $he_t = $this->input->post('highest_education_typed_in');
        $data = array(
            'highest_education' => $he_t,
            'created_by' => $this->session->userdata('user_id'),
            'approved' => '0',
            );
            $this->db->where('highest_education',$he_t);
            $query1 = $this->db->get('highest_education');
            echo $count = $query1->num_rows();
            if(!$count){
                $this->db->insert('highest_education',$data);
            }
            $he = $he_t;
        }
        // echo $he;
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