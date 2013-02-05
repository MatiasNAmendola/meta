<?php

class Master_Model {
	
	public $db;
	
	public function __construct() {
	
		$db_host = Config::db_host;
		$db_name = Config::db_name;
		$db_user = Config::db_user;
		$db_pass = Config::db_pass;
		
		/* connect to the database */
		require_once Config::get_dir('model') . '/smplPDO.php';
		
		$this->db = new smplPDO( "mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass );
		
	}
	
}

?>