<?php

class Config {
	const
	site_url					=	'http://meta:8888',
	site_dir					=	'/Users/brianmccoy/Projects/meta',
	app_dir						=	'/Users/brianmccoy/Projects/meta',
	controller_dir				=	'/Users/brianmccoy/Projects/meta/app/controllers',
	model_dir					=	'/Users/brianmccoy/Projects/meta/app/models',
	view_dir					=	'/Users/brianmccoy/Projects/meta/app/views',
	site_title					=	'Meta',
	dev_mode					=	'on',
	db_host						=	'localhost',
	db_name						=	'meta',
	db_user						=	'root',
	db_pass						=	'root';
}

if(Config::dev_mode == 'on') {
	error_reporting(E_ALL);
}

// include our PDO helper class, smplPDO
include Config::model_dir.'/smplPDO.php';

// include the master controller
include Config::controller_dir.'/controller.php';

// include the messenger class
include Config::controller_dir.'/messenger.php';

// include the router
include Config::controller_dir.'/router.php';

?>