<?php
class Doorstep extends Master_Controller {
	
	public $page_title;
	public $body_class = 'doorstep';
	public $meta_user;
	
	public function __construct() {
		
		$this->meta_user = $meta_user;
		
		$this->page_title =  $this->GetPageTitle('home');
		
		include Config::get_dir('view') . '/doorstep.php';
			
	}

}
?>