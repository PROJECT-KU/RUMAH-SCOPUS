<?php
class Reset_m extends CI_Model{
public function reset_password($reset_key, $password){
$this->db->where('reset_password', $reset_key);
$data = array('password' => $password);
$this->db->update('tbl_member', $data);
return ($this->db->affected_rows()>0)? TRUE:FALSE;
}
public function check_reset_key($reset_key){
$this->db->where('reset_password', $reset_key);
$this->db->from('tbl_member');
return $this->db->count_all_results();
}
}