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
public function edit_profile_item_fc($any){
// $route['edit-profile/(:any)'] = 'user_controller/edit_profile_item_fc/$1';
    if(!$this->session->userdata('logged_in')){redirect('login');}
    $verified = $this->verification_model->verify_user_fm();
    if(!$verified){redirect('login');}

    switch ($any){
        case 'dob';
            $data['label'] = 'Date of Birth';
            $data['heading'] = 'Change Date of Birth';
            $data['input_name'] = 'dob';
            $this->session->set_userdata('input_name',$data['input_name']);
            // var_dump($this->session->userdata());
            $data['input_type'] = 'date';
            $data['required'] = 'required';
            $user_id = $this->session->userdata('user_id');
            $this->db->where('user_id',$user_id);
            $this->db->select($data['input_name']);
            $data['current_value'] = $this->db->get('users')->row_array()[$data['input_name']];
            // var_dump($data['current_value']);
        break;
        case 'fathers_name';
            $data['label'] = 'Fathers Name';
            $data['heading'] = 'Edit';
            $data['input_name'] = 'fathers_name';
            $data['input_type'] = 'text';
            $data['required'] = 'required';
            $user_id = $this->session->userdata('user_id');
            $this->db->where('user_id',$user_id);
            $this->db->select($data['input_name']);
            $data['current_value'] = $this->db->get('users')->row_array()[$data['input_name']];
        break;
        case 'mothers_name';
            $data['label'] = 'Mothers Name';
            $data['heading'] = 'Edit';
            $data['input_name'] = 'mothers_name';
            $data['input_type'] = 'text';
            $data['required'] = 'required';
            $user_id = $this->session->userdata('user_id');
            $this->db->where('user_id',$user_id);
            $this->db->select($data['input_name']);
            $data['current_value'] = $this->db->get('users')->row_array()[$data['input_name']];
        break;
        case 'family_class';
            $data['heading'] = 'Change';
            $data['label'] = 'Which class do you describe your family as *';
            $data['input_name'] = 'family_class';
            $data['input_type'] = 'select';
            $data['required'] = 'required';
            $user_id = $this->session->userdata('user_id');
            $this->db->where('user_id',$user_id);
            $this->db->select($data['input_name']);
            $data['current_value'] = $this->db->get('users')->row_array()[$data['input_name']];
            $data['family_class_list'] = $this->db->get('family_class')->result_array();
            $data['name_in_db'] = 'class'; // mostly same as input_name if not 
        break;
        case 'height_cm';

        break;
        }
    $this->form_validation->set_rules($data['input_name'],$data['label'],'required');
    if(!$this->form_validation->run()){
    $this->load->view('templates/head/header');
    $this->load->view('user/edit_profile_item',$data);
    $this->load->view('templates/foot/footer'); 
    }else{
        $input = $this->input->post($data['input_name']);
        $data_to_update = array(
            $data['input_name'] => $input,
        );
        $this->db->where('user_id',$user_id);
        $this->db->update('users',$data_to_update);

        redirect('your-profile/#'.$data['input_name']);
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
}