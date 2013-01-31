<?php
class Doorstep_Controller extends Master_Controller {
	
	public $page_title;
	public $body_class = 'doorstep';
	
	public function __construct() {
		
		$this->page_title =  $this->GetPageTitle('home');
		
		include Config::get_dir('view') . '/inc/inc.header.php';
		
		include Config::get_dir('view') . '/doorstep_view.php';
		
		include Config::get_dir('view') . '/inc/inc.footer.php';
			
	}

}
?>