
<?php
class M_member extends CI_Model{

	function get_all_member(){
		$hsl=$this->db->query("SELECT * FROM tbl_member");
		return $hsl;	
	}
}