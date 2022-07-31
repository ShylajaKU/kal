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


    














?>


