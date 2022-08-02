<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_controller extends CI_Controller {
// ------------------------------------------
public function image_upload_fc(){
    if(!$this->session->userdata('logged_in')){redirect('login');}
    $verified = $this->verification_model->verify_user_fm();
    if(!$verified){redirect('login');}

    $user_id = $this->session->userdata('user_id');

    // $upload_path = './uploads/user_images/'.$user_id;
    
    if (!is_dir("./uploads/user_images/$user_id")) {
        mkdir("./uploads/user_images/$user_id");      
    }

    $this->form_validation->set_rules('profile_photo_yes_or_no','','required');
    if(!$this->form_validation->run()){
    $this->load->view('templates/head/header');
    $this->load->view('image/image_upload');
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
            $this->load->view('image/upload_status',$data);
            $this->load->view('templates/foot/footer'); 
        }else{
            // $visibility = 1;

            $prfile_photo = $this->input->post('profile_photo_yes_or_no');
            if($prfile_photo){
                $data_pp = array(
                    'profile_photo' => 0,
                );
            $this->db->where('user_id',$user_id);
            $this->db->update('user_images',$data_pp);
            }
            $data1 = array(
                'user_id' => $user_id,
                'profile_photo' => $prfile_photo,
                'upload_path' => 'uploads/user_images/'.$user_id.'/',
                // 'visibility' => $visibility,
            );
                $data2 = $this->upload->data();
                $data = array_merge($data1,$data2);
                var_dump($data);
                var_dump($data2);

                // $this->db->insert('user_images',$data_all);
                $table_name = 'user_images';
                $insert_id = $this->image_model->insert_data_fm($table_name,$data);


                $imagePath = './uploads/user_images/'.$user_id.'/'.$data['file_name'];
                $raw_name = $data['raw_name'];
                $newImagePath = 'uploads/user_images/'.$user_id.'/'.$raw_name.'.webp';
                $file_size = $data['file_size'];

                if($file_size > 100){
                    $compression_quality = round((100/$file_size)*100);
                  }else{
                    $compression_quality = 90;
                  }

                  $data = $this->webp_model->convert_to_webp_fm($imagePath,$compression_quality,$newImagePath);


        }
    }
}
// ------------------------------------------
public function view_your_images_fc(){
    if(!$this->session->userdata('logged_in')){redirect('login');}
    $verified = $this->verification_model->verify_user_fm();
    if(!$verified){redirect('login');}

    $user_id = $this->session->userdata('user_id');
    $known_value = $user_id;
    $col_name_of_known_value = 'user_id';
    $table_name = 'user_images';
    $all_user_images = $this->get_model->get_rows_with_a_common_value_fm($known_value,$col_name_of_known_value,$table_name);
    $table_name = 'users';
    $col_name_of_op_value = 'name';
    $name = $this->get_model->get_any_field_fm($table_name,$known_value,$col_name_of_known_value,$col_name_of_op_value);
    // var_dump($all_user_images);
    $data['all_user_images'] = $all_user_images;
    $data['user_name'] = $name;

    $this->load->view('templates/head/header');
    $this->load->view('image/view_your_images',$data);
    $this->load->view('templates/foot/footer'); 

}
// ------------------------------------------

// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------







}