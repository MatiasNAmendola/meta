<?php

include 'config.php';

// start up messenger so we have access to our errors & alert messages
$messenger = new Messenger;

// do routing
$router = new Router($_SERVER['REQUEST_URI']);
$master_controller = $router->LoadController();

// include our controller
if(is_file(Config::controller_dir.'/'.strtolower($master_controller).'.php')) {
	include Config::controller_dir.'/'.strtolower($master_controller).'.php';
	
	// instantiate the controller
	$controller = new $master_controller;
} else {
	//die('Failed to load controller: '.$master_controller);
   $messenger->ErrorMessage(1000);
}

?>