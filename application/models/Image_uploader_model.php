<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_uploader_model extends CI_Model
{
// ---------------------------------------
public function add_uploaded_image_details($data,$user_id){

    $data = array(
        'user_id' => $user_id,
        'profile_photo' => $this->input->post('profile_photo_yes_or_no'),
        'file_name' => $data['upload_data']['file_name'],
        'image_width' => $data['upload_data']['image_width'],
        'image_height' => $data['upload_data']['image_height'],
    );
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
}
