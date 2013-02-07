<?php
class User {
		
	public $dbh;
	
	public function __construct() {
		$this->dbh = smplPDO::get_instance();
	}
	
	public function userExists($email) {
		
		// check to see if this email address is already in use
		
		if($this->dbh->exists('accounts', array('email' => $email))) {
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
			$this->dbh->insert('accounts', $query_params);
			
	}
	
	public function get_user($email) {
		
		// returns an array of user data based on the email address
		$user = $this->dbh->get_row('accounts', array('email' => $email));
		return $user;
		
	}
	
	private function securePassword($password) {
		
		// generates a salt and secures the password
		
		// generate the salt
		$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
		
		$password = $this->hash_password($password, $salt);
		
		$secure_array = array(
			'password'	=> $password,
			'salt'		=> $salt
		);
		
		return $secure_array;
		
	}
	
	public function temp_password($password, $salt) {
	
		$temp_pass = $this->hash_password($password, $salt);
		
		return $temp_pass;
	}
	
	private function hash_password($password, $salt) {
		// hash the password
		$password = hash('sha256', $password . $salt);
		
		// hash it 65536 more times
		for($round=0;$round<65536;$round++) {
			$password = hash('sha256', $password . $salt);
		}
		
		return $password;
	}
	
	public function secure_token($email) {
		
		// generate the token
		$token = $this->email_token($email);
		
		// check to see if there is already a row available to use 
		if($this->dbh->exists('secure_tokens', array('email' => $email))) {
			
			// we can just update the row that already exists
			$this->dbh->update('secure_tokens', array('token' => $token));			
			
		} else {
		
			// create a new row
			$this->dbh->insert('secure_tokens', array('email' => $email, 'token' => $token));
		
		}
		
		return $token;
	
	}
	
	private function email_token($email) {
		// create a security token out of the email
		$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
		$token = hash('sha256', $this->formData['login_email'] . $salt);
		return $token;
	}
	
	public function meta_user($token) {
		
		
	
	}
	
}
?>