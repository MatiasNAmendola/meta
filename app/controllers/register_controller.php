<?php
class Register_Controller {
	public function __construct() {
		if($_POST) {
			
			$formData = array(
				$_POST['reg_email'],
				$_POST['reg_password'],
				$_POST['reg_password2']
			);
			
			// include & start the Sanitize class 
			include Config::model_dir.'/sanitize_model.php';
			
			$sanitize = new Sanitize;
			
			$formData = $sanitize->clean($formData);
			
			/* Validation */
			include Config::model_dir.'/validation_model.php';
			
			$validate = new Validate;
			
			$rules = array(
				array('is_empty', 'is_email'),
				'is_empty',
				array(array('is_matchTo', 1))
			);
			
			$test = $validate->check($formData, $rules);
			
			if(empty($reg_email)) {
				$email_empty = 1;
				$error = 1;
			}
			
			if(!filter_var($reg_email, FILTER_VALIDATE_EMAIL)) {
				$email_valid = 1;
				$error = 1;
			}
			
			if(empty($reg_password)) {
				$password_empty = 1;				
				$error = 1;
			}
			
			if(empty($reg_password2)) {
				$password2_empty = 1;
				$error = 1;
			}
			
			if($reg_password != $reg_password2) {
				$password_match = 1;				
				$error = 1;
			}
			
			$status = array(
				'email_empty'			=>	$email_empty,
				'email_valid'			=>	$email_valid,
				'password_empty'		=>	$password_empty,
				'password2_empty'		=>	$password2_empty,
				'password_match'		=>	$password_match
			);
			
			//echo json_encode($status);
			
			
		}		
	}
	
	private function validate($post_data) {
		//return print_r($_POST);
	}
}
?>