<?php
/*---------------------------------------------------------------------------------------- 
 * sanitize_model.php
 * Sanitizes data for safe handling and database input
 * @package     Model
 * @author      Brian  
 * @version     1.0
 * @since       1.0
 *----------------------------------------------------------------------------------------
 */
class Sanitize {
    public $data;
    
    public function clean($data) {
         if(is_array($data)) {
            $new_array = array();
            foreach($data as $d) {
                $d = $this->doClean($d);
                array_push($new_array, $d);
            }
            $data = $new_array;
        } else {
            $data = $this->doClean($data);
        }
        
        return $data;
    }
    
    public function doClean($data) {
        
         // old school strip slashes
        if(get_magic_quotes_gpc()) {
            $data = stripslashes($data);
        }
        
        // remove any HTML tags
        $data = $this->removeHTML($data);
        
        // prevent sql injection
        $data = mysql_real_escape_string($data);
        
        return $data;       
    }
    
    public function removeHTML($data) {
        $data = filter_var($data, FILTER_SANITIZE_STRING);
        return $data;
    }
    
    
}
 
?>