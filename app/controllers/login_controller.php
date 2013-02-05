<?php
class Login_Controller {
	
	private $user_model;
	private $form_data;
	
	public function __construct() {
		
		if($_POST) {
		
			// the results array
			$results = array();
			
			// include the User model
			include Config::get_dir('model').'/user_model.php';
			$this->user_model = new User_Model;
			
			$this->formData = array(
				'login_email'		=> clean($_POST['login_email']),
				'login_password'	=> clean($_POST['login_password'])
			);
			
			if($this->user_model->userExists($this->formData['login_email']) == 1) {
			
				$user = $this->user_model->get_user($this->formData['login_email']);
			
				/* secure the password they entered */
				$temp_pass = hash('sha256', $this->formData['login_password'] . $user['salt']);
				
				for($round=0;$round<65536;$round++) {
					$temp_pass = hash('sha256', $temp_pass . $user['salt']);
				}
				
				if($temp_pass === $user['password']) {
					
					$_SESSION['meta_user'] = $user;
					
					$results['success'] = 1;
					
				} else {
					$results['success'] = 0;
				}
				
				
				
			} else {
				$results['success'] = 0;
			}
			
			echo json_encode($results);
			
		}
		
	}
	
}
?>