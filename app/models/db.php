<?php
class IntDB {
	
	public $dbh;

	public function __construct() {
		// the database
		require Config::get_dir('model') . '/smplPDO.php';
		$dbh = smplPDO::get_instance();
	
		return $dbh;
	}
}
?>