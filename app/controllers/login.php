<?php
class Login {

	private $user_model;
	private $form_data;
	
	public function __construct() {
		
		if($_POST) {
		
			// the results array
			$results = array();
			
			// include the User model
			$this->user_model = new User;
			
			$this->formData = array(
				'login_email'		=> clean($_POST['login_email']),
				'login_password'	=> clean($_POST['login_password'])
			);
			
			if($this->user_model->userExists($this->formData['login_email']) == 1) {
			
				$user = $this->user_model->get_user($this->formData['login_email']);
			
				/* secure the password based on the salt */
				$temp_pass = $this->user_model->temp_password($this->formData['login_password'], $user['salt']);
				
				$results['password'] = $this->formData['login_password'];
				if($temp_pass === $user['password']) {
					
					// add the secure token to the database
					$token = $this->user_model->secure_token($this->formData['login_email']);
					
					$_SESSION['meta_token'] = $token;
					
					$results['success'] = 1;
					
				} else {
					$results['success'] = 'FAIL';
				}
				
				ChromePhp::log($temp_pass);
				ChromePhp::log($user['password']);
				
				
				
			} else {
				$results['success'] = 0;
			}
			
			echo json_encode($results);
			
		}
		
	}
	
}
?>