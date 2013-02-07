<?php
abstract class Master_Controller {

	protected $page_title;
	public $meta_user;
	
	public function GetPageTitle($page_slug) {
		
		$page_titles = array(
			'home'			=>		'Client Credential Management',
			'error_404'		=>		'Page Not Found'
		);
		
		return $this->page_title = $page_titles[$page_slug].' | '.Config::site_title; 
		
	}
	
}
?>