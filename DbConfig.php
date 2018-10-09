<?php
class DbConfig{
	private $_host = "localhost";
	private $_user = "root";
	private $_pass = "";
	private $database ="haritha";
	protected $connection;
	public function __construct(){
		if(!isset($this->connection)){
			$this->connection = new mysqli($this->_host,$this->_user,$this->_pass,$this->database);
			if(!$this->connection){
				echo "cannot connect to database server";
				exit;
			}
		}
		return $this->connection;
	}
}
?>