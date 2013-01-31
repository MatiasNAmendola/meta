<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

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
		);

		return (array_key_exists($dir, $dirs)) ? $dirs[$dir] : null;

	}
}

if(Config::dev_mode == 'on') {
	error_reporting(E_ALL);
}

// include some basic functions
include Config::get_dir('app') . '/functions.php';

// include our PDO helper class, smplPDO
include Config::get_dir('model') . '/smplPDO.php';

// include the master controller
include Config::get_dir('controller') . '/controller.php';

// include the messenger class
include Config::get_dir('controller') . '/messenger.php';

// include the router
include Config::get_dir('controller') . '/router.php';

?>