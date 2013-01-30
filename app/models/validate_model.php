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
    
    public function check($formData, $rules) {
    
        // open up our rules
        foreach($rules as $rule) {
            
            print_r($rule);
            
            if(is_array($rule)) {
                // this data either has multiple parameters or an advanced rule
            } else {
                
            }
            
        }    
    
    }
    
}
?>