<?php
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

// ------------------------------------

// $query = $this->db->get('caste_list');
// $result = $query->result_array();
// // var_dump($result);

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
//     // $this->db->where('caste',$caste);
//     $data = array(
//         'caste_id' => $caste_id,
//         'caste' => $caste,
//     );
//     $this->db->insert('caste_id',$data);
// }

// ------------------------------------

// $query = $this->db->get('caste_list');
// $result = $query->result_array();
// // var_dump($result);

// $array = array();
// foreach($result as $r){
//     $sub_caste = $r['sub_caste'];
//     if(!empty($sub_caste)){
//     if(!in_array($sub_caste , $array)){
//         array_push($array , $sub_caste);
//     }
// }

// }
// // var_dump($array);
// echo $count = count($array);

// for($i = 0; $i < $count; $i++){
//     echo $sub_caste = $array[$i];
//     $sub_caste_id = ($i + 1);
//     $this->db->where('sub_caste',$sub_caste);
//     $data = array(
//         'sub_caste_id' => $sub_caste_id,
//     );
//     $this->db->update('caste_list',$data);
// }







?>


