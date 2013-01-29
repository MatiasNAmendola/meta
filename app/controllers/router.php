<?php

class Router {
	
	public $page;
	public $logged_in;
	
	public function __construct($page) {
		$page = $this->getPage($page);
		
		$this->page = ucfirst($page);
	}
	
	public function getPage($page = '') {
	
		// placeholder
		$logged_in = 0;
	
		// $page is returned as /project_name/PAGE
		$page = explode('/', $page);
		
		// the first / causes an empty value in the array, let's clean it up
		$page = array($page[1], $page[2]);
		
		// we want the actual page, not the project directory
		$page = $page[1];
		
		// check to see if this is the homepage
		if($page == '' || $page == 'index.php') {
			if($logged_in == 1) {
				$page = 'dashboard';
			} else {
				$page = 'doorstep';
			}
		}
		
		return $this->page = $page;
	}
	
	public function LoadController() {
		return $this->page.'_Controller';
	}
	
}