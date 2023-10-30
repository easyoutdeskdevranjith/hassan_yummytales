<?php
class User_model extends CI_model{
    function create($formArray)
    {
        $this->db->insert("user_id",$formArray);
    }
    function all() {
      return $users =  $this->db->get('user_id')->result_array();
}
function getUser($user_id) {
    $this->db->where('user_id',$user_id);
   return $this->db->get('user_id') ->row_array();
}
 function UpdateUser($user_id,$formArray){
    $this->db->where('user_id', $user_id);
    $this ->db->update('user_id',$formArray);
 }
 function deleteUser($user_id){
    $this->db->where('user_id', $user_id);
 }
}
?>