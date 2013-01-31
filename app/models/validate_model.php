<?php
/*---------------------------------------------------------------------------------------- 
 * validate_model.php
 * Runs through form data and tests against rules based on criteria specified
 * @package     Model
 * @author      Brian  
 * @version     1.0
 * @since       1.0
 *----------------------------------------------------------------------------------------
 */
class Validate {
    
    public $formData;
    public $rules;
    
    /* Returns an array, 0 => json object, 1 = variable for PHP */
    public function check($formData, $rules) {
     	
     	$results = array();
    	foreach($formData as $key => $data) {
    	
    		// key = field name
    		// data = value
    		
    		$result = array($key);
    		
    		for($x=0;$x<count($rules[$key]);$x++) {
    			
    			if(is_array($rules[$key][$x])) {
    				$test = $this->checkRule($formData, $key, $rules[$key][$x][0], $rules[$key][$x][1]);
    				
    				if($test == 1) {
    					$fail = 1;
    				}
    				
    				$test_result = array($rules[$key][$x][0], $test);
    				
    				array_push($result, $test_result);
    				
    			} else {
    				$test = $this->checkRule($formData, $key, $rules[$key][$x]);
    				
    				if($test == 1) {
    					$fail = 1;
    				}
    				
    				$test_result = array($rules[$key][$x], $test);
    				array_push($result, $test_result);
    			}
    			
    		}
    		
    		array_push($results, $result);
    	
    	}
    	
    	// encode the results
    	$results = json_encode($results);
    	$output = array($results, $fail);
    	
    	return $output;
    	 
    }
    
    public function checkRule($data, $key, $rule, $selector="") {
    	/* Our Rules
    	 * is_empty
    	 * is_email
    	 * is_matchTo/array key to match
    	 */
    	 
    	 /* is_empty */
    	 if($rule == "is_empty") {
    	 	// check to see if the data is empty
    	 	
    	 	if(empty($data[$key])) {
    	 		return 1;
    	 	} else {
    	 		return 0;
    	 	}
    	 	
    	 }
    	 
    	 /* is_email */
    	 if($rule == "is_email") {
    	 	$email = filter_var($data[$key], FILTER_SANITIZE_EMAIL);
    	 	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	 		return 1;
    	 	} else {
    	 		return 0;
    	 	}
    	 }
    	 
    	 /* is_matchTo */
    	 if($rule == "is_matchTo") {
    	 	
    	 	if($data[$key] != $data[$selector]) {
    	 		return 1;
    	 	} else {
    	 		return 0;
    	 	}
    	 	
    	 }
    } 
    
}
?>