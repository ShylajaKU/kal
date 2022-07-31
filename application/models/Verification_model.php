<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verification_model extends CI_Model
{
// ---------------------------------------
    public function send_email_verication_link_fc($user_id,$official_email_sl_no){
        // for verifying email
        $this->db->where('user_id',$user_id);
        // $this->db->select('user_id');
        $result = $this->db->get('users')->result_array();
        // var_dump($result);
        $email = $result[0]['email'];
        echo $email_ver_code_one = random_string('alnum', round(rand(10,16)));
        echo $email_ver_code_two = random_string('alnum', round(rand(7,15)));
    
        $data = array(
            'email_ver_code_one' => $email_ver_code_one,
            'email_ver_code_two' => $email_ver_code_two,
        );
        
        $this->db->where('user_id',$user_id);
        $this->db->update('users',$data);
    
    $this->verification_model->send_verification_email_fm($email,$official_email_sl_no,$email_ver_code_one,$email_ver_code_two,$user_id);
    
    }
// ---------------------------------------
public function send_verification_email_fm($email,$official_email_sl_no,$email_ver_code_one,$email_ver_code_two,$user_id){

    $this->db->where('sl_no',$official_email_sl_no);
    $result = $this->db->get('official_emails')->result_array();

        
    $official_email = $result[0]['email'];
    $password = $result[0]['pass'];
    $host = $result[0]['host'];
    $port = $result[0]['port'];
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
    'smtp_port' => $port,
    // 'smtp_port' => 465,
    'smtp_user' => $official_email,
    'smtp_pass' => $password,
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '200', //in seconds
    'charset' => 'utf-8',
    'wordwrap' => TRUE,
    'newline' => '\r\n',
    'priority' => 1,
);

$site_name = 'k4kalyanam';

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
        // echo 'Mailer Error: ' . $this->email->print_debugger();
    }else{
        echo '<script>alert("Email Sent");</script>';
        $result = array();
        $official_email = '';
        $password = '';
        $host = '';
        $port = '';
        $message = 'Email has been sent';
        return $message;
    }

    }
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------
// ---------------------------------------

}