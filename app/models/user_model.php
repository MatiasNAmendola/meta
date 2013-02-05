<?php
class User_Model extends Master_Model {
	
	public function userExists($email) {
		
		// check to see if this email address is already in use
		
		if($this->db->exists('accounts', array('email' => $email))) {
			return 1;
		} else {
			return 0;
		}
		
	}
	
	public function createUser($data) {
		
		// creates a user account in the database
		// $data = array('email', 'password')
		
		$email			= $data['email'];
		$password		= $data['password'];
		$secure_array	= $this->securePassword($password);
			
			$query_params = array(
				'id'		=> 'null',
				'email'		=> $data['email'],
				'password'	=> $secure_array['password'],
				'salt'		=> $secure_array['salt']
			);
			
			// insert the values into the database
			$this->db->insert('accounts', $query_params);
			
	}
	
	public function get_user($email) {
		
		// returns an array of user data based on the email address
		$user = $this->db->get_row('accounts', array('email' => $email));
		return $user;
		
	}
	
	private function securePassword($password) {
		
		// generates a salt and secures the password
		
		// generate the salt
		$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
		
		// hash the password
		$password = hash('sha256', $password . $salt);
		
		// hash it 65536 more times
		for($round=0;$round<65536;$round++) {
			$password = hash('sha256', $password . $salt);
		}
		
		$secure_array = array(
			'password'	=> $password,
			'salt'		=> $salt
		);
		
		return $secure_array;
		
	}
	
}
?>