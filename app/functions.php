<?php

/* sanitizes input */
function clean($data) {
	
	// old school strip slashes
	if(get_magic_quotes_gpc()) {
		$data = stripslashes($data);
	}
	
	// remove any HTML tags
	 $data = filter_var($data, FILTER_SANITIZE_STRING);
	
	// prevent sql injection
	$data = mysql_real_escape_string($data);
	
	return $data;       
}

?>