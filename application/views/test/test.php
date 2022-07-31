<?php

// get state id from state_id table and save in caste list


// $query = $this->db->get('state_id');
// $result = $query->result_array();
// // var_dump($result);

// foreach($result as $r){
//     echo $state_id = $r['state_id'];
//     echo $statename = $r['statename'];
//     $this->db->where('state_name',$statename);
//     $data = array(
//         'state_id' => $state_id,
//     );
//     $this->db->update('caste_list',$data);
// }
// correct
// ------------------------------------

// get unique castes and save to caste_id 
// update new caste id into caste list

// $this->db->where('caste_in_caste_id','0');
// $query = $this->db->get('caste_list');
// $result = $query->result_array();
// var_dump($result);

// $array = array();
// foreach($result as $r){
//     $caste = $r['caste'];
//     if(!in_array($caste , $array)){
//         array_push($array , $caste);
//     }

// }
// // var_dump($array);
// echo $count = count($array);

// for($i = 0; $i < $count; $i++){
//     echo $caste = $array[$i];
//     $caste_id = ($i + 1);
//     $this->db->where('caste',$caste);
//     $data = array(
//         'caste_id' => $caste_id,
//         'caste' => $caste,
//     );
//     $this->db->insert('caste_id',$data);

//     $da = array(
//         'caste_id' => $caste_id,
//         'caste_in_caste_id' => '1',
//     );
//     $this->db->where('caste',$caste);
//     $this->db->update('caste_list',$da);
// }
// correct
// ------------------------------------


// change empty sub caste to None

// $this->db->where('sub_caste','');
// $query = $this->db->get('caste_list');
// $result = $query->result_array();
// var_dump($result);

// $data = array(
//     'sub_caste' => 'None',
// );
// $this->db->where('sub_caste','');
// $this->db->update('caste_list',$data);

// correct

// slug creater

// $res = $this->db->get('language_list')->result_array();

// foreach($res as $r){
//     $name = $language = $r['language'];
//     echo $sl_no = $r['sl_no'];
// $slug = $language;

// $slug = str_replace(' ', '-', $slug);
// $slug = str_replace('/', '-or-', $slug);
// $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
// $slug = strtolower($slug);
// $slug = str_replace('--', '-', $slug);
// $slug = url_title($slug);
// echo $slug.'<br>';

// $data = array(
//     'slug' => $slug,
// );
// // $this->db->where('sl_no',$sl_no);
// // $this->db->update('language_list',$data);
// }

// slug creater


$email = 'vishnuip4@gmail.com';
$this->db->where('email',$email);
// $this->db->select('user_id');
$result = $this->db->get('users')->result_array();
// var_dump($result);
$user_id = $result[0]['user_id'];
echo $email_ver_code_one = random_string('alnum', round(rand(10,16)));
echo $email_ver_code_two = random_string('alnum', round(rand(7,15)));

$data = array(
    'email_ver_code_one' => $email_ver_code_one,
    'email_ver_code_two' => $email_ver_code_two,
);
$this->db->where('user_id',$user_id);
$this->db->update('users',$data);

$official_email_sl_no = '1';
$this->db->where('sl_no',$official_email_sl_no);
$result = $this->db->get('official_emails')->result_array();
var_dump($result);

echo $official_email = $result[0]['email'];
echo $password = $result[0]['pass'];
echo $host = $result[0]['host'];
echo $port = $result[0]['port'];

$this->load->library('email');

if(base_url() != 'https://k4kalyanam.in/' ){
    $protocol = 'smtp';   
     // smtp for localhost
}else{
    $protocol = 'mail';  
      // mail for server
}

$config = array(
    'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    'protocol' => $protocol,
    'smtp_host' => $host,
    // 'smtp_port' => 465,
    'smtp_port' => $port,
    'smtp_user' => $official_email,
    'smtp_pass' => $password,
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '200', //in seconds
    'charset' => 'utf-8',
    'wordwrap' => TRUE,
    'newline' => '\r\n',
    'priority' => 1,
);

$site_name = 'k4kalyanam.in';

$this->email->initialize($config);

$this->email->from($official_email, $site_name.' - Email Verification');
$this->email->to($email);
$this->email->subject('Email verification link - '.$site_name);

$message = '<a href="'.base_url().'verify-your-email/'.$email_ver_code_one.'/'.$user_id.'/'.$email_ver_code_two.'">Click here to verify your email</a>';

$this->email->message('
    Hello'.'<br>'.'<br>'.' 
    
    Welcome to '.$site_name.'. Please click on the link below to verify your email address.'

    .'<br><br>'.$message.'<br><br>'.'
    
    This link will verify your email address, and then you’ll officially be a part of our community.
    <br>
    <br>
    See you there!
    <br>
    <br>
    Best regards, the '.$site_name.' team');

    if(!$this->email->send()) {
        echo '<script>alert("Email not sent");</script>';
        echo 'Mailer Error: ' . $this->email->print_debugger();
    }else{
        $result = array();
        $official_email = '';
        $password = '';
        $host = '';
        $port = '';
        $message = 'Email has been sent';
        return $message;
    }



?>


