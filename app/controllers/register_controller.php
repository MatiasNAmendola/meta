<?php
class Register_Controller {
	
	private $user_model;
	private $form_data;
	
	public function __construct() {
		if($_POST) {
			
			// include the User model
			include Config::get_dir('model').'/user_model.php';
			$this->user_model = new User_Model;
			
			$this->formData = array(
				'reg_email'		=> clean($_POST['reg_email']),
				'reg_password'	=> clean($_POST['reg_password']),
				'reg_password2'	=> clean($_POST['reg_password2'])
			);
			
			$results = $this->doValidation();
			
			// check if there were errors or not
			if($results[1] != 1) {
				// no errors, execute the transaction
				
				$user_data = array(
					'email'		=> $this->formData['reg_email'],
					'password'	=> $this->formData['reg_password']
				);
				
				// create the user account
				$this->user_model->createUser($user_data);
				
				// we need to set up account activation for their email
				// use the email_verification_model
				include Config::get_dir('model').'/email_verification_model.php';
				$ev_model = new Email_Verification_Model;
				
				// setup will create a verification code, return it, and save it to the db
				$ev_setup = $ev_model->setup($user_data['email']);
				
				echo json_encode(array('success' => 1));
				
			} else {
				// display JSON to parse the errors
				
				// output the JSON for the front end to display the results
				echo $results[0];
			}
			
			
		}		
	}
	
	private function doValidation() {
	
		/* Validation */
		include Config::get_dir('model') . '/validate_model.php';
		$val = new Validate;
		
		/* Define the Rules */
		$rules = array(
			'reg_email'		=> array('is_empty', 'is_email'),
			'reg_password'	=> array('is_empty'),
			'reg_password2'	=> array( array('is_matchTo', 'reg_password') )
		);
		
		$results = $val->check($this->formData, $rules);
		
		// check to see if the email is already taken
		$user_exists = $this->user_model->userExists($this->formData['reg_email']);
		
		if($user_exists == 1) {
		
			// we need to break down our JSON and add one more thing
			// to tip the front end that this email is taken
			
			$val_array = json_decode($results[0], true);
			$val_array['fail'] = 1;
			$val_array['user_exists'] = $user_exists;
			
			$results[0] = json_encode($val_array);
			$results[1] = 1;
		
		} else {
			
			// we need to break down our JSON and add one more thing
			// to tip the front end that this email is not taken
			
			$val_array = json_decode($results[0], true);
			$val_array['user_exists'] = $user_exists;
			
			$results[0] = json_encode($val_array);
			
		}
		
		return $results;
	}
}
?>