<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_controller extends CI_Controller {
// ------------------------------------------
public function view_your_plan_fc(){
    if(!$this->session->userdata('logged_in')){  redirect('login');  }
    
		$this->load->view('templates/head/header');
		$this->load->view('plan/view_your_plan');
		$this->load->view('templates/foot/footer');
}
// ------------------------------------------
public function select_plan_fc(){
    if(!$this->session->userdata('logged_in')){  redirect('login');  }

    $this->load->view('templates/head/header');
    $this->load->view('plan/select_plan');
    $this->load->view('templates/foot/footer');


}
// ------------------------------------------
public function create_plan_fc(){
    // page create_plan
    if(!$this->session->userdata('logged_in')){
        redirect('login');
    }
    $admin = $this->session->userdata('email');
    if($admin != 'vishnuip4@gmail.com'){
        redirect('home');
    }
    $this->form_validation->set_rules('plan_name', 'Plan Name',
        'required|is_unique[plans.plan_name]',
        array(
                // 'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'    )   
    );
    $this->form_validation->set_rules('plan_desc', 'Plan Description', 'required');
    $this->form_validation->set_rules('p_dur_in_months', 'Plan Duration', 'required');
    $this->form_validation->set_rules('no_of_images_allowed', 'No of Images', 'required');
    $this->form_validation->set_rules('feature_images_allowed', 'No of feature Images', 'required');
    $this->form_validation->set_rules('price', 'Plan Price', 'required');
    $this->form_validation->set_rules('tax', 'Tax', 'required');
    $this->form_validation->set_rules('times', 'Times', 'required');
    $this->form_validation->set_rules('plan_type', 'Plan Type', 'required');
    $this->form_validation->set_rules('razerpay', 'Razerpay Button', 'required');
    
    if (!$this->form_validation->run()) {
        // $plans = $this->plan_model->get_plans();
        // $data['plans'] = $plans;    
        $this->load->view('templates/head/header');
        $this->load->view('plan/create_plan');
        $this->load->view('templates/foot/footer'); 
    } else {
        // if passes, insert data into database
        $months = $this->input->post('p_dur_in_months');
        $days = $months * 31;
        $day_sec = 86400;
        $plan_sec = $day_sec * $days;
        $no_of_images_allowed = $this->input->post('no_of_images_allowed');
        $feature_images_allowed = $this->input->post('feature_images_allowed');
        $plan_type = $this->input->post('plan_type');
        $data = array(
            'plan_name' => $this->input->post('plan_name'),
            'plan_description' => $this->input->post('plan_desc'),
            'p_dur_in_months' => $months,
            'p_dur_in_days' => $days,
            'day_ts_add' => $day_sec,
            'plan_ts_add' => $plan_sec,
            'plan_price' => $this->input->post('price'),
            'tax' => $this->input->post('tax'),
            'no_of_images_allowed' => $no_of_images_allowed,
            'feature_images_allowed' => $feature_images_allowed,
            'once' => $this->input->post('times'),
            'plan_type' => $plan_type,
        );

        $sel = $this->input->post('select');
        //switch
        switch
        ($sel) {
            case 'plam.aml':
                $table_name = 'plans';
                break;
            // case '2':
            //     break;
            // default:
            //     echo "No Plan Selected";
            //     break;
        }
        $this->plan_model->insert_plan_fm($data,$table_name);
        var_dump($data);
        // redirect('create_plan');
        redirect('view_plans');
    }
}
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------


}