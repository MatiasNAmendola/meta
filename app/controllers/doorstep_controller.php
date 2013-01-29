<?php
class Doorstep_Controller extends Master_Controller {
	
	public function __construct() {
		
		$page_title =  $this->GetPageTitle('home');
		$body_class = 'doorstep';
		
		include Config::view_dir.'/inc/inc.header.php';
		
		include Config::view_dir.'/doorstep_view.php';
		
		include Config::view_dir.'/inc/inc.footer.php';
			
	}	
	
}
?>