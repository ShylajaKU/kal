<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {
// ------------------------------------------
public function test_fc(){
$this->load->view('templates/head/header');

    $this->load->view('test/test');
    $this->load->view('templates/foot/footer');

}
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
}