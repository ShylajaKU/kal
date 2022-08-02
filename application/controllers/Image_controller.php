<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_controller extends CI_Controller {
// ------------------------------------------
public function image_upload_fc(){
    if(!$this->session->userdata('logged_in')){
        redirect('login');
    }
    $user_id = $this->session->userdata('user_id');
    // $upload_path = './uploads/user_images/'.$user_id;
    
    if (!is_dir("./uploads/user_images/$user_id")) {
        mkdir("./uploads/user_images/$user_id");      
    }

    $this->form_validation->set_rules('profile_photo_yes_or_no','','required');
    if(!$this->form_validation->run()){
    $this->load->view('templates/head/header');
    $this->load->view('image_upload/image_upload');
    $this->load->view('templates/foot/footer'); 
    }else{
        $config['upload_path']          = "./uploads/user_images/$user_id";
        $config['allowed_types']        = 'gif|jpg|jpeg|png|webp|image/png';
        // $config['allowed_types']        = '*';
        $config['max_size']             = 8192;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')){
            $data['message'] = $this->upload->display_errors();
            $this->load->view('templates/head/header');
            $this->load->view('image_upload/upload_status',$data);
            $this->load->view('templates/foot/footer'); 
        }else{
            $visibility = 1;

            $prfile_photo = $this->input->post('profile_photo_yes_or_no');
            if($prfile_photo){
                $data_pp = array(
                    'profile_photo' => 0,
                );
            }
            $this->db->where('user_id',$user_id);
            $this->db->update('user_images',$data_pp);

            $data1 = array(
                'user_id' => $user_id,
                'profile_photo' => $prfile_photo,
                'visibility' => $visibility,
            );
                $data = array_merge($data1,$this->upload->data());
                var_dump($data);
                // $this->db->insert('user_images',$data_all);
                $table_name = 'user_images';
                $insert_id = $this->image_model->insert_data_fm($table_name,$data);
            
        }

    }
}
// ------------------------------------------
public function set_photo_as_profile_photo_fm(){
    
}
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------

}