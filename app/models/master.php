<?php

class Master_Model {
	
	public $dbh;
	
	public function __construct() {
	
		require Config::get_dir('model') . '/smplPDO.php';
		$this->dbh = smplPDO::get_instance();
		
	}
	
}

?>