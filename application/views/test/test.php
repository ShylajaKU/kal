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

?>


