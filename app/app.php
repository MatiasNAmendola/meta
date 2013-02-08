<?php
session_start();

include 'config.php';

function __autoload($class_name) {
	$directories = array('controllers', 'etc', 'models');
	$file = $class_name.'.php';
	
	foreach($directories as $directory) {
		if(is_file(Config::app_dir . '/' . $directory . '/' . $file)) {
			include Config::app_dir . '/' . $directory . '/' . $file;
		}
	}
}

// check to see if we are logged in
if(isset($_SESSION['meta_token'])) {
	
	$meta_user_obj = new User;
	$meta_user = $meta_user_obj->meta_user($_SESSION['meta_token']);

}

// start up messenger so we have access to our errors & alert messages
$messenger = new Messenger;

// do routing
$router = new Router($_SERVER['REQUEST_URI']);
$master_controller = $router->LoadController();

// include our controller
if(is_file(Config::get_dir('controller') . '/'.strtolower($master_controller).'.php')) {
	include Config::get_dir('controller') . '/'.strtolower($master_controller).'.php';
	
	// instantiate the controller
	$controller = new $master_controller;
} else {
	//die('Failed to load controller: '.$master_controller);
   $messenger->ErrorMessage(1000);
}

?>