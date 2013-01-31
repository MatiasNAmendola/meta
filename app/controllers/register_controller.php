<?php
class Register_Controller {
	public function __construct() {
		if($_POST) {
			
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
			
			// output the JSON for the front end to display the results
			echo $results[0];
			
			// check if there were errors or not
			if($results[1] != 1) {
				// no errors, execute the transaction
				
				
				
			}
			
			
		}		
	}
}
?>