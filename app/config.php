<?php

class Config {
	const
	site_url					=	'http://meta:8888',
	site_dir					=	'/Users/brianmccoy/Projects/meta',
	app_dir						=	'/Users/brianmccoy/Projects/meta/app',
	controller_dir				=	'/Users/brianmccoy/Projects/meta/app/controllers',
	model_dir					=	'/Users/brianmccoy/Projects/meta/app/models',
	view_dir					=	'/Users/brianmccoy/Projects/meta/app/views',
	site_title					=	'Meta',
	dev_mode					=	'on',
	db_host						=	'localhost',
	db_name						=	'meta',
	db_user						=	'root',
	db_pass						=	'root';

	/**
	 * @param, $dir, str
	 * The directory name you need.
	 * @return, str
	 * The absolute path on this system.
	 */
	public static function get_dir($dir) {
		
		$app_dir = dirname(__FILE__);

		$dirs = array(
			'site'			=>	dirname($app_dir),
			'app'			=>	$app_dir,
			'controller'	=>	$app_dir . '/controllers',
			'model'			=>	$app_dir . '/models',
			'view'			=>	$app_dir . '/views',
			'etc'			=>  $app_dir . '/etc'
		);

		return (array_key_exists($dir, $dirs)) ? $dirs[$dir] : null;

	}
}

if(Config::dev_mode == 'on') {
	error_reporting(E_ALL);
	
	include Config::get_dir('etc').'/ChromePhp.php';
}

// include_once some basic functions
include_once Config::get_dir('app') . '/functions.php';

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

?>