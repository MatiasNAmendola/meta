<?php
class User_Model extends Master_Model {
	
	public function userExists($email) {
		
		// check to see if this email address is already in use
		
		if($db->exists('accounts', array('email' => $email))) {
			return 1;
		} else {
			return 0;
		}
		
	}
	
}
?>