<?php
class Register_Controller {
	public function __construct() {
		if($_POST) {
			
			// include the User model
			include Config::get_dir('model').'/user_model.php';
			$user_model = new User_Model;
			
			$formData = array(
				'reg_email'					=> clean($_POST['reg_email']),
				'reg_password'				=> clean($_POST['reg_password']),
				'reg_password2'				=> clean($_POST['reg_password2'])
			);
			
			/* Validation */
			include Config::get_dir('model') . '/validate_model.php';
			$val = new Validate;
			
			/* Define the Rules */
			$rules = array(
				'reg_email'					=> array('is_empty', 'is_email'),
				'reg_password'				=> array('is_empty'),
				'reg_password2'				=> array( array('is_matchTo', 'reg_password') )
			);
			
			$results = $val->check($formData, $rules);
			
			// check to see if the email is already taken
			$user_exists = $user_model->userExists($formData['reg_email']);
			
			if($user_exists == 1) {
			
				// we need to break down our JSON and add one more thing
				// to tip the front end that this email is taken
				
				$val_array = json_decode($results[0]);
				$val_array['email_taken'] = 1;
				
				$results[0] = json_encode($val_array);
			
			}
			
			// output the JSON for the front end to display the results
			echo $results[0];
			
			// check if there were errors or not
			if($results[1] != 1) {
				// no errors, execute the transaction
				
				// WE NEED SOME MODEL SHIT
				
			}
			
			
		}		
	}
}
?>