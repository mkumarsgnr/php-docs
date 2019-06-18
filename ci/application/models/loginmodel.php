<?php
class Loginmodel extends CI_model{
	Public function login_valid($username ,$password){
		
		$q= $this->db->where(['uname'=>$username,'pword'=>$password])
				 ->get('users');
		if($q->num_rows()){
			return $q->row()->id;
		}
		else{
			return FALSE;
		}
	}
}
?>