<?php
abstract class Master_Controller {

	protected $page_title;
	
	public function __construct() {
		global $site_settings;
		echo $site_settings;
		echo 'hi';
		$this->site_settings = $site_settings;
	}
	
	public function GetPageTitle($page_slug) {
		
		$page_titles = array(
			'home'			=>		'Client Credential Management',
			'error_404'		=>		'Page Not Found'
		);
		
		return $this->page_title = $page_titles[$page_slug].' | '.Config::site_title; 
		
	}
	
}
?>