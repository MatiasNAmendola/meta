<?php

class Master_Model {
	
	public $db;
	private $db_host = Config::db_host;
	private $db_name = Config::db_name;
	private $db_user = Config::db_user;
	private $db_pass = Config::db_pass;
	
	public function __construct() {
		
		/* connect to the database */
		include Config::get_dir('model') . '/smplPDO.php';
		
		$db = new smplPDO( "mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass );
		
	}
	
}

?>